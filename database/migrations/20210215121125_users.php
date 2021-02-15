<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-15 20:11:25
 * @LastEditTime: 2021-02-15 20:12:03
 * @Description: 用户表
 */

use think\migration\Migrator;
use think\migration\db\Column;

class Users extends Migrator
{
  /**
   * Change Method.
   *
   * Write your reversible migrations using this method.
   *
   * More information on writing migrations is available here:
   * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
   *
   * The following commands can be used in this method and Phinx will
   * automatically reverse them when rolling back:
   *
   *    createTable
   *    renameTable
   *    addColumn
   *    renameColumn
   *    addIndex
   *    addForeignKey
   *
   * Remember to call "create()" or "update()" and NOT "save()" when working
   * with the Table class.
   */
  public function change()
  {
    $table = $this->table('users', ['signed' => false, 'comment' => '用户表']);
    $table->addColumn(Column::string('username')->setOptions(['comment' => '用户名']))
      ->addColumn(Column::string('password')->setOptions(['comment' => '密码']))
      ->addColumn(Column::string('nickname')->setOptions(['default' => '', 'comment' => '昵称']))
      ->addColumn(Column::string('avatar')->setOptions(['default' => '', 'comment' => '头像']))
      ->addColumn(Column::string('email')->setOptions(['default' => '', 'comment' => '邮箱']))
      ->addColumn(Column::string('phone', 32)->setOptions(['default' => '', 'comment' => '手机']))
      ->addColumn(Column::tinyInteger('gender')->setOptions(['default' => 0, 'comment' => '性别:0=保密,1=男性,2=女性']))
      ->addColumn(Column::integer('province_code')->setOptions(['default' => 0, 'comment' => '所在省']))
      ->addColumn(Column::integer('city_code')->setOptions(['default' => 0, 'comment' => '所在市']))
      ->addColumn(Column::integer('district_code')->setOptions(['default' => 0, 'comment' => '所在区域']))
      ->addColumn(Column::boolean('status')->setOptions(['default' => 1, 'comment' => '状态']))
      ->addIndex(['username'], ['unique' => true])
      ->addTimestamps()
      ->addSoftDelete()
      ->create();
  }
}
