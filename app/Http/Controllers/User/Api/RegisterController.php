<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Libraries\ApiResponse;
use App\Libraries\ApiValidator;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /**
     * @return array
     */
    public function register()
    {
        $validate = ApiValidator::validate(User::registerRules());
        if($validate){
            return response(['errors' => $validate], 422);
        }else{
            $data = request()->all('first_name', 'last_name', 'country_code', 'phone_number', 'gender', 'birthdate', 'avatar', 'email');
            $user = User::create($data);
            return $user;
        }
    }
}
