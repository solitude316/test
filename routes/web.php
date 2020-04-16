<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data = [];
    $user = session('user');
    if (!is_null($user)) {
        $data['user'] = $user;
    }

    return view('welcome', $data);
});

route::get('regist', 'RegistController@main');
route::get('login', 'UserController@main');
route::get('logout', 'UserController@logout');