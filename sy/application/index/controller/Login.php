<?php

namespace app\index\controller;
use app\index\model\Student;
use app\index\model\Teacher;
use think\Controller;
use think\Session;

class Login extends Controller
{
    public function register()
    {
        if (request()->isPost()) {
            $username = input('username');
            $realname = input('realname');
            $password = input('password');
            $teachModel = new Teacher();
            $res = $teachModel->register($username, $realname, $password);
            if ($res) {
                $this->success('注册成功，请登录', '/index/login/login');
            } else {
                $this->error('注册失败');
            }
        }
        return $this->fetch('register');
    }


    /**
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function login()
    {
        if (request()->isPost()) {
            $username = input('username');
            $password = input('password');
            $identity = input('identity');
            if (0 == $identity) {
                $userModel = new Teacher();
                $user = $userModel->getTeacherByUsername($username);
                if (!empty($user) && $password == $user['password']) {
                    unset($user['password']);
                    Session::set('userInfo', $user);
                    Session::set('identity', 0);
                    $this->success('登录成功', '/index/index/index');
                } else {
                    $this->error('用户名或密码错误');
                }
            }
            if (1 == $identity) {
                $userModel = new Student();
                $user = $userModel->getStudentByUsername($username);
                if (!empty($user) && $password == $user['password']) {
                    Session::set('userInfo', $user);
                    Session::set('identity', 1);
                    $this->success('登录成功', '/index/index/index');
                } else {
                    $this->error('用户名或密码错误');
                }
            }
        }
        return $this->fetch('login');
    }

    public function logout()
    {
        Session::clear();
        $this->redirect('/index/login/login');
    }
/*
    public function gg(){
        echo "公告";
    }
*/
}