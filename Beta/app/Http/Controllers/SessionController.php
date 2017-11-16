<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create(Request $request)
    {
        
        $this->validate(request(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );
        
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            
            if (!UserController::updateLastActive()) {
                echo 'Whoops something is wrong!';
                die;
            }
    
            Session::set('friends', \App\Http\Controllers\FriendsController::getFriends(auth()->user()->id));
            
            return redirect()->intended('/profile');
        } else {
            
            return redirect()->intended('/')->with('error', 'Gebruikersnaam of wachtwoord is niet correct!');
        }
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy()
    {
        auth()->user()->online_status = 0;
        auth()->user()->save();
        
        auth()->logout();
        
        return redirect()->intended('/')->with('success', 'Je bent uitgelogd!');
    }
}
