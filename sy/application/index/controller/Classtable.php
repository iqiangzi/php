<?php

namespace app\index\controller;

header("Content-Type: text/html;charset=utf-8");


use think\Controller;
use think\Db;

class Classtable extends Base
{
    /**
     * @return mixed
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function add()
    {
        $labId = input('id');
        $classModel = new \app\index\model\Classtable();
//        获取该实验室的课程表
        $classList = $classModel->getClassByLabId($labId);
//        如果不为空，则赋对应值，为空则赋空值
        if (!empty($classList)) {
            foreach ($classList as $k => $v) {
                $course[$v['order']][$v['day']] = $v['class_name'];
            }
        } else {
            for ($order = 1; $order < 6; $order++) {
                for ($day = 1; $day < 6; $day++) {
                    $course[$order][$day] = '';
                }
            }
        }
        $this->assign('course', $course);
        if (request()->isPost()) {
            $c = array();
            $c[1][1] = input('c11');
            $c[1][2] = input('c12');
            $c[1][3] = input('c13');
            $c[1][4] = input('c14');
            $c[1][5] = input('c15');
            $c[2][1] = input('c21');
            $c[2][2] = input('c22');
            $c[2][3] = input('c23');
            $c[2][4] = input('c24');
            $c[2][5] = input('c25');
            $c[3][1] = input('c31');
            $c[3][2] = input('c32');
            $c[3][3] = input('c33');
            $c[3][4] = input('c34');
            $c[3][5] = input('c35');
            $c[4][1] = input('c41');
            $c[4][2] = input('c42');
            $c[4][3] = input('c43');
            $c[4][4] = input('c44');
            $c[4][5] = input('c45');
            $c[5][1] = input('c51');
            $c[5][2] = input('c52');
            $c[5][3] = input('c53');
            $c[5][4] = input('c54');
            $c[5][5] = input('c55');
            Db::startTrans();
//            $num初始为0，如果产生错误则值加1，最终通过判断$num是否为0来确定事务是否提交
            $num = 0;
//            清空课程表
            if (!empty($classList)) {
                $classModel->deleteByLabId($labId);
            }
            for ($m = 1; $m < 6; $m++) {
                for ($n = 1; $n < 6; $n++) {
                    $className = $c[$m][$n];
                    $res = $classModel->add($labId, $className, $n, $m);
                    if (false == $res) {
                        $num = $num + 1;
                    }
                }
            }
            if ($num == 0) {
                Db::commit();
                $this->success('添加课表成功', '/index/classtable/index?id=' . $labId);
            } else {
                Db::rollback();
                $this->error('添加课表失败');
            }
        }
        $this->assign('labId', $labId);
        return $this->fetch('add_course');
    }

    /**
     * @return mixed
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \PHPExcel_Exception
     */
    public function index()
    {
        $labId = input('id');
        $classModel = new \app\index\model\Classtable();
//        获取该实验室的课程表
        $classList = $classModel->getClassByLabId($labId);
//        如果不为空，则赋对应值，为空则赋空值
        if (!empty($classList)) {
            foreach ($classList as $k => $v) {
                $course[$v['order']][$v['day']] = $v['class_name'];
            }
        } else {
            for ($order = 1; $order < 6; $order++) {
                for ($day = 1; $day < 6; $day++) {
                    $course[$order][$day] = '';
                }
            }
        }
        $this->assign('course', $course);
        $this->assign('labId', $labId);
        return $this->fetch('course_detail');
    }

    /**
     * @throws \think\Exception
     * @throws \think\exception\PDOException
     */
    public function del()
    {
        $labId = input('id');
        $classModel = new \app\index\model\Classtable();
        $res = $classModel->deleteByLabId($labId);
        if ($res) {
            $this->success('删除课程表成功');
        } else {
            $this->error('删除课程表失败');
        }
    }


