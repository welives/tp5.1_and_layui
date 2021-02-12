<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-12 18:31:10
 * @LastEditTime: 2021-02-12 20:39:25
 * @Description: 用户表
 */

use think\migration\Migrator;
use think\migration\db\Column;

class User extends Migrator
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
    $table = $this->table('user', ['engine' => 'InnoDB', 'comment' => '用户表']);
    $table->addColumn(Column::string('username')->setOptions(['default' => '', 'comment' => '用户名']))
      ->addColumn(Column::tinyInteger('sex')->setOptions(['default' => 2, 'comment' => '性别']))
      ->addIndex(['username'], ['unique' => true])
      ->addTimestamps()
      ->create();
  }
}
