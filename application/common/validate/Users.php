<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-17 02:49:48
 * @LastEditTime: 2021-02-17 02:50:58
 * @Description: 用户表验证器
 */

namespace app\common\validate;

class Users extends Base
{
  /**
   * 定义验证规则
   * 格式：'字段名'	=>	['规则1','规则2'...]
   *
   * @var array
   */
  protected $rule = [];

  /**
   * 定义错误信息
   * 格式：'字段名.规则名'	=>	'错误信息'
   *
   * @var array
   */
  protected $message = [];
}
