<?php


namespace app\index\model;


use think\Db;
use think\Model;
use think\Session;

class Repair extends Model
{
    /**
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function getRepairList()
    {
        $repairs = Db::name('repair')
            ->join('machine', 'repair.machine_id = machine.id', 'left')
            ->field('machine.name,repair.*')
            ->paginate(10);
        return $repairs;
    }

    /**
     * @param $author
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function getSelfRepair($author)
    {
        $selfRepair = Db::name('repair')
            ->join('machine', 'repair.machine_id = machine.id', 'left')
            ->where('author', $author)
            ->field('machine.name,repair.*')
            ->paginate(10);
        return $selfRepair;
    }

    public function add($machineId, $info, $author)
    {
        $data = array(
            'machine_id' => $machineId,
            'author' => $author,
            'info' => $info,
            'create_time' => array('exp', 'NOW()')
        );
        $res = Db::name('repair')->insert($data);
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
    public function handle($id)
    {
        $data = array(
            'id' => $id,
            'status' => 1
        );
        $res = Db::name('repair')->update($data);
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
    public function repaired($id)
    {
        $data = array(
            'id' => $id,
            'status' => 2
        );
        $res = Db::name('repair')->update($data);
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
        $res = Db::name('repair')->where('id', $id)->delete();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}