/*
 Navicat Premium Dump SQL

 Source Server         : mysql57
 Source Server Type    : MySQL
 Source Server Version : 50716 (5.7.16-log)
 Source Host           : localhost:3306
 Source Schema         : web_ci

 Target Server Type    : MySQL
 Target Server Version : 50716 (5.7.16-log)
 File Encoding         : 65001

 Date: 03/06/2025 17:38:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pembayaran_jenis
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran_jenis`;
CREATE TABLE `pembayaran_jenis`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `nominal` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembayaran_jenis
-- ----------------------------
INSERT INTO `pembayaran_jenis` VALUES (1, 'SPP', 50000);

-- ----------------------------
-- Table structure for pembayaran_peserta
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran_peserta`;
CREATE TABLE `pembayaran_peserta`  (
  `kode` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `jenis_kelamin` enum('L','P') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `notelp` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kode`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembayaran_peserta
-- ----------------------------

-- ----------------------------
-- Table structure for pembayaran_transaksi_detil
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran_transaksi_detil`;
CREATE TABLE `pembayaran_transaksi_detil`  (
  `notransaksi` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `qty` int(11) NULL DEFAULT NULL,
  `nominal` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`notransaksi`, `jenis_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembayaran_transaksi_detil
-- ----------------------------

-- ----------------------------
-- Table structure for pembayaran_transaksi_master
-- ----------------------------
DROP TABLE IF EXISTS `pembayaran_transaksi_master`;
CREATE TABLE `pembayaran_transaksi_master`  (
  `notransaksi` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `peserta_kode` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `tanggal` date NULL DEFAULT NULL,
  PRIMARY KEY (`notransaksi`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembayaran_transaksi_master
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_user
-- ----------------------------
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE `tbl_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `pswd` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `akses` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `kelas` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_user
-- ----------------------------
INSERT INTO `tbl_user` VALUES (1, 'prodi@gmail.com', 'prodi', 'prodi', '-');
INSERT INTO `tbl_user` VALUES (2, 'arik@gmail.com', 'dosen', 'dosen', 'A');
INSERT INTO `tbl_user` VALUES (3, 'risty@gmail.com', 'risty', 'dosen', 'B');
INSERT INTO `tbl_user` VALUES (4, 'arie@gmail.com', 'arie', 'dosen', 'C');
INSERT INTO `tbl_user` VALUES (5, 'ani@gmail.com', 'ani', 'mahasiswa', 'A');
INSERT INTO `tbl_user` VALUES (6, 'budi@gmail.com', 'budi', 'mahasiswa', 'B');

SET FOREIGN_KEY_CHECKS = 1;
