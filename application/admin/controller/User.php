<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-17 02:20:28
 * @LastEditTime: 2021-02-17 20:10:12
 * @Description:
 */

namespace app\admin\controller;

use think\Controller;
use think\Request;

class User extends Base
{
  // 用户列表页
  public function index()
  {
    return view();
  }

  // 列表数据
  public function list()
  {
    if (request()->isAjax()) {
      $params = request()->param();
      $result = model('Users')->list($params);
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

  // 删除用户
  public function delete()
  {
    $data = request()->only('ids');
    $res = model('Users')->destroy($data['ids']);
    if ($res) {
      return json(['code' => 1, 'msg' => '删除成功', 'data' => $res]);
    } else {
      return json(['code' => 0, 'msg' => '删除失败']);
    }
  }
}
