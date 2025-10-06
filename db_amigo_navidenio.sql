/*
 Navicat Premium Data Transfer

 Source Server         : Local
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:3306
 Source Schema         : db_amigo_navidenio

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 21/10/2022 22:19:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for amigo_navidenio
-- ----------------------------
DROP TABLE IF EXISTS `amigo_navidenio`;
CREATE TABLE `amigo_navidenio`  (
  `id_persona` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_persona` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `grupo_familiar` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `asignado` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '0',
  `realizo_sorteo` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT '0',
  `repetir_id_persona` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fecha_sorteo` datetime(0) NULL DEFAULT NULL,
  `fecha_asignado` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id_persona`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of amigo_navidenio
-- ----------------------------
INSERT INTO `amigo_navidenio` VALUES (1, 'Laura Quintero', '1', '0', '0', '18', NULL, NULL);
INSERT INTO `amigo_navidenio` VALUES (2, 'Juan Quintero', '1', '1', '0', '11', NULL, NULL);
INSERT INTO `amigo_navidenio` VALUES (3, 'Diego Quintero', '1', '0', '0', '16', NULL, NULL);
INSERT INTO `amigo_navidenio` VALUES (4, 'Rosa Buitrago', '1', '0', '1', '15', NULL, NULL);
INSERT INTO `amigo_navidenio` VALUES (5, 'Nicole Arevalo', '2', '0', '0', '9', NULL, NULL);
INSERT INTO `amigo_navidenio` VALUES (6, 'Cristian Hortua', '7', '0', '0', '', NULL, NULL);
INSERT INTO `amigo_navidenio` VALUES (7, 'Sandra Buitrago', '3', '0', '0', '5', NULL, NULL);
INSERT INTO `amigo_navidenio` VALUES (8, 'Emilio Buitrago', '3', '0', '0', '17', NULL, NULL);
INSERT INTO `amigo_navidenio` VALUES (9, 'Sara Buitrago', '3', '0', '0', '3', NULL, NULL);
INSERT INTO `amigo_navidenio` VALUES (10, 'Luciana Buitrago', '3', '0', '0', '', NULL, NULL);
INSERT INTO `amigo_navidenio` VALUES (11, 'Ana Corredor', '4', '0', '0', '4', NULL, NULL);
INSERT INTO `amigo_navidenio` VALUES (12, 'Jose Buitrago', '4', '0', '0', '1', NULL, NULL);
INSERT INTO `amigo_navidenio` VALUES (13, 'Luis Gomez', '5', '0', '0', '', NULL, NULL);
INSERT INTO `amigo_navidenio` VALUES (14, 'Rosa Corredor', '5', '0', '0', '', NULL, NULL);
INSERT INTO `amigo_navidenio` VALUES (15, 'Antonio Buitrago', '6', '0', '0', '9', NULL, NULL);
INSERT INTO `amigo_navidenio` VALUES (16, 'Sandra Rubio', '6', '0', '0', '8', NULL, NULL);
INSERT INTO `amigo_navidenio` VALUES (17, 'Danna Buitrago', '6', '0', '0', '2', NULL, NULL);
INSERT INTO `amigo_navidenio` VALUES (18, 'Cristian Buitrago', '6', '0', '0', '12', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
