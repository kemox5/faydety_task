<?php

//TASK 1
Route::post('/register', 'RegisterController@register');

//TASK 2
Route::post('/encode', 'LoginController@encode');

//TASK 3
Route::post('/decode', 'LoginController@decode');
