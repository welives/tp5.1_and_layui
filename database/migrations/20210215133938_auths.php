<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-15 21:39:38
 * @LastEditTime: 2021-02-16 13:59:12
 * @Description: 权限节点
 */

use think\migration\Migrator;
use think\migration\db\Column;

class Auths extends Migrator
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
    $table = $this->table('auths', ['signed' => false, 'comment' => '权限表']);
    $table->addColumn(Column::unsignedInteger('pid')->setOptions(['default' => 0, 'comment' => '上级权限']))
      ->addColumn(Column::char('label')->setOptions(['default' => '', 'comment' => '权限名']))
      ->addColumn(Column::char('key')->setOptions(['default' => '', 'comment' => '权限键']))
      ->addColumn(Column::char('url')->setOptions(['default' => '', 'comment' => '权限地址']))
      ->addColumn(Column::char('icon')->setOptions(['default' => '', 'comment' => '权限图标']))
      ->addColumn(Column::unsignedInteger('sort')->setOptions(['default' => 100, 'comment' => '排序']))
      ->addColumn(Column::boolean('status')->setOptions(['default' => 1, 'comment' => '状态']))
      ->addTimestamps()
      ->addSoftDelete()
      ->create();
  }
}
