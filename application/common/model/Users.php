<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-14 01:13:16
 * @LastEditTime: 2021-02-15 20:32:30
 * @Description: 用户表模型
 */

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Users extends Model
{
  use SoftDelete;
  protected $table = 'users';
}
