<?php

namespace app\index\controller;


use think\Controller;
use think\Db;

class Machine extends Base
{
    /**
     * @return mixed
     * @throws \think\exception\DbException
     * @throws \think\Exception
     */
    public function index()
    {
        $machineModel = new \app\index\model\Machine();
        $machineList = $machineModel->getAllmachineInfo();
        $map = array(
            0 => '使用中',
            1 => '已报废'
        );
        foreach ($machineList as $k => $v) {
            $v['status_name'] = $map[$v['status']];
            $machineList[$k] = $v;
        }
        if (request()->isPost()) {
            $id = input('id/a');
            if (null != $id) {
                $num = 0;
                Db::startTrans();
                foreach ($id as $value) {
                    $res = $machineModel->del($value);
                    if (!$res) {
                        $num = $num + 1;
                    }
                }
                if (0 == $num) {
                    Db::commit();
                    $this->success('批量删除成功', '/index/machine/index');
                } else {
                    Db::rollback();
                    $this->error('批量删除失败');
                }
            }
        }
        $this->assign('machineList', $machineList);
        return $this->fetch('mac_list');
    }

    /**
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function add()
    {
        $labModel = new \app\index\model\Lab();
        $labList = $labModel->getLabList();
        if (request()->isPost()) {
            $machineModel = new \app\index\model\Machine();
            $labId = input('lab_id');
            $name = input('itemname');
            $info = input('info');
            $num = time();
            $res = $machineModel->add($labId, $name, $info, $num);
            if ($res) {
                $this->success('添加设备成功', '/index/machine/index');
            } else {
                $this->error('添加失败');
            }
        }
        $data = array(
            'lab_id' => '',
            'name' => '',
            'info' => '',
            'num' => ''
        );
        $this->assign('labList', $labList);
        $this->assign('data', $data);
        return $this->fetch('add_mac');
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
        $machineModel = new \app\index\model\Machine();
        $labModel = new \app\index\model\Lab();
        $labList = $labModel->getLabList();
        if (request()->isPost()) {
            $labId = input('lab_id');
            $name = input('itemname');
            $info = input('info');
            $res = $machineModel->edit($id, $labId, $name, $info);
            if ($res) {
                $this->success('修改成功', '/index/machine/index');
            } else {
                $this->error('修改失败');
            }
        }
        $machine = $machineModel->getMachineById($id);
        $this->assign('labList', $labList);
        $this->assign('data', $machine);
        return $this->fetch('add_mac');
    }

    /**
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function delete()
    {
        $id = input('id');
        $machineModel = new \app\index\model\Machine();
        $res = $machineModel->del($id);
        if ($res) {
            $this->success('删除成功', '/index/machine/index');
        } else {
            $this->error('删除失败');
        }
    }

    /**
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function destroy()
    {
        $id = input('id');
        $machineModel = new \app\index\model\Machine();
        $res = $machineModel->des($id);
        if ($res) {
            $this->success('报废成功', '/index/machine/index');
        } else {
            $this->error('报废失败');
        }
    }

}