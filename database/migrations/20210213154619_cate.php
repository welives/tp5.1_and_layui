<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-13 23:46:20
 * @LastEditTime: 2021-02-14 00:40:47
 * @Description: 分类表
 */

use think\migration\Migrator;
use think\migration\db\Column;

class Cate extends Migrator
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
    $table = $this->table('cate', ['engine' => 'InnoDB', 'comment' => '分类表']);
    $table->addColumn(Column::char('label')->setOptions(['comment' => '分类名']))
      ->addColumn(Column::char('key')->setOptions(['comment' => '分类的键']))
      ->addColumn(Column::char('group')->setOptions(['default' => '', 'comment' => '分组']))
      ->addColumn(Column::tinyInteger('status')->setOptions(['default' => 1, 'comment' => '状态']))
      ->addIndex(['key'], ['unique' => true])
      ->addTimestamps()
      ->addSoftDelete()
      ->create();
  }
}
