<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-15 20:38:50
 * @LastEditTime: 2021-02-16 14:06:32
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
      ],
      [
        'label' => '管理员',
        'permission' => 0,
      ],
      [
        'label' => '运营人员',
        'permission' => '1,2,3,4',
      ]
    ];
    $this->insert('roles', $data);
  }
}
