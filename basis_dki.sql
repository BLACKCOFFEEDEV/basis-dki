/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50635
 Source Host           : localhost
 Source Database       : basis_dki

 Target Server Type    : MySQL
 Target Server Version : 50635
 File Encoding         : utf-8

 Date: 11/27/2017 14:56:43 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `aauth_accounts`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_accounts`;
CREATE TABLE `aauth_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `place_of_birth` varchar(225) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` text NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `is_changed` int(11) DEFAULT NULL,
  `kelurahan_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `aauth_accounts`
-- ----------------------------
BEGIN;
INSERT INTO `aauth_accounts` VALUES ('3', '3', 'Syahril', 'Hermana', '087873890014', 'Bogor', '1992-02-14', 'Jl. Ahmad Yunus, No.2 RT 04/04', 'eccbc87e4b5ce2fe28308fd9f2a7baf3.png', null, '1', null, null), ('6', '14', 'Salahudin', 'Al Ayubi', '08111071402', 'Bogor', '2017-05-11', 'dfghnbvcx', 'eccbc87e4b5ce2fe28308fd9f2a7baf3.png', null, '1', '3', '2017-11-02 00:00:00'), ('7', '15', 'Son', 'Goku', '081399991077', 'Beijing', '1970-01-01', 'Jl. dfdsdsgsdfgdf', null, null, '1', '3', '2017-11-15 00:00:00'), ('8', '16', 'Mahmud', 'Monthog', '081500999977', 'Ambon', '1984-06-07', 'Jl. Deket GI', null, null, '3', '3', '2017-11-22 00:00:00'), ('9', '17', 'Simon', 'Sibarani', '085690876951', 'Medan', '1972-03-11', 'JL. Perumahan Bagus No. 21 Depok', null, null, '3', '3', '2017-11-26 00:00:00');
COMMIT;

-- ----------------------------
--  Table structure for `aauth_accounts_change`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_accounts_change`;
CREATE TABLE `aauth_accounts_change` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(225) NOT NULL,
  `last_name` varchar(225) NOT NULL,
  `phone` varchar(225) NOT NULL,
  `place_of_birth` varchar(225) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address` text NOT NULL,
  `image` varchar(500) DEFAULT NULL,
  `kelurahan_id` int(11) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `aauth_employee`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_employee`;
CREATE TABLE `aauth_employee` (
  `nip` varchar(225) DEFAULT NULL,
  `office` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  UNIQUE KEY `nip` (`nip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `aauth_employee`
-- ----------------------------
BEGIN;
INSERT INTO `aauth_employee` VALUES ('870014', '1', '3');
COMMIT;

-- ----------------------------
--  Table structure for `aauth_group_to_group`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_group_to_group`;
CREATE TABLE `aauth_group_to_group` (
  `group_id` int(11) unsigned NOT NULL,
  `subgroup_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`group_id`,`subgroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `aauth_groups`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_groups`;
