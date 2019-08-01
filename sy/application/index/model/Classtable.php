<?php

namespace app\index\model;


use think\Db;
use think\Model;

class Classtable extends Model
{
    public function add($labId, $className, $day, $order)
    {
        $data = array(
            'lab_id' => $labId,
            'class_name' => $className,
            'day' => $day,
            'order' => $order
        );
        $res = Db::name('class')->insert($data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }


    /**
     * @param $labId
     * @return bool
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function deleteByLabId($labId)
    {
        Db::startTrans();
        $res = Db::name('class')
            ->where('lab_id', $labId)
            ->delete();
        if (25 == $res) {
            Db::commit();
            return true;
        } else {
            Db::rollback();
            return false;
        }
    }
    public function deleteLabClass($labId)
    {
        Db::name("class")->where("lab_id",$labId)->delete();
    }

//    /**
//     * @param $labId
//     * @param $className
//     * @param $day
//     * @param $order
//     * @return bool
//     * @throws \think\Exception
//     * @throws \think\exception\PDOException
//     */
//    public function edit($labId, $className, $day, $order)
//    {
//        $res = Db::name('class')
//            ->where('lab_id', $labId)
//            ->where('day', $day)
//            ->where('order', $order)
//            ->update(['class_name' => $className]);
//        if ($res) {
//            return true;
//        } else {
//            return false;
//        }
//    }
//
    /**
     * @param $labId
     * @return false|\PDOStatement|string|\think\Collection
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function getClassByLabId($labId)
    {
        $class = Db::name('class')->where('lab_id', $labId)->select();
        return $class;
    }
}