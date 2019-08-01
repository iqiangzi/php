<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"C:\Users\ljx\Desktop\sy\public/../application/index\view\studentmanage\student_list.html";i:1514871906;}*/ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>无标题文档</title>

    <script src="/static/Scripts/jquery.min.js"></script>
    <link href="/static/Css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="/static/Css/cb.css" rel="stylesheet" type="text/css"/>
    <link href="/static/Css/n.css" rel="stylesheet" type="text/css"/>
    <style>
        .biankuangs {
            border: solid #A6D2FF 1px;
            border-top: 0px;
        }

        #xueke, #item_text2, #item_text1, #itemtypes2, #item_text3 { /**/
            display: none;
        }

        ul.pagination li {
            float: left;
            width: 15px;
            height: 15px;
            padding-top: 3px;
            margin-left: 5px;
            padding-left: 0px;
            border: 1px solid #273e84;
            cursor: pointer;
        }

        .list-page {
            width: 400px;
            margin: 0 auto;
            text-align: center;
        }
    </style>
    <script>
        function change_itemtypes(name) {
            document.getElementById("itemtypes2").value = "";
            document.getElementById("xueke").value = "";
            if (name == 2) {
                document.getElementById("itemtypes2").style.display = "block";
                document.getElementById("item_text1").style.display = "block";
                //document.getElementById("xueke").style.display="block";
            } else {
                document.getElementById("itemtypes2").style.display = "none";
                document.getElementById("xueke").style.display = "none";
                document.getElementById("item_text1").style.display = "none";
                document.getElementById("item_text2").style.display = "none";
            }

        }

        function change_itemtypes2(name) {
            document.getElementById("types2").value = "";
            document.getElementById("types3").value = "";
            if (name == '1') {
                document.getElementById("item_text2").style.display = "block";

                document.getElementById("item_text3").style.display = "none";

            } else if (name == '3') {

                document.getElementById("item_text2").style.display = "none";
                document.getElementById("item_text3").style.display = "block";
            } else {

                document.getElementById("item_text2").style.display = "none";
                document.getElementById("item_text3").style.display = "none";
            }
        }
    </script>
</head>

<body>

<table width="99%" height="25" border="0" align="center" cellpadding="0" cellspacing="0" style="margin-bottom:4px;">
    <tr>
        <td width="17" background="/static/Images/bj4.gif"><img src="/static/Picture/r.gif" width="16" height="16"/>
        </td>
        <td width="466" background="/static/Images/bj4.gif"><?php echo \think\Session::get('userInfo.realname'); ?>:你好！欢迎光临
        </td>
        <td width="162" align="center" background="/static/Images/bj4.gif">

        </td>
    </tr>
</table>
<table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
    <tr>
        <td width="1%" align="left" background="/static/Images/b2.jpg"><img src="/static/Picture/b1.jpg" width="10"
                                                                            height="26"/></td>
        <td width="68%" background="/static/Images/b2.jpg">
            <table width="124" border="0" align="left" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="20" align="left"><img src="/static/Picture/tz.gif" width="10" height="16"/></td>
                    <td width="104" align="left" class="biao">学生列表</td>
                </tr>
            </table>
        </td>
        <td width="31%" align="right" background="/static/Images/b2.jpg"><img src="/static/Picture/b3.jpg" width="9"
                                                                              height="26"/></td>
    </tr>
</table>
<form method="post">
    <table width="99%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#AEDEF4"
           style="border:1px solid #AEDEF4">
        <tr>
            <td width="10%" height="25" align="center" bgcolor="#EFFBFE">
                序号&nbsp;&nbsp;<input type="button" name="button" id="button1" value="全选">
                <input type="button" name="button2" id="button2" value="反选">
            </td>
            <td align="center" bgcolor="#EFFBFE">学生账号</td>
            <td align="center" bgcolor="#EFFBFE">学生姓名</td>
            <td align="center" bgcolor="#EFFBFE">性别</td>
            <td align="center" bgcolor="#EFFBFE">联系电话</td>
            <td align="center" bgcolor="#EFFBFE">管理操作</td>
        </tr>
        <?php if(is_array($studentList) || $studentList instanceof \think\Collection || $studentList instanceof \think\Paginator): $i = 0; $__LIST__ = $studentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$student): $mod = ($i % 2 );++$i;?>
        <tr onmouseout="this.style.backgroundColor='#ffffff'" bgcolor="#ffffff"
            onmouseover="this.style.backgroundColor='#E6F2FF'">
            <td height="25" align="center">
                <input type="checkbox" name="id[]" value="<?php echo $student['id']; ?>" class="ck"/>
                <?php echo $key+1; ?>
            </td>
            <td height="25" align="center"><?php echo $student['username']; ?></td>
            <td height="25" align="center"><?php echo $student['realname']; ?></td>
            <td height="25" align="center"><?php echo $student['sex']; ?></td>
            <td height="25" align="center"><?php echo $student['tel']; ?></td>

            <td align="left">
                <div align="left" style="padding-left:5px">
                    <div align="center">
                        <a href="/index/studentmanage/edit?id=<?php echo $student['id']; ?>">修改</a>&nbsp;&nbsp;&nbsp;&nbsp;
                        <a href="/index/studentmanage/delete?id=<?php echo $student['id']; ?>"
                           onclick="return confirm('确认要删除吗？')">删除</a>&nbsp;&nbsp;&nbsp;&nbsp;
                    </div>
                </div>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        <tr width="5%" height="25" align="center" bgcolor="#EFFBFE">
            <td>
                <button type="submit" onclick="return confirm('确定要批量删除吗？')">批量删除</button>
            </td>
            <td colspan="8">
                <div class="list-page"><?php echo $studentList->render(); ?></div>
            </td>
        </tr>
    </table>
</form>
<script type="text/javascript">
    $(document).ready(function () {
        $("#button1").click(function () {
            $(":checkbox").attr("checked", true);   //设置所有复选框默认勾选
        })
        $("#button2").click(function () {
            $(":checkbox").attr("checked", false);   //设置所有复选框未勾选
        })
    });
</script>
</body>
</html>
