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

 Date: 09/19/2012 21:13:49 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `academics`
-- ----------------------------
DROP TABLE IF EXISTS `academics`;
CREATE TABLE `academics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `academic_num` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `academics`
-- ----------------------------
BEGIN;
INSERT INTO `academics` VALUES ('1', '99'), ('2', '100'), ('3', '101');
COMMIT;

-- ----------------------------
--  Table structure for `course_times`
-- ----------------------------
DROP TABLE IF EXISTS `course_times`;
CREATE TABLE `course_times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `weekday` tinyint(4) NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `courses`
-- ----------------------------
DROP TABLE IF EXISTS `courses`;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `academic_id` int(11) NOT NULL DEFAULT '2',
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `courses`
-- ----------------------------
BEGIN;
INSERT INTO `courses` VALUES ('1', '22', '1', 'Hermeneutics'), ('2', '25', '1', 'Bible Survey'), ('3', '24', '1', 'World Missions'), ('4', '23', '1', 'Apostolic Doctrine II-The New Birth');
COMMIT;

-- ----------------------------
--  Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `roles`
-- ----------------------------
BEGIN;
INSERT INTO `roles` VALUES ('1', 'admin'), ('2', 'teacher'), ('3', 'student'), ('99', 'super_admin');
COMMIT;

-- ----------------------------
--  Table structure for `rosters`
-- ----------------------------
DROP TABLE IF EXISTS `rosters`;
CREATE TABLE `rosters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `scores`
-- ----------------------------
DROP TABLE IF EXISTS `scores`;
CREATE TABLE `scores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `score` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT '3',
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `enname` varchar(100) NOT NULL,
  `twname` varchar(25) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `users`
-- ----------------------------
BEGIN;
INSERT INTO `users` VALUES ('1', '99', 'admin@ccmos.tw', '6e23a72078a411cd1c46dca3da33702436082d02', 'MOS CHEN', '管理員', '1'), ('21', '3', 'alisha.upc@gmail.com', '757383005bfa5e108be2b199a9adcbd39143d4b1', 'Alisha Jiang', '', '0'), ('22', '2', 'pray4taiwan@yahoo.com', '757383005bfa5e108be2b199a9adcbd39143d4b1', 'Chris Bracken', '', '0'), ('23', '2', 'ceagogo@gmail.com', '625ab5de98211498b0e5ae88439b749130a6f42e', 'David Chang', '', '0'), ('24', '2', 'ischingli@gmail.com', '625ab5de98211498b0e5ae88439b749130a6f42e', 'Chingli Li', '', '0'), ('25', '2', '3a178380@gmail.com', '625ab5de98211498b0e5ae88439b749130a6f42e', 'Chinbiao Jan', '', '0');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
