<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-12 20:54:40
 * @LastEditTime: 2021-02-12 21:11:14
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
    $data = [];
    for ($i = 0; $i < 10; $i++) {
      $data[] = [
        'username'      => $faker->userName,
        'password'      => md5($faker->password),
      ];
    }
    $this->insert('admin', $data);

    // 清空数据表
    // $this->execute('truncate table admin');
  }
}
