<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-07 20:56:34
 * @LastEditTime: 2021-02-14 19:16:31
 * @Description:
 */
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 后台路由
Route::group('admin', function () {
  Route::get('login', 'admin/login/index');
  Route::get('reg', 'admin/login/reg');
  Route::get('logout', 'admin/login/logout');
  Route::get('vercode', 'admin/login/vercode');
  Route::post('login/login', 'admin/login/login');
  Route::post('login/register', 'admin/login/register');
  Route::get('/', 'admin/index/index');
  Route::get('index/console', 'admin/index/console');
});

// 前台路由
Route::group('', function () {
  Route::get('/', 'index');
});
