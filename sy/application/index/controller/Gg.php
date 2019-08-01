<?php
namespace app\index\controller;
use app\index\model\Student;
use app\index\model\Teacher;
use think\Controller;
use think\Session; 

class Gg extends Controller
{
  public function index()
    {
      echo "<div>公告</div>";
    }
}