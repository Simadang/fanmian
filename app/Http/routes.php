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

Route::get('/', function () {
    return view('welcome');
});


//刘红英 19~119行



































































































//孙林晋 119~219



































































































//陈杰 219~319



































































































//李韶凡319~419



































































































//高家亮 419开始

Route::resource('/admin/index','Admin\IndexController');