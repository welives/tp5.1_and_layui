<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-12 20:54:40
 * @LastEditTime: 2021-02-14 00:57:08
 * @Description:
 */

use think\migration\Seeder;

class AdminSeeder extends Seeder
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
    $faker = Faker\Factory::create();
    $data = [
      [
        'username' => 'admin',
        'password' => sha1(md5('123456')),
        'nickname' => '超级管理员',
        'email' => $faker->email,
      ]
    ];
    $this->insert('admin', $data);
  }
}
