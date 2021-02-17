<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-14 01:13:16
 * @LastEditTime: 2021-02-17 13:25:08
 * @Description: 用户表模型
 */

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Users extends Model
{
  use SoftDelete;
  protected $table = 'users';

  // 用户列表
  public function list($data)
  {
    $count = $this->where('status', 1)->count('id');
    $result = $this->where('status', 1)->limit($data['limit'])->page($data['page'])->select();
    return ['data' => $result, 'count' => $count];
  }
}
