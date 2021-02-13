<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-14 00:05:39
 * @LastEditTime: 2021-02-14 00:42:06
 * @Description: 评论表
 */

use think\migration\Migrator;
use think\migration\db\Column;

class Comment extends Migrator
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
    $table = $this->table('comment', ['engine' => 'InnoDB', 'comment' => '评论表']);
    $table->addColumn(Column::integer('user_id')->setOptions(['comment' => '所属用户']))
      ->addColumn(Column::integer('article_id')->setOptions(['comment' => '所属文章']))
      ->addColumn(Column::text('content')->setOptions(['comment' => '评论内容']))
      ->addColumn(Column::tinyInteger('status')->setOptions(['default' => 1, 'comment' => '状态']))
      ->addTimestamps()
      ->addSoftDelete()
      ->create();
  }
}
