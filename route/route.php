<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-07 20:56:34
 * @LastEditTime: 2021-02-14 16:26:21
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

Route::group('admin', function () {
  Route::get('/', 'admin/login/index');
  Route::post('login/login', 'admin/login/login');
  Route::get('login/logout', 'admin/login/logout');
  Route::get('login/vercode', 'admin/login/vercode');
  Route::get('index/index', 'admin/index/index');
  Route::get('index/console', 'admin/index/console');
});
