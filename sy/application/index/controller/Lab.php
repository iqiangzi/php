<?php


namespace app\index\controller;


use think\Controller;
use think\Db;

class Lab extends Base
{
    /**
     * @return mixed
     * @throws \think\exception\DbException
     * @throws \think\Exception
     */
    public function index()
    {
        $labModel = new \app\index\model\Lab();
        $labList = $labModel->getAllLabInfo();
        if (request()->isPost()) {
            $id = input('id/a');
            if (null != $id) {
                $num = 0;
                Db::startTrans();
                foreach ($id as $value) {
                    $res = $labModel->del($value);
                    if (!$res) {
                        $num = $num + 1;
                    }
                }
                if (0 == $num) {
                    Db::commit();
                    $this->success('批量删除成功', '/index/lab/index');
                } else {
                    Db::rollback();
                    $this->error('批量删除失败');
                }
            }
        }
        $this->assign('labList', $labList);
        return $this->fetch('lab_list');
    }

    public function add()
    {
        if (request()->isPost()) {
            $labModel = new \app\index\model\Lab();
            $name = input('itemname');
            $no = input('no');
            $info = input('info');
            $res = $labModel->add($no, $name, $info);
            if ($res) {
                $this->success('添加实验室成功', '/index/lab/index');
            } else {
                $this->error('添加失败');
            }
        }
        $data = array(
            'name' => '',
            'no' => '',
            'info' => '',
        );
        $this->assign('data', $data);
        return $this->fetch('add_lab');
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
        $labModel = new \app\index\model\Lab();
        if (request()->isPost()) {
            $name = input('itemname');
            $info = input('info');
            $res = $labModel->edit($id, $name, $info);
            if ($res) {
                $this->success('修改成功', '/index/lab/index');
            } else {
                $this->error('修改失败');
            }
        }
        $lab = $labModel->getLabById($id);
        $this->assign('data', $lab);
        return $this->fetch('add_lab');
    }

    /**
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function delete()
    {
        $id = input('id');
        $labModel = new \app\index\model\Lab();
        $machineModel = new \app\index\model\Machine();
//        该实验室下是否还有设备
        $count = $machineModel->countMachinesByLabId($id);
        if (0 == $count) {
            $res = $labModel->del($id);
            if ($res) {
                $this->success('删除成功', '/index/lab/index');
            } else {
                $this->error('删除失败');
            }
        } else {
            $this->error('该实验室下还有设备，不能删除');
        }
    }

}