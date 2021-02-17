<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-15 20:48:10
 * @LastEditTime: 2021-02-17 18:11:47
 * @Description: 角色模型
 */

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Roles extends Model
{
  use SoftDelete;
  protected $table = 'roles';

  // 角色列表
  public function list($data)
  {
    $count = $this->count('id');
    if (isset($data) && !empty($data)) {
      $_where = [];
      if (isset($data['role']) && $data['role'] > 0) {
        $_where['id'] = $data['role'];
      }
      $result = $this->where($_where)->limit($data['limit'])->page($data['page'])->select();
    } else {
      $result = $this->field(['id', 'label'])->all();
    }
    return ['data' => $result, 'count' => $count];
  }

  // 角色-管理员 一对多关系
  public function managers()
  {
    return $this->hasMany('Admins');
  }
}
