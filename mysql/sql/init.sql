-- questionsテーブル
DROP TABLE IF EXISTS `questions`;
CREATE TABLE `questions`(
  `id` INT NOT NULL PRIMARY KEY,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
);

INSERT INTO `questions` (`id`,`name`) VALUES
(1,'東京の難読地名クイズ'),
(2,'広島県の難読地名クイズ');

DROP TABLE IF EXISTS `choices`;
CREATE TABLE `choices` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `question_id` INT,
  `name` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `valid` INT
  );

INSERT INTO `choices` (`id`,`question_id`,`name`,`valid`) VALUES
(1,1,'たかなわ',1),
(2,1,'たかわ',0),
(3,1,'こうわ',0),
(4,2,'むこうひら',0),
(5,2,'むきひら',0),
(6,2,'むかいなだ',1);