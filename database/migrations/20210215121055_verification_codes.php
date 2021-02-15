<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-15 20:10:55
 * @LastEditTime: 2021-02-15 20:10:59
 * @Description: 验证码表
 */

use think\migration\Migrator;
use think\migration\db\Column;

class VerificationCodes extends Migrator
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
    $table = $this->table('verification_codes', ['signed' => false, 'comment' => '验证码表']);
    $table->addColumn(Column::char('phone')->setOptions(['default' => '', 'comment' => '手机']))
      ->addColumn(Column::string('email')->setOptions(['default' => '', 'comment' => '邮箱']))
      ->addColumn(Column::char('code', 6)->setOptions(['comment' => '验证码']))
      ->addColumn(Column::char('type')->setOptions(['comment' => '验证类型']))
      ->addColumn(Column::boolean('is_used')->setOptions(['default' => 0, 'comment' => '是否使用']))
      ->addTimestamps()
      ->create();
  }
}
