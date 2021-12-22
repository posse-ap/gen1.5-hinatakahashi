--データベース
DROP SCHEMA IF EXISTS webapp; 
CREATE SCHEMA webapp;
USE webapp;

-- 大元のテーブル

-- 日付, 学習言語, 学習コンテンツ, 学習時間
DROP TABLE IF EXISTS `study`;
CREATE TABLE `study`(
  `id` INT NOT NULL PRIMARY KEY,
  `date` DATE NOT NULL,
  `language` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `content` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `time` INT NOT NULL,
);

/
COMMENT ON TABLE study IS '学習時間合計テーブル'
/
COMMENT ON COLUMN date IS '学習した日付'
/
COMMENT ON COLUMN language IS '学習言語'
/
COMMENT ON COLUMN language IS '学習コンテンツ'
/
COMMENT ON COLUMN language IS '学習時間'
/

INSERT INTO `study` (`id`,`date`,`language`,`content`,`time`) VALUES
(2021-12-18,'N予備校','PHP',8);


DROP TABLE IF EXISTS `study_language`;
CREATE TABLE `study_language` (
  `id` INT NOT NULL PRIMARY KEY,
  `language` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
  `language_color` VARCHAR(50) NOT NULL
  );

/
COMMENT ON TABLE study IS '学習言語テーブル'
/
COMMENT ON COLUMN language IS '学習言語'
/
COMMENT ON COLUMN language_color IS '学習言語ごとの色'
/

INSERT INTO `study_language` (`language`,`language_color`) VALUES ('JavaScript','1754ef');
INSERT INTO `study_language` (`language`,`language_color`) VALUES ('CSS','2171bd');
INSERT INTO `study_language` (`language`,`language_color`) VALUES ('PHP','4dbdde');
INSERT INTO `study_language` (`language`,`language_color`) VALUES ('HTML','54cef9');
INSERT INTO `study_language` (`language`,`language_color`) VALUES ('Laravel','b29ef3');
INSERT INTO `study_language` (`language`,`language_color`) VALUES ('SQL','6d46ec');
INSERT INTO `study_language` (`language`,`language_color`) VALUES ('SHELL','4f45ef');
INSERT INTO `study_language` (`language`,`language_color`) VALUES ('情報システム基礎知識(その他)','3636c1');


DROP TABLE IF EXISTS `study_contents`;
CREATE TABLE `study_contents` (
  `id` INT NOT NULL PRIMARY KEY,
  `content` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
  `content_color` VARCHAR(50) NOT NULL
  );

/
COMMENT ON TABLE study IS '学習コンテンツテーブル'
/
COMMENT ON COLUMN language IS '学習コンテンツ'
/
COMMENT ON COLUMN language_color IS '学習コンテンツごとの色'
/

INSERT INTO `study_contents` (`content`,`content_color`) VALUES ('ドットインストール','1754ef');
INSERT INTO `study_contents` (`content`,`content_color`) VALUES ('N予備校','2171bd');
INSERT INTO `study_contents` (`content`,`content_color`) VALUES ('POSSE課題','4dbdde');
