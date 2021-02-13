<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-13 16:41:50
 * @LastEditTime: 2021-02-13 23:28:39
 * @Description:
 */

namespace app\admin\controller;

use app\common\model\AdminModel;
use Firebase\JWT\JWT;
use think\captcha\Captcha;
use think\Controller;
use think\Request;

class Login extends Controller
{
  // 登入页
  public function index()
  {
    return view();
  }

  // 登入处理
  public function login()
  {
    if (!$this->request->isPost()) return json(['code' => 0, 'msg' => '操作有误']);
    $data = request()->param();
    if (!captcha_check($data['vercode'])) {
      return json(['code' => 0, 'msg' => '验证码错误']);
    }
    model('AdminModel')->login($data);
    $payload = [
      'iss' => 'http://www.moyu.com', // 签发者
      'aud' => 'http://www.moyu.com', // 认证者
      'iat' => time(), // 签发时间
      'nbf' => time(), // 生效时间
    ];
    $token = JWT::encode($payload, env('jwt_key'));
    return $this->success('登入成功', url('admin/index/index'), ['access_token' => $token]);
  }

  // 退出
  public function logout()
  {
    return $this->success('退出成功', url('index'));
  }

  // 生成验证码
  public function vercode()
  {
    $config = [
      'length' => 4,
    ];
    $captcha = new Captcha($config);
    return $captcha->entry();
  }
}
