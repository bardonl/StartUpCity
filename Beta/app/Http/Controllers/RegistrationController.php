<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserStats;
use App\Providers\CheckDuplicateServiceProvider;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class RegistrationController extends Controller
{
    public function store(Request $request)
    {
        $hashedPw = bcrypt($request->input('password'));
        
        $this->validate(request(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
        );
        
        if (CheckDuplicateServiceProvider::checkUserDuplicate($request->input('email'), 'email'))
        {
            
            return redirect()->intended('/')->with('error', 'E-mailadres bestaat al!');
        }
        
        if (empty($request->input('email')) || empty($request->input('password')))
        {
            
            return redirect()->intended('/')->with('error', 'De velden mogen niet leeg zijn!');
        }
        
        if (!User::create(['email' => $request->input('email'), 'password' => $hashedPw]))
        {
            
            return redirect()->intended('/')->with('error', 'Oeps! Er is iets fout gegaan, probeer het opnieuw!');
        }
        
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            
            if (!UserStats::create(['user_id' => auth()->user()->id]))
            {
                
                return redirect()->intended('/')->with('error', 'Oeps! Er is iets fout gegaan, probeer het opnieuw!');
            }
            
            return View::make('/profile');
        }
    }
}
