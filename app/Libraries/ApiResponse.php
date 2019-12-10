<?php
namespace App\Libraries;

class ApiResponse{
	public static function errors($errorsArray){
		return response(['errors' => $errorsArray], 422);
	}

	public static function data($data){
		return response($data, 200);
	}

	public static function success($message)
    {
        return response(['message' => $message], 200);
    }
}