CREATE TABLE `aauth_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `aauth_groups`
-- ----------------------------
BEGIN;
INSERT INTO `aauth_groups` VALUES ('1', 'Admin System', 'Super Admin For This Application'), ('2', 'Data Entry', 'Staff Data Entry'), ('3', 'Member', 'Investor'), ('4', 'Employee', 'Staff PNS');
COMMIT;

-- ----------------------------
--  Table structure for `aauth_login_attempts`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_login_attempts`;
CREATE TABLE `aauth_login_attempts` (
  `id` int(11) NOT NULL,
  `ip_address` varchar(39) DEFAULT '0',
  `timestamp` datetime DEFAULT NULL,
  `login_attempts` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Table structure for `aauth_member`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_member`;
CREATE TABLE `aauth_member` (
  `ktp` varchar(225) NOT NULL,
  `member_since` date NOT NULL,
  `member_until` date NOT NULL,
  `pin` varchar(225) DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  `ktp_address` text NOT NULL,
  UNIQUE KEY `ktp` (`ktp`),
  UNIQUE KEY `pin` (`pin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `aauth_member`
-- ----------------------------
BEGIN;
INSERT INTO `aauth_member` VALUES ('29808321908092138', '2017-11-26', '1970-01-01', '6ma5v000', '9', 'JL. Perumahan Bagus No. 21 Gambir'), ('32800046140003', '2017-11-02', '1970-01-01', '', '6', 'bvcdftyjnb'), ('343413949324983248932', '2017-11-15', '2018-06-12', 'zCq9dlDJ', '7', 'JL. y65y65y56y564y56'), ('89889y89y87y8h3iu3bd3', '2017-11-22', '2018-06-12', '5IgxZgv2', '8', 'Jl. Duren Sawit');
COMMIT;

-- ----------------------------
--  Table structure for `aauth_navigation_to_group`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_navigation_to_group`;
CREATE TABLE `aauth_navigation_to_group` (
  `group_id` int(11) NOT NULL,
  `navigation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `aauth_navigation_to_group`
-- ----------------------------
BEGIN;
INSERT INTO `aauth_navigation_to_group` VALUES ('4', '1'), ('4', '2');
COMMIT;

-- ----------------------------
--  Table structure for `aauth_navigations`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_navigations`;
CREATE TABLE `aauth_navigations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(225) NOT NULL,
  `label` varchar(225) NOT NULL,
  `icon` varchar(225) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `orders` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `aauth_navigations`
-- ----------------------------
BEGIN;
INSERT INTO `aauth_navigations` VALUES ('1', 'member', 'Member', 'fa-group', null, '2'), ('2', 'member/register', 'Register Member', 'fa-user', '1', null), ('3', 'member/assets', 'Register Assets', 'fa-building', '1', null), ('4', 'member/maps', 'Maps', 'fa-map', '1', null), ('5', 'calendar/display', 'Calender', 'fa-calendar', null, '3'), ('6', 'privileges', 'Privileges', 'fa-user-secret', null, '4'), ('7', 'privileges/groups', 'Groups', 'fa-clone', '6', null), ('8', 'privileges/menu', 'Navigations', 'fa-map-signs', '6', null), ('9', 'privileges/permissions', 'Permission', 'fa-lock', '6', null), ('10', 'history', 'History', 'fa-history', null, '5'), ('11', 'masters', 'Master Data', 'fa-list-ol', null, '1'), ('12', 'masters/country', 'Country', '', '11', null), ('13', 'masters/province', 'Province', '', '11', null), ('14', 'masters/city', 'City', '', '11', null), ('15', 'masters/state', 'State', '', '11', null), ('16', 'masters/district', 'District', '', '11', null), ('17', 'masters/office', 'Office', '', '11', null), ('18', 'masters/building', 'Building Type', '', '11', null), ('19', 'masters/legality', 'Legality', '', '11', null), ('20', 'masters/permit', 'Business Permit', '', '11', null);
COMMIT;

-- ----------------------------
--  Table structure for `aauth_perm_to_group`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_perm_to_group`;
CREATE TABLE `aauth_perm_to_group` (
  `perm_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`perm_id`,`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `aauth_perm_to_user`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_perm_to_user`;
CREATE TABLE `aauth_perm_to_user` (
  `perm_id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`perm_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `aauth_perms`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_perms`;
CREATE TABLE `aauth_perms` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `definition` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `aauth_pms`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_pms`;
CREATE TABLE `aauth_pms` (
  `id` int(11) unsigned NOT NULL,
  `sender_id` int(11) unsigned NOT NULL,
  `receiver_id` int(11) unsigned NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text,
  `date_sent` datetime DEFAULT NULL,
  `date_read` datetime DEFAULT NULL,
  `pm_deleted_sender` int(1) DEFAULT NULL,
  `pm_deleted_receiver` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `full_index` (`id`,`sender_id`,`receiver_id`,`date_read`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `aauth_user_to_group`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_user_to_group`;
CREATE TABLE `aauth_user_to_group` (
  `user_id` int(11) unsigned NOT NULL,
  `group_id` int(11) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `aauth_user_to_group`
-- ----------------------------
BEGIN;
INSERT INTO `aauth_user_to_group` VALUES ('1', '1'), ('1', '3'), ('2', '3'), ('3', '3'), ('4', '3');
COMMIT;

-- ----------------------------
--  Table structure for `aauth_user_variables`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_user_variables`;
CREATE TABLE `aauth_user_variables` (
  `id` int(11) unsigned NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `data_key` varchar(100) NOT NULL,
  `value` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `aauth_users`
-- ----------------------------
DROP TABLE IF EXISTS `aauth_users`;
CREATE TABLE `aauth_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `pass` varchar(64) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `banned` tinyint(1) DEFAULT '0',
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `date_created` datetime DEFAULT NULL,
  `forgot_exp` text,
  `remember_time` datetime DEFAULT NULL,
  `remember_exp` text,
  `verification_code` text,
  `totp_secret` varchar(16) DEFAULT NULL,
  `ip_address` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `aauth_users`
-- ----------------------------
BEGIN;
INSERT INTO `aauth_users` VALUES ('3', 'admin@dki.go.id', '4e4cdff9436d4b9797eeb35d6965e73bd0bd9d5dc939ab2c190a179cf8df960d', 'dki', '0', '2017-11-27 08:14:02', '2017-11-27 08:14:02', '2017-10-25 18:12:33', null, null, null, null, null, '127.0.0.1'), ('14', 'syahril.hermana@gmail.com', '08673e64e8d641dff673c49fd694b7aace4e7643779c48951df94607be92a0ab', 'syahrilhermana', '0', null, null, '2017-11-02 23:02:47', null, null, null, null, null, null), ('15', 'goku.son123456789@gmail.com', '67e59b5d5e83fcbb4659e0e0e688b2e9fd71281993320f13b591e78b31a4f391', 'gokuson123456789', '0', null, null, '2017-11-15 07:57:16', null, null, null, null, null, null), ('16', 'mahmud_deewd3@test.com', '51fe7d6158798e31f9975e1e667537f317fe8665a91400812d0e89c247d9ee08', 'mahmuddeewd3', '0', null, null, '2017-11-22 04:24:59', null, null, null, null, null, null), ('17', 'simon.kuat@test.com', 'efb18d7fe548964712fcf37443504c1ba48f4f61cb29071b7fca7f915bc1c3a5', 'simonkuat', '0', null, null, '2017-11-26 22:51:23', null, null, null, null, null, null);
COMMIT;

-- ----------------------------
--  Table structure for `admin_profile`
-- ----------------------------
DROP TABLE IF EXISTS `admin_profile`;
CREATE TABLE `admin_profile` (
  `id` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_foto_admin` int(11) NOT NULL,
  `id_satker` int(11) NOT NULL,
  `nip` decimal(18,0) NOT NULL,
  `dob` date NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `admin_profile`
-- ----------------------------
BEGIN;
INSERT INTO `admin_profile` VALUES ('0', '0', '0', '1', '123456789012345678', '0000-00-00', '2017-10-16', 'VBI 2');
COMMIT;

-- ----------------------------
--  Table structure for `assets_existtype`
-- ----------------------------
DROP TABLE IF EXISTS `assets_existtype`;
CREATE TABLE `assets_existtype` (
  `existype_id` int(11) NOT NULL DEFAULT '0',
  `type_id` int(11) DEFAULT NULL,
  `izin_usha_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`existype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `assets_legal`
-- ----------------------------
DROP TABLE IF EXISTS `assets_legal`;
CREATE TABLE `assets_legal` (
  `legal_id` int(20) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `legality_id` int(11) NOT NULL,
  `assets_id` int(11) NOT NULL DEFAULT '0',
  `legal_num` varchar(255) NOT NULL,
  `legal_file` varchar(255) NOT NULL,
  PRIMARY KEY (`legal_id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `assets_legal`
-- ----------------------------
BEGIN;
INSERT INTO `assets_legal` VALUES ('1', '7', '3', '33', 'wew/2w2w/dsfsdfsdgfsdgfdsgfdsfdsfd', 'sadsa.pdf'), ('66', '8', '2', '0', 'sdasdsa', '151148416195.jpeg'), ('70', '7', '2', '33', 'assad', '151155434119.png'), ('80', '8', '2', '0', 'asdsa', '151172830485.png'), ('81', '7', '2', '0', 'dsf', '151173034954.png'), ('82', '7', '2', '0', 'asdas', '151173077256.jpg');
COMMIT;

-- ----------------------------
--  Table structure for `assets_legality`
-- ----------------------------
DROP TABLE IF EXISTS `assets_legality`;
CREATE TABLE `assets_legality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `assets_legality`
-- ----------------------------
BEGIN;
INSERT INTO `assets_legality` VALUES ('1', 'Sample Legality'), ('2', 'KRK'), ('3', 'IMB'), ('4', 'NJOP');
COMMIT;

-- ----------------------------
--  Table structure for `exist_izinusaha`
-- ----------------------------
DROP TABLE IF EXISTS `exist_izinusaha`;
CREATE TABLE `exist_izinusaha` (
  `izin_usaha_id` int(11) NOT NULL DEFAULT '0',
  `surat_usaha_id` int(11) DEFAULT NULL,
  `no_surat` varchar(255) DEFAULT NULL,
  `izin_keterangan` text,
  `masa_berlaku` datetime DEFAULT NULL,
  PRIMARY KEY (`izin_usaha_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `exist_type`
-- ----------------------------
DROP TABLE IF EXISTS `exist_type`;
CREATE TABLE `exist_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `exist_type`
-- ----------------------------
BEGIN;
INSERT INTO `exist_type` VALUES ('1', 'Ruko'), ('2', 'Tanah Kosong'), ('3', 'Pemakaman'), ('4', 'Rumah Tinggal');
COMMIT;

-- ----------------------------
--  Table structure for `izinusaha_surat`
-- ----------------------------
DROP TABLE IF EXISTS `izinusaha_surat`;
CREATE TABLE `izinusaha_surat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `izinusaha_surat`
-- ----------------------------
BEGIN;
INSERT INTO `izinusaha_surat` VALUES ('1', 'Sample Business Permit'), ('2', 'SIUP'), ('3', 'TDP'), ('4', 'IUP');
COMMIT;

-- ----------------------------
--  Table structure for `legal_bond`
-- ----------------------------
DROP TABLE IF EXISTS `legal_bond`;
CREATE TABLE `legal_bond` (
  `document_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `assets_id` int(11) NOT NULL DEFAULT '0',
  `legal_id` int(11) NOT NULL,
  PRIMARY KEY (`document_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `legal_bond`
-- ----------------------------
BEGIN;
INSERT INTO `legal_bond` VALUES ('1', '33', '1'), ('30', '0', '41'), ('56', '0', '66'), ('57', '35', '67'), ('58', '35', '68'), ('60', '33', '70'), ('67', '33', '77');
COMMIT;

-- ----------------------------
--  Table structure for `marker_polygon`
-- ----------------------------
DROP TABLE IF EXISTS `marker_polygon`;
CREATE TABLE `marker_polygon` (
  `polygon_id` bigint(255) NOT NULL AUTO_INCREMENT,
  `assets_id` int(11) DEFAULT NULL,
  `polygon_geometry` text,
  `poly_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`polygon_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `marker_polygon`
-- ----------------------------
BEGIN;
INSERT INTO `marker_polygon` VALUES ('2', '1', '[{\"type\":\"POLYGON\",\"coordinates\":[[[-6.174945511293245,106.8268334269851],[-6.175020177406595,106.82674759629663],[-6.175708171812824,106.82673686746057],[-6.1758361706735085,106.82680660489495],[-6.175841503958701,106.82752007249292],[-6.175702838526296,106.82768636945184],[-6.175025510700006,106.82767564061578],[-6.174924178116064,106.82753080132898]]]}]', '2');
COMMIT;

-- ----------------------------
--  Table structure for `master_kecamatan`
-- ----------------------------
DROP TABLE IF EXISTS `master_kecamatan`;
CREATE TABLE `master_kecamatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `kota_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `master_kecamatan`
-- ----------------------------
BEGIN;
INSERT INTO `master_kecamatan` VALUES ('1', 'Tanah Sareal', '1'), ('2', 'Bogor Timur', '1'), ('3', 'Gambir', '2');
COMMIT;

-- ----------------------------
--  Table structure for `master_kelurahan`
-- ----------------------------
DROP TABLE IF EXISTS `master_kelurahan`;
CREATE TABLE `master_kelurahan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `kecamatan_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `master_kelurahan`
-- ----------------------------
BEGIN;
INSERT INTO `master_kelurahan` VALUES ('1', 'Sukaresmi', '1'), ('2', 'Gambir', '3'), ('3', 'Cideng', '3'), ('4', 'Kebon Kelapa', '3');
COMMIT;

-- ----------------------------
--  Table structure for `master_kota`
-- ----------------------------
DROP TABLE IF EXISTS `master_kota`;
CREATE TABLE `master_kota` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `provinsi_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `master_kota`
-- ----------------------------
BEGIN;
INSERT INTO `master_kota` VALUES ('1', 'Kota Bogor', '1'), ('2', 'Jakarta Pusat', '3');
COMMIT;

-- ----------------------------
--  Table structure for `master_negara`
-- ----------------------------
DROP TABLE IF EXISTS `master_negara`;
CREATE TABLE `master_negara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `master_negara`
-- ----------------------------
BEGIN;
INSERT INTO `master_negara` VALUES ('1', 'Indonesia'), ('2', 'Singapura');
COMMIT;

-- ----------------------------
--  Table structure for `master_office`
-- ----------------------------
DROP TABLE IF EXISTS `master_office`;
CREATE TABLE `master_office` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `master_office`
-- ----------------------------
BEGIN;
INSERT INTO `master_office` VALUES ('1', 'DKI Jakarta Office', null), ('2', 'Jakarta Pusat Office', '1');
COMMIT;

-- ----------------------------
--  Table structure for `master_provinsi`
-- ----------------------------
DROP TABLE IF EXISTS `master_provinsi`;
CREATE TABLE `master_provinsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(225) NOT NULL,
  `negara_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
--  Records of `master_provinsi`
-- ----------------------------
BEGIN;
INSERT INTO `master_provinsi` VALUES ('1', 'Jawa Barat', '1'), ('2', 'Test Province of Singapore', '2'), ('3', 'DKI Jakarta', '1');
COMMIT;

-- ----------------------------
--  Table structure for `member_assets`
-- ----------------------------
DROP TABLE IF EXISTS `member_assets`;
CREATE TABLE `member_assets` (
  `assets_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_id` int(11) NOT NULL,
  `assets_existtype` int(11) NOT NULL,
  `assets_name` varchar(60) NOT NULL,
  `assets_address` text NOT NULL,
  `kelurahan` int(11) NOT NULL,
  `assets_geometry` text NOT NULL,
  `assets_luas` decimal(65,0) NOT NULL,
  `assets_harga` decimal(65,0) NOT NULL,
  `assets_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `create_by` int(11) NOT NULL,
  PRIMARY KEY (`assets_id`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `member_assets`
-- ----------------------------
BEGIN;
INSERT INTO `member_assets` VALUES ('33', '7', '1', 'Ruko Iseng Iseng', 'Jl. Disitu aja deh', '3', '[{\"type\":\"POLYGON\",\"coordinates\":[[[-6.257607490386364,106.80819618703026],[-6.2580607489629,106.80823373795647],[-6.258052750285547,106.80826592446465],[-6.258194060234109,106.8083839416613],[-6.258170064207799,106.80850195885796],[-6.258103408573377,106.80848854781289],[-6.258098076122266,106.80853950978417],[-6.258026088026811,106.80853146315712],[-6.258028754252749,106.80856901408333],[-6.257986094636164,106.8085636496653],[-6.25796743105281,106.80853682757515],[-6.257919438978282,106.8085260987391],[-6.257930103884105,106.80855560303826],[-6.257860781992309,106.80855292082924],[-6.257847450858222,106.80851805211205],[-6.257575495648465,106.80850464106697]]]}]', '2000', '5000000000', '2017-11-22 04:24:11', '0'), ('50', '8', '1', 'Ruko United can', 'JL. Abdul Muis No. Sekian', '3', '[{\"type\":\"POLYGON\",\"coordinates\":[[[-6.171529258668342,106.82118429244383],[-6.17170792514573,106.82121916116103],[-6.171683925174655,106.82125939429625],[-6.171875924912815,106.82129962743147],[-6.171830591647578,106.82144714892729],[-6.171497258695875,106.82137472928389]]]}]', '751', '2000000000', '2017-11-27 04:40:22', '0'), ('51', '8', '4', 'Rumah Kediaman Pak Mahmud', 'JL. Abdul Muis No. Berikutnya', '3', '[{\"type\":\"POLYGON\",\"coordinates\":[[[-6.1719239248364675,106.82133181389872],[-6.172158591067343,106.82136936482493],[-6.172163924389556,106.82149274643962],[-6.1719052582000105,106.82144714888636]]]}]', '366', '1000000000', '2017-11-27 04:43:53', '0'), ('52', '9', '2', 'Tanah Bang Simon', 'JL. Biak No. 12', '3', '[{\"type\":\"POLYGON\",\"coordinates\":[[[-6.170638591965131,106.80855645240172],[-6.170731925363976,106.8085725456558],[-6.170689258669397,106.80879516900404],[-6.170566591903348,106.80877371133192]]]}]', '305', '3000000000', '2017-11-27 04:57:13', '0');
COMMIT;

-- ----------------------------
--  Table structure for `member_profile`
-- ----------------------------
DROP TABLE IF EXISTS `member_profile`;
CREATE TABLE `member_profile` (
  `member_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `member_pin` varchar(25) DEFAULT NULL,
  `foto_id` int(11) NOT NULL,
  `ktp_member` decimal(18,0) NOT NULL,
  `tempat_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `alamat_ktp` text,
  `alamat_domisili` text NOT NULL,
  `member_tlp` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `user_account`
-- ----------------------------
DROP TABLE IF EXISTS `user_account`;
CREATE TABLE `user_account` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_fullname` varchar(60) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_username` varchar(45) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_registered` date NOT NULL,
  `user_by_who` int(11) NOT NULL,
  `user_status` int(1) NOT NULL,
  `user_privilege` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user_account`
-- ----------------------------
BEGIN;
INSERT INTO `user_account` VALUES ('1', 'ANGGA PINO', 'angga.pino@gmail.com', 'pino28', 'dc0fa7df3d07904a09288bd2d2bb5f40', '2017-10-16', '1', '1', '1');
COMMIT;

-- ----------------------------
--  Table structure for `user_foto`
-- ----------------------------
DROP TABLE IF EXISTS `user_foto`;
CREATE TABLE `user_foto` (
  `id` int(11) NOT NULL,
  `file_foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `user_foto`
-- ----------------------------
BEGIN;
INSERT INTO `user_foto` VALUES ('1', '----------');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
