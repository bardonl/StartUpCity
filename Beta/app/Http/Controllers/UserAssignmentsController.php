<?php

namespace App\Http\Controllers;

use App\Providers\DateNowServiceProvider;
use App\UserAssignments;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\DB;

class UserAssignmentsController extends Controller
{
    public function create($id)
    {
        $userAssignments = new UserAssignments();
    
        $userAssignments->user_id = auth()->user()->id;
        $userAssignments->assignment_id = $id;
        $userAssignments->active = 1;
        $userAssignments->start_time = Carbon::now('Europe/Amsterdam');
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
}
