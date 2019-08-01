<?php

namespace app\index\model;


use think\Db;
use think\Model;

class Machine extends Model
{
    /**
     * @return false|\PDOStatement|string|\think\Collection|\think\Paginator
     * @throws \think\exception\DbException
     */
    public function getAllMachineInfo()
    {
        $machine = Db::name('machine')
            ->join('lab', 'machine.lab_id = lab.id', 'left')
            ->field('lab.name as lname,machine.*')
            ->paginate(10);
        return $machine;
    }

    /**
     * @param $id
     * @return array|false|\PDOStatement|string|Model
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getMachineById($id)
    {
        $machine = Db::name('machine')->where('id', $id)->find();
        return $machine;
    }

    public function countMachinesByLabId($labId)
    {
        $count = Db::name('machine')->where('lab_id', $labId)->count();
        return $count;
    }

    public function add($labId, $name, $info, $num)
    {
        $data = array(
            'lab_id' => $labId,
            'name' => $name,
            'info' => $info,
            'num' => $num,
        );
        $res = Db::name('machine')->insert($data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @param $labId
     * @param $name
     * @param $info
     * @return bool
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function edit($id, $labId, $name, $info)
    {
        $data = array(
            'id' => $id,
            'lab_id' => $labId,
            'name' => $name,
            'info' => $info
        );
        $res = Db::name('machine')->update($data);
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
        $res = Db::name('machine')->where('id', $id)->delete();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param mixed $id
     * @return bool|int
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function des($id)
    {
        $data = array(
            'id' => $id,
            'status' => 1
        );
        $res = Db::name('machine')->update($data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

}