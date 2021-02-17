<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-14 01:12:39
 * @LastEditTime: 2021-02-17 14:10:43
 * @Description: 管理员表模型
 */

namespace app\common\model;

use think\Model;
use think\model\concern\SoftDelete;

class Admins extends Model
{
  use SoftDelete;
  protected $table = 'admins';

  // 登入逻辑
  public function login($data)
  {
    /**
     * 在模型中写逻辑处理
     */
    $validate = validate('Admins');
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
    ])->with('role')->find()->hidden(['password']);
    if ($result) {
      // 判断是否被禁用
      if ($result['status'] === 0) {
        return '此账户已被禁用';
      }
      $sessionData = [
        'id' => $result['id'],
        'nickname' => $result['nickname'],
        'is_super' => $result['is_super'],
        'role_id' => $result['role_id'],
        'role_name' => $result['role']['label']
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
    $validate = validate('Admins');
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
        'role_id' => $result['role_id'],
        'role_name' => $result['role']['label']
      ];
      session('admin', $sessionData);
      return true;
    } else {
      return '注册失败';
    }
  }

  // 管理员列表
  public function list($data)
  {
    $count = $this->where('status', 1)->count('id');
    $result = $this->where('status', 1)->limit($data['limit'])->page($data['page'])->with(['role' => function ($query) {
      $query->field(['id', 'label']);
    }])->select()->hidden(['password']);
    return ['data' => $result, 'count' => $count];
  }

  // 用户属于哪个角色 一对一关系
  public function role()
  {
    return $this->belongsTo('Roles', 'role_id');
  }
}
