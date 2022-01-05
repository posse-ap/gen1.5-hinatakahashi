-- 日付, 学習言語, 学習コンテンツ, 学習時間
DROP TABLE IF EXISTS `study`;
CREATE TABLE `study`(
  `id` INT NOT NULL PRIMARY KEY,
  `date` DATE NOT NULL COMMENT='学習した日付',
  `language_id` INT NOT NULL COMMENT='学習言語ID',
  `content_id` INT NOT NULL COMMENT='学習コンテンツID',
  `study_time` INT NOT NULL COMMENT='学習時間'
  )
  COMMENT='学習時間合計テーブル';

INSERT INTO `study` (`id`,`date`,`language_id`,`content_id`,`study_time`) VALUES
(2021-12-18,'1','1',8),
(2021-12-19,'2','1',8);


DROP TABLE IF EXISTS `study_language`;
CREATE TABLE `study_language` (
  `id` INT NOT NULL PRIMARY KEY,
  `language` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT='学習言語',
  `language_color` VARCHAR(50) NOT NULL COMMENT='学習言語ごとの色'
  )
  COMMENT='学習言語テーブル';

INSERT INTO `study_language` (`language`,`language_color`) VALUES 
('JavaScript','1754ef'),
('CSS','2171bd'),
('PHP','4dbdde'),
('HTML','54cef9'),
('Laravel','b29ef3'),
('SQL','6d46ec'),
('SHELL','4f45ef'),
('情報システム基礎知識(その他)','3636c1');


DROP TABLE IF EXISTS `study_contents`;
CREATE TABLE `study_contents` (
  `id` INT NOT NULL PRIMARY KEY,
  `content` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT='学習コンテンツ',
  `content_color` VARCHAR(50) NOT NULL COMMENT='学習コンテンツごとの色'
  )
  COMMENT='学習コンテンツテーブル';

INSERT INTO `study_contents` (`content`,`content_color`) VALUES 
('ドットインストール','1754ef'),
('N予備校','2171bd'),
('POSSE課題','4dbdde');
