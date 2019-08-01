<?php


namespace app\index\controller;


use think\Controller;
use think\Session;

class Base extends Controller
{
    public function _initialize()
    {
        $pass = Session::get('userInfo');
        if (!isset($pass)) {
            $this->error('请先登录！', '/index/login/login');
        }
    }


}