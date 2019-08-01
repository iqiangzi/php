<?php


namespace app\index\model;


use think\Db;
use think\Model;

class Teacher extends Model
{
    /**
     * @param $username
     * @return array|false|\PDOStatement|string|Model
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getTeacherByUsername($username)
    {
        $teacher = Db::name('teacher')
            ->where('username', $username)
            ->find();
        return $teacher;
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
        $res = Db::name('teacher')->update($data);
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
     * @return bool
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function change($id, $username, $realname)
    {
        $data = array(
            'id' => $id,
            'username' => $username,
            'realname' => $realname,
        );
        $res = Db::name('teacher')->update($data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @return array|false|\PDOStatement|string|Model
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getTeacherById($id)
    {
        $teacher = Db::name('teacher')->where('id', $id)->find();
        return $teacher;
    }


    public function register($username, $realname, $password)
    {
        $data = array(
            'username' => $username,
            'realname' => $realname,
            'password' => $password,
        );
        $res = Db::name('teacher')->insert($data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}