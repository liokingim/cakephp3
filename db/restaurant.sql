CREATE DATABASE IF NOT EXISTS `restaurant` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `restaurant`;

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '소개글 번호',
  `user_id` int(11) NOT NULL COMMENT '작성자id',
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '제목',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT '내용',
  `isdelete` tinyint(1) unsigned zerofill NOT NULL COMMENT '삭제 플러그',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '생성일',
  `modified` datetime NOT NULL COMMENT '갱신일',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='소개글';

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '번호',
  `parent_id` int(11) DEFAULT '0' COMMENT '부모 ID',
  `name` varchar(255) DEFAULT NULL COMMENT '카테고리명',
  `lft` int(11) DEFAULT '0' COMMENT '트리 구조',
  `rght` int(11) DEFAULT '0' COMMENT '트리 구조',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '번호',
  `customers_id` int(11) NOT NULL COMMENT '회원 번호',
  `menu_id` int(11) NOT NULL COMMENT '메뉴 아이디',
  `praise` int(11) NOT NULL COMMENT '칭찬',
  `comment` text NOT NULL COMMENT '코멘트',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '생성일',
  `modified` datetime DEFAULT NULL COMMENT '갱신일',
  PRIMARY KEY (`id`),
  KEY `menu_id` (`menu_id`),
  KEY `customers_id` (`customers_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='코멘트';

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '번호',
  `email` varchar(50) NOT NULL COMMENT '회원 이메일',
  `name` varchar(50) NOT NULL COMMENT '회원 이름',
  `password` varchar(100) NOT NULL COMMENT '비밀번호',
  `anniversary` date DEFAULT NULL COMMENT '기념일',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '생성일',
  `modified` datetime DEFAULT NULL COMMENT '갱신일',
  PRIMARY KEY (`id`),
  KEY `anniversary` (`anniversary`),
  KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='고객';

CREATE TABLE IF NOT EXISTS `i18n` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `locale` varchar(6) NOT NULL,
  `model` varchar(255) NOT NULL,
  `foreign_key` int(10) NOT NULL,
  `field` varchar(255) NOT NULL,
  `content` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `I18N_LOCALE_FIELD` (`locale`,`model`,`foreign_key`,`field`),
  KEY `I18N_FIELD` (`model`,`foreign_key`,`field`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `memos` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '번호',
  `content` text NOT NULL COMMENT '메모',
  `isdelete` tinyint(1) unsigned zerofill NOT NULL COMMENT '삭제 플래그',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '생성일',
  `modified` datetime DEFAULT NULL COMMENT '갱신일',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='메모';

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '번호',
  `email` varchar(50) NOT NULL COMMENT '유저 이메일',
  `name` varchar(50) NOT NULL COMMENT '유저이름',
  `password` varchar(100) NOT NULL COMMENT '비밀번호',
  `phone` varchar(20) DEFAULT NULL COMMENT '전화번호',
  `status` tinyint(1) DEFAULT '1' COMMENT '사용상태 사용:1/탈퇴:0',
  `role` varchar(20) DEFAULT NULL COMMENT '유저 권한',
  `api_key_plain` varchar(100) DEFAULT NULL COMMENT 'api_key_plain',
  `api_key` varchar(100) DEFAULT NULL COMMENT 'api_key',
  `digest_hash` varchar(100) DEFAULT NULL COMMENT 'digest_hash',
  `articles_count` int(5) unsigned NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '생성일',
  `modified` datetime DEFAULT NULL COMMENT '갱신일',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COMMENT='유저';

INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `status`, `role`, `api_key_plain`, `api_key`, `digest_hash`, `articles_count`, `created`, `modified`) VALUES
	(1, 'test01@cakephp.org', '홍길동', 'pass001', '010123401', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:51', NULL),
	(2, 'test02@cakephp.org', '심청', 'pass002', '010123402', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:51', NULL),
	(3, 'test03@cakephp.org', '전우치', 'pass003', '010123403', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:51', NULL),
	(4, 'test04@cakephp.org', '해님', 'pass004', '010123404', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:51', NULL),
	(5, 'test05@cakephp.org', '달님', 'pass005', '010123405', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:51', NULL),
	(6, 'test06@cakephp.org', '심봉사', 'pass006', '010123406', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:51', NULL),
	(7, 'test07@cakephp.org', '흥부', 'pass007', '010123407', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:51', NULL),
	(8, 'test08@cakephp.org', '놀부', 'pass008', '010123408', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:51', NULL),
	(9, 'test09@cakephp.org', '임꺽정', 'pass009', '010123409', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:51', NULL),
	(10, 'test10@cakephp.org', '신데렐라', 'pass0010', '0101234010', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:51', NULL),
	(11, 'test11@cakephp.org', '라푼젤', 'pass0011', '0101234011', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:50', NULL),
	(12, 'test12@cakephp.org', '성춘향', 'pass0012', '0101234012', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:50', NULL),
	(13, 'test13@cakephp.org', '이몽룡', 'pass0013', '0101234013', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:50', NULL),
	(14, 'test14@cakephp.org', '김선달', 'pass0014', '0101234014', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:50', NULL),
	(15, 'test15@cakephp.org', '선녀', 'pass0015', '0101234015', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:50', NULL),
	(16, 'test16@cakephp.org', '나무꾼', 'pass0016', '0101234016', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:50', NULL),
	(17, 'test17@cakephp.org', '도깨비', 'pass0017', '0101234017', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:50', NULL),
	(18, 'test18@cakephp.org', '콩쥐', 'pass0018', '0101234018', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:50', NULL),
	(19, 'test19@cakephp.org', '팥쥐', 'pass0019', '0101234019', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:50', NULL),
	(20, 'test20@cakephp.org', '온달', 'pass0020', '0101234020', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:50', NULL),
	(21, 'test21@cakephp.org', '평강', 'pass0021', '0101234021', 1, NULL, NULL, NULL, NULL, 0, '2018-01-16 20:09:50', NULL),
	(22, 'test22@cakephp.org', '칼', '$2y$10$g4Sahl2oGmLCf6rTx14UIeq0m9DJeU1/U5QgPMyUOEXa7hyk46wlS', '0102223333', 1, 'staff', NULL, NULL, NULL, 0, '2018-01-16 11:11:07', '2018-01-16 11:12:01');

INSERT INTO `categories` (`id`, `parent_id`, `name`, `lft`, `rght`) VALUES
    (1, NULL, 'Menus', 1, 30),
    (2, 1, 'Vegetable', 2, 15),
    (3, 2, 'Fruit', 3, 8),
    (4, 3, 'Baked Apple', 4, 5),
    (5, 3, 'Banana salad', 6, 7),
    (6, 2, 'Mushroom', 9, 14),
    (7, 6, 'Ciulama', 10, 11),
    (8, 6, 'Duxelles', 12, 13),
    (9, 1, 'Non-Vegetable', 16, 29),
    (10, 9, 'Beef', 17, 22),
    (11, 10, 'Meatball', 18, 19),
    (12, 10, 'Steak', 20, 21),
    (13, 9, 'Sausage', 23, 28),
    (14, 13, 'Battered sausage', 24, 25),
    (15, 13, 'Sausage sandwich', 26, 27);
