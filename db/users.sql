DROP TABLE `users`;

CREATE TABLE `users` (
	`id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '번호',
	`email` VARCHAR(50) NOT NULL COMMENT '유저 이메일',
	`name` VARCHAR(50) NOT NULL COMMENT '유저이름',
	`password` VARCHAR(100) NOT NULL COMMENT '비밀번호',
	`phone` VARCHAR(20) NULL DEFAULT NULL COMMENT '전화번호',
	`status` TINYINT(1) NULL DEFAULT '1' COMMENT '사용상태 사용:1/탈퇴:0',
	`created` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '생성일',
	`modified` DATETIME NULL DEFAULT NULL COMMENT '갱신일',
	PRIMARY KEY (`id`)
)
COMMENT='유저'
COLLATE='utf8_general_ci'
ENGINE=InnoDB;

INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (21, 'test21@cakephp.org', '평강', 'pass0021', '0101234021', now());
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (20, 'test20@cakephp.org', '온달', 'pass0020', '0101234020', now());
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (19, 'test19@cakephp.org', '팥쥐', 'pass0019', '0101234019', now());
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (18, 'test18@cakephp.org', '콩쥐', 'pass0018', '0101234018', now());
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (17, 'test17@cakephp.org', '도깨비', 'pass0017', '0101234017', now());
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (16, 'test16@cakephp.org', '나무꾼', 'pass0016', '0101234016', now());
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (15, 'test15@cakephp.org', '선녀', 'pass0015', '0101234015', now());
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (14, 'test14@cakephp.org', '김선달', 'pass0014', '0101234014', now());
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (13, 'test13@cakephp.org', '이몽룡', 'pass0013', '0101234013', now());
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (12, 'test12@cakephp.org', '성춘향', 'pass0012', '0101234012', now());
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (11, 'test11@cakephp.org', '라푼젤', 'pass0011', '0101234011', now());
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (10, 'test10@cakephp.org', '신데렐라', 'pass0010', '0101234010', now());
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (9, 'test09@cakephp.org', '임꺽정', 'pass009', '010123409', now());
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (8, 'test08@cakephp.org', '놀부', 'pass008', '010123408', now());
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (7, 'test07@cakephp.org', '흥부', 'pass007', '010123407', now());
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (6, 'test06@cakephp.org', '심봉사', 'pass006', '010123406', now());
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (5, 'test05@cakephp.org', '달님', 'pass005', '010123405', now());
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (4, 'test04@cakephp.org', '해님', 'pass004', '010123404', now());
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (3, 'test03@cakephp.org', '전우치', 'pass003', '010123403', now());
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (2, 'test02@cakephp.org', '심청', 'pass002', '010123402', now());
INSERT INTO `users` (`id`, `email`, `name`, `password`, `phone`, `created`) VALUES (1, 'test01@cakephp.org', '홍길동', 'pass001', '010123401', now());

ALTER TABLE `users`
	ADD COLUMN `role` VARCHAR(20) NULL COMMENT '유저 권한' AFTER `status`;

ALTER TABLE `users`
	ADD COLUMN `api_key_plain` VARCHAR(100) NULL DEFAULT NULL COMMENT 'api_key_plain' AFTER `role`,
	ADD COLUMN `api_key` VARCHAR(100) NULL DEFAULT NULL COMMENT 'api_key' AFTER `api_key_plain`;

ALTER TABLE `users`
	ADD COLUMN `digest_hash` VARCHAR(100) NULL DEFAULT NULL COMMENT 'digest_hash' AFTER `api_key`;

ALTER TABLE `users`
	ADD COLUMN `articles_count` (5) UNSIGNED NOT NULL AFTER `digest_hash`;
