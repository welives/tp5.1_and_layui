<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-15 20:48:10
 * @LastEditTime: 2021-02-15 20:50:04
 * @Description: 角色模型
 */

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Roles extends Model
{
  use SoftDelete;
  protected $table = 'roles';

  // 角色-管理员 一对多关系
  public function managers()
  {
    return $this->hasMany('Admins');
  }
}
