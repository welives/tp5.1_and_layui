<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-15 22:47:56
 * @LastEditTime: 2021-02-15 22:48:40
 * @Description:
 */

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Auths extends Model
{
  use SoftDelete;
  protected $table = 'auths';
}
