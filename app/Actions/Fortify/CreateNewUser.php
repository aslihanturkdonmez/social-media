<?php

namespace App\Actions\Fortify;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str;


class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {


        Validator::make($input, [
            'name' => ['required', 'string', 'max:50'],
            'username' => ['required', 'string', 'max:25','unique:users'],
            'email' => ['required', 'string', 'email', 'max:30', 'unique:users'], //,'endsWith:@ogrenci.btu.edu.tr'
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
            'grade' => ['required', 'string'],
            'branch' => ['required', 'string'],
            'gender' => ['required', 'string'],
            'birthday' => ["before:today"]
        ])->validate();

        $user= User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'username' => $input['username'],
            'password' => Hash::make($input['password']),
            'grade' => $input['grade'],
            'branch' => $input['branch'],
            'gender' => $input['gender'],
            'birthday' => $input['birthday']
        ]);


        return $user;
    }
}