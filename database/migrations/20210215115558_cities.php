<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-15 19:55:58
 * @LastEditTime: 2021-02-15 19:59:09
 * @Description: 市
 */

use think\migration\Migrator;
use think\migration\db\Column;

class Cities extends Migrator
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
    $table = $this->table('cities', ['signed' => false, 'comment' => '市']);
    $table->addColumn(Column::integer('code')->setOptions(['comment' => '市代码']))
      ->addColumn(Column::tinyInteger('province_code')->setOptions(['comment' => '省代码']))
      ->addColumn(Column::char('name')->setOptions(['comment' => '城市名']))
      ->addColumn(Column::char('letter', 1)->setOptions(['comment' => '首字母']))
      ->addIndex(['code'], ['unique' => true])
      ->create();
  }
}
