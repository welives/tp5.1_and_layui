<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-17 02:20:28
 * @LastEditTime: 2021-02-17 03:33:04
 * @Description:
 */

namespace app\admin\controller;

use think\Controller;
use think\Request;

class User extends Base
{
  /**
   * 显示资源列表
   *
   * @return \think\Response
   */
  public function index()
  {
    if (request()->isAjax()) {
      $params = request()->param();
      $result = model('Users')->list($params);
      return json(['code' => 1, 'msg' => '获取成功', 'count' => $result['count'], 'data' => $result['data']]);
    } else {
      return view();
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

  /**
   * 删除指定资源
   *
   * @param  int  $id
   * @return \think\Response
   */
  public function delete($id)
  {
    //
  }
}
