<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// 로그인 후 사용할 수 있는 컨트롤러들..
Route::group(['middleware' => 'auth'], function() {
	Route::get('/', function () {
	    return view('tree');
	});
	
	Route::group(['namespace' => 'Department'], function() {
		Route::resource('/department', 'DepartmentController');
	});
});

// 인증 관련 컨트롤러들..
Route::group(['namespace' => 'Auth', 'prefix' => 'auth'], function() {
	// 로그인
	Route::get('login', 'AuthController@getLogin');
	Route::post('login', 'AuthController@postLogin');
	Route::get('logout', 'AuthController@getLogout');
	
	// 회원가입
	Route::get('register', 'AuthController@getRegister');
	Route::post('register', 'AuthController@postRegister');
});

// 기타 유틸성 컨트롤러들..
Route::group(['namespace' => 'Utils'], function() {
	// storage 안에 있는 이미지 보여주기
	Route::get('image/{size}/{path?}', 'ImageController@getImage')->where('path', '(.*)');
});