<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-14 01:13:16
 * @LastEditTime: 2021-02-14 01:13:23
 * @Description: 用户表模型
 */

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class User extends Model
{
  use SoftDelete;
  protected $table = 'user';
}
