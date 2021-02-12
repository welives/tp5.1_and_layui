<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-12 16:46:57
 * @LastEditTime: 2021-02-12 16:53:23
 * @Description: 跨域处理
 */

namespace app\api\controller;

use think\Controller;

class Cross extends Controller
{
  protected function initialize()
  {
    parent::initialize();
    //配置跨域请求
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, PUT, OPTIONS, DELETE'); //请求方法
    header('Access-Control-Allow-Headers: Origin, X-Requested-With, Control-Type, Content-Type, Accept, x-access-sign, x-access-time, token');
    if (request()->isOptions()) {
      exit();
    }
  }
}
