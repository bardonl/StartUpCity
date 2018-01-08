<?php

namespace App;
use Eloquent;
use App\UserStats;
use App\Skills;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class User extends Eloquent implements Authenticatable
{
    use AuthenticableTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'facebook_id', 'google_id', 'online_status', 'picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    public function addNew($input)
    {
        
        $check = static::where($input['provider'] . '_id', $input[$input['provider'] . '_id'])->first();
        
        if(empty($check)){
            $newUserData = static::create($input);
            
            $check = (object) [];
            
            $check->id = $newUserData->id;
            
            if (!$check)
            {
                return redirect()->intended('/')->with('error', 'Oeps! Er is iets fout gegaan, probeer het opnieuw!');
            }
            
            if (!UserStats::create(['user_id' => $check->id]))
            {
        
                return redirect()->intended('/')->with('error', 'Oeps! Er is iets fout gegaan, probeer het opnieuw!');
            }
    
            foreach(Skills::all() as $skill)
            {
                if (!DB::table('user_skills')
                    ->insert([
                        'user_id' => $check->id,
                        'skill_id' => $skill->id,
                        'created_at' => Carbon::now('Europe/Amsterdam')
                    ]))
                {
            
                    return redirect()->intended('/')->with('error', 'Oeps! Er is iets fout gegaan, probeer het opnieuw!');
                }
            }
        }
        
        return $check;
    }
    
    public function userStats()
    {
        return $this->hasOne('App\UserStats', 'user_id');
    }
    
    public function hasFriends()
    {
        return $this->hasMany('App\Friends', 'requested_user_id');
    }
}
