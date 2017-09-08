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


<<<<<<< HEAD
//刘红英
=======
//刘红英 19~119行 111
>>>>>>> b3492246aeb21fbfa401a15e1f68966ce19f3daf



































































































<<<<<<< HEAD
//孙林晋



=======
//孙林晋 119~219

//用户登录后的路由
Route::group(['middleware'=>'Login'],function(){
	// 用户退出的路由
	Route::get('admin/login/logout','Admin\LoginController@logout');
	//用户修改密码的路由
	Route::get('admin/pass','Admin\PassController@index');
	//用户修改密码的动作
	Route::post('admin/pass','Admin\PassController@dopass');
	//商品分类
	Route::controller('admin/type','Admin\TypeController');
	//轮播图管理的路由
	Route::resource('admin/slide','Admin\SlideController');
	Route::post('admin/upload','Admin\SlideController@upload');
	//后台鱼塘
	Route::controller('/admin/question','Admin\QuestionController');
	Route::get('/admin/question/answer/{id}','Admin\QuestionController@answer');
	Route::get('/admin/question/delete/{id}','Admin\QuestionController@delete');
	//网站公告管理
	Route::resource('admin/notice','Admin\NoticeController');

});

	//后台登录管理路由
	Route::get('admin/login','Admin\LoginController@login');
	//后台登录添加动作的路由
	Route::post('admin/login','Admin\LoginController@dologin');
	//验证码的路由
	Route::get('/code','Code\CodeController@index');
>>>>>>> b3492246aeb21fbfa401a15e1f68966ce19f3daf








































































<<<<<<< HEAD




=======
//陈杰 219~319
Route::resource('home/regist','home\RegistController');
Route::resource('/jihuo','home\RegistController@Jihuo');
Route::post('home/regist/yanzheng1','home\RegistController@yanzheng1');
Route::post('home/regist/yanzheng2','home\RegistController@yanzheng2');
Route::post('home/regist/yanzheng3','home\RegistController@yanzheng3');
Route::controller('home/login','Home\LoginController');
Route::post('/home/regist/insert','Home\RegistController@insert');
Route::get('/phoneCode','Home\RegistController@phoneCode');
Route::controller('/home/forget','Home\ForgetController');


//前台主页面的路由   |   分类显示前台的路由
Route::resource('/','Home\IndexController');
//轮播图在前台显示的路由
Route::get('/lun','Home\IndexController@lun');

// 前台鱼塘答案
Route::get('/home/answer/{id}','Home\IndexController@answer');
Route::get('/home/question/reply/{id}','Home\IndexController@reply');

// 前台搜索页面
Route::resource('/search','Home\searchController');
>>>>>>> b3492246aeb21fbfa401a15e1f68966ce19f3daf




















<<<<<<< HEAD
//陈杰
=======
>>>>>>> b3492246aeb21fbfa401a15e1f68966ce19f3daf





























































<<<<<<< HEAD
=======
//李韶凡319~419
// 后台友情链接路由
Route::resource('/admin/link','Admin\LinkController');
// 后台商品页面路由
Route::resource('/admin/goods','Admin\GoodsController');
// 后台订单页面路由
Route::resource('/admin/order','Admin\OrderController');
>>>>>>> b3492246aeb21fbfa401a15e1f68966ce19f3daf






































<<<<<<< HEAD
//李韶凡
=======
>>>>>>> b3492246aeb21fbfa401a15e1f68966ce19f3daf





















































<<<<<<< HEAD














































//高家亮
=======
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
>>>>>>> b3492246aeb21fbfa401a15e1f68966ce19f3daf
