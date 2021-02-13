<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-12 17:05:13
 * @LastEditTime: 2021-02-13 23:29:03
 * @Description: 管理员表模型
 */

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class AdminModel extends Model
{
  use SoftDelete;
  protected $table = 'admin';
}
