<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-15 20:14:23
 * @LastEditTime: 2021-02-15 20:14:30
 * @Description: 文章表
 */

use think\migration\Migrator;
use think\migration\db\Column;

class Articles extends Migrator
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
    $table = $this->table('articles', ['signed' => false, 'comment' => '文章表']);
    $table->addColumn(Column::char('title')->setOptions(['comment' => '标题']))
      ->addColumn(Column::string('desc')->setOptions(['comment' => '简介']))
      ->addColumn(Column::text('content')->setOptions(['comment' => '内容']))
      ->addColumn(Column::unsignedInteger('sort')->setOptions(['default' => 100, 'comment' => '排序']))
      ->addColumn(Column::string('tags')->setOptions(['default' => '', 'comment' => '标签']))
      ->addColumn(Column::integer('nav_id')->setOptions(['default' => 0, 'comment' => '所属导航']))
      ->addColumn(Column::integer('cate_id')->setOptions(['default' => 0, 'comment' => '所属分类']))
      ->addColumn(Column::boolean('is_top')->setOptions(['default' => 0, 'comment' => '是否推荐']))
      ->addColumn(Column::boolean('is_hot')->setOptions(['default' => 0, 'comment' => '是否热门']))
      ->addColumn(Column::boolean('status')->setOptions(['default' => 1, 'comment' => '状态']))
      ->addTimestamps()
      ->addSoftDelete()
      ->create();
  }
}
