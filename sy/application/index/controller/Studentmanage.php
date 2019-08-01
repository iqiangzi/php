<?php

namespace app\index\controller;


use app\index\model\Student;
use think\Controller;
use think\Db;

class Studentmanage extends Base
{
    /**
     * @return mixed
     * @throws \think\exception\DbException
     * @throws \think\Exception
     */
    public function index()
    {
        $studentModel = new Student();
        $studentList = $studentModel->getAllStudentsInfo();
        if (request()->isPost()) {
            $id = input('id/a');
            if (null != $id) {
                $num = 0;
                Db::startTrans();
                foreach ($id as $value) {
                    $res = $studentModel->del($value);
                    if (!$res) {
                        $num = $num + 1;
                    }
                }
                if (0 == $num) {
                    Db::commit();
                    $this->success('批量删除成功', '/index/studentmanage/index');
                } else {
                    Db::rollback();
                    $this->error('批量删除失败');
                }
            }
        }
        $this->assign('studentList', $studentList);
        return $this->fetch('student_list');
    }

    public function add()
    {
        if (request()->isPost()) {
            $studentModel = new Student();
            $username = input('username');
            $realname = input('realname');
            $password = input('password');
            $no = input('no');
            $clas = input('clas');
            $sex = input('sex');
            $age = input('age');
            $address = input('address');
            $tel = input('tel');
            $hobby = input('hobby');
            $res = $studentModel->add($username, $realname, $password, $no, $clas, $sex, $age, $address, $tel, $hobby);
            if ($res) {
                $this->success('添加学生成功', '/index/studentmanage/index');
            } else {
                $this->error('添加失败');
            }
        }
        $data = array(
            'username' => '',
            'realname' => '',
            'password' => '',
            'no' => '',
            'clas' => '',
            'sex' => '',
            'age' => '',
            'address' => '',
            'tel' => '',
            'hobby' => ''
        );
        $this->assign('data', $data);
        return $this->fetch('add_student');
    }

    /**
     * @return mixed
     * @throws \think\Exception
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \think\exception\PDOException
     */
    public function edit()
    {
        $id = input('id');
        $studentModel = new Student();
        if (request()->isPost()) {
            $username = input('username');
            $realname = input('realname');
            $password = input('password');
            $sex = input('sex');
            $age = input('age');
            $address = input('address');
            $tel = input('tel');
            $res = $studentModel->edit($id, $username, $realname, $password, $sex, $age, $address, $tel);
            if ($res) {
                $this->success('修改成功', '/index/studentmanage/index');
            } else {
                $this->error('修改失败');
            }
        }
        $student = $studentModel->getStudentById($id);
        $this->assign('data', $student);
        return $this->fetch('add_student');
    }

    /**
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function delete()
    {
        $id = input('id');
        $studentModel = new Student();
        $res = $studentModel->del($id);
        if ($res) {
            $this->success('删除成功', '/index/studentmanage/index');
        } else {
            $this->error('删除失败');
        }
    }

}