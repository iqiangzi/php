<?php


namespace app\index\model;


use think\Db;
use think\Model;

class Affiche extends Model
{
    /**
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function getAllAffiches()
    {
        $affiches = Db::name('affiche')
            ->order('update_time', 'desc')
            ->paginate(10);
        return $affiches;
    }

    /**
     * @return array|false|\PDOStatement|string|Model
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getNew()
    {
        $new = Db::name('affiche')
            ->order('update_time', 'desc')
            ->limit(1)
            ->find();
        return $new;
    }

    /**
     * @param $id
     * @return array|false|\PDOStatement|string|Model
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getAfficheById($id)
    {
        $affiche = Db::name('affiche')->where('id', $id)->find();
        return $affiche;
    }

    public function add($title, $content, $author)
    {
        $data = array(
            'title' => $title,
            'content' => $content,
            'author' => $author
        );
        $res = Db::name('affiche')->insert($data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param $id
     * @param $title
     * @param $content
     * @return bool
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function edit($id, $title, $content)
    {
        $data = array(
            'id' => $id,
            'title' => $title,
            'content' => $content
        );
        $res = Db::name('affiche')->update($data);
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
        $res = Db::name('affiche')->where('id', $id)->delete();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

}