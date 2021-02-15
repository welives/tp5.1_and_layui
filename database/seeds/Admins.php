<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-15 20:39:15
 * @LastEditTime: 2021-02-15 21:15:25
 * @Description:
 */

use think\migration\Seeder;

class Admins extends Seeder
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
        'username' => 'admin',
        'password' => sha1(md5('123456')),
        'nickname' => '超级管理员',
        'email' => '10000@qq.com',
        'is_super' => 1,
        'role_id' => 1
      ]
    ];
    $this->insert('admins', $data);
  }
}
