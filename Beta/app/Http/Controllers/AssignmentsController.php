<?php

namespace App\Http\Controllers;
use App\Assignments;
use Illuminate\Support\Facades\DB;

class AssignmentsController extends Controller
{
    
    public function show()
    {
        
        if ( $_SERVER['REQUEST_URI'] === '/learning') {
            $assignmentTypeId = 1;
        } elseif ( $_SERVER['REQUEST_URI'] === '/working') {
            $assignmentTypeId = 2;
        } else {
            echo "Whoops";
            die;
        }
        
        $assignments = Assignments::all()->where('assignment_type_id', $assignmentTypeId);
        
        $userAssignmentData = DB::table('user_assignments')->where([
            ['user_id', '=', auth()->user()->id],
            ['active', '=', 1]
        ])->count();
        
        if ($userAssignmentData > 0) {
            $assignments->disabled = 1;
        } else {
            $assignments->disabled = 0;
        }
        
        $this->getAssignmentSkillType($assignments);
        
        $this->getAssignmentEntryLevel($assignments);
        
        $this->convertTime($assignments);
        
        return view($_SERVER['REQUEST_URI'])->with(compact('assignments'));
    }
    
    public function convertTime($assignments)
    {
        
        $i = 0;
        foreach ($assignments as $assignment) {
            $time = $this->formatTime($assignment->duration);
            if ($time['hours'] > 0) {
                if ($time['minutes'] > 0) {
                    $assignment->converted_duration = $time['hours'] . str_replace('0.', '.',
                            round($time['minutes'] / 60, 2) . ' Uur');
                } else {
                    $assignment->converted_duration = $time['hours'] . ' Uur';
                }
            } elseif ($time['minutes'] > 0) {
                if ($time['seconds'] > 0) {
                    $assignment->converted_duration = $time['minutes'] . str_replace('0.', '.',
                            round($time['seconds'] / 60, 2) . ' Minuten');
                } else {
                    $assignment->converted_duration = $time['minutes'] . ' Minuten';
                }
            } else {
                $assignment->converted_duration = $time['seconds'] . ' Seconden';
            }
            $i++;
        }
    }
    
    public function getAssignmentSkillType($assignments)
    {
        $i = 0;
        
        foreach ($assignments as $assignment) {
            $assignment->skill_type = DB::table('assignments')
                ->select('skills.title')
                ->join('skills', function ($join) use ($assignment) {
                    $join->on('skills.id', '=', 'assignments.skill_id');
                })
                ->where('skills.id', '=', $assignment->skill_id)
                ->get();
            
            $i++;
        }
    }
    
    public function getAssignmentEntryLevel($assignments)
    {
        $i = 0;
        
        foreach ($assignments as $assignment) {
            $assignment->entry_level = DB::table('assignments')
                ->select('entry_levels.title')
                ->join('entry_levels', function ($join) use ($assignment) {
                    $join->on('entry_levels.id', '=', 'assignments.entry_level_id');
                })
                ->where('entry_levels.id', '=', $assignment->entry_level_id)
                ->get();
            
            $i++;
        }
    }
    
    public static function formatTime($duration)
    {
        
        $hours = floor($duration / 3600);
        $secondsLeft = $duration % 3600;
        $minutes = floor($secondsLeft / 60);
        $seconds = $secondsLeft % 60;
        
        return ['hours' => $hours, 'minutes' => $minutes, 'seconds' => $seconds];
    }
}
