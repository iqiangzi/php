<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"D:\phpStudy\PHPTutorial\WWW\sy\public/../application/index\view\login\login.html";i:1539149237;}*/ ?>
﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>实验室管理系统</title>
    <link href="/static/Css/cb.css" rel="stylesheet" type="text/css"/>
    <link href="/static/Css/n.css" rel="stylesheet" type="text/css"/>
    <style type="text/css">
        <!--
        .STYLE1 {
            color: #ffffff;
            font-size: 12px;
        }

        .STYLE4 {
            color: #8da8c3;
            font-size: 12px;
        }

        .STYLE6 {
            font-size: 12px;
            color: #5593ce;
        }

        -->
    </style>
    <link href="/static/Css/layout.css" rel="stylesheet" type="text/css"/>
    <script>
        function check() {
            f = document.form1;
            if (f.username.value == "") {
                alert("请填写用户名");
                return false;
            }
            if (f.password.value == "") {
                alert("请填写密码");
                return false;
            }
            if (f.identity.value == "") {
                alert("请选择用户类型");
                return false;
            }
        }
    </script>
</head>
<!--background:url('/static/Images/bj.gif') repeat-x ;-->
<body style="background-size:100% 100%;background:url('/static/Images/bj.gif') repeat-x ;">
<table width="100%" height="100%" border="0" align="center" cellpadding="0" cellspacing="0"
       style="margin:80px 0px; padding:0px">
    <tr>
        <td height="100%" align="center" valign="top" >
            <table width="465" height="414" border="0" align="center" cellpadding="0" cellspacing="0">
                <tr>
                    <td height="152" colspan="3" valign="center">
                        <span style="float:left;padding-top: 50px;font-weight: bold;font-size: 35px;color: white">实验室管理系统</span>
                    </td>
                </tr>

                <tr>
                    <td width="15" height="262" background="/static/Images/bj1.gif">&nbsp;</td>
                    <td width="420" valign="middle" background="/static/Images/bj2.gif">
                        <form id="form1" name="form1" method="post" onsubmit="return check();">
                            <table width="100%" height="170" border="0" align="center" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td width="31%" align="right"><span class="STYLE1">用户名：</span></td>
                                    <td colspan="3" align="left"><label>
                                        <input name="username" type="text" id="username"/>
                                    </label></td>
                                </tr>
                                <tr>
                                    <td align="right"><span class="STYLE1">密码：</span></td>
                                    <td colspan="3" align="left"><label>
                                        <input name="password" type="password" id="password"/>
                                    </label></td>
                                </tr>
								<tr>
								<!--							
								</tr>
									<td width="31%" align="right"><span class="STYLE1">验证：</span></td>
									<td colspan="3" align="left"><label>
										
									</label></td>
                                <tr>
								-->
                                    <td align="right"><span class="STYLE1">身份：</span></td>
                                    <td colspan="3" align="left">
                                        <label>
                                            <select name="identity">
                                                <option value="">请选择...</option>
                                                <option value="0">教师</option>
                                                <option value="1">学生</option>
                                            </select>
                                        </label></td>
                                </tr>
                                <tr>

                                    <td width="15%" valign="top"><p class="STYLE4">&nbsp;</p></td>
                                    <td width="20%" align="right" valign="middle"></td>
                                    <td width="34%" height="55" align="left">
                                        <input name="image" type="image"
                                               style="width:60px; height:45px;float: left;margin-left: -120px"
                                               src="/static/Images/login2.gif"/>
                                        <a style="color: white;float: left;margin-top: 15px;text-underline: #417484" href="/index/login/register"><u>教师没有账号？请先注册</u></a></td>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </form>
                    </td>
                    <td width="13" background="/static/Images/bj3.gif">&nbsp;</td>
                </tr>
            </table>
            <table width="465" height="76" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td height="76">&nbsp;</td>
                </tr>
            </table>
            <br/>
            <table width="100%" height="64" border="0" cellpadding="0" cellspacing="0">
            </table>
        </td>
    </tr>
</table>
</body>
</html>
