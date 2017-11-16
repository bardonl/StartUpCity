<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SkillsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        auth()->user()->friends = \App\Http\Controllers\FriendsController::getFriends();
    }
    
    /**
     * @return mixed
     */
    public static function getSkillTitle($id)
    {
        return DB::table('skills')->where('id', $id)->select('title')->get();
    }
}
