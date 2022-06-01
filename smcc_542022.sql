/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : smcc

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 04/05/2022 22:28:27
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for alumni_profile
-- ----------------------------
DROP TABLE IF EXISTS `alumni_profile`;
CREATE TABLE `alumni_profile`  (
  `alumni_id` int(11) NOT NULL AUTO_INCREMENT,
  `so_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `fname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `ext` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `mobile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `birthdate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `gender` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `inserted_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`alumni_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of alumni_profile
-- ----------------------------
INSERT INTO `alumni_profile` VALUES (1, NULL, 'Admin', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '03/27/2022 10:16:22');
INSERT INTO `alumni_profile` VALUES (2, 'SMCC-011', 'Biancas', 'Martinez', 'Manalo', '', 'Tiny', '0909-278-7972', 'nutter@gmail.com', 'ssdada', 'cvcvc', '2022-05-16', 'Male', '03/27/2022 10:16:22');
INSERT INTO `alumni_profile` VALUES (5, 'yyyyyy', 'Rodrigo', 'Roa', 'Duterte', '', 'hghg', '0909-278-7972', 'duterte4ever09@gmail.com', 'President', 'Philippines', '2022-03-27', 'Male', '03/27/2022 10:16:22');
INSERT INTO `alumni_profile` VALUES (6, 'kkuERYU', 'Joseph', 'USA', 'Biden', '', 'Washington,USA', '0909-278-7972', 'biden45@gmail.com', 'President', 'USA', '2022-03-27', 'Male', '03/27/2022 10:20:13');
INSERT INTO `alumni_profile` VALUES (7, 'Bunoliii', 'Volodymyr', 'Ukraine', 'Zelensky', '', 'rysKiev, Ukraine', '0909-278-7972', 'zelensky44@gmail.com', 'President', 'Ukraine', '2022-03-27', 'Male', '03/27/2022 10:27:54');
INSERT INTO `alumni_profile` VALUES (8, 'Loiyuu', 'Vladimir', 'Vladimirovich', 'Putin', '', 'Moscow, Russia', '0909-278-7972', 'putin24@gmail.com', 'President', 'Federal Republic of Russia', '2022-03-27', 'Male', '03/27/2022 10:35:09');
INSERT INTO `alumni_profile` VALUES (9, 'DoraTheExplorer', 'Dora', 'The', 'Explorer', '', 'Mexico City, Mexico', '0909-278-7972', 'wizanrye23@gmail.com', 'Admin', 'Mexico', '2022-03-27', 'Female', '03/27/2022 10:47:58');
INSERT INTO `alumni_profile` VALUES (10, 'qween', 'Jovanie', '', 'Makiling', '', 'Nasipit, Agusan del Norte', '0945-487-2309', 'baniemakiling@gmail.com', 'none', 'none', '1999-02-20', 'Male', '04/03/2022 08:49:46');
INSERT INTO `alumni_profile` VALUES (11, 'qween', 'Jovanie', '', 'Makiling', '', 'Nasipit, Agusan del Norte', '0945-487-2309', 'Jovanie_makiling@smccnasipit.edu.ph', 'none', 'none', '1999-02-20', 'Male', '04/03/2022 08:51:36');
INSERT INTO `alumni_profile` VALUES (12, 'SMCC-0909', 'Joliver', '', 'Odchigue', '', 'Tiny', '0950-456-1200', 'joliverodchigue23@gmail.com', 'sdfsd', 'Malimono Eco Park', '2022-05-18', 'Male', '05/03/2022 02:30:44');
INSERT INTO `alumni_profile` VALUES (13, 'sdfsdf', 'fdgdfg', '', 'dfgdf', '', 'fsfsd', '0909-278-7972', 'marwilryson23@gmail.com', 'fgdfgd', 'dfgdf', '2022-05-04', 'Male', '05/04/2022 12:13:25');
INSERT INTO `alumni_profile` VALUES (14, 'sdfsd', 'mmmmm', '', 'nnnnn', '', '', '0950-456-1200', 'joliverodchigue23@gmail.com', '', 'Malimono Eco Park', 'Tourist Guide', 'Male', '05/04/2022 12:17:25');

-- ----------------------------
-- Table structure for announcement
-- ----------------------------
DROP TABLE IF EXISTS `announcement`;
CREATE TABLE `announcement`  (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NULL DEFAULT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `picpath` text CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
  `date_created` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `date_editted` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`aid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 292 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of announcement
-- ----------------------------
INSERT INTO `announcement` VALUES (282, 1, 'ghhghg', '', '2022-04-24 06:09:22', NULL);
INSERT INTO `announcement` VALUES (283, 1, 'fhghgffhgfghfghg', '', '2022-04-24 06:14:01', NULL);
INSERT INTO `announcement` VALUES (284, 1, 'huhuhuftydtsd', '', '2022-04-24 06:26:38', NULL);
INSERT INTO `announcement` VALUES (285, 1, 'gfdsgfdg', '', '2022-04-24 06:27:38', NULL);
INSERT INTO `announcement` VALUES (286, 1, 'muinvxvn', '', '2022-04-24 06:29:18', NULL);
INSERT INTO `announcement` VALUES (287, 1, 'Sasageyo', '../post_img/472436783efefdd2d69ceaba7e3d291a.PNG', '2022-04-24 10:13:27', NULL);
INSERT INTO `announcement` VALUES (288, 1, 'Test', '', '2022-05-03 08:40:45', NULL);
INSERT INTO `announcement` VALUES (289, 1, 'fsfdfs', '', '2022-05-04 12:03:32', NULL);
INSERT INTO `announcement` VALUES (290, 1, 'test', '', '2022-05-04 12:09:47', NULL);
INSERT INTO `announcement` VALUES (291, 1, 'try', '../post_img/d323b2e90066df1dfb062587d14335e6.jpg', '2022-05-04 12:11:03', NULL);

-- ----------------------------
-- Table structure for batch
-- ----------------------------
DROP TABLE IF EXISTS `batch`;
CREATE TABLE `batch`  (
  `bid` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NULL DEFAULT NULL,
  `alumni_id` int(11) NULL DEFAULT NULL,
  `batch_year` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`bid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of batch
-- ----------------------------
INSERT INTO `batch` VALUES (13, 15, 2, '2022');

-- ----------------------------
-- Table structure for certificates
-- ----------------------------
DROP TABLE IF EXISTS `certificates`;
CREATE TABLE `certificates`  (
  `cert_id` int(11) NOT NULL AUTO_INCREMENT,
  `cert_given_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cert_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cert_venue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cert_host` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cert_start_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cert_end_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `cert_given_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bid` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`cert_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment`  (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `aid` int(11) NULL DEFAULT NULL,
  `userid` int(11) NULL DEFAULT NULL,
  `comment_content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `comment_date` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`comment_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 46 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES (34, 248, 2, 'hi pod', '2022-04-03 02:37:18');
INSERT INTO `comment` VALUES (35, 248, 9, 'hi hi', '2022-04-03 02:54:56');
INSERT INTO `comment` VALUES (37, 286, 1, 'fff', '2022-04-24 07:58:20');
INSERT INTO `comment` VALUES (38, 286, 2, 'asda', '2022-04-24 10:06:52');
INSERT INTO `comment` VALUES (40, 283, 2, 'rere', '2022-04-24 10:11:13');
INSERT INTO `comment` VALUES (42, 287, 2, 'tatakae!', '2022-04-24 10:13:50');
INSERT INTO `comment` VALUES (43, 287, 10, 'Hi', '2022-05-03 08:33:38');
INSERT INTO `comment` VALUES (44, 291, 12, 'hahaha', '2022-05-04 06:18:39');
INSERT INTO `comment` VALUES (45, 291, 2, 'hey', '2022-05-04 09:54:44');

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course`  (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `course_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `course_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `userid` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`course_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of course
-- ----------------------------
INSERT INTO `course` VALUES (15, 'Web Security', 'MSIT 210', 'Website Security', 1);
INSERT INTO `course` VALUES (18, 'Web App', 'MSIT 209', 'Web application', 1);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `inserted_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `usertype` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `alumni_id` int(11) NULL DEFAULT NULL,
  `is_ban` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`userid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', '1234', '2022-02-22 15:26:46', 'ADMIN', 1, 'NO', '../user_img/5eeaa242f851cf4f42530a1016f0eb67.jpg');
INSERT INTO `user` VALUES (2, 'bianca', 'manalo', '2022-02-25 04:38:28', 'ALUMNI', 2, 'NO', '../user_img/59bd71cf719983e50dfd2d8ba25ded8e.png');
INSERT INTO `user` VALUES (4, 'digong143', '1234', '03/27/2022 10:16:22', 'ALUMNI', 5, 'NO', '../user_img/edc3b5c1c14f7e302a4da9fe5963efaf.PNG');
INSERT INTO `user` VALUES (5, 'biden32', '1234', '03/27/2022 10:20:13', 'ALUMNI', 6, 'YES', '../user_img/bd9ebdcaafce74830da0df7a7d2178a2.jpg');
INSERT INTO `user` VALUES (6, 'zelensky43', '1234', '03/27/2022 10:27:54', 'ALUMNI', 7, 'NO', '../user_img/c9ed278ec4f2250cfa0019b26446d169.jpg');
INSERT INTO `user` VALUES (7, 'vladimir23', '1234', '03/27/2022 10:35:09', 'ALUMNI', 8, 'NO', '../user_img/9dc2c770474828febe67645158bffbbf.jpg');
INSERT INTO `user` VALUES (8, 'dora24', 'OUc9U4GQ', '03/27/2022 10:47:58', 'ALUMNI', 9, 'YES', '../user_img/b4c20c26504ae2ab400b3570d03fe5d5.jpg');
INSERT INTO `user` VALUES (9, 'vanie', 'zrQK1H9G', '04/03/2022 08:51:36', 'ALUMNI', 11, 'NO', '../user_img/0d6761f8c9d33d2f425cfe31111a5b24.jpg');
INSERT INTO `user` VALUES (10, 'joliver', '1234', '05/03/2022 02:30:44', 'ALUMNI', 12, 'NO', '../user_img/88410a1915636b0f7c6af8154959df51.PNG');
INSERT INTO `user` VALUES (11, 'reyu', 'zQYaGHSC', '05/04/2022 12:13:25', 'ALUMNI', 13, 'NO', NULL);
INSERT INTO `user` VALUES (12, 'yori', '1234', '05/04/2022 12:17:25', 'ALUMNI', 14, 'NO', '../user_img/10e7e7c90bdd2b0a168f1debf01066e0.jpg');

SET FOREIGN_KEY_CHECKS = 1;
