<?php
Route::get('login','Teknoto\Login\Controllers\LoginController@showlogin');
Route::post('login','Teknoto\Login\Controllers\LoginController@Checklogin');