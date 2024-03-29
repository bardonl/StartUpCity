<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $user =  User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);
        
        return $user;
    }
    
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    
    public function handleProviderCallback($provider)
    {
        try {
            
            $user = Socialite::driver($provider)->stateless()->user();
            
            $create['email'] = $user->email;
            $create[$provider . '_id'] = $user->id;
            $create['provider'] = $provider;
            $create['online_status'] = 1;
            $urlComponents = explode('?',$user->avatar_original);
            $create['picture'] = $urlComponents[0];
            
            $userModel = new User;
            
            $createdUser = $userModel->addNew($create);
            
            $user = User::find($createdUser->id);
            
            auth()->login($user);
            
            return view('/profile');
        } catch (Exception $e) {
            return redirect('welcome')->with('error', 'Whoops! Er is iets mis gegaan!');
        }
    }
}
