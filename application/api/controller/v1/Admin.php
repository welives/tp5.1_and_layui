<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-12 21:40:16
 * @LastEditTime: 2021-02-13 01:00:27
 * @Description:
 */

namespace app\api\controller\v1;

use app\api\controller\Base;
use app\common\model\AdminModel;
use think\Request;

class Admin extends Base
{
  /**
   * 显示资源列表
   *
   * @return \think\Response
   */
  public function index()
  {
    $limit = request()->param('limit') ? request()->param('limit') : 10;
    $page = request()->param('page') ? request()->param('page') : 1;
    $db = new AdminModel();
    $list = $db->limit($limit)->page($page)->select();
    $count = $db->count('id');
    if ($list) {
      return json(['code' => 1, 'msg' => '获取成功', 'data' => $list, 'count' => $count]);
    } else {
      return json(['code' => 0, 'msg' => '暂无数据']);
    }
  }

  /**
   * 保存新建的资源
   *
   * @param  \think\Request  $request
   * @return \think\Response
   */
  public function save(Request $request)
  {
    if (!$this->request->isPost()) {
      return json(['code' => 0, 'msg' => '操作有误']);
    }
    $data = $request->param();
    $db = new AdminModel();
    if (!empty($data['id'])) {
      if (isset($data['username']) && empty($data['username'])) {
        return json(['code' => 0, 'msg' => '用户名不能为空']);
      }
      if (isset($data['password'])) {
        if (empty($data['password'])) {
          return json(['code' => 0, 'msg' => '密码不能为空']);
        } else {
          $data['password'] = md5($data['password']);
        }
      }
      $res = $db->save($data, ['id' => $data['id']]);
    } else {
      if (empty($data['username'])) {
        return json(['code' => 0, 'msg' => '用户名不能为空']);
      }
      if (empty($data['password'])) {
        return json(['code' => 0, 'msg' => '密码不能为空']);
      }
      $data['password'] = md5($data['password']);
      $res = $db->save($data);
    }

    if ($res) {
      return json(['code' => 1, 'msg' => '操作成功', 'data' => $res]);
    } else {
      return json(['code' => 0, 'msg' => '操作失败']);
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
   * 删除指定资源
   *
   * @param  int  $id
   * @return \think\Response
   */
  public function delete($id)
  {
    if ($id == 1) {
      return json(['code' => 0, 'msg' => '无权限删除此用户']);
    }
    $db = new AdminModel();
    $res = $db->destroy($id);
    if ($res) {
      return json(['code' => 1, 'msg' => '操作成功', 'data' => $res]);
    } else {
      return json(['code' => 0, 'msg' => '操作失败']);
    }
  }
}
