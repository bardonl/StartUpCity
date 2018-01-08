<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Friends;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class FriendsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * @param int $received_user_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store($received_user_id)
    {
        
        $dateTimeNow = Carbon::now('Europe/Amsterdam');
        
        $friends = new Friends;
        
        $friends->requested_user_id = auth()->user()->id;
        $friends->received_user_id = $received_user_id;
        $friends->requested_at = $dateTimeNow;
        
        if ($friends->save()) {
            
            return redirect()->intended('/users/0/10')->with('send', 'Verzoek ingediend');
        } else {
            
            return View::make('/users/0/10')->with('error', 'Oeps! Er is iets fout gegaan! Probeer het later nog eens!');
        }
    }
    
    /**
     * @param int $user_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($user_id)
    {
        if (!DB::table('friends')->where([
            ['received_user_id', $user_id],
            ['requested_user_id', auth()->user()->id],
            ['active', 1]
        ])->orwhere([
            ['received_user_id', auth()->user()->id],
            ['requested_user_id', $user_id],
            ['active', 1]
        ])->update(['active' => 0])) {
            
            return View::make('/users/0/10')->with('error', 'Oeps! Er is iets fout gegaan! Probeer het later nog eens!');
        }
        
        return redirect()->intended('/users/0/10')->with('success');
    }
    
    /**
     * @param int $requested_user_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update($requested_user_id)
    {
        $dateTimeNow = Carbon::now('Europe/Amsterdam');
        
        if (!DB::table('friends')->
        where([
            ['received_user_id', auth()->user()->id],
            ['requested_user_id', $requested_user_id],
            ['active', 1]
        ])->
        update([
            'accepted' => 1,
            'accepted_at' => $dateTimeNow
        ])) {
            
            return View::make('/users/0/10')->with('error', 'Oeps! Er is iets fout gegaan! Probeer het later nog eens!');
        }
        
        return redirect()->intended('/users/0/10')->with('success');
    }
    
    /**
     * @param int $user_id
     * @return array|bool
     */
    public static function checkFriends($user_id)
    {
        
        if (!empty(FriendsController::checkFriendRequests($user_id)['message'])) {
            
            $request = FriendsController::checkFriendRequests($user_id);
        } elseif (!empty(FriendsController::checkFriendship($user_id)['message'])) {
            
            $request = FriendsController::checkFriendship($user_id);
        } else {
            
            $request = ['message' => 'Vriendschapsverzoek versturen', 'action' => 'add'];
        }
        
        return $request;
    }
    
    /**
     * @param int $user_id
     * @return array|bool
     */
    public static function checkFriendRequests($user_id)
    {
        if (DB::table('friends')->where([
                ['requested_user_id', auth()->user()->id],
                ['received_user_id', $user_id],
                ['accepted', 0],
                ['active', 1]
            ])->count() === 1) {
            return [
                'message' => 'Vriendschapsverzoek intrekken',
                'action' => 'delete',
                'additionalMessage' => 'Verzoek ingediend'
            ];
        } elseif (DB::table('friends')->where([
                ['requested_user_id', $user_id],
                ['received_user_id', auth()->user()->id],
                ['accepted', 0],
                ['active', 1]
            ])->count() === 1) {
            
            return ['message' => 'Vriendschapsverzoek accepteren', 'action' => 'update'];
        }
        
        return false;
    }
    
    /**
     * @param int $user_id
     * @return array|bool
     */
    public static function checkFriendship($user_id)
    {
        if (DB::table('friends')->
            where([
                ['requested_user_id', auth()->user()->id],
                ['received_user_id', $user_id],
                ['accepted', 1],
                ['active', 1]
            ])->
            orwhere([
                ['requested_user_id', $user_id],
                ['received_user_id', auth()->user()->id],
                ['accepted', 1],
                ['active', 1]
            ])->count() === 1)
        {
            return ['message' => 'Vriendschap beëindigen', 'action' => 'delete'];
        }
        
        return false;
    }
    
    /**
     * @param $user_id
     * @return mixed
     */
    public static function getFriends($user_id, $next)
    {
        
        return DB::table('friends')->
        join('users', function ($join) use($user_id) {
            $join->on('users.id', '=', 'friends.received_user_id')->
            where(function ($query) use($user_id) {
                $query->
                where('requested_user_id', '=', $user_id)->
                where('active', '=', 1)->
                where('accepted', '=', 1)->
                where('users.id', '!=', $user_id);
            })->
            oron('users.id', '=', 'friends.requested_user_id')->
            where(function ($query) use($user_id) {
                $query->
                where('received_user_id', '=', $user_id)->
                where('active', '=', 1)->
                where('accepted', '=', 1)->
                where('users.id', '!=', $user_id);
            });
        })->skip($next)->limit(8)->get();
    }
}
