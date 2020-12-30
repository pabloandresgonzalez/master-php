<?php

namespace App\Http\Traits;

use Illuminate\Support\Facades\Validator;
use App\User;

trait ValidateAndCreateUser
{
        /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, User::$rules);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        return User::createUsuario($data);

    }

    //$user->roles()->attach(Role::where('name', 'user')->first());
    //return $user;
}
