<?php
/*
 * @Author: Jandan
 * @Date: 2021-02-14 15:37:31
 * @LastEditTime: 2021-02-14 16:07:11
 * @Description:
 */

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Base extends Controller
{
  protected function initialize()
  {
    parent::initialize();
    if (session('?admin')) {
    } else {
      return $this->redirect('@admin');
    }
  }
}
