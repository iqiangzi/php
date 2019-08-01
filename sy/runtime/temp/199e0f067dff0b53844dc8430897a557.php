<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:83:"C:\Users\ljx\Desktop\sy\public/../application/index\view\classtable\add_course.html";i:1514864765;}*/ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>无标题文档</title>

    <link href="/static/Css/layout.css" rel="stylesheet" type="text/css"/>
    <link href="/static/Css/cb.css" rel="stylesheet" type="text/css"/>
    <link href="/static/Css/n.css" rel="stylesheet" type="text/css"/>
    <style>
        .biankuangs {
            border: solid #A6D2FF 1px;
            border-top: 0px;
        }

        #item_text2, #item_text1, #itemtypes2, #item_text3 { /**/
            display: none;
        }

        .button {
            background-color: #008CBA; /* Green */
            border: none;
            color: white;
            padding: 6px 12px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .button2 {
            border-radius: 4px;
            font-size: 13px;
        }

    </style>
    <script>
        function gooo(id) {
            if (id != "") {
                location.href = '?x=' + id;
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

        function change_itemtypes23(name) {
            document.getElementById("types2").value = "";
            if (name == '1') {
                document.getElementById("item_text2").style.display = "block";
            } else {

                document.getElementById("item_text2").style.display = "none";
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
            <table width="211" border="0" align="left" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="20" align="left"><img src="/static/Picture/tz.gif" width="10" height="16"/></td>
                    <td width="191" align="left" class="biao">添加课程</td>
                </tr>
            </table>
        </td>
        <td width="31%" align="right" background="/static/Images/b2.jpg"><img src="/static/Picture/b3.jpg" width="9"
                                                                              height="26"/></td>
    </tr>
</table>

<form method="post" style="width: 100%" action="/index/Classtable/import" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $labId; ?>"/>
    <table style="width: 100%" >
        <tr style="width: 100%">
            <td width="100%" align="left"  bgcolor="#FFF9DF">
            <span style="padding-left:200px;">
            导入Excel表： <input  type="file" name="file_stu" /> <input type="submit"  value="导入" class="button button2"/>
            </span>
            </td>
        </tr>
    </table>

</form>

<form method="post" enctype="multipart/form-data" name="form1" onsubmit="return apply1();">
    <table width="99%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#AEDEF4">

        <tr>
            <td width="86" height="35" align="center" bgcolor="#FFF9DF"></td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">周一</td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">周二</td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">周三</td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">周四</td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">周五</td>

        </tr>
        <tr>
            <td width="86" height="35" align="center" bgcolor="#FFF9DF">
                第一节
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c11" value="<?php echo $course[1][1]; ?>" style="height: 20px"/>
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c12" value="<?php echo $course[1][2]; ?>" style="height: 20px"/>
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c13" value="<?php echo $course[1][3]; ?>" style="height: 20px"/>
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c14" value="<?php echo $course[1][4]; ?>" style="height: 20px"/>
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c15" value="<?php echo $course[1][5]; ?>" style="height: 20px"/>
            </td>

        </tr>
        <tr>
            <td width="86" height="35" align="center" bgcolor="#FFF9DF">
                第二节
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c21" value="<?php echo $course[2][1]; ?>" style="height: 20px"/>
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c22" value="<?php echo $course[2][2]; ?>" style="height: 20px"/>
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c23" value="<?php echo $course[2][3]; ?>" style="height: 20px"/>
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c24" value="<?php echo $course[2][4]; ?>" style="height: 20px"/>
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c25" value="<?php echo $course[2][5]; ?>" style="height: 20px"/>
            </td>

        </tr>
        <tr>
            <td width="86" height="35" align="center" bgcolor="#FFF9DF">
                第三节
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c31" value="<?php echo $course[3][1]; ?>" style="height: 20px"/>
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c32" value="<?php echo $course[3][2]; ?>" style="height: 20px"/>
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c33" value="<?php echo $course[3][3]; ?>" style="height: 20px"/>
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c34" value="<?php echo $course[3][4]; ?>" style="height: 20px"/>
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c35" value="<?php echo $course[3][5]; ?>" style="height: 20px"/>
            </td>

        </tr>

        <tr>
            <td width="86" height="35" align="center" bgcolor="#FFF9DF">
                第四节
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c41" value="<?php echo $course[4][1]; ?>" style="height: 20px"/>
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c42" value="<?php echo $course[4][2]; ?>" style="height: 20px"/>
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c43" value="<?php echo $course[4][3]; ?>" style="height: 20px"/>
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c44" value="<?php echo $course[4][4]; ?>" style="height: 20px"/>
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c45" value="<?php echo $course[4][5]; ?>" style="height: 20px"/>
            </td>

        </tr>
        <tr>
            <td width="86" height="35" align="center" bgcolor="#FFF9DF">
                第五节
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c51" value="<?php echo $course[5][1]; ?>" style="height: 20px"/>
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c52" value="<?php echo $course[5][2]; ?>" style="height: 20px"/>
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c53" value="<?php echo $course[5][3]; ?>" style="height: 20px"/>
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c54" value="<?php echo $course[5][4]; ?>" style="height: 20px"/>
            </td>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">
                <input type="text" name="c55" value="<?php echo $course[5][5]; ?>" style="height: 20px"/>
            </td>

        </tr>
        <tr>

            <td colspan="6" height="25" align="center" bgcolor="#FFFFFF"><label>
                <button type="submit" class="button button2" style="margin-left: 400px">保存</button>
                <button type="reset" class="button button2">重置</button>
                <button type="button" class="button button2"
                        onclick="
                        if (confirm('确定删除课程表吗?'))
                        {window.location='/index/classtable/del?id=<?php echo $labId; ?>'}">删除
                </button>
            </label></td>

        </tr>
    </table>
</form>


</body>
</html>
