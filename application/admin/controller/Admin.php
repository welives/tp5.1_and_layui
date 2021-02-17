<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-17 13:07:15
 * @LastEditTime: 2021-02-17 20:29:02
 * @Description:
 */

namespace app\admin\controller;

use think\Request;

class Admin extends Base
{
  // 管理员列表页
  public function index()
  {
    return view();
  }

  // 列表数据
  public function list()
  {
    if (request()->isAjax()) {
      $params = request()->param();
      $result = model('Admins')->list($params);
      return json(['code' => 1, 'msg' => '获取成功', 'count' => $result['count'], 'data' => $result['data']]);
    }
  }

  /**
   * 显示创建资源表单页.
   *
   * @return \think\Response
   */
  public function create()
  {
    //
  }

  /**
   * 保存新建的资源
   *
   * @param  \think\Request  $request
   * @return \think\Response
   */
  public function save(Request $request)
  {
    //
  }

  /**
   * 显示指定的资源
   *
   * @param  int  $id
   * @return \think\Response
   */
  public function read($id)
  {
    //
  }

  /**
   * 显示编辑资源表单页.
   *
   * @param  int  $id
   * @return \think\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * 保存更新的资源
   *
   * @param  \think\Request  $request
   * @param  int  $id
   * @return \think\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  // 删除管理员
  public function delete()
  {
    $data = request()->only('ids');
    $res = model('Admins')->destroy($data['ids']);
    if ($res) {
      return json(['code' => 1, 'msg' => '删除成功', 'data' => $res]);
    } else {
      return json(['code' => 0, 'msg' => '删除失败']);
    }
  }

  // 删除操作时的密码验证
  public function deleteConfirm()
  {
    $admin = session('admin');
    $params = request()->param();
    $res = model('Admins')->field('password')->get($admin['id']);
    if ($res['password'] === sha1(md5($params['password']))) {
      return json(['code' => 1, 'msg' => '验证通过']);
    } else {
      return json(['code' => 0, 'msg' => '验证失败']);
    }
  }
}
