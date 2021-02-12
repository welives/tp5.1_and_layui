<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-12 19:17:15
 * @LastEditTime: 2021-02-12 20:50:14
 * @Description: 管理员表
 */

use think\migration\Migrator;
use think\migration\db\Column;

class Admin extends Migrator
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
    $table = $this->table('admin', ['engine' => 'InnoDB', 'comment' => '管理员表']);
    $table->addColumn(Column::string('username')->setOptions(['default' => '', 'comment' => '用户名']))
      ->addColumn(Column::string('password')->setOptions(['default' => '', 'comment' => '密码']))
      ->addIndex(['username'], ['unique' => true])
      ->addTimestamps()
      ->create();
  }
}
