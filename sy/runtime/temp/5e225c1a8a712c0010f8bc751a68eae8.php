<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"D:\phpStudy\PHPTutorial\WWW\sy\public/../application/index\view\repair\add_repair.html";i:1514213106;}*/ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>无标题文档</title>

    <script language="javascript" src="/static/Scripts/jquery.js"></script>
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

        function apply1() {
            var f = document.form1;
            if (f.itemname.value == "") {
                alert('请选择所属实验室');
                return false;
            }
            if (f.machine_id.value == "") {
                alert('请选择设备');
                return false;
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
        <td width="162" align="center" background="Images/bj4.gif">

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
                    <td width="191" align="left" class="biao">设备报修</td>
                </tr>
            </table>
        </td>
        <td width="31%" align="right" background="/static/Images/b2.jpg"><img src="/static/Picture/b3.jpg" width="9"
                                                                              height="26"/></td>
    </tr>
</table>

<form method="post" enctype="multipart/form-data" name="form1" onsubmit="return apply1();">
    <table width="99%" border="0" align="center" cellpadding="3" cellspacing="1" bgcolor="#AEDEF4">

        <tr>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">所属实验室</td>
            <td colspan="5" align="left" bgcolor="#FFFFFF"><label>
                <select name="lab_id" onchange="addRepair(this.value)">
                    <option value="">请选择</option>
                    <?php if(is_array($labList) || $labList instanceof \think\Collection || $labList instanceof \think\Paginator): $i = 0; $__LIST__ = $labList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lab): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $lab['id']; ?>"><?php echo $lab['name']; ?></option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </label>
            </td>
        </tr>

        <script>
            function addRepair(value) {

                $.ajax({
                    type: "POST",
                    url: "/index/repair/getMachinesByLabId",
                    datatype: "json",
                    data: {id: value},
                    success: function (data) {
                        var result = JSON.parse(data);
                        result = eval(result);
                        var html = "<option value=''>请选择</option>";
                        if (true) {
                            for (var i = 0; i < result.length; i++) {
                                html += "<option value='" + result[0].id + "'>" + result[0].name + "</option>"
                            }
                            document.getElementById("mac_id").innerHTML = html;
                        } else {

                        }
                    },
                    error: function (xhr) {

                    }
                })

            }
        </script>

        <tr>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">设备名称</td>
            <td colspan="5" align="left" bgcolor="#FFFFFF"><label>
                &nbsp; <select name="machine_id" id="mac_id">
                <option value="">请选择</option>
            </select>
            </label></td>

        </tr>


        <tr>
            <td width="86" height="25" align="center" bgcolor="#FFF9DF">备注信息</td>
            <td colspan="5" align="left" bgcolor="#FFFFFF"><label>
                &nbsp;<textarea name="info" rows="5" cols="100" id="info" size="80"></textarea>
            </label></td>

        </tr>
        <tr>

            <td colspan="2" height="25" align="left" bgcolor="#FFFFFF"><label>
                <button type="submit" class="button button2" style="margin-left: 400px" onclick="return confirm('确认提交吗？')">保存</button>
                <button type="reset" class="button button2">重置</button>
            </label></td>

        </tr>
    </table>
</form>
</body>
</html>
