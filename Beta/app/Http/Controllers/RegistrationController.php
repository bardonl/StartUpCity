<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\UserStats;
use App\Skills;
use App\Providers\CheckDuplicateServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
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
        
        $userData = User::create(['email' => $request->input('email'), 'password' => $hashedPw]);
        
        if (!$userData)
        {
            $this->revertInserts();
            return redirect()->intended('/')->with('error', 'Oeps! Er is iets fout gegaan, probeer het opnieuw!');
        }
    
        if (!UserStats::create(['user_id' => $userData->id]))
        {
            $this->revertInserts();
            return redirect()->intended('/')->with('error', 'Oeps! Er is iets fout gegaan, probeer het opnieuw!');
        }
    
        foreach(Skills::all() as $skill)
        {
            if (!DB::table('user_skills')
                ->insert([
                    'user_id' => $userData->id,
                    'skill_id' => $skill->id,
                    'created_at' => Carbon::now('Europe/Amsterdam')
                ]))
            {
                $this->revertInserts();
                return redirect()->intended('/')->with('error', 'Oeps! Er is iets fout gegaan, probeer het opnieuw!');
            }
        }
        
        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')]))
        {
            auth()->user()->online_status = 1;
            auth()->user()->save();
            return View::make('/profile');
        }
    }
    
    public function revertInserts()
    {
        DB::table('user_skills')->where('user_id', '=', auth()->user()->id)->delete();
        DB::table('user_stats')->where('user_id', '=', auth()->user()->id)->delete();
        DB::table('users')->where('user_id', '=', auth()->user()->id)->delete();
        
    }
}
