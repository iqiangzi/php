<?php

namespace app\index\model;


use think\Db;
use think\Model;

class Lab extends Model
{
    /**
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function getAllLabInfo()
    {
        $lab = Db::name('lab')->paginate(10);
        return $lab;
    }

    /**
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getLabList()
    {
        $lab = Db::name('lab')->select();
        return $lab;
    }

    /**
     * @param $id
     * @return array|false|\PDOStatement|string|Model
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getLabById($id)
    {
        $lab = Db::name('lab')->where('id', $id)->find();
        return $lab;
    }

    public function add($no, $name, $info)
    {
        $data = array(
            'name' => $name,
            'no' => $no,
            'info' => $info,
        );
        $res = Db::name('lab')->insert($data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @param $name
     * @param $info
     * @return bool
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function edit($id, $name, $info)
    {
        $data = array(
            'id' => $id,
            'name' => $name,
            'info' => $info
        );
        $res = Db::name('lab')->update($data);
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
        $res = Db::name('lab')->where('id', $id)->delete();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

}