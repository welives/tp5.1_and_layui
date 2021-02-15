<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-15 20:13:11
 * @LastEditTime: 2021-02-15 20:13:19
 * @Description: 分类表
 */

use think\migration\Migrator;
use think\migration\db\Column;

class Cates extends Migrator
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
    $table = $this->table('cates', ['signed' => false, 'comment' => '分类表']);
    $table->addColumn(Column::char('label')->setOptions(['comment' => '分类名']))
      ->addColumn(Column::char('key')->setOptions(['comment' => '分类的键']))
      ->addColumn(Column::char('group')->setOptions(['default' => '', 'comment' => '分组']))
      ->addColumn(Column::boolean('status')->setOptions(['default' => 1, 'comment' => '状态']))
      ->addIndex(['key'], ['unique' => true])
      ->addTimestamps()
      ->addSoftDelete()
      ->create();
  }
}
