<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-07 20:56:34
 * @LastEditTime: 2021-02-17 19:34:05
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
  Route::get('login', 'admin/login/index');                           // 登入页
  Route::get('reg', 'admin/login/reg');                               // 注册页
  Route::get('logout', 'admin/login/logout');                         // 退出接口
  Route::get('vercode', 'admin/login/vercode');                       // 图形验证码接口
  Route::post('login/login', 'admin/login/login');                    // 登入接口
  Route::post('login/register', 'admin/login/register');              // 注册接口
  Route::get('login/sendEmailCode', 'admin/login/sendEmailCode');     // 发送邮箱验证码接口
  Route::get('/', 'admin/index/index');                               // 后台首页
  Route::get('index/console', 'admin/index/console');
  Route::post('admin/deleteConfirm', 'admin/admin/deleteConfirm');    // 删除操作时的密码验证接口
  Route::get('getMenus', 'admin/index/getMenus');                     // 菜单列表接口
  Route::get('user', 'admin/user/index');                             // 用户列表页
  Route::get('user/list', 'admin/user/list');                         // 用户列表接口
  Route::delete('user/delete', 'admin/user/delete');                  // 用户删除接口
  Route::get('admin', 'admin/admin/index');                           // 管理员列表页
  Route::get('admin/list', 'admin/admin/list');                       // 管理员列表接口
  Route::delete('admin/delete', 'admin/admin/delete');                // 管理员删除接口
  Route::get('role', 'admin/role/index');                             // 角色列表页
  Route::get('role/list', 'admin/role/list');                         // 角色列表接口
  Route::delete('role/delete', 'admin/role/delete');                  // 角色删除接口
});

// 前台路由
Route::group('', function () {
  Route::get('/', 'index');
});
