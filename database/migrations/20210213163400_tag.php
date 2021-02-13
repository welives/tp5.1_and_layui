<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-14 00:34:00
 * @LastEditTime: 2021-02-14 00:42:27
 * @Description: 标签表
 */

use think\migration\Migrator;
use think\migration\db\Column;

class Tag extends Migrator
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
    $table = $this->table('tag', ['engine' => 'InnoDB', 'comment' => '标签表']);
    $table->addColumn(Column::char('label')->setOptions(['comment' => '标签名']))
      ->addColumn(Column::char('key')->setOptions(['comment' => '标签的键']))
      ->addColumn(Column::unsignedInteger('sort')->setOptions(['default' => 100, 'comment' => '排序']))
      ->addColumn(Column::tinyInteger('status')->setOptions(['default' => 1, 'comment' => '状态']))
      ->addIndex(['key'], ['unique' => true])
      ->addTimestamps()
      ->addSoftDelete()
      ->create();
  }
}
