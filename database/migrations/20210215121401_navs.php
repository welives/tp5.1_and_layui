<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-15 20:14:01
 * @LastEditTime: 2021-02-15 20:14:08
 * @Description: 导航表
 */

use think\migration\Migrator;
use think\migration\db\Column;

class Navs extends Migrator
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
    $table = $this->table('navs', ['signed' => false, 'comment' => '导航表']);
    $table->addColumn(Column::char('label')->setOptions(['comment' => '导航名']))
      ->addColumn(Column::char('key')->setOptions(['comment' => '导航的键']))
      ->addColumn(Column::unsignedInteger('sort')->setOptions(['default' => 100, 'comment' => '排序']))
      ->addColumn(Column::boolean('status')->setOptions(['default' => 1, 'comment' => '状态']))
      ->addIndex(['key'], ['unique' => true])
      ->addTimestamps()
      ->addSoftDelete()
      ->create();
  }
}
