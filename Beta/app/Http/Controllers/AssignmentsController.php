<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Assignments;

class AssignmentsController extends Controller
{
    
    public static function show()
    {
        $assignments = Assignments::all()->where('assignment_type_id', 1);
        
        return view('/learning', compact('assignments'));
    }
}
