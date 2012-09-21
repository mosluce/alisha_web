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

 Date: 09/22/2012 03:28:03 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `courses`
-- ----------------------------
DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `academic_id` int(11) NOT NULL DEFAULT '2',
  `name` varchar(100) NOT NULL,
  `name_tw` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `courses`
-- ----------------------------
BEGIN;
INSERT INTO `courses` VALUES ('1', '22', '1', 'Hermeneutics', ''), ('2', '25', '1', 'Bible Survey', ''), ('3', '24', '1', 'World Missions', ''), ('4', '23', '1', 'Apostolic Doctrine II-The New Birth', '');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
