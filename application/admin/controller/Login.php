<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-13 16:41:50
 * @LastEditTime: 2021-02-15 20:31:58
 * @Description: 登入控制器
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
      return $this->redirect('@admin');
    }
    return view();
  }

  // 注册页
  public function reg()
  {
    if (session('?admin')) {
      return $this->redirect('@admin');
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
    if ($this->request->isAjax()) {
      $data = request()->only(['username', 'password', 'vercode']);
      $result = model('Admins')->login($data);
      if ($result === true) {
        return $this->success('登入成功', '@admin');
      } else {
        return $this->error($result);
      }
    }
  }

  // 注册处理
  public function register()
  {
    if ($this->request->isAjax()) {
      $data = request()->only(['email', 'username', 'password', 'confirm_password', 'vercode', 'nickname']);
      $result = model('Admins')->register($data);
      if ($result === true) {
        return $this->success('注册成功', '@admin');
      } else {
        return $this->error($result);
      }
    }
  }

  // 退出
  public function logout()
  {
    session('admin', null);
    return $this->success('退出成功', '@admin/login');
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

  public function sendEmailCode()
  {
    $data = request()->param();
    $title = '摸鱼邮箱验证码';
    $content = '您的邮箱验证码为：' . '854184';
    $result = mailTo($data['email'], $title, $content);
    if ($result) {
      return $this->success('发送成功');
    } else {
      return $this->error('发送失败');
    }
  }
}
