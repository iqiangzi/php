<?php


namespace app\index\model;


use think\Db;
use think\Model;

class Attendance extends Model
{
    public function attend($stuId, $labId)
    {
        $data = array(
            'stu_id' => $stuId,
            'lab_id' => $labId
        );
        $res = Db::name('attendance')->insert($data);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * @param string $startTime
     * @param string $endTime
     * @return false|\PDOStatement|string|\think\Collection|\think\Paginator
     * @throws \think\exception\DbException
     */
    public function getAllAttendances($startTime = '', $endTime = '')
    {
        if ($startTime != '' || $endTime != '') {
            $attendances = Db::name('attendance')
                ->alias('a')
                ->join('student', 'a.stu_id = student.id', 'left')
                ->join('lab', 'a.lab_id = lab.id', 'left')
                ->where('a.update_time', 'between time', [$startTime, $endTime])
                ->field('a.*,student.realname,lab.name')
                ->order('a.update_time', 'desc')
//            ->select();
                ->paginate(10, false,
                    [
                        'query' => [
                            'start_time' => $startTime,
                            'end_time' => $endTime
                        ]
                    ]
                );
        } else {
            $attendances = Db::name('attendance')
                ->alias('a')
                ->join('student', 'a.stu_id = student.id', 'left')
                ->join('lab', 'a.lab_id = lab.id', 'left')
                ->field('a.*,student.realname,lab.name')
                ->order('a.update_time', 'desc')
//            ->select();
                ->paginate(10);
        }
        return $attendances;
    }

    /**
     * @param $stuId
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function getSelfAttendances($stuId)
    {
        $attendances = Db::name('attendance')
            ->alias('a')
            ->join('lab', 'a.lab_id = lab.id', 'left')
            ->where('stu_id', $stuId)
            ->field('a.*,lab.name')
            ->order('a.update_time', 'desc')
            ->paginate(10);
        return $attendances;

    }


//    public function xxx($current, $count)
//    {
//        $current = $current - 1;
//        $sql = "SELECT
//	student.realname,
//	attendance.stu_id,
//	count(* )
//FROM
//	attendance
//	JOIN student ON student.id = attendance.stu_id
//GROUP BY
//	attendance.stu_id  limit " . ($current * 10) . ",10";
//        Db::execute($sql);
//    }

    /**
     * @param $stuId
     * @param string $startTime
     * @param string $endTime
     * @return \think\Paginator
     * @throws \think\exception\DbException
     */
    public function getAttendByStuId($stuId, $startTime = '', $endTime = '')
    {
        if ($startTime != '' || $endTime != '') {
            $attend = Db::name('attendance')
                ->alias('a')
                ->join('student', 'a.stu_id = student.id', 'left')
                ->join('lab', 'a.lab_id = lab.id', 'left')
                ->where('a.stu_id', $stuId)
                ->where('a.update_time', 'between time', [$startTime, $endTime])
                ->field('student.realname, lab.name, a.update_time')
                ->paginate(10);
        } else {
            $attend = Db::name('attendance')
                ->alias('a')
                ->join('student', 'a.stu_id = student.id', 'left')
                ->join('lab', 'a.lab_id = lab.id', 'left')
                ->where('a.stu_id', $stuId)
                ->field('student.realname, lab.name, a.update_time')
//                ->select();
                ->paginate(10);
        }
        return $attend;
    }

    public function getStudentsId()
    {
        $students = Db::name('attendance')
            ->distinct(true)
            ->field('stu_id')
            ->column('stu_id');
        return $students;
    }

    public function getCountById($id, $startTime = '', $endTime = '')
    {
        if ($startTime != '' || $endTime != '') {
            $count = Db::name('attendance')
                ->where('stu_id', $id)
                ->where('update_time', 'between time', [$startTime, $endTime])
                ->count();
        } else {
            $count = Db::name('attendance')
                ->where('stu_id', $id)
                ->count();
        }
        return $count;
    }
}