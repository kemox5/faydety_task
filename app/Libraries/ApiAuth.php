<?php 

namespace App\Libraries;
use Illuminate\Support\Facades\Hash;
use \Firebase\JWT\JWT;
use DB;
class ApiAuth{

    private static function responseHandler($status, $errors, $data){
    	return (object) ['status' => $status, 'errors' => $errors, 'data' => $data];
    }

	public static function check($table, $data,$additional = []){
		$dataKeys = array_keys($data);
		$findUser = DB::table($table)
			->where($dataKeys[0], $data[$dataKeys[0]])
			->where($additional)
			->first();
		if($findUser && Hash::check($data[$dataKeys[1]], $findUser->{$dataKeys[1]})){
		    unset($findUser->{$dataKeys[1]});
			return self::responseHandler(true, '', $findUser);
		}else{
			return self::responseHandler(false, ['account' => [trans('main.user_not_found_or_data_not_true')]] , '');
		}
	}

	public static function login($data, $additionalToToken = []){
		$data['token'] = JwtLibrary::encode($additionalToToken);
		return $data;
	}
}
