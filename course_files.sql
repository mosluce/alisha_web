/*
 Navicat Premium Data Transfer

 Source Server         : root
 Source Server Type    : MySQL
 Source Server Version : 50525
 Source Host           : localhost
 Source Database       : alisha

 Target Server Type    : MySQL
 Target Server Version : 50525
 File Encoding         : utf-8

 Date: 09/22/2012 03:09:37 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `course_files`
-- ----------------------------
DROP TABLE IF EXISTS `course_files`;
CREATE TABLE `course_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `filepath` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `filetype` varchar(255) NOT NULL DEFAULT 'application/octet-stream',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `course_files`
-- ----------------------------
BEGIN;
INSERT INTO `course_files` VALUES ('1', '0', 'mika_nakashima_glamorous_sky (2).gp5', '/Users/mosluce/Documents/Workspace/alisha_web/uploads/1_1348252622.gp5', '', 'application/octet-stream'), ('4', '1', 'GOGOBAR表演說明.txt', '/Users/mosluce/Documents/Workspace/alisha_web/uploads/1_1348253413.txt', '測試上傳', 'application/octet-stream'), ('5', '1', 'one_ok_rock_wherever_you_are.gp5', '/Users/mosluce/Documents/Workspace/alisha_web/uploads/1_1348253885.gp5', '', 'application/octet-stream'), ('6', '1', 'cakephp-cakephp-2.2.1-0-gcc44130.zip', '/Users/mosluce/Documents/Workspace/alisha_web/uploads/1_1348254265.zip', '測試檔案', 'application/zip'), ('7', '1', '276563_199275260120556_2993313_n.jpeg', '/Users/mosluce/Documents/Workspace/alisha_web/uploads/1_1348254543.jpeg', '', 'image/jpeg');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
