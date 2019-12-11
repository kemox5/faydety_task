<?php

namespace App\Http\Controllers\User\Api;

use App\Http\Controllers\Controller;
use App\Libraries\ApiValidator;
use App\Libraries\JwtLibrary;
use App\User;
use Exception;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function encode()
    {
        $validate = ApiValidator::validate(User::encodeRules());
        if ($validate) {
            return response(['errors' => $validate], 422);
        } else {
            $data = request()->all('password', 'phone_number');
            $token = JwtLibrary::encode($data);
            return response(['data' => $token], 200);
        }
    }

    public function decode()
    {
        $validate = ApiValidator::validate(User::decodeRules());
        if ($validate) {
            return response(['errors' => $validate], 400);
        } else {
            $token = request()->input('token');
            try {
                $data = JwtLibrary::decode($token);
            } catch (Exception $e) {
                return response(['errors' => 'unauthorized request'], 401);
            }

            $phone_number = $data->phone_number;
            $user = User::where('phone_number', $phone_number)->first();
            if ($user)
                return response(['data' => $user], 200);
            else
                return response(['errors' => 'Bad Request'], 400);
        }
    }
}
