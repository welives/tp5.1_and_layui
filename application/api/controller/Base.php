<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-12 21:37:12
 * @LastEditTime: 2021-02-13 00:12:04
 * @Description: 基类控制器
 */

namespace app\api\controller;

use Firebase\JWT\JWT;
use think\Request;

class Base extends Cross
{
  protected function initialize()
  {
    parent::initialize();
    // 判断有没有token
    $header = request()->header();
    if (!isset($header['token']) || empty($header['token'])) {
      return json(['code' => 0, 'msg' => '请先登录'])->send();
    }
    // 解析token
    $info = JWT::decode($header['token'], 'api', ['HS256']);
    // 把用户信息往下传递
    $this->aid = $info->aid;
  }
}
