<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-15 21:45:08
 * @LastEditTime: 2021-02-17 02:31:20
 * @Description:
 */

use think\migration\Seeder;

class Auths extends Seeder
{
  /**
   * Run Method.
   *
   * Write your database seeder using this method.
   *
   * More information on writing seeders is available here:
   * http://docs.phinx.org/en/latest/seeding.html
   */
  public function run()
  {
    $data = [
      [
        'pid' => 0,
        'label' => '主页',
        'key' => 'home',
        'url' => '',
        'icon' => 'layui-icon-home',
      ],
      [
        'pid' => 1,
        'label' => '控制台',
        'key' => 'console',
        'url' => url('admin/index/console'),
        'icon' => '',
      ],
      [
        'pid' => 0,
        'label' => '用户',
        'key' => 'user',
        'url' => '',
        'icon' => 'layui-icon-user',
      ],
      [
        'pid' => 3,
        'label' => '用户管理',
        'key' => 'list',
        'url' => url('@admin/user'),
        'icon' => '',
      ],
      [
        'pid' => 3,
        'label' => '后台管理员',
        'key' => 'admin',
        'url' => url('@admin/admin'),
        'icon' => '',
      ],
      [
        'pid' => 3,
        'label' => '角色管理',
        'key' => 'role',
        'url' => url('@admin/role'),
        'icon' => '',
      ],
      [
        'pid' => 0,
        'label' => '系统设置',
        'key' => 'system',
        'url' => '',
        'icon' => 'layui-icon-set',
      ],
      [
        'pid' => 7,
        'label' => '网站设置',
        'key' => 'website',
        'url' => url('@admin/system'),
        'icon' => '',
      ],
      [
        'pid' => 7,
        'label' => '邮件服务',
        'key' => 'email',
        'url' => url('admin/system/email'),
        'icon' => '',
      ],
      [
        'pid' => 0,
        'label' => '授权',
        'key' => 'get',
        'url' => 'www.layui.com/admin/#get',
        'icon' => 'layui-icon-auz',
      ],
    ];
    $this->insert('auths', $data);
  }
}
