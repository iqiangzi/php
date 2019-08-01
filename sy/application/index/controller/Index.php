<?php
 
namespace app\index\controller;

use app\index\model\Student;
use app\index\model\Teacher;
use think\Controller;
use think\Session;

class Index extends Base
{
    public function index()
    {
        return $this->fetch('/index');
    }

    public function left()
    {
        return $this->fetch('/left');
    }

    public function top()
    {
        $afficheModel = new \app\index\model\Affiche();
        $new = $afficheModel->getNew();
        $this->assign('new', $new);
        return $this->fetch('/top');
    }

    /**
     * @return mixed
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function info()
    {
        $identity = Session::get('identity');
        $map = array(
            0 => '教师',
            1 => '学生'
        );
        $identity = $map[$identity];

        if (request()->isPost()) {
            if ('学生' == $identity) {
                $stuModel = new Student();
                $user = Session::get('userInfo');
                $id = $user['id'];
                $address = input('address');
                $username = input('username');
                $realname = input('realname');
                $tel = input('tel');
                $hobby = input('hobby');
                $res = $stuModel->change($id, $username, $realname, $address, $tel, $hobby);
                if ($res) {
                    $user = $stuModel->getStudentById($id);
                    Session::set('userInfo', $user);
                    $this->success('保存成功');
                } else {
                    $this->error('保存学生失败');
                }
            }
            if ('教师' == $identity){
                $teachModel = new Teacher();
                $user = Session::get('userInfo');
                $id = $user['id'];
                $username = input('username');
                $realname = input('realname');
                $res = $teachModel->change($id, $username, $realname);
                if ($res) {
                    $user = $teachModel->getTeacherById($id);
                    Session::set('userInfo', $user);
                    $this->success('保存成功');
                } else {
                    $this->error('保存老师失败');
                }
            }
        }
        $this->assign('identity', $identity);
        return $this->fetch('/info');
    }
}
