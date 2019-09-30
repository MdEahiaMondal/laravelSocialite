<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /**
     * Redirect the user to the facebook authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from facebook.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $userSocial = Socialite::driver($provider)->user();

        $data['User_App_Id'] =$userSocial->id;
        $data['provider_name'] =$provider;
        $data['nickname'] = $userSocial->nickname;
        $data['name'] =$userSocial->name;
        $data['email'] =$userSocial->email;
        $data['avatar'] =$userSocial->avatar;

        /*dd($data);*/
        /*$data['password'] =$userSocial->token;*/

        if ($userSocial->email){
            $findUser = User::where('User_App_Id', $userSocial->id)->first();
            if($findUser){
                User::where('User_App_Id', $userSocial->id)->update($data);
                Auth::loginUsingId($findUser->id);
                return redirect()->route('home');
            }else{
                $userSingUpId = User::insertGetId($data);
                Auth::loginUsingId($userSingUpId);
                return redirect()->route('home');
            }
        }else{
            $findUser = User::where('User_App_Id', $userSocial->id)->first();
            if($findUser){
                User::where('User_App_Id', $userSocial->id)->update($data);
                Auth::loginUsingId($findUser->id);
                return redirect()->route('home');
            }
            $userSingUpId = User::insertGetId($data);
            Auth::loginUsingId($userSingUpId);
            return redirect()->route('home');
        }


    }



    //or google socialite




}
