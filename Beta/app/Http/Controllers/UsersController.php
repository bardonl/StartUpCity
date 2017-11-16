<?php

namespace App\Http\Controllers;

use App\User;

class UsersController extends Controller
{
    
    public static function getUsers($next, $limit)
    {
        $usersData = User::skip($next)->limit($limit)->get();
        
        $i = 0;
        
        foreach($usersData as $userData)
        {
            
            $userData->friendshipStatus = FriendsController::checkFriends($userData->id);
            $i++;
        }
        
        return view('/users', compact('usersData'));
    }
}
