<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-14 01:12:39
 * @LastEditTime: 2021-02-15 02:02:35
 * @Description: 管理员表模型
 */

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Admin extends Model
{
  use SoftDelete;
  protected $table = 'admin';

  // 登入逻辑
  public function login($data)
  {
    /**
     * 在模型中写逻辑处理
     */
    $validate = validate('Admin');
    if (!$validate->doCheck($data, 'login')) {
      return $validate->getError();
    }
    if (!captcha_check($data['vercode'])) {
      return '验证码错误';
    }
    $data['password'] = sha1(md5($data['password']));
    $result = $this->where([
      'username' => $data['username'],
      'password' => $data['password']
    ])->find();
    if ($result) {
      // 判断是否被禁用
      if ($result['status'] === 0) {
        return '此账户已被禁用';
      }
      $sessionData = [
        'id' => $result['id'],
        'nickname' => $result['nickname'],
        'is_super' => $result['is_super'],
      ];
      session('admin', $sessionData);
      return true;
    } else {
      return '用户名或密码错误';
    }
  }

  // 注册逻辑
  public function register($data)
  {
    $validate = validate('Admin');
    if (!$validate->doCheck($data, 'register')) {
      return $validate->getError();
    }
    $result = $this->where('username', $data['username'])->find();
    if ($result) {
      return '用户名已存在';
    }
    $data['password'] = sha1(md5($data['password']));
    $result = $this->allowField(true)->save($data);
    if ($result) {
      $result = $this->get($this->id);
      $sessionData = [
        'id' => $result['id'],
        'nickname' => $result['nickname'],
        'is_super' => $result['is_super'],
      ];
      session('admin', $sessionData);
      return true;
    } else {
      return '注册失败';
    }
  }
}
