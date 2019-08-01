# Host: localhost  (Version: 5.5.27)
# Date: 2019-06-01 22:40:59
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "affiche"
#

CREATE TABLE `affiche` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `author` varchar(100) NOT NULL DEFAULT '',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

#
# Data for table "affiche"
#

INSERT INTO `affiche` VALUES (8,'公告','管理员','2019-03-22 11:37:07','22222');

#
# Structure for table "attendance"
#

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_id` int(11) NOT NULL DEFAULT '0',
  `lab_id` int(11) NOT NULL DEFAULT '0',
  `update_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='考勤表';

#
# Data for table "attendance"
#

INSERT INTO `attendance` VALUES (7,1,2,'2019-03-23 15:00:25'),(8,1,3,'2019-03-21 15:29:34'),(9,1,1,'2019-04-01 15:29:39'),(11,1,3,'2019-03-22 10:50:20'),(12,1,1,'2019-03-24 22:55:32');

#
# Structure for table "class"
#

CREATE TABLE `class` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lab_id` int(11) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `day` int(11) NOT NULL COMMENT '周几',
  `order` int(11) NOT NULL COMMENT '在一天中排第几节',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=1994 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

#
# Data for table "class"
#

INSERT INTO `class` VALUES (1969,1,'物理',1,1),(1970,1,'化学',2,1),(1971,1,'生物',3,1),(1972,1,'',4,1),(1973,1,'',5,1),(1974,1,'',1,2),(1975,1,'',2,2),(1976,1,'',3,2),(1977,1,'',4,2),(1978,1,'',5,2),(1979,1,'',1,3),(1980,1,'',2,3),(1981,1,'',3,3),(1982,1,'',4,3),(1983,1,'',5,3),(1984,1,'',1,4),(1985,1,'',2,4),(1986,1,'',3,4),(1987,1,'',4,4),(1988,1,'',5,4),(1989,1,'',1,5),(1990,1,'',2,5),(1991,1,'',3,5),(1992,1,'',4,5),(1993,1,'',5,5);

#
# Structure for table "lab"
#

CREATE TABLE `lab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `info` text NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='实验室表';

#
# Data for table "lab"
#

INSERT INTO `lab` VALUES (1,'','实验室1','这是实验室11111'),(2,'','实验室2','这是实验室2'),(3,'','实验室333',''),(4,'S101','实验室一','这是实验室一');

#
# Structure for table "machine"
#

CREATE TABLE `machine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lab_id` int(11) NOT NULL COMMENT '隶属于哪个实验室',
  `name` varchar(11) NOT NULL COMMENT '设备名',
  `num` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL DEFAULT '0',
  `info` text,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='设备表';

#
# Data for table "machine"
#

INSERT INTO `machine` VALUES (2,2,'dasdasdwqe',1232132141,0,NULL),(4,3,'设备1',1513828879,1,'这是实验室333的设备1修改'),(5,3,'画室工具',1556962958,0,'画室工具');

#
# Structure for table "repair"
#

CREATE TABLE `repair` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `machine_id` int(11) NOT NULL DEFAULT '0',
  `author` varchar(100) NOT NULL DEFAULT '',
  `info` text NOT NULL,
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='维修信息表';

#
# Data for table "repair"
#

INSERT INTO `repair` VALUES (3,4,'管理员','报修','2019-03-02 14:23:23',0);

#
# Structure for table "student"
#

CREATE TABLE `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `realname` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `no` int(11) NOT NULL,
  `clas` varchar(255) NOT NULL,
  `sex` varchar(50) NOT NULL,
  `age` int(11) NOT NULL,
  `address` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `hobby` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='学生表';

#
# Data for table "student"
#

INSERT INTO `student` VALUES (1,'stu','student','123',2015464875,'15软工一班','男',20,'xx省xx市','18012365941','学习'),(4,'stu1','STU','123',2147483647,'15软工二班','女',20,'xxxx省xxxx市','18444465465','唱歌');

#
# Structure for table "teacher"
#

CREATE TABLE `teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `realname` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT COMMENT='教师表';

#
# Data for table "teacher"
#

INSERT INTO `teacher` VALUES (1,'admin','管理员','123');
