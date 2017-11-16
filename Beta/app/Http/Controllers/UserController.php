<?php

namespace App\Http\Controllers;

use App\Providers\CheckDuplicateServiceProvider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $userdata = auth()->user();
        
        $username = $request->input('username');
        $companyname = $request->input('companyname');
        
        if (!isset($username)) {
            
            return redirect()->intended('/profile')->with('error', 'Controleer je gebruikersnaam!');
        }
        
        if (!isset($companyname)) {
            
            return redirect()->intended('/profile')->with('error', 'Controleer je bedrijfsnaam!');
        }
        
        if (CheckDuplicateServiceProvider::checkUserDuplicate($username, 'username')) {
            
            return redirect()->intended('/profile')->with('error', 'Gebruikersnaam is al in gebruik!');
        }
        
        if (CheckDuplicateServiceProvider::checkUserDuplicate($companyname, 'company_name')) {
            
            return redirect()->intended('/profile')->with('error', 'Bedrijfsnaam bestaat al!');
        }
        
        $userdata->username = $username;
        $userdata->company_name = $companyname;
        
        $userdata->save();
        
        return View::make('/profile');
    }
    
    public static function updateLastActive()
    {
        
        $nowAmsterdam = Carbon::now('Europe/Amsterdam');
        
        $userdata = auth()->user();
        $userdata->last_active = $nowAmsterdam;
        $userdata->updated_at = $nowAmsterdam;
        $userdata->online_status = 1;
        
        if ($userdata->save()) {
            
            return true;
        }
        
        return false;
    }
    
    public function show($id)
    {
        
        return view('/profile')->with(compact('id'));
    }
    
    public static function getExperience($id)
    {
        return DB::table('user_skills')
            ->where('user_id', '=', $id)
            ->join('levels','points_required', '>', 'user_skills.experience')
            ->groupBy('skill_id')
            ->orderBy('points_required','desc')
            ->get();
    }
    
    public function googleLogin(Request $request)
    {
    
    }
}
