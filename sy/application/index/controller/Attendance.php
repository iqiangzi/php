<?php

namespace app\index\controller;


use app\index\model\Student;
use think\Controller;
use think\Session;

class Attendance extends Base
{
    /**
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function attend()
    {
        $labModel = new \app\index\model\Lab();
        $labList = $labModel->getLabList();
        if (request()->isPost()) {
            $stu = Session::get('userInfo');
            $stuId = $stu['id'];
            $labId = input('lab_id');
            $attendModel = new \app\index\model\Attendance();
            $res = $attendModel->attend($stuId, $labId);
            if ($res) {
                $this->success('打卡成功');
            } else {
                $this->error('打卡失败');
            }
        }
        $this->assign('labList', $labList);
        return $this->fetch('add_attend');
    }

    /**
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     */
    public function index()
    {
        $sort = input('sort');
        $startTime = input('start_time');
        $endTime = input('end_time');
        $attendModel = new \app\index\model\Attendance();
        $studentModel = new Student();
        if (0 == $sort) {
            $attendList = $attendModel->getAllAttendances($startTime, $endTime);
        } else {
//        按次数排列开始

            $data = array();
//        获取所有学生ID（去除重复值）
            $studentsId = $attendModel->getStudentsId();
//        分别计算考勤次数
            foreach ($studentsId as $id) {
                $count = $attendModel->getCountById($id, $startTime, $endTime);
                $data[$id] = $count;
            }
//        带上索引按次数排序
            if (1 == $sort) {
                arsort($data);
            }
            if (2 == $sort) {
                asort($data);
            }
            $newData = array();
//        以学生真实姓名作为键名
            foreach ($data as $k => $v) {
                $student = $studentModel->getStudentById($k);
                $newData[$student['realname']] = array(
                    'id' => $k,
                    'count' => $v
                );
            }
            $attendList = $newData;
        }
//        按次数排列结束
        $this->assign('sort', $sort);
        $this->assign('attendList', $attendList);
        return $this->fetch('attend_list');
    }

    public function studentIndex()
    {
        $student = Session::get('userInfo');
        $stuId = $student['id'];
        $attendModel = new \app\index\model\Attendance();
        $attendList = $attendModel->getSelfAttendances($stuId);
        $this->assign('attendList', $attendList);
        return $this->fetch('attend_list');
    }

    /**
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function details()
    {
        $attendModel = new \app\index\model\Attendance();
        $stuId = input('stu_id');
        $startTime = input('start_time');
        $endTime = input('end_time');
        $attendList = $attendModel->getAttendByStuId($stuId, $startTime, $endTime);
        $this->assign('attendList', $attendList);
        return $this->fetch('attend_detail');
    }

    /**
     * @param $list
     * @param $filename
     * @param $indexKey
     * @param bool $excel2007
     * @return bool
     * @throws \PHPExcel_Exception
     */
    public function exportExcel($list, $filename, $indexKey, $excel2007 = true)
    {
        //文件引入
        Vendor('phpexcel.PHPExcel');

        if (empty($filename)) $filename = time();
        if (!is_array($indexKey)) return false;

        $header_arr = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        //初始化PHPExcel()
        $objPHPExcel = new \PHPExcel();

        //设置保存版本格式
        if ($excel2007) {
            $objWriter = new \PHPExcel_Writer_Excel2007($objPHPExcel);
            $filename = $filename . '.xlsx';
        } else {
            $objWriter = new \PHPExcel_Writer_Excel5($objPHPExcel);
            $filename = $filename . '.xls';
        }

        //接下来就是写数据到表格里面去
        $objActSheet = $objPHPExcel->getActiveSheet();
        $objActSheet->setCellValue('A1', "姓名");
        $objActSheet->setCellValue('B1', '考勤次数');
        $startRow = 2;
        foreach ($list as $row) {
            foreach ($indexKey as $key => $value) {
                //这里是设置单元格的内容
                $objActSheet->setCellValue($header_arr[$key] . $startRow, $row[$value]);
            }
            $startRow++;
        }

        // 下载这个表格，在浏览器输出
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type:application/vnd.ms-execl");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");;
        header('Content-Disposition:attachment;filename=' . $filename . '');
        header("Content-Transfer-Encoding:binary");
        $objWriter->save('php://output');
    }

    /**
     * @throws \PHPExcel_Exception
     */
    public function export()
    {
        $sort = input('sort');
        $attendModel = new \app\index\model\Attendance();
        $studentModel = new Student();
        $data = array();
//        获取所有学生ID（去除重复值）
        $studentsId = $attendModel->getStudentsId();
//        分别计算考勤次数
        foreach ($studentsId as $id) {
            $count = $attendModel->getCountById($id);
            $data[$id] = $count;
        }
//        带上索引按次数排序
        if (1 == $sort) {
            arsort($data);
        }
        if (2 == $sort) {
            asort($data);
        }
        $newData = array();
//        以学生真实姓名作为键名
        foreach ($data as $k => $v) {
            $student = $studentModel->getStudentById($k);
            array_push($newData,array(
                'name' => $student['realname'],
                'count' => $v
            ));
        }
        $indexKey = array('name', 'count');
        $this->exportExcel($newData, '考勤排名', $indexKey);
    }
}