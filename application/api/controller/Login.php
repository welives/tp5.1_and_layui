<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-12 16:46:12
 * @LastEditTime: 2021-02-12 22:55:47
 * @Description: 登录控制器
 */

namespace app\api\controller;

use app\common\model\AdminModel;
use Firebase\JWT\JWT;
use think\Request;

class Login extends Cross
{
  /**
   * 显示资源列表
   *
   * @return \think\Response
   */
  public function index(Request $request)
  {

    $data = $request->param();
    $db = new AdminModel();
    $info = $db->where('username', $data['username'])->find();
    if (!$info) {
      return json(['code' => 0, 'msg' => '账号不存在']);
    }
    if ($info['password'] !== md5($data['password'])) {
      return json(['code' => 0, 'msg' => '账号或密码不正确']);
    }
    $key = 'api';
    $payload = [
      'iss' => 'http://www.moyu.com', // 签发者
      'aud' => 'http://www.moyu.com', // 认证者
      'iat' => time(), // 签发时间
      'nbf' => time(), // 生效时间
      'aid' => $info['id']
    ];
    $token = JWT::encode($payload, $key);
    return json(['code' => 1, 'msg' => '登录成功', 'data' => $token]);
  }
}
