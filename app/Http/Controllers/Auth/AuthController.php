<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Validator;
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


    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     * @param Guard $auth
     * @param Registrar $registrar
     */
    public function __construct()
    {

        $this->middleware('guest', ['except' => 'getLogout']);
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
            'first_name' => 'required|max:25',
            'last_name_name' => 'required|max:25',
            'username' => 'max:50',
            'username_slug' => 'max:50',
            'comfirmation_code' => 'required|max:70',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
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
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'username' => $data['username'],
            'username_slug' => $data['username_slug'],
            'comfirmation_code' => $data['comfirmation_code'],
            'comfirmed' => $data['comfirmed'],
            'settings' => $data['settings'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

}
