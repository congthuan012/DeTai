/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : detai

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 09/02/2022 22:53:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for admins
-- ----------------------------
DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `username` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status` int(11) NULL DEFAULT 0,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admins
-- ----------------------------
INSERT INTO `admins` VALUES (1, 'Thuần', 'admin', '$2y$10$uf/weIreWq6YsZ4Tg8UsQuAoayNBjT0rHco9UrpToOugghOD7yKgK', 'assets/img/admins-image/2021-12-26-10-250685596_1123133198093027_589603404956851689_n.jpg', 1, '2021-12-21 09:01:26', '2021-12-26 10:32:57', NULL);

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_by` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO `categories` VALUES (1, 'Danh mục sản phẩm 1', 'assets/img/categories-image/2021-12-26-10-6bbbbfe9062c2670a259eeb4578c6723.jpg', 'Mô tả danh mục 1', 1, '2021-12-20 08:13:46', 1, '2021-12-26 10:42:40', NULL);
INSERT INTO `categories` VALUES (2, 'Danh mục sản phẩm 2', 'assets/img/categories-image/2021-12-26-10-tree-icon-vector-260nw-1033770079.jpg', 'Mô tả danh mục 2', 2, '2021-12-20 08:13:46', 1, '2021-12-26 10:43:12', NULL);

-- ----------------------------
-- Table structure for guests
-- ----------------------------
DROP TABLE IF EXISTS `guests`;
CREATE TABLE `guests`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `status` int(11) NULL DEFAULT 0,
  `avatar` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NOT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of guests
-- ----------------------------
INSERT INTO `guests` VALUES (1, 'Thuần đây nhưng đang là khách', 'guest_thuan', '$2y$10$IF8gLDOR8O79Dc5/94pJqOP6xUszJ9okPDnrCz9cFw22.9BbCHPWS', '123 Huỳnh Thúc Kháng, Q.1, Tp. Hồ Chí Minh', 1, 'admin/assets/img/guests-image/2022-01-22-15-2021-12-26-10-download.png', '2021-12-24 12:50:59', '2021-12-24 13:42:39', NULL);
INSERT INTO `guests` VALUES (2, 'Huỳnh Công Thuần', 'guest_hcthuandev', '$2y$10$pznkYBxbwdcIuabOZdcj8uVPuTVuhaHSjn2jYUfuwhhsc7gwhevKO', '123213213', 1, 'admin/assets/img/guests-image/2022-01-22-15-2021-12-26-10-download.png', '2021-12-24 13:27:53', '2022-01-22 15:04:08', NULL);
INSERT INTO `guests` VALUES (3, NULL, 'guest_thuan2', '$2y$10$dB73t71842C00eaLMcMkyusULJarH6Vqwu2dXPCz/K.B8m90hlHa.', NULL, 0, NULL, '2022-02-09 15:50:28', NULL, NULL);
INSERT INTO `guests` VALUES (4, NULL, 'guest_thuan3', '$2y$10$WrRBsSf2tB.Gr1Kieo3EDeHgNBsQ9P8PA7UC6FvDdInMgSt7DRq8.', NULL, 0, NULL, '2022-02-09 15:51:14', NULL, NULL);

-- ----------------------------
-- Table structure for order_detail
-- ----------------------------
DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail`  (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` bigint(20) NOT NULL,
  `sale` bigint(20) NOT NULL DEFAULT 0,
  PRIMARY KEY (`order_id`, `product_id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_detail
-- ----------------------------
INSERT INTO `order_detail` VALUES (1, 1, 9, 1000000, 0);
INSERT INTO `order_detail` VALUES (1, 2, 11, 100000, 0);
INSERT INTO `order_detail` VALUES (2, 1, 3, 1000000, 0);

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `guest_id` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `admin_id` int(11) NULL DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('Deny','Pending','Approve','Shipping','Receiving','Complete') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp(0) NOT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_german2_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES (1, 1, 10100000, NULL, '123 Huỳnh Thúc Kháng', 'Pending', '2021-12-26 08:55:53', NULL, NULL);
INSERT INTO `orders` VALUES (2, 1, 3000000, 1, '123 Nguyễn Văn Cừ', 'Complete', '2021-12-14 08:55:53', NULL, NULL);

-- ----------------------------
-- Table structure for producers
-- ----------------------------
DROP TABLE IF EXISTS `producers`;
CREATE TABLE `producers`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of producers
-- ----------------------------
INSERT INTO `producers` VALUES (1, 'Nhà sản xuất 1', NULL, NULL, 1, '2021-12-15 07:21:59', NULL, NULL, NULL);
INSERT INTO `producers` VALUES (2, 'Nhà sản xuất 2', NULL, NULL, 1, '2021-12-15 07:22:05', NULL, NULL, NULL);

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` char(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `producer_id` int(11) NULL DEFAULT NULL,
  `price` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `category_id` int(11) NULL DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_by` int(11) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of products
-- ----------------------------
INSERT INTO `products` VALUES (1, 'Sản Phẩm 1', 'assets/img/products-image/2021-12-26-10-photo-1505740420928-5e560c06d30e.jpeg', 'Mô tả sản phẩm 1', 1, 10000000, 1, 0, '2021-12-14 22:14:00', 1, '2021-12-26 10:41:07', NULL);
INSERT INTO `products` VALUES (2, 'Sản phẩm 2', 'assets/img/products-image/2021-12-26-10-download.png', 'Mô tả 2', 2, 20000000, 2, 0, '2021-12-14 22:24:49', 1, '2021-12-26 10:41:14', NULL);

SET FOREIGN_KEY_CHECKS = 1;
