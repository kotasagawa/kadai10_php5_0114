-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2023 年 1 月 19 日 22:07
-- サーバのバージョン： 10.4.27-MariaDB
-- PHP のバージョン: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gs_workdb5`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_content_table`
--

CREATE TABLE `gs_content_table` (
  `id` int(12) NOT NULL,
  `title` varchar(64) NOT NULL COMMENT '記事のタイトル',
  `content` varchar(256) NOT NULL COMMENT '記事の内容',
  `img` varchar(256) DEFAULT NULL COMMENT '画像のPATH',
  `tag` varchar(64) NOT NULL COMMENT 'tag',
  `date` datetime NOT NULL COMMENT '登録日',
  `update_time` datetime DEFAULT NULL COMMENT '更新日（NULL許容）'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci COMMENT='記事のテーブル';

--
-- テーブルのデータのダンプ `gs_content_table`
--

INSERT INTO `gs_content_table` (`id`, `title`, `content`, `img`, `tag`, `date`, `update_time`) VALUES
(40, 'title', 'content', '202301182050022023011409341620220617075113_dora_9.png', 'tag2', '2023-01-19 04:50:02', '2023-01-19 04:52:57'),
(41, '333', '333', '2023011915503920220617075343_dora_14.png', '333', '2023-01-19 23:50:39', NULL),
(42, '33', '33', '202301191605322023011409103120220617075333_dora_9.png', '33', '2023-01-20 00:05:32', NULL),
(43, 'title', 'contents', '202301192127232023011409483520220617075343_dora_14.png', 'tag', '2023-01-20 05:27:23', NULL),
(44, '錦織選手大活躍！', 'XXXXXXXXXX', '20230119215634ac4f7747-3a23-4941-9b8b-92b0b296aec9.jpeg', '大会', '2023-01-20 05:56:34', NULL),
(45, 'ジョコビッチ', 'XXXXXXXXXXX', '2023011921573620230119_djokovic-546.jpg', '大会', '2023-01-20 05:57:36', NULL),
(46, 'テニス１', 'XXXXXXXXXX', '20230119215817XTZWJAPAKZPUDFCJW6LWHWMPTE.jpg', 'ギア', '2023-01-20 05:58:17', NULL);

-- --------------------------------------------------------

--
-- テーブルの構造 `gs_user_table`
--

CREATE TABLE `gs_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) NOT NULL,
  `lid` varchar(128) NOT NULL,
  `lpw` varchar(64) NOT NULL,
  `kanri_flg` int(1) NOT NULL,
  `life_flg` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- テーブルのデータのダンプ `gs_user_table`
--

INSERT INTO `gs_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(1, 'テスト１管理者', 'test1', '$2y$10$amJsJbnjco8Gyz9bytkawOgWcKDu2PC/hf6daAkGYFZ35nmoq1ETu', 1, 0),
(2, 'テスト2一般', 'test2', '$2y$10$Jrod7Xts/VPa0ThZhT33AedMO7D2rHLA.qqDLqYGvimBqsP5Xliia', 0, 0),
(3, 'テスト３', 'test3', '$2y$10$hT8NciYWQ3.lO0QLfz1UHOySxqHYFVN3f3p2tTLQKiIgw0kBvO6g.', 0, 0),
(4, 'name', '111@gmail.com', '111', 0, 0),
(5, 'test', '112@gmail.com', '112', 0, 0),
(6, 'pp', 'pp@gmail.com', 'pp', 0, 0),
(7, 'kk', 'kk@gmail.com', 'kk', 0, 0),
(8, 'hello', 'j@gmail.com', 'j', 0, 0);

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gs_content_table`
--
ALTER TABLE `gs_content_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `gs_user_table`
--
ALTER TABLE `gs_user_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gs_content_table`
--
ALTER TABLE `gs_content_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- テーブルの AUTO_INCREMENT `gs_user_table`
--
ALTER TABLE `gs_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
