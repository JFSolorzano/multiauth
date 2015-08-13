/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50624
Source Host           : localhost:3306
Source Database       : rabble_db

Target Server Type    : MYSQL
Target Server Version : 50624
File Encoding         : 65001

Date: 2015-08-13 10:59:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `user_type` tinyint(6) DEFAULT '1' COMMENT '0->admin,1->user ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', 'jiggy', 'Virani', 'jignesh@creolestudios.com', '$2y$10$PLDaQMBZUB/zKUVwt14xSuSqVKAEGYaWBXsZEtxq7Gy09Fgd32IEi', '2015-07-09 05:09:25', '2015-07-09 05:09:25', null, '0');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `device_token` varchar(255) DEFAULT NULL,
  `device_type` tinyint(255) DEFAULT NULL COMMENT '1->ios, 2-> android',
  `phone_number` int(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `status` tinyint(6) DEFAULT NULL COMMENT '0->active, 1->deactivate',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('7', 'Jignesh', 'Virani', 'jignesh@creolestudios.com', null, '23.0300', '72.5800', 'Newyork', 'Newyork', '78gdh76uedhj7du88du78du', '1', '236262632', '$2y$10$OFxTjvpbayNXG4zSftTmyuYb3ljCQfM9QZcrFQHsJOp1/fHxmevLi', '2015-08-04 13:32:45', '2015-08-03 06:20:59', '0fNYIKBUwbIaEZtXs0I5oJE0KrQIxwf4NLgy2iqcXYRVf0nWpGG0Rtxs248J', '1');
INSERT INTO `users` VALUES ('8', 'vishal', 'Wadhwan', 'vishal@creolestudios.com', null, null, null, null, null, 'asd345frt4356712d', '2', null, '$2y$10$gnccE4lWyQz49IXxZ0WM7O0aVyaOP/Drzl4VanIHQywGb/nOIkkk6', '2015-08-03 10:26:37', '2015-08-03 06:45:25', '7lKRaRAxFZUMay13rujdURnznPkNq6O2Fap4XXDxO6JSAXtCyv2czhSa9gyv', '1');
INSERT INTO `users` VALUES ('9', 'lalit', 'doen', 'lalit@creolestudios.com', null, null, null, null, null, null, null, null, '$2y$10$CXEPsKckpsAp4BQJSUUxK.65Kgia/U9uef2DjPF5Jlb70aMkUfcra', '2015-08-03 06:45:48', '2015-08-03 06:45:48', null, '1');
INSERT INTO `users` VALUES ('10', 'hetal', 'johanson', 'hetal@creolestudios.com', null, null, null, null, null, null, null, null, '$2y$10$wZSi8spUfHgMJ1koRZQOn.RVSO/t9PrLwIRCPg.UD0x3zoltHZtw6', '2015-08-03 09:43:45', '2015-08-03 06:46:30', 'f1RtOaWN4YnpZtMzFsfTwb5X7cEZajNJVk6JxEDWNwVfRoAQhYDouBuYBiQX', '1');
INSERT INTO `users` VALUES ('11', 'Johan', 'Doe', 'johan@creolestudios.com', null, null, null, null, null, null, null, null, '$2y$10$DWDxLhygqXYJ9l5nLLI1peTCrlYEzBqWDIpNPeTEElDVWJWNF9pKO', '2015-08-03 09:41:29', '2015-08-03 09:41:29', null, '1');
INSERT INTO `users` VALUES ('12', 'sdsd', 'sdsdsds', 'vissdshal@creolestudios.com', null, null, null, null, null, null, null, null, '$2y$10$CxzeKsEipmnU3O2nNE7W/.BooAZQrtQrQqZDUxC8EWWBBYdq0r6IK', '2015-08-03 09:44:48', '2015-08-03 09:44:48', null, '1');
INSERT INTO `users` VALUES ('13', 'joha', 'Walter', 'johny@creolestudios.com', null, null, null, null, null, null, null, null, '$2y$10$/Fr7eYw62tpJ3yrq2Nu/bO1/2RkGrq7tOgyYDYvnmK4N7rcoBG2hW', '2015-08-04 13:32:28', '2015-08-04 13:32:28', null, '1');
