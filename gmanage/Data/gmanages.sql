# Host: localhost  (Version: 5.5.27)
# Date: 2019-05-22 19:09:38
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "gm_funds"
#

CREATE TABLE `gm_funds` (
  `gm_fid` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `gm_ftype` char(2) COLLATE utf8_bin DEFAULT '1' COMMENT '变动种类1个人，2集体',
  `gm_num` int(14) unsigned NOT NULL COMMENT '学生学号',
  `gm_time` datetime NOT NULL COMMENT '操作时间',
  `gm_money` int(10) NOT NULL COMMENT '操作资金，有正负',
  `gm_lmoney` int(8) unsigned NOT NULL,
  `gm_details` text COLLATE utf8_bin NOT NULL COMMENT '详细原因',
  PRIMARY KEY (`gm_fid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

#
# Data for table "gm_funds"
#

INSERT INTO `gm_funds` VALUES (1,'1',2000,'2019-04-11 22:01:34',1000,1000,'论文版面费'),(2,'2',2000,'2019-04-22 22:35:03',2000,3000,'2000'),(3,'1',2000,'2019-04-22 22:37:52',-1000,2000,'论文版面费'),(4,'1',2000,'2019-05-12 15:37:38',1000,3000,'论文版面费');

#
# Structure for table "gm_message"
#

CREATE TABLE `gm_message` (
  `gm_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `gm_username` varchar(20) COLLATE utf8_bin NOT NULL,
  `gm_num` int(14) unsigned NOT NULL,
  `gm_content` text COLLATE utf8_bin NOT NULL,
  `gm_reply` text COLLATE utf8_bin,
  `gm_replytime` datetime DEFAULT NULL,
  `gm_systime` datetime NOT NULL,
  PRIMARY KEY (`gm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

#
# Data for table "gm_message"
#

INSERT INTO `gm_message` VALUES (15,'Leo',119074365,'这个系统功能很强大哦\r\n\r\n用户角色有：超级管理员、管理员、学生\r\n各角色功能有明显区别，使系统执行效率大大提高！\r\n\r\n超级管理员的后台管理功能强大，在那里可以更改初始密码、是否允许注册、是否开启验证码、分页类型、每页条目数、网站标题等等设置~~\r\n\r\n安全方面更是考虑了很多，可以有效应对SQl注入、跨页面攻击、页面盗用等等恶意行为~','是的，这个系统确实强大啊','2013-04-10 23:02:59','2019-04-10 23:02:31');

#
# Structure for table "gm_notice"
#

CREATE TABLE `gm_notice` (
  `gm_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `gm_title` varchar(100) COLLATE utf8_bin NOT NULL,
  `gm_content` text COLLATE utf8_bin NOT NULL,
  `gm_write` varchar(20) COLLATE utf8_bin NOT NULL,
  `gm_time` datetime NOT NULL,
  PRIMARY KEY (`gm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

#
# Data for table "gm_notice"
#

INSERT INTO `gm_notice` VALUES (1,'This’s a demo!!!!','dawdawdawd','1000','2018-11-05 20:54:19'),(2,'关于举办首届安徽工业大学计算机学院研究生艺术节的通知',' 　　理                  论上，除因严重违反百科协议而被封禁的用户外，其他百度用户享有平等编写词条的权利。但为了减少词条被恶意编辑的事件，百度对不同用户的编辑权有一定的限制。                                                                                              例如：\r\n积分达到四级、词条通过率在85%以上的用户可以编辑百科名片，而未同时达到两条标准的用户则无权修改相应内容。对少数内容较完善的词条的编辑，也存在类似的限制。内容涉及敏感的话题或屡遭恶意编辑而被暂时锁定的词条，无法被任何用户编辑，如用户认为有必要编辑，须到百科投诉吧提交申请，待申请通过后即可对相关词条进行修改。\r\n 　　对百度百科做出一定贡献的用户，可以申请成为分类管理员。分类管理员可对百度百科分类          频道页进行编辑，并佩戴分类管理员勋章。\r\n 　　为了带来更加专业、权威、可靠的信息，百度百科也引入了权威认证词条的机制。权威认证是指通过专业机构对词条进行专业认证，以保证词条内容的权威性，给用户提供高质量的专业解释化服务。','1000','2018-09-24 21:07:27'),(4,'关于计算机学院新生迎接工作的通知','测试啊啊啊啊啊啊','1000','2018-08-02 20:50:45'),(6,'今年放寒假时间提前二个星期','啊啊啊啊','1000','2018-08-02 20:49:19'),(7,'冬季作息时间表','爱爱爱 \r\n额纷纷\r\n是我的','1000','2018-08-02 21:03:41'),(8,'2012年8月3日开始下雨啦','下吧下吧我要开花   发芽','','2018-08-09 15:12:35'),(9,'学院研究生整顿的通知','学院研究生整顿的通知学院研究生整顿的通知学院研究生整顿的通知','1000','2018-08-02 22:20:25'),(10,'关于举办2013年“合财”杯中国大学生 计算机设计大赛安徽省级赛的通知','有关高等学校：\r\n　　　为了激励我省大学生学习计算机应用知识和技能的兴趣，提升大学生参加全国大学生计算机设计大赛（以下简称“大赛”）的水平。经中国大学生计算机设计大赛安徽省级赛区组织委员会，安徽省高等学校计算机教育研究会竞赛委员会研究，报中国大学生计算机设计大赛组织委员会通过：举办2013年“合财”杯中国大学生计算机设计大赛安徽省级赛竞赛。现将具体竞赛事宜通知如下：\r\n　　　参赛对象：在校大学本科生、高职高专生\r\n　　　一、竞赛内容规则：\r\n　　　详见网站：www.wkjsj.org\r\n　　　1．软件应用与开发类，包括以下小类：①网站设计；②数据库应用；③教学课件；④虚拟实验平台。\r\n　　　2．数字媒体设计类，包括以下小类：①计算机动画、游戏；②计算机图形图像设计(数字绘画、图形图像、视觉设计等)；③交互媒体设计(电子杂志、移动终端、数字展示、虚拟现实等)；④DV影片。\r\n　　　2013年数字媒体设计类作品的参赛主题为：水、中华民族文化元素。\r\n　　　3．计算机音乐创作类。包括以下小类：①电子音乐；②创编类（歌曲或者为独奏乐曲创编）；③视频配乐\r\n　　　二、竞赛流程：\r\n2013年3月31日前报名。\r\n4月15日前网上提交作品。\r\n4月30日前大赛组委会完成作品初评。\r\n 向入选赛队提出作品改进意见。\r\n　　　⑤ 5月15日前入选赛队向“大赛”组委会提交最终作品（推荐前40%的赛队直接入选“大赛”总决赛公示队列）。\r\n 6月15日前获奖赛队参加华东赛区现场答辩（可选项）。\r\n　　　联系人：合肥财经职业学院  汪晓欣\r\n　　　Email ：270828669@qq.com \r\n　　　电  话：15955168705\r\n　　　三、获奖比例（经中国大学生计算机设计大赛组织委员会调整）：\r\n　　　一等奖（实际参赛队）15%；二等奖（实际参赛队）25%；三等奖（实际参赛队）30%。\r\n　　　四、竞赛服务\r\n　　　网站服务：www.ahjsjjy.net\r\n　　　报名表提交：270828669@qq.com\r\n　　　作品提交：270828669@qq.com\r\n　　　作品寄送地址：合肥财经职业学院  汪晓欣 收\r\n　　　邮编：230601\r\n　　　咨询：汪晓欣：15955168705\r\n　　　　　　　孙中胜：13013124415\r\n　　　\r\n　　　\r\n　　　\r\n                            2013年3月22日\r\n\r\n2013年“合财”杯中国大学生计算机设计大赛安徽省级赛报名表\r\n\r\n参赛院校\t\r\n学校竞赛联系人\t姓    名\t\t性    别\t\r\n\t职    务\t\t职    称\t\r\n\t固定电话\t\t移动电话\t\r\n\t电子邮箱\t\r\n\t通信地址\t\t邮政编码\t\r\n作品1\t\t作品类别\t\r\n作品2\t\t作品类别\t\r\n作品3\t\t作品类别\t\r\n作品4\t\t作品类别\t\r\n作品5\t\t作品类别\t\r\n作品6\t\t作品类别\t\r\n作品7\t\t作品类别\t\r\n作品8\t\t作品类别\t\r\n作品9\t\t作品类别\t\r\n。。。。。。\t\t作品类别\t\r\n\r\n注：作品按www.wkjsj.org网站所列的要求提交。\r\n','1000','2018-04-10 22:57:54');

#
# Structure for table "gm_stuinfo"
#

CREATE TABLE `gm_stuinfo` (
  `gm_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '学生id',
  `gm_active` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0' COMMENT '是否审核',
  `gm_num` int(14) unsigned NOT NULL COMMENT '学号',
  `gm_username` varchar(20) NOT NULL COMMENT '姓名',
  `gm_teacher` varchar(20) DEFAULT NULL,
  `gm_sex` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '性别',
  `gm_birth` date NOT NULL COMMENT '生日',
  `gm_start_time` date NOT NULL COMMENT '入学时间',
  `gm_grade` char(3) NOT NULL COMMENT '年级',
  `gm_contact` char(14) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '联系方式',
  `gm_address` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '家庭住址',
  `gm_saddress` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '学校内住址',
  `gm_subject` char(8) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '专业',
  `gm_type` char(4) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '培养管理类型',
  `gm_remarks` text CHARACTER SET utf8 COLLATE utf8_bin COMMENT '备注',
  `gm_photoname` varchar(50) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '照片名称',
  PRIMARY KEY (`gm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

#
# Data for table "gm_stuinfo"
#

INSERT INTO `gm_stuinfo` VALUES (31,'1',119074365,'Leo','易湛','男','1992-10-13','2011-09-01','已毕业','18777777777','安徽省霍邱县安业村','','计算机软件与理论','学术型',NULL,'/20190423065838.jpg'),(32,'1',119066876,'张三','易湛','女','1991-04-01','2012-03-01','已毕业','18888887777','安徽省寿县','','计算机应用技术','专业型',NULL,'/20190423065821.jpg'),(33,'1',3000,'user',NULL,'男','1998-01-01','2016-01-01','已毕业','12345612352','湖南怀化','','计算机应用技术','学术型',NULL,'/20190422134408.jpg'),(34,'0',3001,'as',NULL,'男','1997-01-01','2015-01-01','已毕业','12345612352','湖南省长沙市','','计算机应用技术','学术型',NULL,'/20190422140137.jpg'),(35,'0',3002,'test',NULL,'男','1986-01-01','2014-01-01','已毕业','12345612352','湖南怀化','','计算机应用技术','学术型',NULL,'/20190422151827.jpg');

#
# Structure for table "gm_system"
#

CREATE TABLE `gm_system` (
  `gm_id` tinyint(2) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `gm_webname` varchar(100) COLLATE utf8_bin NOT NULL COMMENT '网站标题',
  `gm_initial_password` varchar(40) COLLATE utf8_bin NOT NULL COMMENT '默认密码',
  `gm_register` char(1) COLLATE utf8_bin NOT NULL COMMENT '是否允许注册',
  `gm_needcode` char(1) COLLATE utf8_bin NOT NULL COMMENT '是否需要验证码',
  `gm_help_login` varchar(300) COLLATE utf8_bin DEFAULT '无' COMMENT '登录界面帮助信息',
  `gm_user_date_page` char(1) COLLATE utf8_bin NOT NULL COMMENT '用户信息分页',
  `gm_stu_active_page` char(1) COLLATE utf8_bin NOT NULL COMMENT '审核分页',
  `gm_stu_date_page` char(1) COLLATE utf8_bin NOT NULL COMMENT '研究生信息分页',
  `gm_message_page` char(1) COLLATE utf8_bin NOT NULL COMMENT '留言板分页',
  `gm_notice_page` char(1) COLLATE utf8_bin NOT NULL COMMENT '公告中心分页',
  `gm_funds_admin_page` char(1) COLLATE utf8_bin NOT NULL COMMENT '经费管理分页',
  `gm_user_date_pagesize` char(4) COLLATE utf8_bin NOT NULL COMMENT '用户信息分页大小',
  `gm_stu_active_pagesize` char(4) COLLATE utf8_bin NOT NULL COMMENT '审核分页大小',
  `gm_stu_date_pagesize` char(4) COLLATE utf8_bin NOT NULL COMMENT '研究生信息分页大小',
  `gm_message_pagesize` char(4) COLLATE utf8_bin NOT NULL COMMENT '留言板分页大小',
  `gm_notice_pagesize` char(4) COLLATE utf8_bin NOT NULL COMMENT '公告中心分页大小',
  `gm_funds_admin_pagesize` char(4) COLLATE utf8_bin NOT NULL COMMENT '经费管理分页大小',
  `gm_inputDetails` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT '学生申请经费事由',
  PRIMARY KEY (`gm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

#
# Data for table "gm_system"
#

INSERT INTO `gm_system` VALUES (1,'计算机学院研究生档案管理','123456','1','0','*用户名为学号<br/>*初始密码是：123456<br/>*如果你的密码不正确可能是被重置了<br/>*忘记密码请联系管理员','2','2','2','1','2','2','40','40','40','40','40','40','发表论文补贴 成绩优秀奖励 进步显著奖励 乐于助人');

#
# Structure for table "gm_teacher"
#

CREATE TABLE `gm_teacher` (
  `gm_id` mediumint(8) NOT NULL AUTO_INCREMENT,
  `gm_num` int(14) NOT NULL,
  `gm_username` varchar(20) COLLATE utf8_bin NOT NULL,
  `gm_funds` int(8) DEFAULT '0',
  `gm_zc` varchar(20) COLLATE utf8_bin NOT NULL,
  `gm_student` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`gm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

#
# Data for table "gm_teacher"
#

INSERT INTO `gm_teacher` VALUES (1,2000,'易湛',3000,'教授','');

#
# Structure for table "gm_user"
#

CREATE TABLE `gm_user` (
  `gm_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `gm_active` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0' COMMENT '是否审核',
  `gm_level` char(1) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '1' COMMENT '用户权限',
  `gm_username` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '用户名',
  `gm_num` int(14) unsigned NOT NULL COMMENT '用户编号',
  `gm_password` varchar(40) NOT NULL DEFAULT '' COMMENT '用户密码',
  `gm_reg_time` datetime NOT NULL COMMENT '注册时间',
  `gm_last_time` datetime NOT NULL COMMENT '上次登录时间',
  `gm_last_ip` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT '上次登录IP',
  PRIMARY KEY (`gm_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

#
# Data for table "gm_user"
#

INSERT INTO `gm_user` VALUES (1,'1','3','sadmin',1000,'e3cbba8883fe746c6e35783c9404b4bc0c7ee9eb','2012-07-28 16:08:56','2019-05-14 23:08:31','::1'),(42,'1','2','admin',1001,'dd01903921ea24941c26a48f2cec24e0bb0e8cc7','2012-08-28 13:15:57','2019-05-11 22:40:28','::1'),(48,'1','1','Leo',119074365,'7c4a8d09ca3762af61e59520943dc26494f8941b','2013-04-10 22:55:37','2019-04-10 22:58:50','127.0.0.1'),(49,'1','1','张三',119066876,'356a192b7913b04c54574d18c28d46e6395428ab','2013-04-10 22:56:30','2019-04-10 22:56:30','127.0.0.1'),(50,'1','1','user',3000,'7c4a8d09ca3762af61e59520943dc26494f8941b','2019-04-22 21:44:08','2019-05-12 15:45:48','::1'),(51,'0','1','as',3001,'7c4a8d09ca3762af61e59520943dc26494f8941b','2019-04-22 22:01:37','2019-04-22 22:01:37','::1'),(52,'0','1','test',3002,'7c4a8d09ca3762af61e59520943dc26494f8941b','2019-04-22 23:18:27','2019-04-22 23:18:27','::1');
