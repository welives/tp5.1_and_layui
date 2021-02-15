<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-15 19:53:38
 * @LastEditTime: 2021-02-15 20:25:11
 * @Description: 省
 */

use think\migration\Migrator;
use think\migration\db\Column;

class Provinces extends Migrator
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
    $table = $this->table('provinces', ['signed' => false, 'comment' => '省']);
    $table->addColumn(Column::char('code')->setOptions(['comment' => '省代码']))
      ->addColumn(Column::char('name')->setOptions(['comment' => '省名']))
      ->addIndex(['code'], ['unique' => true])
      ->create();
  }
}
