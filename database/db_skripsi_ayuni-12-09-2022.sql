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

 Date: 12/09/2022 20:48:00
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
  `jabatan` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bagian` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `level` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `foto_anggota` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `nrp`) USING BTREE,
  UNIQUE INDEX `nrp`(`nrp` ASC, `nama_anggota` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_m_anggota
-- ----------------------------
INSERT INTO `tbl_m_anggota` VALUES (1, '12345', 'Ayuni wulan sari', 'kp jati', '0000-00-00', 'tangerang', 'P', '087883778059', 'ayuni.wulansari06@gmail.com', 'KASUB', 'QC', 'admin', NULL);
INSERT INTO `tbl_m_anggota` VALUES (2, '23456', 'Gyta Fitri', 'kp jati', '0000-00-00', 'tangerang', 'P', '087678909887', 'gytafitri@gmail.com', 'KARU', 'Pembentukan', 'ketua', NULL);
INSERT INTO `tbl_m_anggota` VALUES (3, '11111', 'Dedy Alamsyah', 'jl a', '0000-00-00', 'tangerang', 'L', '2325232', 'dedy@gmail.com', 'ADMIN', 'IT', 'admin', NULL);
INSERT INTO `tbl_m_anggota` VALUES (4, '22222', 'Wafa', 'jl x', '0000-00-00', 'tangerang', 'P', '3463534', 'wafasa@gmail.com', 'OPERATOR', 'IT', 'anggota', NULL);
INSERT INTO `tbl_m_anggota` VALUES (10, '33333', 'Aiman Hakim', 'Jl Nusantara 2', '2022-09-12', 'Tangerang', 'L', '353535', 'aiman@gmail.com', '004', 'J003', 'anggota', NULL);
INSERT INTO `tbl_m_anggota` VALUES (11, '44444', 'Ghaida', 'Jl Kesehatan', '2022-08-30', 'Tangerang', 'P', '0875675675', 'ghaida@gmail.com', '003', 'J002', 'anggota', NULL);
INSERT INTO `tbl_m_anggota` VALUES (12, '55555', 'Boby', 'Jl ada fotonya', '2022-09-07', 'Tangerang', 'L', '77657657', 'boby@gmail.com', '002', 'J004', 'anggota', '55555-Foto.png');
INSERT INTO `tbl_m_anggota` VALUES (14, '666666', 'Deni Plate', 'Jl XYZ', '2022-09-06', 'Tangerang', 'L', '868678', 'deni@gmail.com', '003', 'J003', 'anggota', '666666-Foto.png');

-- ----------------------------
-- Table structure for tbl_m_bagian
-- ----------------------------
DROP TABLE IF EXISTS `tbl_m_bagian`;
CREATE TABLE `tbl_m_bagian`  (
  `id` int NOT NULL,
  `kode_bagian` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_bagian` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk_bagian_anggota`(`nama_bagian` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_m_bagian
-- ----------------------------
INSERT INTO `tbl_m_bagian` VALUES (1, 'J001', 'Pembentukan');
INSERT INTO `tbl_m_bagian` VALUES (2, 'J002', 'Glasir');
INSERT INTO `tbl_m_bagian` VALUES (3, 'J003', 'Dekorasi');
INSERT INTO `tbl_m_bagian` VALUES (4, 'J004', 'QC');

-- ----------------------------
-- Table structure for tbl_m_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_m_jabatan`;
CREATE TABLE `tbl_m_jabatan`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_jabatan` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_jabatan` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `kode`(`kode_jabatan` ASC) USING BTREE,
  INDEX `nama_jabatan`(`nama_jabatan` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_m_jabatan
-- ----------------------------
INSERT INTO `tbl_m_jabatan` VALUES (1, '001', 'KASUB');
INSERT INTO `tbl_m_jabatan` VALUES (2, '002', 'KARU');
INSERT INTO `tbl_m_jabatan` VALUES (3, '003', 'ADMIN');
INSERT INTO `tbl_m_jabatan` VALUES (4, '004', 'OPERATOR');

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
  PRIMARY KEY (`id`, `nrp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_tr_angsuran
-- ----------------------------

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
  PRIMARY KEY (`id`, `nrp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_tr_pinjaman
-- ----------------------------
INSERT INTO `tbl_tr_pinjaman` VALUES (1, 'TRP-2022912001', '2022-09-12', '23456', 1000000, 12, 'Untuk beli motor', 'dedy', 'Diajukan', 'Belum Pembayaran');

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
  PRIMARY KEY (`id`, `nrp`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_tr_simpanan
-- ----------------------------

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
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, '22222', 'wafa', 'wafasa@gmail.com', '$2y$10$x6UaER5HLsqPaiPMWk1NreM.0atk39HahcBvT.1hDHs2JNHh9XELG', 'anggota', 'enabled', NULL, NULL);
INSERT INTO `users` VALUES (2, '12345', 'ayuni wulan sari', 'ayuni.wulansari06@gmail.com', '$2y$10$fHhn0QwpO/4zELINikC75OeKKSpzJlzP1gYMutGcLRFN5iG1clmoK', 'admin', 'enabled', '2022-08-28 04:00:19', '2022-08-28 04:00:19');
INSERT INTO `users` VALUES (3, '23456', 'gytafitri', 'gytafitri@gmail.com', '$2y$10$fHhn0QwpO/4zELINikC75OeKKSpzJlzP1gYMutGcLRFN5iG1clmoK', 'ketua', 'enabled', NULL, NULL);
INSERT INTO `users` VALUES (4, '11111', 'dedy', 'dedy@gmail.com', '$2y$10$x6UaER5HLsqPaiPMWk1NreM.0atk39HahcBvT.1hDHs2JNHh9XELG', 'admin', 'enabled', NULL, NULL);
INSERT INTO `users` VALUES (5, '33333', 'Aiman Hakim', 'aiman@gmail.com', '$2y$10$XwBLdKHiYDTChSe5muBrcOEl27A39.adO1OAdJuM5JQblFZV3hJUy', 'anggota', 'disabled', '2022-09-12 08:03:40', '2022-09-12 08:03:40');
INSERT INTO `users` VALUES (6, '55555', 'Boby', 'boby@gmail.com', '$2y$10$64rngN8h9OE74xtt5.7MfOjilLOBq4LEsVnbdJkE2GuLCyfMPSzXq', 'anggota', 'disabled', '2022-09-12 13:29:43', '2022-09-12 13:29:43');

-- ----------------------------
-- Table structure for users_anggota
-- ----------------------------
DROP TABLE IF EXISTS `users_anggota`;
CREATE TABLE `users_anggota`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `nrp` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nama_anggota` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `alamat_anggota` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tgl_lahir` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tempat_lahir` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jenis_kelamin` enum('perempuan','laki-laki') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `no_telepon` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `jabatan` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `bagian` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `level` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `status` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `created_at` datetime NULL DEFAULT NULL,
  `updated_at` datetime NULL DEFAULT NULL,
  PRIMARY KEY (`nrp`) USING BTREE,
  INDEX `nrp`(`nrp` ASC, `nama_anggota` ASC) USING BTREE,
  INDEX `nama_anggota`(`nama_anggota` ASC) USING BTREE,
  INDEX `id`(`id` ASC) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users_anggota
-- ----------------------------
INSERT INTO `users_anggota` VALUES (3, '11111', 'dedy', 'jl 1', '', 'tangerang', 'laki-laki', '35345345', 'dedy@gmail.com', 'staff', 'IT', 'admin', 'enabled', '$2y$10$x6UaER5HLsqPaiPMWk1NreM.0atk39HahcBvT.1hDHs2JNHh9XELG', NULL, NULL);
INSERT INTO `users_anggota` VALUES (1, '12345', 'Ayuni wulan sari', 'kp jati', '28 juni 1999', 'tangerang', 'perempuan', '087883778059', 'ayuni.wulansari06@gmail.com', 'manager', 'QC', 'anggota', 'enabled', '$2y$10$x6UaER5HLsqPaiPMWk1NreM.0atk39HahcBvT.1hDHs2JNHh9XELG', NULL, NULL);
INSERT INTO `users_anggota` VALUES (4, '22222', 'Wafa', 'Jl 2', 'dfdffd', 'tangerang', 'perempuan', '35353', 'wafasa@gmail.com', 'staff', 'IT', 'anggota', 'enabled', '$2y$10$x6UaER5HLsqPaiPMWk1NreM.0atk39HahcBvT.1hDHs2JNHh9XELG', NULL, NULL);
INSERT INTO `users_anggota` VALUES (2, '23456', 'Gyta Fitri', 'kp jati', '5 Januari', 'tangerang', 'perempuan', '087678909887', 'gytafitri@gmail.com', 'spv', 'Pembentukan', 'ketua', 'enabled', '$2y$10$x6UaER5HLsqPaiPMWk1NreM.0atk39HahcBvT.1hDHs2JNHh9XELG', NULL, NULL);

SET FOREIGN_KEY_CHECKS = 1;
