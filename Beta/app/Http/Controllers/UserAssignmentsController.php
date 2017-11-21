<?php

namespace App\Http\Controllers;

use App\UserAssignments;
use App\UserStats;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\UserSkills;

class UserAssignmentsController extends Controller
{
    public function create($id)
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
            'AssignmentsController@show'
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
    
    public static function updateUserAssignment($asssignmentData)
    {
        
        if (! empty($asssignmentData[0]))
        {
            
            if ($asssignmentData[0]->start_time + $asssignmentData[0]->duration <= Carbon::now('Europe/Amsterdam')->timestamp)
            {
                $userAssignmentData = UserAssignments::where([['user_id', '=', auth()->user()->id], ['active', '=', 1]])->first();
                $userAssignmentData->active = 0;
                $userAssignmentData->save();

                $userStatsData = UserStats::where('user_id', '=', auth()->user()->id)->first();
                $userStatsData->peanuts += $asssignmentData[0]->peanuts;
                $userStatsData->save();
                
                $userSkill = UserSkills::where([['skill_id', '=', $asssignmentData[0]->skill_id],['user_id', '=', auth()->user()->id]])->first();
                $userSkill->experience += $asssignmentData[0]->experience_points;
                $userSkill->save();
            }
        }
    }

}
