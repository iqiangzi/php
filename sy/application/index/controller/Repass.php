<?php


namespace app\index\controller;


use app\index\model\Student;
use app\index\model\Teacher;
use think\Controller;
use think\Session;

class Repass extends Base
{
    /**
     * @return mixed
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function index()
    {
        if (request()->isPost()) {
            $identity = Session::get('identity');
            $user = Session::get('userInfo');
            $userId = $user['id'];
            $newPass = input('new_pass');
            if (0 == $identity) {
                $teacherModel = new Teacher();
                $res = $teacherModel->changePass($userId, $newPass);
                if ($res) {
                    echo "<script>window.parent.location='/index/login/logout'</script>";
                } else {
                    $this->error('修改密码失败');
                }
            }
            if (1 == $identity) {
                $studentModel = new Student();
                $res = $studentModel->changePass($userId, $newPass);
                if ($res) {
                    echo "<script>window.parent.location='/index/login/logout'</script>";
                } else {
                    $this->error('修改密码失败');
                }
            }

        }
        return $this->fetch('repass');
    }

}