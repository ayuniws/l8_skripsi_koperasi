/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : db_skripsi_ayuni

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 20/09/2022 10:16:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` VALUES (2, '2022_08_21_081931_create_siswa_models_table', 1);

-- ----------------------------
-- Table structure for personal_access_tokens
-- ----------------------------
DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE `personal_access_tokens`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `personal_access_tokens_token_unique`(`token` ASC) USING BTREE,
  INDEX `personal_access_tokens_tokenable_type_tokenable_id_index`(`tokenable_type` ASC, `tokenable_id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of personal_access_tokens
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_laporan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_laporan`;
CREATE TABLE `tbl_laporan`  (
  `no` int NOT NULL AUTO_INCREMENT,
  `id` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_bagian` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nrp` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_anggota` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jenis_transaksi` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `debet` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `kredit` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `saldo` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`no`, `nrp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_laporan
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_m_anggota
-- ----------------------------
DROP TABLE IF EXISTS `tbl_m_anggota`;
CREATE TABLE `tbl_m_anggota`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nrp` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_anggota` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `alamat_anggota` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jenis_kelamin` enum('P','L') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `no_telepon` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jabatan` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bagian` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `level` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `foto_anggota` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `no_rekening` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `nrp`) USING BTREE,
  UNIQUE INDEX `nrp`(`nrp` ASC, `nama_anggota` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 22 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_m_anggota
-- ----------------------------
INSERT INTO `tbl_m_anggota` VALUES (18, '99999', 'Aiman Hakim', 'Jl. Pisangan 10 Ciputat Tangerang Selatan', '2022-09-08', 'Tangerang', 'L', '09853453', 'aiman@gmail.com', 'OPERATOR', 'Dekorasi', 'anggota', '99999-Foto.jpg', 'BRI-001-23423423');
INSERT INTO `tbl_m_anggota` VALUES (19, '11111', 'Dedy Alamsyah', 'tes aja', '2022-09-16', 'Tangerang', 'L', '646456456', 'alamsyahdedy@gmail.com', 'KASUB', 'QC', 'admin', '11111-Foto.png', 'BNI-004-657675');
INSERT INTO `tbl_m_anggota` VALUES (20, '22222', 'Ayuni Wulansari', 'Jl. Kemuning Desa Makmur Selalu', '2022-08-30', 'Jakarta', 'P', '093353', 'ayuni@gmail.com', 'ADMIN', 'QC', 'ketua', '22222-Foto.png', 'BSI-444-4564');
INSERT INTO `tbl_m_anggota` VALUES (21, '33333', 'Wafa Salimah', 'Jl. Tanah Kusir', '2022-09-09', 'Tangerang', 'P', '03453453', 'wafasa@gmail.com', 'OPERATOR', 'Glasir', 'anggota', '33333-Foto.png', 'BCA-090-345345');

-- ----------------------------
-- Table structure for tbl_m_bagian
-- ----------------------------
DROP TABLE IF EXISTS `tbl_m_bagian`;
CREATE TABLE `tbl_m_bagian`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_bagian` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_bagian_anggota`(`nama_bagian` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_m_bagian
-- ----------------------------
INSERT INTO `tbl_m_bagian` VALUES (1, 'Dekorasi');
INSERT INTO `tbl_m_bagian` VALUES (2, 'Glasir');
INSERT INTO `tbl_m_bagian` VALUES (3, 'Pembentukan');
INSERT INTO `tbl_m_bagian` VALUES (4, 'QC');

-- ----------------------------
-- Table structure for tbl_m_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_m_jabatan`;
CREATE TABLE `tbl_m_jabatan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `nama_jabatan`(`nama_jabatan` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_m_jabatan
-- ----------------------------
INSERT INTO `tbl_m_jabatan` VALUES (1, 'ADMIN');
INSERT INTO `tbl_m_jabatan` VALUES (2, 'KARU');
INSERT INTO `tbl_m_jabatan` VALUES (3, 'KASUB');
INSERT INTO `tbl_m_jabatan` VALUES (4, 'OPERATOR');

-- ----------------------------
-- Table structure for tbl_m_siswa
-- ----------------------------
DROP TABLE IF EXISTS `tbl_m_siswa`;
CREATE TABLE `tbl_m_siswa`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `NIS` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `NamaSiswa` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alamat` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_m_siswa
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_tr_angsuran
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tr_angsuran`;
CREATE TABLE `tbl_tr_angsuran`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `no` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nrp` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `jumlah` double(10, 0) NOT NULL,
  `angsuran_ke` tinyint NOT NULL,
  `keterangan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `nrp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_tr_angsuran
