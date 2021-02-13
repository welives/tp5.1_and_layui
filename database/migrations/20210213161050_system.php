<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-14 00:10:50
 * @LastEditTime: 2021-02-14 00:42:18
 * @Description: 系统设置表
 */

use think\migration\Migrator;
use think\migration\db\Column;

class System extends Migrator
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
    $table = $this->table('system', ['engine' => 'InnoDB', 'comment' => '系统设置表']);
    $table->addColumn(Column::string('webname')->setOptions(['comment' => '网站名称']))
      ->addColumn(Column::string('copyright')->setOptions(['comment' => '版权信息']))
      ->addTimestamps()
      ->addSoftDelete()
      ->create();
  }
}
