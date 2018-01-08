<?php

namespace App\Http\Controllers;

use App\UserAssignments;
use App\UserStats;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\UserSkills;
use App\Http\Controllers\TransactionsController;

class UserAssignmentsController extends Controller
{
    public function create($workingStatus, $id)
    {
        
        $userAssignments = new UserAssignments();
    
        $userAssignments->user_id = auth()->user()->id;
        $userAssignments->assignment_id = $id;
        $userAssignments->active = 1;
        $userAssignments->start_time = Carbon::now('Europe/Amsterdam')->timestamp;
        $userAssignments->created_at = Carbon::now('Europe/Amsterdam');
        $userAssignments->updated_at = Carbon::now('Europe/Amsterdam');
        
        $userAssignments->save();
        
        return redirect()->action(
            'AssignmentsController@show', ['working_status' => $workingStatus]
        );
    }
    
    public static function getActiveAssignment()
    {
        $userAssignmentData = DB::table('user_assignments')
            ->join('assignments', function($join){
                $join->on('user_assignments.assignment_id', '=', 'assignments.id');
            })
            ->where([['active', '=', 1],['user_id', '=', auth()->user()->id]])
            ->get();
        if ( isset($userAssignmentData[0])) {
            $userAssignmentData[0]->convertedDuration = \App\Http\Controllers\AssignmentsController::formatTime($userAssignmentData[0]->duration);
    
            return $userAssignmentData;
        }
    }
    
    public static function updateUserAssignment()
    {
        $assignmentData = self::getActiveAssignment();
    
        
        if (! empty($assignmentData[0]))
        {
            
            if ($assignmentData[0]->start_time + $assignmentData[0]->duration <= Carbon::now('Europe/Amsterdam')->timestamp)
            {
                $assignmentTypeTitle = DB::table('assignment_types')
                    ->where('id', '=' , $assignmentData[0]->assignment_type_id)
                    ->get();
                
                $userAssignmentData = UserAssignments::where([['user_id', '=', auth()->user()->id], ['active', '=', 1]])->first();
                $userAssignmentData->active = 0;
                $userAssignmentData->save();

                $userStatsData = UserStats::where('user_id', '=', auth()->user()->id)->first();
                TransactionsController::saveTransaction('peanuts', NULL, auth()->user()->id, $assignmentData[0]->peanuts, $assignmentTypeTitle[0]->title . ':' . $assignmentData[0]->title);
                $userStatsData->peanuts += $assignmentData[0]->peanuts;
                $userStatsData->save();
                
                $userSkill = UserSkills::where([['skill_id', '=', $assignmentData[0]->skill_id],['user_id', '=', auth()->user()->id]])->first();
                TransactionsController::saveTransaction('experience', null, auth()->user()->id, $assignmentData[0]->experience_points, $assignmentTypeTitle[0]->title . ':' . $assignmentData[0]->title);
                $userSkill->experience += $assignmentData[0]->experience_points;
                $userSkill->save();
            }
        }
    }
}