-- ----------------------------
INSERT INTO `tbl_tr_angsuran` VALUES (1, 'TRA-2022917001', '99999', '2022-09-16', 500000, 1, 'Angsuran pertama', 'Dedy Alamsyah', '2022-09-17 02:57:51', '2022-09-17 02:57:51');

-- ----------------------------
-- Table structure for tbl_tr_pinjaman
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tr_pinjaman`;
CREATE TABLE `tbl_tr_pinjaman`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `no` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `nrp` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jumlah` double(10, 0) NOT NULL,
  `angsuran` int NOT NULL,
  `keterangan` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status_pengajuan` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status_pinjaman` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `nrp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_tr_pinjaman
-- ----------------------------
INSERT INTO `tbl_tr_pinjaman` VALUES (1, 'TRP-2022917001', '2022-09-17', '99999', 10000000, 12, 'Beli motor', 'Aiman Hakim', 'Diterima', 'Pembayaran', '2022-09-17 02:30:00', '2022-09-17 02:30:00');
INSERT INTO `tbl_tr_pinjaman` VALUES (6, 'TRP-2022917006', '2022-09-17', '33333', 10000000, 12, 'Untuk modal usaha', 'Wafa Salimah', 'Diajukan', 'Belum Pembayaran', '2022-09-17 14:23:48', '2022-09-17 14:23:48');

-- ----------------------------
-- Table structure for tbl_tr_simpanan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_tr_simpanan`;
CREATE TABLE `tbl_tr_simpanan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `no` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `nrp` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jumlah` double(10, 0) NOT NULL,
  `keterangan` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `nrp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_tr_simpanan
-- ----------------------------
INSERT INTO `tbl_tr_simpanan` VALUES (1, 'TRS-2022917001', '2022-09-17', '99999', 100000, 'Simpanan Wajib', 'Dedy Alamsyah', '2022-09-17 03:27:10', '2022-09-17 03:27:10');
INSERT INTO `tbl_tr_simpanan` VALUES (2, 'TRS-2022917002', '2022-08-01', '99999', 100000, 'Simpanan wajib', 'Dedy Alamsyah', '2022-09-17 03:39:04', '2022-09-17 03:39:04');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `nrp` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `level` varchar(12) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `nrp_unik`(`nrp` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (9, '99999', 'Aiman Hakim', 'aiman@gmail.com', '$2y$10$TA1h7B0l6cMYxxLz7SRNz.n5NI8L.OBBJJVENeW3W.kal3hkyQJpy', 'anggota', 'enabled', '2022-09-16 15:41:57', '2022-09-17 02:02:40');
INSERT INTO `users` VALUES (10, '11111', 'Dedy Alamsyah', 'alamsyahdedy@gmail.com', '$2y$10$1w1jnuD9J5wJYfMr8TeY1.axQgOczX38BrBqonqPjDgFCvcUVydJ2', 'admin', 'enabled', '2022-09-16 18:59:01', '2022-09-17 03:26:42');
INSERT INTO `users` VALUES (11, '22222', 'Ayuni Wulansari', 'ayuni@gmail.com', '$2y$10$n6Qsj4xTzsoOud4ivcevV.5L0Pnenq5S6ElRbo.h9S2mz5oHEXzMW', 'ketua', 'enabled', '2022-09-17 03:12:54', '2022-09-17 03:12:54');
INSERT INTO `users` VALUES (12, '33333', 'Wafa Salimah', 'wafasa@gmail.com', '$2y$10$gN17vSaTl3gQ02krSRBMIeCKkLYXyBW4ETtSjFZuMyOT26of7t7zS', 'anggota', 'enabled', '2022-09-17 14:16:47', '2022-09-17 14:16:47');

SET FOREIGN_KEY_CHECKS = 1;
