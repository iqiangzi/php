<?php


namespace app\index\model;


use think\Db;
use think\Model;

class Student extends Model
{
    /**
     * @param $username
     * @return array|false|\PDOStatement|string|Model
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getStudentByUsername($username)
    {
        $student = Db::name('student')
            ->where('username', $username)
            ->find();
        return $student;
    }

    /**
     * @param $id
     * @param $newPass
     * @return bool
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function changePass($id, $newPass)
    {
        $data = array(
            'id' => $id,
            'password' => $newPass
        );
        $res = Db::name('student')->update($data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function getAllStudentsInfo()
    {
        $student = Db::name('student')
            ->paginate(10);
        return $student;
    }

    /**
     * @param $id int
     * @return array|false|\PDOStatement|string|Model
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getStudentById($id)
    {
        $student = Db::name('student')->where('id', $id)->find();
        return $student;
    }

    public function add($username, $realname, $password, $no, $clas, $sex, $age, $address, $tel, $hobby)
    {
        $data = array(
            'username' => $username,
            'realname' => $realname,
            'password' => $password,
            'no' => $no,
            'clas' => $clas,
            'sex' => $sex,
            'age' => $age,
            'address' => $address,
            'tel' => $tel,
            'hobby' => $hobby,
        );
        $res = Db::name('student')->insert($data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @param $username
     * @param $realname
     * @param $password
     * @param $sex
     * @param $age
     * @param $address
     * @param $tel
     * @return bool
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function edit($id, $username, $realname, $password, $sex, $age, $address, $tel)
    {
        $data = array(
            'id' => $id,
            'username' => $username,
            'realname' => $realname,
            'password' => $password,
            'sex' => $sex,
            'age' => $age,
            'address' => $address,
            'tel' => $tel
        );
        $res = Db::name('student')->update($data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * @param $id
     * @param $username
     * @param $realname
     * @param $address
     * @param $tel
     * @param $hobby
     * @return bool
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function change($id, $username, $realname, $address, $tel, $hobby)
    {
        $data = array(
            'id' => $id,
            'username' => $username,
            'realname' => $realname,
            'address' => $address,
            'tel' => $tel,
            'hobby' => $hobby
        );
        $res = Db::name('student')->update($data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * @param $id
     * @return bool
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function del($id)
    {
        $res = Db::name('student')->where('id', $id)->delete();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}