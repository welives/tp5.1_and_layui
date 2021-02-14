<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-13 16:41:50
 * @LastEditTime: 2021-02-14 16:27:29
 * @Description:
 */

namespace app\admin\controller;

use think\captcha\Captcha;
use think\Controller;
use think\Request;

class Login extends Controller
{
  // 登入页
  public function index()
  {
    if (session('?admin')) {
      return redirect('admin/index/index');
    }
    return view();
  }

  // 登入处理
  public function login()
  {
    /**
     * 控制器要做的事
     * 1.接收数据
     * 2.传递数据给模型
     * 3.返回结果
     */
    if (!$this->request->isPost()) return json(['code' => 0, 'msg' => '操作有误']);
    $data = request()->only(['username', 'password', 'vercode']);
    $result = model('Admin')->login($data);
    if ($result === true) {
      return $this->success('登入成功', 'admin/index/index');
    } else {
      return $this->error($result);
    }
  }

  // 退出
  public function logout()
  {
    session('admin', null);
    return $this->success('退出成功', '@admin');
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
