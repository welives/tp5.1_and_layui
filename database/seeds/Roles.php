<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-15 20:38:50
 * @LastEditTime: 2021-02-15 21:16:47
 * @Description:
 */

use think\migration\Seeder;

class Roles extends Seeder
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
        'label' => '超级管理员',
        'permission' => 0,
      ]
    ];
    $this->insert('roles', $data);
  }
}
