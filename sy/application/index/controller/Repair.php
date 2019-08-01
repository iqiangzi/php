<?php


namespace app\index\controller;


use think\Controller;
use think\Db;
use think\Session;

class Repair extends Base
{
    /**
     * @return mixed
     * @throws \think\exception\DbException
     * @throws \think\Exception
     */
    public function index()
    {
        $repairModel = new \app\index\model\Repair();
        $identity = Session::get('identity');
        $statusMap = array(
            '0' => '待处理',
            '1' => '维修中',
            '2' => '维修成功'
        );
//        教师可获取所有报修信息
        if (0 == $identity) {
            $repairList = $repairModel->getRepairList();
            foreach ($repairList as $k => $v) {
                $v['status_name'] = $statusMap[$v['status']];
                $repairList[$k] = $v;
            }
        }
//        学生只能查看自己的报修信息
        if (1 == $identity) {
            $user = Session::get('userInfo');
            $author = $user['realname'];
            $selfRepair = $repairModel->getSelfRepair($author);
            foreach ($selfRepair as $k => $v) {
                $v['status_name'] = $statusMap[$v['status']];
                $selfRepair[$k] = $v;
            }
            $repairList = $selfRepair;
        }
        if (request()->isPost()) {
            $id = input('id/a');
            if (null != $id) {
                $num = 0;
                Db::startTrans();
                foreach ($id as $value) {
                    $res = $repairModel->del($value);
                    if (!$res) {
                        $num = $num + 1;
                    }
                }
                if (0 == $num) {
                    Db::commit();
                    $this->success('批量删除成功', '/index/repair/index');
                } else {
                    Db::rollback();
                    $this->error('批量删除失败');
                }
            }
        }
        $this->assign('repairList', $repairList);
        return $this->fetch('repair_list');
    }

    /**
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function repair()
    {
        $repairModel = new \app\index\model\Repair();
        $labModel = new \app\index\model\Lab();
        $labList = $labModel->getLabList();
        if (request()->isPost()) {
            $machineId = input('machine_id');
            $info = input('info');
            $user = Session::get('userInfo');
            $author = $user['realname'];
            $res = $repairModel->add($machineId, $info, $author);
            if ($res) {
                $this->success('报修成功', '/index/repair/index');
            } else {
                $this->error('报修失败');
            }
        }
        $this->assign('labList', $labList);
        return $this->fetch('add_repair');
    }

    /**
     * @param $id
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getMachinesByLabId()
    {
        $id = input('id');
        $machines = Db::name('machine')
            ->where('lab_id', $id)
            ->select();
        return json_encode($machines);
    }

    /**
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function handling()
    {
        $id = input('id');
        $repairModel = new \app\index\model\Repair();
        $res = $repairModel->handle($id);
        if ($res) {
            $this->success('处理成功');
        } else {
            $this->error('处理失败');
        }
    }

    /**
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function repaired()
    {
        $id = input('id');
        $repairModel = new \app\index\model\Repair();
        $res = $repairModel->repaired($id);
        if ($res) {
            $this->success('确认维修成功');
        } else {
            $this->error('确认维修失败');
        }
    }

    /**
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function delete()
    {
        $id = input('id');
        $macModel = new \app\index\model\Machine();
        $res = $macModel->del($id);
        if ($res) {
            $this->success('删除成功', '/index/repair/index');
        } else {
            $this->error('删除失败');
        }
    }
}