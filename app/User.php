<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    public $timestamps = false;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password'
    ];

    protected static function registerRules()
    {
        return [
            'first_name' => 'required|min:3|max:12',
            'last_name' => 'required|min:3|max:12',
            'country_code' => 'required',
            'phone_number' => 'required|unique:users|digits:11|starts_with:010,011,012,015',
            'gender' => 'required|in:male,female',
            'birthdate' => 'required|date|date_format:Y-m-d|before:today',
            'avatar' => 'required|image',
            'email' => 'nullable|email|unique:users',
        ];
    }

    public static function encodeRules(){
        return [
            'password' => 'required',
            'phone_number' => 'required'
        ];
    }

    public static function decodeRules(){
        return [
            'token' => 'required',
        ];
    }
}
