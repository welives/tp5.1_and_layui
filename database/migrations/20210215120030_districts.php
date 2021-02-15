<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-15 20:00:30
 * @LastEditTime: 2021-02-15 20:23:01
 * @Description: 区
 */

use think\migration\Migrator;
use think\migration\db\Column;

class Districts extends Migrator
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
    $table = $this->table('districts', ['signed' => false, 'comment' => '区']);
    $table->addColumn(Column::integer('code')->setOptions(['comment' => '区代码']))
      ->addColumn(Column::tinyInteger('province_code')->setOptions(['comment' => '省代码']))
      ->addColumn(Column::integer('city_code')->setOptions(['comment' => '市代码']))
      ->addColumn(Column::char('name')->setOptions(['comment' => '区域名']))
      ->addIndex(['code'], ['unique' => true])
      ->create();
  }
}