    /**
     * 创建(导出)Excel数据表格
     * @param  array $list 要导出的数组格式的数据
     * @param  string $filename 导出的Excel表格数据表的文件名
     * @param  array $indexKey $list数组中与Excel表格表头$header中每个项目对应的字段的名字(key值)
     * @param  array $startRow 第一条数据在Excel表格中起始行
     * @param  [bool]  $excel2007   是否生成Excel2007(.xlsx)以上兼容的数据表
     * 比如: $indexKey与$list数组对应关系如下:
     *     $indexKey = array('id','username','sex','age');
     *     $list = array(array('id'=>1,'username'=>'YQJ','sex'=>'男','age'=>24));
     * @throws \PHPExcel_Exception
     */
    public function exportExcel($list, $filename, $indexKey, $excel2007 = false)
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
        $objActSheet->setCellValue('B1', "周一");
        $objActSheet->setCellValue('C1', '周二');
        $objActSheet->setCellValue('D1', '周三');
        $objActSheet->setCellValue('E1', '周四');
        $objActSheet->setCellValue('F1', '周五');
        $objActSheet->setCellValue('A2', '第一节');
        $objActSheet->setCellValue('A3', '第二节');
        $objActSheet->setCellValue('A4', '第三节');
        $objActSheet->setCellValue('A5', '第四节');
        $objActSheet->setCellValue('A6', '第五节');
        $startRow = 2;
        foreach ($list as $row) {
            foreach ($indexKey as $key => $value) {
                //这里是设置单元格的内容
                $objActSheet->setCellValue($header_arr[$key + 1] . $startRow, $row[$value]);
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
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\ModelNotFoundException
     * @throws \think\exception\DbException
     * @throws \PHPExcel_Exception
     */
    public function export()
    {
        $labId = input('id');
        $labModel = new \app\index\model\Lab();
        $lab = $labModel->getLabById($labId);
        $labName = $lab['name'];
        $classModel = new \app\index\model\Classtable();
//        获取该实验室的课程表
        $classList = $classModel->getClassByLabId($labId);
//        如果不为空，则赋对应值，为空则赋空值
        if (!empty($classList)) {
            foreach ($classList as $k => $v) {
                $course[$v['order']][$v['day']] = $v['class_name'];
            }
        } else {
            for ($order = 1; $order < 6; $order++) {
                for ($day = 1; $day < 6; $day++) {
                    $course[$order][$day] = '';
                }
            }
        }
        $indexKey = array('1', '2', '3', '4', '5');
        $this->exportExcel($course, $labName, $indexKey);
    }


    /**
     * @throws \PHPExcel_Exception
     * @throws \PHPExcel_Reader_Exception
     */
    public function import()
    {
        if ($_FILES ['file_stu'] ['tmp_name']) {
            $file = request()->file("file_stu");
            $info = $file->move(ROOT_PATH . 'public/uploads' . DS . 'files');
            if ($info) {
                $fileUrl = 'uploads/files/' . date('Ymd') . '/' . $info->getFilename();
                $res = $this->read($fileUrl);
            } else {
                $this->error($file->getError());
            }

            $id=input('id');
            $classModel=new \app\index\model\Classtable();
            $classModel->deleteLabClass($id);


            foreach ($res as $key=>$value){

                if($key==1){
                    continue;
                }else{
                    foreach ($value as $k=>$v){

                        if($k==0){
                            continue;
                        }else{
                            $classModel->add($id, $v, $k, $key-1);
                        }

                    }
                }
            }

            $this->success('导入课表成功','/index/lab/index');

        }
    }

    /**
     * @param $filename
     * @param string $encode
     * @return array
     * @throws \PHPExcel_Exception
     * @throws \PHPExcel_Reader_Exception
     */
    public function read($filename)
    {
        Vendor('phpexcel.PHPExcel');
        Vendor('phpexcel.PHPExcel.IOFactory');
        $extension = strtolower( pathinfo($filename, PATHINFO_EXTENSION) );
        if ($extension =='xlsx') {
            $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
        } else if ($extension =='xls') {
            $objReader = \PHPExcel_IOFactory::createReader('Excel5');
        }
        $objPHPExcel = $objReader->load($filename);
        $objWorksheet = $objPHPExcel->getActiveSheet();
        $highestRow = $objWorksheet->getHighestRow();
        $highestColumn = $objWorksheet->getHighestColumn();
        $highestColumnIndex = \PHPExcel_Cell::columnIndexFromString($highestColumn);
        $excelData = array();
        for ($row = 1; $row <= $highestRow; $row++) {
            for ($col = 0; $col < $highestColumnIndex; $col++) {
                $excelData[$row][] = (string)$objWorksheet->getCellByColumnAndRow($col, $row)->getValue();
            }
        }
        return $excelData;
    }
}