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

// Route::get('/', function () {
//     return view('welcome');
// });


//刘红英 19~119行 111



































































































//孙林晋 119~219

//后台登录管理路由
Route::get('admin/login','Admin\LoginController@login');
//后台登录添加动作的路由
Route::post('admin/login','Admin\LoginController@dologin');
//验证码的路由
Route::get('/code','Code\CodeController@index');
//用户退出登录的路由
Route::group(['middleware'=>'Login'],function(){
	Route::get('admin/login/logout','Admin\LoginController@logout');
	//用户修改密码的路由
	Route::get('admin/pass','Admin\PassController@index');
	//用户修改密码的动作
	Route::post('admin/pass','Admin\PassController@dopass');
	//商品分类
	Route::controller('admin/type','Admin\TypeController');
	//修改分类的状态显示
	// Route::get('admin/type/status','Admin\TypeController@status');
	//轮播图管理的路由
	Route::resource('admin/slide','Admin\SlideController');
	Route::post('admin/upload','Admin\SlideController@upload');
	//鱼塘
	Route::controller('/admin/question','Admin\QuestionController');
	Route::get('/admin/question/answer/{id}','Admin\QuestionController@answer');
	Route::get('/admin/question/delete/{id}','Admin\QuestionController@delete');
});
//前台主页面的路由   |   分类显示前台的路由
Route::resource('/','Home\IndexController');
//轮播图在前台显示的路由
Route::get('/lun','Home\IndexController@lun');
//个人中心也面的引入路由
Route::get('/user','Home\UserController@index');
Route::get('/user/detail','Home\UserController@detail');
Route::get('/user/idcard','Home\UserController@idcard');
Route::get('/user/address','Home\UserController@address');
Route::get('/user/order','Home\UserController@order');
Route::get('/user/password','Home\UserController@password');
Route::get('/user/bindphone','Home\UserController@bindphone');
Route::get('/user/email','Home\UserController@email');
Route::controller('/pay','Home\PayController');










































































//陈杰 219~319
































































































//李韶凡319~419

Route::resource('/admin/link','Admin\LinkController');
Route::resource('/admin/goods','Admin\GoodsController');
Route::resource('/admin/order','Admin\OrderController');
































































































//高家亮 419开始
Route::group(['middleware'=>'Login'],function(){
	//首页路由
	Route::get('/admin/index','Admin\IndexController@index');
	//前台用户路由
	Route::resource('/admin/user','Admin\UserController');
	//网站配置
	Route::resource('/admin/config','Admin\ConfigController');
	//后台用户路由
	Route::resource('/admin/auser','Admin\AuserController');
	Route::post('/admin/auser/auth','Admin\AuserController@auth');
	//角色路由
	Route::resource('/admin/role','Admin\roleController');
	Route::post('/admin/role/auth','Admin\roleController@auth');
	//权限路由
	Route::resource('/admin/permission','Admin\permissionController');
});
