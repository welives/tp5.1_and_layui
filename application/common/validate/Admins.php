<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-14 01:16:57
 * @LastEditTime: 2021-02-15 22:35:33
 * @Description:
 */

namespace app\common\validate;


class Admins extends Base
{
  /**
   * 定义验证规则
   * 格式：'字段名'	=>	['规则1','规则2'...]
   *
   * @var array
   */
  protected $rule = [
    'username|用户名' => 'require',
    'password|密码' => 'require|alphaDash',
    'confirm_password|确认密码' => 'require|confirm:password',
    'email|邮箱' => 'require|email|unique:admins',
    'vercode|验证码' => 'require',
    'nickname|昵称' => 'require|chsAlphaNum|unique:admins'
  ];

  /**
   * 定义错误信息
   * 格式：'字段名.规则名'	=>	'错误信息'
   *
   * @var array
   */
  protected $message = [];

  protected $scene = [
    'login' => ['username', 'password', 'vercode'],
    'register' => ['email', 'vercode', 'password', 'confirm_password', 'nickname']
  ];
}
