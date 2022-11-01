/*
 Navicat Premium Data Transfer

 Source Server         : ParserTestTask
 Source Server Type    : MySQL
 Source Server Version : 100420
 Source Host           : localhost:3306
 Source Schema         : xmlparser

 Target Server Type    : MySQL
 Target Server Version : 100420
 File Encoding         : 65001

 Date: 01/11/2022 20:08:06
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for data
-- ----------------------------
DROP TABLE IF EXISTS `data`;
CREATE TABLE `data`  (
  `id` int NOT NULL,
  `mark` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `model` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `generation` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `year` int NOT NULL,
  `run` int NOT NULL,
  `color` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `bodyType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `engineType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `transmission` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `genId` int NULL DEFAULT NULL,
  `gearType` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of data
-- ----------------------------

SET FOREIGN_KEY_CHECKS = 1;
