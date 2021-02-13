<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-07 20:56:34
 * @LastEditTime: 2021-02-13 23:26:32
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
  Route::rule('/', 'admin/login/index');
  Route::rule('/login/vercode', 'admin/login/vercode');
  Route::rule('/login/login', 'admin/login/login');
});
