/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : tracking

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-02-22 13:17:47
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `authassignment`
-- ----------------------------
DROP TABLE IF EXISTS `authassignment`;
CREATE TABLE `authassignment` (
  `itemname` varchar(64) NOT NULL,
  `userid` varchar(64) NOT NULL,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`itemname`,`userid`),
  CONSTRAINT `authassignment_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of authassignment
-- ----------------------------
INSERT INTO `authassignment` VALUES ('Admin', '1', null, 'N;');
INSERT INTO `authassignment` VALUES ('Kapal.Admin', '3', null, 'N;');
INSERT INTO `authassignment` VALUES ('Kapal.Index', '3', null, 'N;');

-- ----------------------------
-- Table structure for `authitem`
-- ----------------------------
DROP TABLE IF EXISTS `authitem`;
CREATE TABLE `authitem` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `bizrule` text,
  `data` text,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of authitem
-- ----------------------------
INSERT INTO `authitem` VALUES ('Admin', '2', 'SuperUser', null, 'N;');
INSERT INTO `authitem` VALUES ('agen', '2', 'Agen', 'agen', 'N;');
INSERT INTO `authitem` VALUES ('Authenticated', '2', null, null, 'N;');
INSERT INTO `authitem` VALUES ('cs', '2', 'Customer Services', 'cs', 'N;');
INSERT INTO `authitem` VALUES ('customer', '2', 'Customer', 'customer', 'N;');
INSERT INTO `authitem` VALUES ('Guest', '2', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Kapal.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Kapal.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Kapal.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Kapal.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Kapal.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Kapal.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Kapal.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('marketing', '2', 'Marketing', 'marketing', 'N;');
INSERT INTO `authitem` VALUES ('operasional', '2', 'Operasional', 'operasional', 'N;');
INSERT INTO `authitem` VALUES ('Order.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Order.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Order.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Order.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Order.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Order.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Order.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Site.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Site.Contact', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Site.Error', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Site.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Site.Login', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Site.Logout', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Activation.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Activation.Activation', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Admin.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Admin.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Admin.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Admin.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Admin.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Admin.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Default.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Default.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Login.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Login.Login', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Logout.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Logout.Logout', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Profile.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Profile.Changepassword', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Profile.Edit', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Profile.Profile', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.ProfileField.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.ProfileField.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.ProfileField.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.ProfileField.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.ProfileField.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.ProfileField.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Recovery.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Recovery.Recovery', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Registration.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Registration.Registration', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.User.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.User.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.User.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('User.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Useraccess.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Useraccess.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Useraccess.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Useraccess.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Useraccess.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Useraccess.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Useraccess.View', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Userlevel.*', '1', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Userlevel.Admin', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Userlevel.Create', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Userlevel.Delete', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Userlevel.Index', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Userlevel.Update', '0', null, null, 'N;');
INSERT INTO `authitem` VALUES ('Userlevel.View', '0', null, null, 'N;');

-- ----------------------------
-- Table structure for `authitemchild`
-- ----------------------------
DROP TABLE IF EXISTS `authitemchild`;
CREATE TABLE `authitemchild` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `authitemchild_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `authitemchild_ibfk_2` FOREIGN KEY (`child`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of authitemchild
-- ----------------------------
INSERT INTO `authitemchild` VALUES ('cs', 'Order.Create');
INSERT INTO `authitemchild` VALUES ('cs', 'Order.Index');
INSERT INTO `authitemchild` VALUES ('cs', 'Order.Update');
INSERT INTO `authitemchild` VALUES ('cs', 'Order.View');

-- ----------------------------
-- Table structure for `kapal`
-- ----------------------------
DROP TABLE IF EXISTS `kapal`;
CREATE TABLE `kapal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kapal` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kapal
-- ----------------------------

-- ----------------------------
-- Table structure for `kontainerjo`
-- ----------------------------
DROP TABLE IF EXISTS `kontainerjo`;
CREATE TABLE `kontainerjo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_jo` varchar(100) NOT NULL,
  `nomor_kontainer` varchar(100) NOT NULL,
  `komoditi` varchar(255) DEFAULT NULL,
  `nopol` varchar(20) DEFAULT NULL,
  `supir` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of kontainerjo
-- ----------------------------

-- ----------------------------
-- Table structure for `log`
-- ----------------------------
DROP TABLE IF EXISTS `log`;
CREATE TABLE `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datecreated` datetime DEFAULT NULL,
  `datemodified` datetime DEFAULT NULL,
  `usercreate` varchar(255) DEFAULT NULL,
  `usermodified` varchar(255) DEFAULT NULL,
  `jo` varchar(255) DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of log
-- ----------------------------

-- ----------------------------
-- Table structure for `profiles`
-- ----------------------------
DROP TABLE IF EXISTS `profiles`;
CREATE TABLE `profiles` (
  `user_id` int(11) NOT NULL,
  `lastname` varchar(50) NOT NULL DEFAULT '',
  `firstname` varchar(50) NOT NULL DEFAULT '',
  `birthday` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of profiles
-- ----------------------------
INSERT INTO `profiles` VALUES ('1', 'Admin', 'Administrator', '0000-00-00');
INSERT INTO `profiles` VALUES ('2', 'Demo', 'Demo', '0000-00-00');
INSERT INTO `profiles` VALUES ('3', 'evo', 'evo', '0000-00-00');

-- ----------------------------
-- Table structure for `profiles_fields`
-- ----------------------------
DROP TABLE IF EXISTS `profiles_fields`;
CREATE TABLE `profiles_fields` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `varname` varchar(50) NOT NULL,
  `title` varchar(255) NOT NULL,
  `field_type` varchar(50) NOT NULL,
  `field_size` int(3) NOT NULL DEFAULT '0',
  `field_size_min` int(3) NOT NULL DEFAULT '0',
  `required` int(1) NOT NULL DEFAULT '0',
  `match` varchar(255) NOT NULL DEFAULT '',
  `range` varchar(255) NOT NULL DEFAULT '',
  `error_message` varchar(255) NOT NULL DEFAULT '',
  `other_validator` varchar(5000) NOT NULL DEFAULT '',
  `default` varchar(255) NOT NULL DEFAULT '',
  `widget` varchar(255) NOT NULL DEFAULT '',
  `widgetparams` varchar(5000) NOT NULL DEFAULT '',
  `position` int(3) NOT NULL DEFAULT '0',
  `visible` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `varname` (`varname`,`widget`,`visible`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of profiles_fields
-- ----------------------------
INSERT INTO `profiles_fields` VALUES ('1', 'lastname', 'Last Name', 'VARCHAR', '50', '3', '1', '', '', 'Incorrect Last Name (length between 3 and 50 characters).', '', '', '', '', '1', '3');
INSERT INTO `profiles_fields` VALUES ('2', 'firstname', 'First Name', 'VARCHAR', '50', '3', '1', '', '', 'Incorrect First Name (length between 3 and 50 characters).', '', '', '', '', '0', '3');
INSERT INTO `profiles_fields` VALUES ('3', 'birthday', 'Birthday', 'DATE', '0', '0', '2', '', '', '', '', '0000-00-00', 'UWjuidate', '{\"ui-theme\":\"redmond\"}', '3', '2');

-- ----------------------------
-- Table structure for `rights`
-- ----------------------------
DROP TABLE IF EXISTS `rights`;
CREATE TABLE `rights` (
  `itemname` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  PRIMARY KEY (`itemname`),
  CONSTRAINT `rights_ibfk_1` FOREIGN KEY (`itemname`) REFERENCES `authitem` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of rights
-- ----------------------------

-- ----------------------------
-- Table structure for `t_detail`
-- ----------------------------
DROP TABLE IF EXISTS `t_detail`;
CREATE TABLE `t_detail` (
  `resi_detail` varchar(255) NOT NULL,
  `date` datetime NOT NULL COMMENT 'tanggal-detail',
  `posisi` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_detail
-- ----------------------------

-- ----------------------------
-- Table structure for `t_menu`
-- ----------------------------
DROP TABLE IF EXISTS `t_menu`;
CREATE TABLE `t_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `label` varchar(255) NOT NULL,
  `position` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL,
  `modul` varchar(25) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_menu
-- ----------------------------
INSERT INTO `t_menu` VALUES ('1', '0', 'Home', '0', '/dss', '1', '');
INSERT INTO `t_menu` VALUES ('3', '8', 'Menu', '0', '/dss/menu/admin', '1', '');
INSERT INTO `t_menu` VALUES ('4', '0', 'Master', '0', '#', '1', '');
INSERT INTO `t_menu` VALUES ('5', '4', 'Bahan', '0', '/dss/bahan/admin', '1', '');
INSERT INTO `t_menu` VALUES ('7', '4', 'Satuan', '2', '/dss/satuan/admin', '1', '');
INSERT INTO `t_menu` VALUES ('8', '0', 'Setting', '1', '#', '1', '');
INSERT INTO `t_menu` VALUES ('10', '8', 'AnalisaPekerjaan', '0', '/dss/a1/admin', '1', '');
INSERT INTO `t_menu` VALUES ('13', '19', 'Type30', '1', '/dss/c1/', '1', '');
INSERT INTO `t_menu` VALUES ('14', '21', 'Type36', '2', '/dss/type36/', '1', '');
INSERT INTO `t_menu` VALUES ('15', '23', 'Type45', '3', '/dss/type45', '1', '');
INSERT INTO `t_menu` VALUES ('16', '25', 'Type75', '4', '/dss/type75', '0', '');
INSERT INTO `t_menu` VALUES ('17', '0', 'Rekapitulasi', '8', '/dss/rekap', '0', '');
INSERT INTO `t_menu` VALUES ('18', '8', 'User Management', '1', '/user', '0', '');
INSERT INTO `t_menu` VALUES ('19', '0', 'RAB30', '4', '#', '0', '');
INSERT INTO `t_menu` VALUES ('20', '19', 'Denah30', '0', '/dss/denah?id=c1', '0', '');
INSERT INTO `t_menu` VALUES ('21', '0', 'RAB36', '5', '#', '0', '');
INSERT INTO `t_menu` VALUES ('22', '21', 'Denah36', '0', '/dss/denah?id=type36', '0', '');
INSERT INTO `t_menu` VALUES ('23', '0', 'RAB45', '6', '#', '0', '');
INSERT INTO `t_menu` VALUES ('24', '23', 'Denah45', '0', '/dss/denah?id=type45', '0', '');
INSERT INTO `t_menu` VALUES ('25', '0', 'RAB75', '7', '#', '0', '');
INSERT INTO `t_menu` VALUES ('26', '25', 'Denah75', '0', '/dss/denah?id=type75', '0', '');
INSERT INTO `t_menu` VALUES ('27', '0', 'Tracking', '0', '#', '1', 'tracking');
INSERT INTO `t_menu` VALUES ('28', '0', 'Menu', '1', '/tracking/menu/admin', '0', 'tracking');
INSERT INTO `t_menu` VALUES ('29', '0', 'Menu', '2', '/pde/menu/admin', '0', 'pde');
INSERT INTO `t_menu` VALUES ('30', '0', 'Rekapan', '1', '/pde/rekap/index', '1', 'pde');
INSERT INTO `t_menu` VALUES ('31', '35', 'Ruangan', '3', '/pde/ruangan/index', '1', 'pde');
INSERT INTO `t_menu` VALUES ('32', '0', 'Laporan', '3', '/pde/rekap/laporan', '1', 'pde');
INSERT INTO `t_menu` VALUES ('33', '30', 'Index', '1', '/pde/rekap/index', '1', 'pde');
INSERT INTO `t_menu` VALUES ('34', '30', 'Create', '2', '/pde/rekap/create', '1', 'pde');
INSERT INTO `t_menu` VALUES ('35', '0', 'Setting', '4', '#', '1', 'pde');
INSERT INTO `t_menu` VALUES ('36', '35', 'Jenis', '1', '/pde/jenis/index', '1', 'pde');
INSERT INTO `t_menu` VALUES ('37', '0', 'Cek Resi', '2', '/tracking/default/cek', '1', 'tracking');
INSERT INTO `t_menu` VALUES ('38', '27', 'Order', '1', '/tracking/order/create', '1', 'tracking');
INSERT INTO `t_menu` VALUES ('39', '27', 'Index', '0', '/tracking/order/index', '1', 'tracking');

-- ----------------------------
-- Table structure for `t_order`
-- ----------------------------
DROP TABLE IF EXISTS `t_order`;
CREATE TABLE `t_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `no_jo` varchar(50) NOT NULL,
  `tanggal_jo` date NOT NULL,
  `service` varchar(50) NOT NULL,
  `stuffing` varchar(100) NOT NULL,
  `POL` varchar(255) NOT NULL COMMENT 'asal',
  `tujuan` varchar(255) NOT NULL,
  `pengirim` varchar(255) NOT NULL,
  `telp_pengirim` varchar(15) DEFAULT NULL,
  `penerima` varchar(255) NOT NULL,
  `telp_penerima` varchar(15) DEFAULT NULL,
  `kapal_voy` varchar(255) NOT NULL,
  `ETD` date DEFAULT NULL,
  `ETA` date DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `operator` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `resi` (`no_jo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_order
-- ----------------------------

-- ----------------------------
-- Table structure for `userjo`
-- ----------------------------
DROP TABLE IF EXISTS `userjo`;
CREATE TABLE `userjo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `nojo` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of userjo
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `activkey` varchar(128) NOT NULL DEFAULT '',
  `createtime` int(10) NOT NULL DEFAULT '0',
  `lastvisit` int(10) NOT NULL DEFAULT '0',
  `superuser` int(1) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`),
  KEY `superuser` (`superuser`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'webmaster@example.com', '9a24eff8c15a6a141ece27eb6947da0f', '1261146094', '1487740574', '1', '1');
INSERT INTO `users` VALUES ('2', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229', 'demo@example.com', '099f825543f7850cc038b90aaff39fac', '1261146096', '1487666534', '0', '1');
INSERT INTO `users` VALUES ('3', 'evo', '38cc20041eaa6e03c92c0a7d17b21b9a', 'setiam3@gmail.com', '5bdab57e688e3beecb8957063ee12681', '1487666618', '1487666942', '0', '1');

-- ----------------------------
-- Procedure structure for `sp_deletedetail`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_deletedetail`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_deletedetail`(IN `jo` varchar(255))
BEGIN
	#Routine body goes here...

SELECT t_order.no_jo into @nojo
from t_order
where t_order.id=jo;

delete FROM t_detail
WHERE t_detail.resi_detail=@nojo;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_getdetails`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_getdetails`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_getdetails`(IN `jo` varchar(255))
BEGIN
SELECT * from t_detail
WHERE t_detail.resi_detail=jo;
END
;;
DELIMITER ;

-- ----------------------------
-- Procedure structure for `sp_setstatus`
-- ----------------------------
DROP PROCEDURE IF EXISTS `sp_setstatus`;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_setstatus`(IN `nojo` varchar(255))
BEGIN
	#Routine body goes here...
SELECT 
t_detail.keterangan into @keterangan
FROM t_detail
WHERE 
t_detail.POD IN (
				SELECT
				Max(t_detail.POD) AS tgl
				FROM
				t_detail
				WHERE
				t_detail.resi_detail = nojo
			);
UPDATE t_order set t_order.`status`=@keterangan WHERE t_order.no_jo=nojo;
END
;;
DELIMITER ;
