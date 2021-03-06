<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-07 21:13:47
 * @LastEditTime: 2021-02-16 22:35:50
 * @Description: 后台首页控制器
 */

namespace app\admin\controller;

use app\common\model\UserModel;
use think\Request;

class Index extends Base
{
  /**
   * 显示资源列表
   *
   * @return \think\Response
   */
  public function index()
  {
    $admin = session('admin');
    $this->assign('admin', $admin);
    return view();
  }

  // 获取菜单
  public function getMenus()
  {
    $admin = session('admin');
    // 超管不需要验证
    if ($admin['is_super'] || $admin['role_id'] === 1) {
      $menus = model('auths')->field(['id', 'pid', 'label', 'key', 'url', 'icon'])->select();
    } else {
      $auths = model('roles')->field('permission')->get($admin['role_id']);
      $menus = model('auths')->field(['id', 'pid', 'label', 'key', 'url', 'icon'])->where('id', 'in', $auths['permission'])->select();
    }
    if ($menus) {
      return json(['code' => 1, 'msg' => '获取成功', 'data' => $menus]);
    } else {
      return json(['code' => 0, 'msg' => '获取失败']);
    }
  }



  public function console()
  {
    return view();
  }

  public function show(Request $request)
  {
    $page = $request->param('page');
    $limit = $request->param('limit');
    $user = new UserModel();
    $count = $user->count('id');
    $list = $user->limit($limit)->page($page)->order('id desc')->select();
    return json(['code' => 0, 'msg' => '获取成功', 'count' => $count, 'data' => $list]);
  }

  /**
   * 显示创建资源表单页.
   *
   * @return \think\Response
   */
  public function create()
  {
    return view();
  }

  /**
   * 保存新建的资源
   *
   * @param  \think\Request  $request
   * @return \think\Response
   */
  public function save(Request $request)
  {
    $data = $request->param();
    $user = new UserModel();
    if (isset($data['id']) && !empty($data['id'])) {
      $res = $user->save($data, ['id' => $data['id']]);
    } else {
      $res = $user->save($data);
    }
    if ($res) {
      return json(['code' => 0, 'msg' => '操作成功', 'data' => $res]);
    } else {
      return json(['code' => 10000, 'msg' => '操作失败']);
    }
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
    $user = new UserModel();
    $info = $user->get($id);
    return view('edit', ['info' => $info]);
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

  /**
   * 删除指定资源
   *
   * @param  int  $id
   * @return \think\Response
   */
  public function delete($id)
  {
    $user = new UserModel();
    $res = $user->destroy($id);
    if ($res) {
      return json(['code' => 0, 'msg' => '删除成功', 'data' => $res]);
    } else {
      return json(['code' => 10000, 'msg' => '删除失败']);
    }
  }
}
