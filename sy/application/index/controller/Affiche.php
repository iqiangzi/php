<?php

namespace app\index\controller;


use think\Controller;
use think\Db;
use think\Session;

class Affiche extends Base
{
    /**
     * @return mixed
     * @throws \think\exception\DbException
     * @throws \think\Exception
     */
    public function index()
    {
        $afficheModel = new \app\index\model\Affiche();
        $afficheList = $afficheModel->getAllAffiches();
        if (request()->isPost()) {
            $id = input('id/a');
            if (null != $id) {
                $num = 0;
                Db::startTrans();
                foreach ($id as $value) {
                    $res = $afficheModel->del($value);
                    if (!$res) {
                        $num = $num + 1;
                    }
                }
                if (0 == $num) {
                    Db::commit();
                    $this->success('批量删除成功', '/index/affiche/index');
                } else {
                    Db::rollback();
                    $this->error('批量删除失败');
                }
            }
        }
        $this->assign('afficheList', $afficheList);
        return $this->fetch('announce_list');
    }

    public function add()
    {
        if (request()->isPost()) {
            $afficheModel = new \app\index\model\Affiche();
            $title = input('itemname');
            $content = input('info');
            $user = Session::get('userInfo');
            $author = $user['realname'];
            $res = $afficheModel->add($title, $content, $author);
            if ($res) {
                $this->success('发布成功', '/index/affiche/index');
            } else {
                $this->error('发布失败');
            }
        }
        $data = array(
            'title' => '',
            'content' => '',
        );
        $this->assign('data', $data);
        return $this->fetch('add_announce');
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
        $afficheModel = new \app\index\model\Affiche();
        if (request()->isPost()) {
            $title = input('itemname');
            $content = input('info');
            $res = $afficheModel->edit($id, $title, $content);
            if ($res) {
                $this->success('修改成功', '/index/affiche/index');
            } else {
                $this->error('修改失败');
            }
        }
        $affiche = $afficheModel->getAfficheById($id);
        $this->assign('data', $affiche);
        return $this->fetch('add_announce');
    }

    /**
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function delete()
    {
        $id = input('id');
        $afficheModel = new \app\index\model\Affiche();
        $res = $afficheModel->del($id);
        if ($res) {
            $this->success('删除成功', '/index/affiche/index');
        } else {
            $this->error('删除失败');
        }
    }

}