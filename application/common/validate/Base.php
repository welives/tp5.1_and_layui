<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-14 14:14:39
 * @LastEditTime: 2021-02-14 21:55:56
 * @Description: 自定义验证器基类
 */

namespace app\common\validate;

use think\Validate;

class Base extends Validate
{
  // 数据校验
  public function doCheck($data, $scene = '')
  {
    return empty($scene) ? $this->check($data) : $this->scene($scene)->check($data);
  }
}
