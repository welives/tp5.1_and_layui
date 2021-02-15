<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-15 20:17:01
 * @LastEditTime: 2021-02-15 20:19:33
 * @Description: 角色表
 */

use think\migration\Migrator;
use think\migration\db\Column;

class Roles extends Migrator
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
    $table = $this->table('roles', ['signed' => false, 'comment' => '角色表']);
    $table->addColumn(Column::char('label')->setOptions(['comment' => '角色名']))
      ->addColumn(Column::string('permission')->setOptions(['comment' => '拥有的权限']))
      ->addColumn(Column::boolean('status')->setOptions(['default' => 1, 'comment' => '状态']))
      ->addTimestamps()
      ->addSoftDelete()
      ->create();
  }
}
