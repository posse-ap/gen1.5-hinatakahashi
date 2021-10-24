-- 大元のテーブル
DROP TABLE IF EXISTS `study`;
CREATE TABLE `study`(
  `id` INT NOT NULL PRIMARY KEY,
  `date` DATE DEFAULT NULL,
  `content` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `language` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `time` FLOAT(2,2) DEFAULT NULL,
  `comment` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
);

INSERT INTO `study` (`id`,`date`,`content`,`language`,`time`,`comment`) VALUES
(1,'東京の難読地名クイズ');

-- 細かいテーブル
DROP TABLE IF EXISTS `study_date`;
CREATE TABLE `study_date` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `date` DATE　DEFAULT NULL
  );

INSERT INTO `choices` (`id`,`date`) VALUES
(1,1,'たかなわ',1);

DROP TABLE IF EXISTS `study_content`;
CREATE TABLE `study_content` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `content` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci　DEFAULT NULL
  );

INSERT INTO `study_content` (`id`,`content`) VALUES
(1,1,'たかなわ',1);

DROP TABLE IF EXISTS `study_language`;
CREATE TABLE `study_language` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `language` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci　DEFAULT NULL
  );

INSERT INTO `choices` (`id`,`language`) VALUES
(1,1,'たかなわ',1);

DROP TABLE IF EXISTS `study_time`;
CREATE TABLE `study_time` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `time` FLOAT(2,2)　DEFAULT NULL
  );

INSERT INTO `choices` (`id`,`time`) VALUES
(1,1,'たかなわ',1);

DROP TABLE IF EXISTS `study_comment`;
CREATE TABLE `study_comment` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `date` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci　DEFAULT NULL
  );

INSERT INTO `choices` (`id`,`comment`) VALUES
(1,1,'たかなわ',1);
