-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2019-06-11 10:31:42
-- 服务器版本： 10.1.37-MariaDB
-- PHP 版本： 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `cy580`
--

-- --------------------------------------------------------

--
-- 表的结构 `wp_adminroles`
--

CREATE TABLE `wp_adminroles` (
  `id` int(10) UNSIGNED NOT NULL,
  `admin_id` int(11) NOT NULL COMMENT '管理员id',
  `role_id` int(11) NOT NULL COMMENT '角色id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `wp_adminroles`
--

INSERT INTO `wp_adminroles` (`id`, `admin_id`, `role_id`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '2017-11-11 19:21:46', '2019-05-07 16:49:41'),
(3, 3, 2, NULL, '2019-01-14 19:47:17'),
(27, 34, 2, '2019-01-14 23:58:18', '2019-01-16 19:18:10'),
(28, 36, 4, '2019-05-14 09:35:53', '2019-05-14 15:07:39'),
(29, 37, 4, '2019-05-15 13:37:13', '2019-05-15 13:37:13');

-- --------------------------------------------------------

--
-- 表的结构 `wp_admins`
--

CREATE TABLE `wp_admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  `ip` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` int(4) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `wp_admins`
--

INSERT INTO `wp_admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `status`, `ip`, `type`) VALUES
(1, 'admin', 'Cy580_2019@qq.com', '$2y$10$ZNR2hPhxRfMq4loj/Xwjpeowt07BPbCwZ3LG26y3WG9DSQjChUCXa', 'HLCCa0I4g3ltYIGQApeFhtWwSBFzwTnejm0cNyieYuGzb043mT53g8FPsWw7', '2018-04-08 18:54:16', '2019-06-11 16:15:43', 1, '112.65.27.220', 1),
(3, 'ceshi1', '456@qq.com', '$2y$10$38TulKJw7Wp40aZy1D.UrexkS7Z0vw350XgQ0Ye/7pCMk6Pc8Im9e', 'AZqpRPpDLbE0ddw0G0FV0HhiLKOGWwpA729Q2Z3mIHsgvC4EH4qURdckgOGz', '2018-04-08 18:54:16', '2019-01-14 19:47:17', 1, '127.0.0.1', 2),
(34, '王武', 'wangwu@qq.com', '$2y$10$jpIqIHwnEFN1Q89C8k7Jiu1hVO/Dz72GrJdam/.M.otv5zbn186L.', NULL, '2019-01-14 23:58:18', '2019-01-16 19:18:10', 1, '127.0.0.1', 2);

-- --------------------------------------------------------

--
-- 表的结构 `wp_ap_config`
--

CREATE TABLE `wp_ap_config` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `group_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `m_extract` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `activation` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `name` char(200) COLLATE utf8_unicode_ci NOT NULL,
  `page_charset` char(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `content_test_url` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `a_match_type` varchar(300) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `title_match_type` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `content_match_type` varchar(1000) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `page_match_type` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `auto_set` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `a_selector` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_selector` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_selector` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_selector` varchar(400) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fecth_paged` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `same_paged` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `source_type` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `start_num` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `end_num` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `title_prefix` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title_suffix` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content_prefix` text COLLATE utf8_unicode_ci,
  `content_suffix` text COLLATE utf8_unicode_ci,
  `updated_num` mediumint(8) UNSIGNED NOT NULL DEFAULT '0',
  `cat` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author` smallint(5) UNSIGNED DEFAULT NULL,
  `update_interval` smallint(5) UNSIGNED NOT NULL DEFAULT '60',
  `published_interval` smallint(5) UNSIGNED NOT NULL DEFAULT '60',
  `post_scheduled` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_scheduled_last_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `download_img` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img_insert_attachment` char(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  `auto_tags` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `whole_word` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `tags` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_trans` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `use_rewrite` varchar(1000) COLLATE utf8_unicode_ci DEFAULT '0',
  `last_update_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `last_check_fetch_time` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `post_id` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `last_error` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `is_running` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `reverse_sort` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `add_source_url` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `proxy` char(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_type` varchar(50) COLLATE utf8_unicode_ci DEFAULT 'post',
  `post_format` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `check_duplicate` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `custom_field` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `err_status` tinyint(3) NOT NULL DEFAULT '1',
  `cookie` varchar(4000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zh_conversion` char(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publish_date` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `default_image` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_ap_config_group`
--

CREATE TABLE `wp_ap_config_group` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `group_name` char(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_ap_config_option`
--

CREATE TABLE `wp_ap_config_option` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `config_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `option_type` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `para1` char(255) COLLATE utf8_unicode_ci NOT NULL,
  `para2` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `options` char(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_ap_config_url_list`
--

CREATE TABLE `wp_ap_config_url_list` (
  `id` int(10) UNSIGNED NOT NULL,
  `config_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `url` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_ap_download_img_temp`
--

CREATE TABLE `wp_ap_download_img_temp` (
  `config_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `url` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `save_type` tinyint(3) NOT NULL DEFAULT '0',
  `remote_url` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `downloaded_url` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `local_key` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remote_key` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_path` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `file_name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mime_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_ap_flickr_img`
--

CREATE TABLE `wp_ap_flickr_img` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `flickr_photo_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `url_info` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_id` smallint(5) UNSIGNED NOT NULL,
  `local_key` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `in_local` tinyint(3) NOT NULL DEFAULT '0',
  `date_time` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_ap_flickr_oauth`
--

CREATE TABLE `wp_ap_flickr_oauth` (
  `oauth_id` smallint(5) UNSIGNED NOT NULL,
  `oauth_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `oauth_token_secret` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_ap_log`
--

CREATE TABLE `wp_ap_log` (
  `id` int(10) UNSIGNED NOT NULL,
  `config_id` int(10) UNSIGNED DEFAULT NULL,
  `date_time` int(10) UNSIGNED DEFAULT NULL,
  `info` varchar(2000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `url` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_ap_more_content`
--

CREATE TABLE `wp_ap_more_content` (
  `id` int(10) UNSIGNED NOT NULL,
  `config_id` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `option_type` smallint(5) UNSIGNED NOT NULL DEFAULT '0',
  `content` varchar(1000) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_ap_proxy`
--

CREATE TABLE `wp_ap_proxy` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `proxy_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `proxy_type` tinyint(4) NOT NULL DEFAULT '0',
  `proxy_ip` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `proxy_port` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `proxy_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `proxy_pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_ap_qiniu_img`
--

CREATE TABLE `wp_ap_qiniu_img` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `qiniu_key` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `local_key` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `in_local` tinyint(3) NOT NULL DEFAULT '0',
  `date_time` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_ap_updated_record`
--

CREATE TABLE `wp_ap_updated_record` (
  `id` int(10) UNSIGNED NOT NULL,
  `config_id` smallint(5) UNSIGNED NOT NULL,
  `url` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `post_id` int(10) UNSIGNED NOT NULL,
  `date_time` int(10) UNSIGNED NOT NULL,
  `url_status` tinyint(3) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_ap_upyun_img`
--

CREATE TABLE `wp_ap_upyun_img` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `upyun_key` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `local_key` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `in_local` tinyint(3) NOT NULL DEFAULT '0',
  `date_time` int(10) UNSIGNED DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_ap_watermark`
--

CREATE TABLE `wp_ap_watermark` (
  `id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `wm_type` tinyint(3) NOT NULL DEFAULT '0',
  `wm_position` tinyint(3) NOT NULL DEFAULT '9',
  `wm_font` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wm_text` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `wm_size` smallint(5) DEFAULT '16',
  `wm_color` varchar(100) COLLATE utf8_unicode_ci DEFAULT '#ffffff',
  `x_adjustment` smallint(5) DEFAULT '0',
  `y_adjustment` smallint(5) DEFAULT '0',
  `transparency` smallint(5) DEFAULT '80',
  `upload_image` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `upload_image_url` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `min_width` smallint(5) DEFAULT '150',
  `min_height` smallint(5) DEFAULT '150',
  `jpeg_quality` smallint(5) DEFAULT '90'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_archives`
--

CREATE TABLE `wp_archives` (
  `id` int(10) UNSIGNED NOT NULL,
  `pid` int(11) DEFAULT '0',
  `typeid` int(11) NOT NULL,
  `ismake` int(11) DEFAULT NULL,
  `brandid` int(11) DEFAULT NULL,
  `click` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shorttitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bdname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `flags` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mid` int(11) DEFAULT '0',
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `write` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `litpic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` int(10) DEFAULT '1',
  `city` int(8) DEFAULT NULL,
  `imagepics` text COLLATE utf8_unicode_ci,
  `dutyadmin` smallint(6) DEFAULT '0',
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int(4) DEFAULT '0' COMMENT '0未开始，1编写中，2，已完成',
  `editor` int(4) DEFAULT '1' COMMENT '编辑id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_arctypes`
--

CREATE TABLE `wp_arctypes` (
  `id` int(10) UNSIGNED NOT NULL,
  `reid` int(11) DEFAULT '0',
  `topid` int(11) DEFAULT '0',
  `sortrank` int(11) DEFAULT NULL,
  `typename` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typedir` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dirposition` smallint(6) DEFAULT '1',
  `is_write` int(11) DEFAULT NULL,
  `real_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `litpic` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `typeimages` text COLLATE utf8_unicode_ci,
  `contents` text COLLATE utf8_unicode_ci,
  `ishidden` int(4) DEFAULT '0',
  `mid` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `cid` int(10) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- 表的结构 `wp_autolink`
--

CREATE TABLE `wp_autolink` (
  `id` int(10) UNSIGNED NOT NULL,
  `keyword` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_categorys`
--

CREATE TABLE `wp_categorys` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `term_taxonomy_id` int(20) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `seo_keys` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `seo_des` text COLLATE utf8mb4_unicode_520_ci,
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_520_ci,
  `parent` bigint(20) DEFAULT '0',
  `count` bigint(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 转存表中的数据 `wp_categorys`
--

INSERT INTO `wp_categorys` (`term_id`, `term_taxonomy_id`, `name`, `slug`, `seo_title`, `seo_keys`, `seo_des`, `term_group`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, '百科攻略', 'wiki', '行业百科知识点，让您轻松创业 -招商创业网', '百科知识,轻松创业', '', 25, 'category', '', 0, 3069),
(2, 2, '招商创业网', 'http://www.imnotdoubi.test', '招商创业网 - 为民提供加盟连锁招商项目和创业者信息服务！', '招商创业网,加盟连锁,招商项目,创业信息', '招商创业网(imnotdoubi.test)主要为民提供优质的加盟连锁招商好项目是创业者首选的创业信息服务！其中包括最新的加盟创业项目、小本创业致富商机等热门品牌招商加盟信息。', 30, 'index', '', 0, 13),
(4, 4, '金融', 'jinron', '金融项目加盟_金融公司加盟要多少钱 - 招商创业网', '金融项目,金融加盟', '', 14, 'category', '', 10, 809),
(5, 5, '母婴', 'muying', '母婴用品加盟店排名_母婴店加盟需要多少钱？ -招商创业网', '母婴用品,母婴店加盟', '', 2, 'category', '', 0, 2404),
(6, 6, '零售', 'lingshou', '零售加盟项目有那些_新零售店品牌加盟项目 -招商创业网', '零售加盟,新零售', '', 12, 'category', '', 0, 4823),
(7, 7, '服装', 'fuzhuang', '服装加盟连锁店项目有哪些_服装加盟店排行榜 - 招商创业网', '服装加盟,服装品牌', '', 8, 'category', '', 0, 3948),
(8, 8, '教育', 'jiaoyu', '教育培训加盟项目有哪些_教育机构加盟大全 -招商创业网', '教育培训加盟,教育机构', '', 7, 'category', '', 0, 3127),
(9, 9, '建材', 'jiancai', '建材加盟项目有哪些_品牌建材加盟大全 -招商创业网', '建材加盟,品牌建材', '', 11, 'category', '', 0, 1594),
(10, 10, '服务', 'fuwu', '服务类招商加盟项目有哪些_服务品牌项目大全 -招商创业网', '服务招商,服务品牌', '', 10, 'category', '', 0, 5543),
(11, 11, '娱乐', 'yule', '娱乐游戏加盟项目有哪些_最新热门的娱乐游戏招商信息大全 -招商创业网', '娱乐游戏加盟,热门的游戏', '', 3, 'category', '', 0, 598),
(12, 12, '珠宝', 'zhubao', '珠宝加盟品牌招商项目有哪些_最新热门的珠宝礼品加盟店大全 -招商创业网', '珠宝加盟,礼品加盟', '', 9, 'category', '', 0, 1488),
(13, 13, '美容', 'meirong', '美容院加盟项目有哪些_美容加盟店大全 -招商创业网', '美容院加盟,美容加盟店', '', 4, 'category', '', 0, 4058),
(14, 14, '家居', 'jiaju', '家居加盟项目有哪些_加盟智能家居大全 -招商创业网', '家居加盟,智能家居加盟', '', 5, 'category', '', 0, 6161),
(15, 15, '其他', 'qita', '最新热门的招商加盟项目有哪些_最新招商加盟项目大全 -招商创业网', '最新加盟项目,热门的招商项目', '', 13, 'category', '', 0, 2538),
(17, 17, '火锅', 'huoguo', '火锅加盟项目有哪些_品牌火锅店招商加盟项目大全 -招商创业网', '火锅加盟,品牌火锅店', '', 0, 'category', '', 18, 988),
(18, 18, '餐饮', 'canyin', '餐饮品牌加盟连锁店费用_特色餐饮加盟排行榜 - 招商创业网', '餐饮品牌,特色餐饮,餐饮加盟', '', 1, 'category', '', 0, 24323),
(19, 19, '母婴用品', 'myyp', '母婴用品店加盟项目有哪些_母婴用品加盟店品牌大全 -招商创业网', '母婴用品店加盟,母婴用品', '', 0, 'category', '', 5, 1665),
(20, 20, '白酒', 'baijiu', '白酒代理加盟项目有哪些_品牌白酒招商加盟大全 -招商创业网', '白酒代理,白酒招商加盟', '', 0, 'category', '', 6, 912),
(21, 21, '西餐', 'xican', '西餐加盟项目有哪些_西餐厅加盟排行榜 -招商创业网', '西餐加盟,西餐厅加盟', '', 0, 'category', '', 18, 353),
(22, 22, '韩国料理', 'hgll', '韩国料理加盟项目有哪些_韩国料理怎么加盟需要多少钱 -招商创业网', '韩国料理,韩国料理加盟', '', 0, 'category', '', 18, 88),
(23, 23, '面馆', 'mianguan', '面馆加盟项目有哪些_面馆店加盟需要多少钱 -招商创业网', '面馆加盟,面馆店加盟', '', 0, 'category', '', 18, 496),
(24, 24, '冒菜', 'maocai', '冒菜加盟店项目有哪些_冒菜加盟排行榜 -招商创业网', '冒菜加盟店,冒菜加盟', '', 0, 'category', '', 18, 460),
(25, 25, '串串香', 'ccx', '串串香加盟项目有哪些_串串香加盟店大全 -招商创业网', '串串香加盟,串串香加盟店', '', 0, 'category', '', 18, 645),
(26, 26, '砂锅', 'shaguo', '砂锅加盟项目有哪些_加盟砂锅店品牌大全 -招商创业网', '砂锅加盟,加盟砂锅店', '', 0, 'category', '', 18, 48),
(27, 27, '甜品', 'tianpin', '甜品店加盟项目有哪些_品牌甜品加盟店大全 -招商创业网', '甜品店,甜品店加盟', '', 0, 'category', '', 18, 1295),
(28, 28, '米粉米线', 'mfmx', '米粉加盟项目有哪些_米线加盟项目有哪些_品牌米粉米线店加盟大全 -招商创业网', '米粉加盟,米线加盟', '', 0, 'category', '', 18, 798),
(29, 29, '奶茶', 'naicha', '奶茶店加盟项目有哪些_奶茶加盟店10大品牌排行榜 -招商创业网', '奶茶店加盟,奶茶加盟店', '', 0, 'category', '', 18, 1547),
(30, 30, '小吃', 'xiaochi', '小吃加盟项目有哪些_品牌小吃加盟店大全 -招商创业网', '小吃加盟,小吃加盟店', '', 0, 'category', '', 18, 912),
(31, 31, '蛋糕', 'dangao', '蛋糕加盟项目有哪些_品牌蛋糕店加盟大全 -招商创业网', '蛋糕加盟,蛋糕店加盟', '', 0, 'category', '', 18, 755),
(32, 32, '快餐', 'kuaican', '快餐店加盟项目有哪些_品牌快餐连锁加盟店10大品牌排行榜 -招商创业网', '快餐店加盟,快餐店', '', 0, 'category', '', 18, 1840),
(33, 33, '零食店', 'lsd', '零食店加盟项目有哪些_零食加盟店排行榜 -招商创业网', '零食店,零食店加盟', '', 0, 'category', '', 18, 493),
(34, 34, '烧烤', 'shaokao', '烧烤店加盟项目有哪些_品牌烧烤加盟店大全 -招商创业网', '烧烤店,烧烤店加盟', '', 0, 'category', '', 18, 770),
(35, 35, '冰淇淋', 'bql', '冰淇淋加盟项目有哪些_品牌冰淇淋加盟店排行榜 -招商创业网', '冰淇淋加盟,冰淇淋', '', 0, 'category', '', 18, 178),
(36, 36, '咖啡', 'kaf', '咖啡加盟店项目有哪些_品牌咖啡店加盟排行榜 -招商创业网', '咖啡加盟店,咖啡店', '', 0, 'category', '', 18, 737),
(37, 37, '汉堡', 'hanbao', '汉堡店加盟项目有哪些_品牌十大汉堡店加盟排行榜 -招商创业网', '汉堡店加盟,汉堡店', '', 0, 'category', '', 18, 370),
(38, 38, '中餐', 'zhongcan', '中餐加盟店项目有哪些_品牌中餐加盟店排行榜 -招商创业网', '中餐加盟店,中餐店', '', 0, 'category', '', 18, 4176),
(39, 39, '贡茶', 'gongcha', '贡茶加盟项目有哪些_品牌贡茶店加盟大全 -招商创业网', '贡茶加盟,贡茶', '', 0, 'category', '', 18, 115),
(40, 40, '煲仔饭', 'baozifan', '煲仔饭加盟项目有哪些_品牌煲仔饭加盟店排行榜 -招商创业网', '煲仔饭加盟,煲仔饭', '', 0, 'category', '', 18, 35),
(41, 41, '包子', 'baozi', '包子店加盟项目有哪些_品牌包子店加盟费用 -招商创业网', '包子店,包子店加盟', '', 0, 'category', '', 18, 364),
(42, 42, '黄焖鸡米饭', 'hmj', '黄焖鸡米饭加盟项目有哪些_品牌黄焖鸡米饭店加盟大全 -招商创业网', '黄焖鸡米饭,黄焖鸡米饭加盟', '', 0, 'category', '', 18, 251),
(43, 43, '寿司', 'shousi', '寿司加盟店项目有哪些_品牌寿司加盟店排行榜 -招商创业网', '寿司加盟店,寿司加盟', '', 0, 'category', '', 18, 414),
(44, 44, '烤鱼', 'kaoyu', '烤鱼加盟项目有哪些_品牌烤鱼加盟排行榜 -招商创业网', '烤鱼加盟,烤鱼', '', 0, 'category', '', 18, 492),
(45, 45, '臭豆腐', 'cdf', '臭豆腐加盟项目有哪些_品牌臭豆腐加盟店大全 -招商创业网', '臭豆腐加盟,臭豆腐加盟店', '', 0, 'category', '', 18, 39),
(46, 46, '豆浆', 'doujiang', '豆浆加盟店项目有哪些_品牌豆浆加盟店大全 -招商创业网', '豆浆,豆浆加盟店,豆浆店', '', 0, 'category', '', 18, 130),
(47, 47, '炸鸡', 'zhaji', '炸鸡店加盟项目有哪些_品牌炸鸡加盟店大全 -招商创业网', '炸鸡店,炸鸡店加盟', '', 0, 'category', '', 18, 621),
(48, 48, '麻辣香锅', 'mlxg', '麻辣香锅加盟项目有哪些_品牌麻辣香锅加盟店大全 -招商创业网', '麻辣香锅,麻辣香锅加盟', '', 0, 'category', '', 18, 183),
(49, 49, '麻辣烫', 'malat', '麻辣烫加盟项目有哪些_品牌麻辣烫加盟店排行榜 -招商创业网', '麻辣烫加盟,麻辣烫', '', 0, 'category', '', 18, 690),
(50, 50, '焖锅', 'menguo', '焖锅加盟项目有哪些_品牌加盟焖锅店大全 -招商创业网', '焖锅加盟,加盟焖锅店', '', 0, 'category', '', 18, 80),
(51, 51, '日本料理', 'rbll', '日本料理加盟项目有哪些_品牌日本料理加盟店排行榜 -招商创业网', '日本料理加盟,日本料理', '', 0, 'category', '', 18, 410),
(52, 52, '新奇特', 'xqt', '新奇特加盟项目有哪些_新奇特加盟店大全 -招商创业网', '新奇特加盟,新奇特', '', 0, 'category', '', 18, 701),
(53, 53, '牛排杯', 'npb', '牛排杯加盟项目有哪些_牛排杯加盟费 -招商创业网', '牛排杯加盟,牛排杯', '', 0, 'category', '', 18, 236),
(54, 54, '酸菜鱼', 'scy', '酸菜鱼加盟店项目有哪些_品牌酸菜鱼加盟店大全 -招商创业网', '酸菜鱼加盟店,酸菜鱼', '', 0, 'category', '', 18, 252),
(55, 55, '鱼火锅', 'yhg', '鱼火锅加盟项目有哪些_火锅鱼店加盟大全 -招商创业网', '鱼火锅加盟,鱼火锅', '', 0, 'category', '', 18, 36),
(56, 56, '饺子', 'jiaozi', '饺子加盟连锁店项目有哪些_品牌饺子加盟店大全 -招商创业网', '饺子加盟,饺子加盟店', '', 0, 'category', '', 18, 295),
(57, 57, '小龙虾', 'xlx', '小龙虾加盟项目有哪些_品牌小龙虾店加盟大全 -招商创业网', '小龙虾,小龙虾加盟', '', 0, 'category', '', 18, 155),
(58, 58, '蟹煲', 'xiebao', '蟹煲的加盟项目有哪些_蟹煲店加盟大全 -招商创业网', '蟹煲店,蟹煲店加盟', '', 0, 'category', '', 18, 120),
(59, 59, '铁板烧', 'tbs', '铁板烧加盟项目有哪些_品牌铁板烧加盟店大全 -招商创业网', '铁板烧,铁板烧加盟', '', 0, 'category', '', 18, 24),
(60, 60, '花甲', 'hj', '花甲加盟项目有哪些_品牌花甲店加盟大全 -招商创业网', '花甲加盟,花甲店', '', 0, 'category', '', 18, 49),
(61, 61, '饭团', 'ft', '饭团加盟项目有哪些_品牌饭团店加盟大全 -招商创业网', '饭团加盟,饭团店', '', 0, 'category', '', 18, 19),
(62, 62, '其他', 'qtcy', '其他餐饮加盟品牌大全_其他餐饮加盟连锁店费用 -招商创业网', '招商加盟,其他投资项目', '', 0, 'category', '', 18, 1661),
(70, 70, '儿童乐园', 'rtly', '儿童乐园加盟项目有哪些_品牌儿童乐园加盟店大全 -招商创业网', '儿童乐园,儿童乐园加盟店', '', 0, 'category', '', 5, 392),
(71, 71, '儿童玩具', 'rtwj', '儿童玩具加盟项目有哪些_品牌儿童玩具加盟店大全 -招商创业网', '儿童玩具,儿童玩具加盟店', '', 0, 'category', '', 5, 347),
(72, 72, '啤酒', 'pijiu', '啤酒加盟项目有哪些_品牌啤酒代理加盟店大全 -招商创业网', '啤酒加盟,啤酒代理', '', 0, 'category', '', 6, 254),
(73, 73, '茶叶', 'cha', '茶叶店加盟项目有哪些_茶叶加盟店排行榜 -招商创业网', '茶叶店加盟,茶叶加盟店', '', 0, 'category', '', 6, 593),
(74, 74, '超市', 'chaoshi', '超市加盟项目有哪些_小超市加盟店大全 -招商创业网', '超市加盟,小超市加盟', '', 0, 'category', '', 6, 437),
(624, 624, '红酒', 'hjiu', '红酒加盟项目有哪些_品牌红酒加盟店大全 -招商创业网', '红酒加盟,品牌红酒,红酒加盟店', '', 0, 'category', '', 6, 464),
(625, 625, '便利店', 'bld', '便利店加盟项目有哪些_品牌便利店加盟店排行榜 -招商创业网', '便利店加盟,品牌便利店', '', 0, 'category', '', 6, 392),
(626, 626, '眼镜', 'yanjing', '眼镜店加盟项目有哪些_品牌眼镜店加盟大全 -招商创业网', '眼镜店加盟,品牌眼镜店', '', 0, 'category', '', 6, 119),
(627, 627, '其他', 'qitals', '零售其他加盟项目有哪些_更多零售行业品牌加盟项目大全 -招商创业网', '零售其他,更多零售', '', 0, 'category', '', 6, 1652),
(628, 628, '男装', 'nzh', '男装加盟项目有哪些_品牌男装加盟店大全 -招商创业网', '男装加盟,品牌男装男装加盟项目', '', 0, 'category', '', 7, 778),
(629, 629, '女装', 'nz', '女装加盟店项目有哪些_品牌女装加盟店大全 -招商创业网', '女装加盟店,品牌女装加盟店', '', 0, 'category', '', 7, 746),
(630, 630, '鞋', 'xie', '鞋店加盟项目有哪些_品牌男女鞋加盟店大全 -招商创业网', '鞋店加盟,品牌鞋', '', 0, 'category', '', 7, 516),
(631, 631, '内衣', 'ny', '内衣加盟项目有哪些_品牌内衣加盟店大全 -招商创业网', '内衣加盟,品牌内衣', '', 0, 'category', '', 7, 616),
(632, 632, '其他', 'qtfz', '服装行业其他加盟项目有哪些_更多品牌服装行业加盟店大全 -招商创业网', '服装行业,服装加盟店', '', 0, 'category', '', 7, 737),
(633, 633, '早教', 'zaojiao', '早教亲子加盟项目有哪些_早教加盟要投资多少 -招商创业网', '早教亲子加盟,早教加盟', '', 0, 'category', '', 8, 887),
(634, 634, '幼儿园', 'yey', '幼儿园加盟项目有哪些_品牌幼儿园加盟多少钱 -招商创业网', '幼儿园加盟,品牌幼儿园', '', 0, 'category', '', 8, 391),
(635, 635, '培训', 'peix', '教育培训加盟项目有哪些_品牌培训机构加盟大全 -招商创业网', '教育培训加盟,培训机构加盟', '', 0, 'category', '', 8, 1849),
(636, 636, '五金', 'wj', '五金加盟项目有哪些_品牌五金建材加盟店大全 -招商创业网', '五金加盟,品牌五金建材', '', 0, 'category', '', 9, 545),
(637, 637, '门窗', 'menc', '门窗加盟项目有哪些_品牌铝合金门窗加盟店大全 -招商创业网', '门窗加盟,铝合金门窗加盟', '', 0, 'category', '', 9, 392),
(638, 638, '灯饰', 'dss', '灯饰加盟项目有哪些_品牌加盟灯饰店大全 -招商创业网', '灯饰加盟,品牌灯饰店', '', 0, 'category', '', 9, 76),
(639, 639, '墙纸', 'qzjj', '墙纸加盟项目有哪些_品牌墙纸店加盟项目大全 -招商创业网', '墙纸加盟,品牌墙纸店', '', 0, 'category', '', 9, 17),
(640, 640, '家具', 'jjv', '家具加盟项目有哪些_品牌家具加盟店大全 -招商创业网', '家具加盟,品牌家具', '', 0, 'category', '', 9, 131),
(641, 641, '涂料', 'tuliao', '涂料加盟项目有哪些_品牌涂料厂加盟大全 -招商创业网', '涂料加盟,涂料厂加盟', '', 0, 'category', '', 9, 57),
(642, 642, '集成吊顶', 'jcdd', '集成吊顶加盟项目有哪些_品牌集成吊顶加盟项目大全 -招商创业网', '集成吊顶加盟,品牌集成吊顶', '', 0, 'category', '', 9, 241),
(643, 643, '其他', 'qtcll', '建材其他加盟项目有哪些_更多品牌建材加盟项目大全 -招商创业网', '建材,建材加盟', '', 0, 'category', '', 9, 135),
(644, 644, '干洗', 'gxxx', '干洗店加盟项目有哪些_加盟干洗店要多少钱 -招商创业网', '干洗店加盟,加盟干洗店费用', '', 0, 'category', '', 10, 397),
(645, 645, '家政', 'jzz', '家政公司加盟项目有哪些_品牌家政保洁加盟服务大全 -招商创业网', '家政公司加盟,家政保洁', '', 0, 'category', '', 10, 103),
(646, 646, '其他', 'qtfw', '服务其他加盟项目有哪些_更多品牌服务行业加盟项目大全 -招商创业网', '服务其他加盟,服务加盟', '', 0, 'category', '', 10, 225),
(647, 647, '健身', 'jsff', '健身房加盟项目有哪些_品牌健身俱乐部加盟项目大全 -招商创业网', '健身房加盟,品牌健身', '', 0, 'category', '', 11, 308),
(648, 648, 'ktv', 'ktv', 'ktv加盟项目有哪些_品牌量贩式ktv加盟项目大全 -招商创业网', 'ktv加盟,量贩式ktv加盟', '', 0, 'category', '', 11, 111),
(649, 649, '影院', 'yingyuan', '电影院加盟项目有哪些_私人电影院加盟大全 -招商创业网', '电影院加盟,私人电影院', '', 0, 'category', '', 11, 39),
(650, 650, '其他', 'qtyll', '娱乐行业其他加盟项目有哪些_更多品牌娱乐行业招商加盟项目大全 -招商创业网', '娱乐行业,娱乐加盟', '', 0, 'category', '', 11, 140),
(651, 651, '饰品', 'shipin', '饰品店加盟项目有哪些_品牌饰品加盟店大全 -招商创业网', '饰品店加盟,品牌饰品', '', 0, 'category', '', 12, 916),
(652, 652, '礼品', 'lip', '礼品店加盟项目有哪些_品牌加盟礼品店大全 -招商创业网', '礼品店加盟,礼品店', '', 0, 'category', '', 12, 118),
(653, 653, '其他', 'qitazb', '珠宝行业其他加盟项目有哪些_更多品牌珠宝行业招商加盟项目大全 -招商创业网', '珠宝行业,品牌珠宝', '', 0, 'category', '', 12, 453),
(654, 654, '足疗美甲', 'zlmj', '足疗店加盟项目有哪些_品牌美甲加盟店大全 -招商创业网', '足疗店加盟,美甲加盟店', '', 0, 'category', '', 13, 273),
(655, 655, '养生', 'yangsheng', '养生馆加盟项目有哪些_品牌美容养生加盟项目大全 -招商创业网', '养生馆加盟,美容养生加盟', '', 0, 'category', '', 13, 451),
(656, 656, '美容美发', 'mrmf', '美容美发加盟项目有哪些_品牌美发加盟店大全 -招商创业网', '美容美发,美发加盟店', '', 0, 'category', '', 13, 996),
(657, 657, '化妆品', 'hzpm', '化妆品店加盟项目有哪些_品牌化妆品加盟店大全 -招商创业网', '化妆品店加盟,品牌化妆品', '', 0, 'category', '', 13, 193),
(658, 658, '减肥瘦身', 'jfsss', '减肥加盟店项目有哪些_瘦身加盟项目大全 -招商创业网', '减肥加盟店,瘦身加盟', '', 0, 'category', '', 13, 106),
(659, 659, '其他', 'qitamr', '美容行业其他加盟项目有哪些_更多品牌美容行业招商加盟项目大全 -招商创业网', '美容行业,美容加盟', '', 0, 'category', '', 13, 2039),
(660, 660, '智能家居', 'znjj', '智能家居加盟项目有哪些_加盟智能家居项目大全 -招商创业网', '智能家居加盟,加盟智能家居', '', 0, 'category', '', 14, 168),
(661, 661, '家电', 'jdd', '小家电加盟项目有哪些_家电清洗加盟 -招商创业网', '小家电加盟,家电清洗加盟', '', 0, 'category', '', 14, 892),
(662, 662, '其他', 'qitajj', '家居行业其他加盟项目有哪些_更多品牌家居行业加盟项目大全 -招商创业网', '家居行业,品牌家居', '', 0, 'category', '', 14, 4149),
(676, 676, '行业知识', 'hyzs', '各行业知识点解答 -招商创业网', '行业知识,招商创业网', '', 0, 'category', '', 1, 1262),
(677, 677, '创业攻略', 'chuang', '创业攻略知识点大全 -招商创业网', '创业攻略,知识点', '', 0, 'category', '', 1, 1105),
(678, 678, '商务服务', 'sw', '电子商务服务相关知识点大全 -招商创业网', '电子商务,招商创业网', '', 0, 'category', '', 1, 701),
(3280, 3280, '童装', 'tzjm', '童装加盟店项目有哪些_品牌童装店加盟项目大全 -招商创业网', '童装加盟,童装加盟店', '', 0, 'category', '', 7, 555),
(3281, 3281, '资讯', 'zixun', '实时更新最新的创业行业资讯信息！ -招商创业网', '', '', 24, 'category', '', 0, 3546),
(10916, 10916, '微商', 'weishang', '微商加盟项目有哪些_品牌微商加盟代理大全 -招商创业网', '微商加盟,微商代理', '', 0, 'category', '', 10, 126),
(11200, 11200, '家纺', 'jiafang', '家纺加盟项目有哪些_家纺品牌加盟大全 -招商创业网', '家纺加盟,家纺品牌', '', 0, 'category', '', 14, 951),
(12939, 12939, '宠物店', 'cwd', '宠物店加盟项目有哪些_品牌宠物加盟店排行榜 -招商创业网', '宠物店加盟,品牌宠物', '', 0, 'category', '', 10, 209),
(13323, 13323, '酒店', 'jiud', '酒店加盟项目有哪些_品牌连锁酒店加盟大全 -招商创业网', '酒店加盟,连锁酒店', '', 0, 'category', '', 10, 1343),
(14084, 14084, '汽车', 'qiche', '汽车美容店加盟项目有哪些_汽车美容加盟店排名 -招商创业网', '汽车美容店,汽车美容店加盟', '', 0, 'category', '', 10, 729),
(16575, 16575, '网络', 'int', '网络加盟项目有哪些_网络教育加盟大全 -招商创业网', '网络加盟,网络教育', '', 0, 'category', '', 10, 688),
(17406, 17406, '环保', 'huanbao', '环保招商加盟项目有哪些_环保项目加盟大全 -招商创业网', '环保招商,环保项目加盟', '', 0, 'category', '', 15, 816),
(17618, 17618, '农业', 'nongye', '农业致富好项目有哪些_现代农业最佳项目大全 -招商创业网', '农业致富,农业项目', '', 0, 'category', '', 15, 250),
(19418, 19418, '医药', 'yiyao', '医药加盟项目有哪些_医药连锁加盟项目大全 -招商创业网', '医药加盟,医药连锁加盟', '', 0, 'category', '', 15, 1061),
(19732, 19732, '休闲', 'xiux', '休闲会所加盟项目有哪些_品牌休闲店加盟项目大全 -招商创业网', '休闲会所,品牌休闲店', '', 0, 'category', '', 10, 914),
(222217, 222217, '最新资讯', 'news', '最新加盟资讯-招商创业网', '加盟资讯，加盟投资攻略，加盟费用详解', '', 100, 'news', '', 0, 0),
(222219, 222219, '加盟商机', 'shangji', '加盟项目商机', '加盟项目商机，加盟项目动态', '', 102, 'news', '', 222217, 0),
(222220, 222220, '加盟知识', 'zhishi', '实时更新最新项目加盟行业知识！ -招商创业网', '加盟知识，如何加盟项目', '', 22, 'news', '', 222217, 0);

-- --------------------------------------------------------

--
-- 表的结构 `wp_commentmeta`
--

CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `comment_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_comments`
--

CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) UNSIGNED NOT NULL,
  `comment_post_ID` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `comment_mail_notify` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_links`
--

CREATE TABLE `wp_links` (
  `link_id` bigint(20) UNSIGNED NOT NULL,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_520_ci DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_520_ci DEFAULT 'Y',
  `link_owner` bigint(20) UNSIGNED DEFAULT '1',
  `link_rating` int(11) DEFAULT '0',
  `link_updated` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_520_ci,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_news`
--

CREATE TABLE `wp_news` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `pterm_id` bigint(10) NOT NULL DEFAULT '0',
  `term_id` bigint(20) DEFAULT '0',
  `post_author` bigint(20) UNSIGNED DEFAULT '0',
  `post_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `seotitle` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `seokeys` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `status` bigint(5) DEFAULT '1',
  `post_jstitle` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `subtitle` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `flags` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `images` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT '',
  `post_modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT '',
  `menu_order` int(11) DEFAULT '0',
  `comment_count` bigint(20) DEFAULT '0',
  `views` bigint(20) DEFAULT '386'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_news2`
--

CREATE TABLE `wp_news2` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `pterm_id` bigint(10) NOT NULL DEFAULT '0',
  `term_id` bigint(20) DEFAULT '0',
  `post_author` bigint(20) UNSIGNED DEFAULT '0',
  `post_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `seotitle` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `seokeys` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `status` bigint(5) DEFAULT '1',
  `post_jstitle` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `subtitle` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `flags` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `images` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT '',
  `post_modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT '',
  `menu_order` int(11) DEFAULT '0',
  `comment_count` bigint(20) DEFAULT '0',
  `views` bigint(20) DEFAULT '386'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_notifications`
--

CREATE TABLE `wp_notifications` (
  `id` char(36) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_options`
--

CREATE TABLE `wp_options` (
  `option_id` bigint(20) UNSIGNED NOT NULL,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_pm`
--

CREATE TABLE `wp_pm` (
  `id` bigint(20) NOT NULL,
  `subject` text NOT NULL,
  `content` text NOT NULL,
  `type` varchar(20) DEFAULT NULL,
  `sender` int(11) DEFAULT NULL,
  `recipient` int(11) DEFAULT NULL,
  `from_to` tinytext,
  `date` datetime NOT NULL,
  `read` tinyint(1) NOT NULL,
  `deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `wp_pnews`
--

CREATE TABLE `wp_pnews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pterm_id` bigint(10) NOT NULL DEFAULT '0',
  `term_id` bigint(20) DEFAULT '0',
  `pid` bigint(20) DEFAULT '0',
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `seotitle` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `seokeys` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `status` bigint(5) DEFAULT '1',
  `post_jstitle` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `flags` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `images` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `post_modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `views` bigint(20) DEFAULT '386'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_postmeta`
--

CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_posts`
--

CREATE TABLE `wp_posts` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `pterm_id` bigint(10) NOT NULL DEFAULT '0',
  `term_id` bigint(20) DEFAULT '0',
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `seotitle` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `seokeys` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `status` bigint(5) DEFAULT '1',
  `post_jstitle` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `subtitle` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `flags` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `images` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  `views` bigint(20) DEFAULT '386'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_projectdatas`
--

CREATE TABLE `wp_projectdatas` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `pterm_id` bigint(10) NOT NULL DEFAULT '0',
  `term_id` bigint(20) DEFAULT '0',
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `seotitle` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `seokeys` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `status` bigint(5) DEFAULT '1',
  `post_jstitle` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `subtitle` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `flags` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `images` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  `views` bigint(20) DEFAULT '386'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_projects`
--

CREATE TABLE `wp_projects` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `pterm_id` bigint(10) NOT NULL DEFAULT '0',
  `term_id` bigint(20) DEFAULT '0',
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `seotitle` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `seokeys` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `status` bigint(5) DEFAULT '1',
  `post_jstitle` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `subtitle` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `flags` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `images` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT '',
  `post_modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `menu_order` longtext COLLATE utf8mb4_unicode_520_ci,
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  `views` bigint(20) DEFAULT '386'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_projects2`
--

CREATE TABLE `wp_projects2` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `pterm_id` bigint(10) NOT NULL DEFAULT '0',
  `term_id` bigint(20) DEFAULT '0',
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `seotitle` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `seokeys` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `status` bigint(5) DEFAULT '1',
  `post_jstitle` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `subtitle` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `flags` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `images` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT '',
  `post_modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `menu_order` longtext COLLATE utf8mb4_unicode_520_ci,
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  `views` bigint(20) DEFAULT '386'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_projects6`
--

CREATE TABLE `wp_projects6` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `pterm_id` bigint(10) NOT NULL DEFAULT '0',
  `term_id` bigint(20) DEFAULT '0',
  `post_author` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `post_date` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `seotitle` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `seokeys` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `status` bigint(5) DEFAULT '1',
  `post_jstitle` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `subtitle` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `flags` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `images` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT '',
  `post_modified` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `menu_order` longtext COLLATE utf8mb4_unicode_520_ci,
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  `views` bigint(20) DEFAULT '386'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_roleauths`
--

CREATE TABLE `wp_roleauths` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL COMMENT '角色id',
  `rule_id` int(11) NOT NULL COMMENT '权限id',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `wp_roleauths`
--

INSERT INTO `wp_roleauths` (`id`, `role_id`, `rule_id`, `created_at`, `updated_at`) VALUES
(12, 1, 1, '2017-11-12 23:21:24', '2017-11-12 23:21:24'),
(13, 1, 2, '2017-11-12 23:21:24', '2017-11-12 23:21:24'),
(14, 1, 3, '2017-11-12 23:21:24', '2017-11-12 23:21:24'),
(15, 1, 4, '2017-11-12 23:21:24', '2017-11-12 23:21:24'),
(16, 1, 5, '2017-11-12 23:21:24', '2017-11-12 23:21:24'),
(17, 1, 6, '2017-11-12 23:21:24', '2017-11-12 23:21:24'),
(18, 1, 7, '2017-11-12 23:21:24', '2017-11-12 23:21:24'),
(19, 1, 8, '2017-11-12 23:21:24', '2017-11-12 23:21:24'),
(20, 1, 9, '2017-11-12 23:21:24', '2017-11-12 23:21:24'),
(23, 2, 2, '2017-11-16 18:00:06', '2017-11-16 18:00:06'),
(24, 1, 10, '2017-11-19 10:47:13', '2017-11-19 10:47:13'),
(25, 1, 11, '2017-11-19 10:47:13', '2017-11-19 10:47:13'),
(26, 1, 12, '2017-11-19 10:47:13', '2017-11-19 10:47:13'),
(27, 1, 13, '2017-11-19 10:47:13', '2017-11-19 10:47:13'),
(28, 1, 14, '2017-11-19 10:47:13', '2017-11-19 10:47:13'),
(29, 1, 15, '2017-11-19 10:47:13', '2017-11-19 10:47:13'),
(30, 1, 16, '2017-11-19 10:47:13', '2017-11-19 10:47:13'),
(31, 1, 17, '2017-11-19 10:47:13', '2017-11-19 10:47:13'),
(32, 1, 18, '2017-11-19 10:47:13', '2017-11-19 10:47:13'),
(49, 1, 19, '2017-11-19 12:05:53', '2017-11-19 12:05:53'),
(50, 1, 20, '2017-11-19 12:05:53', '2017-11-19 12:05:53'),
(51, 1, 21, '2017-11-19 12:05:53', '2017-11-19 12:05:53'),
(52, 1, 22, '2017-11-19 12:05:53', '2017-11-19 12:05:53'),
(53, 1, 23, '2017-11-19 12:05:53', '2017-11-19 12:05:53'),
(54, 1, 24, '2017-11-19 12:05:53', '2017-11-19 12:05:53'),
(56, 2, 1, '2017-11-19 22:24:43', '2017-11-19 22:24:43'),
(57, 2, 3, '2017-11-19 22:24:43', '2017-11-19 22:24:43'),
(67, 3, 4, '2019-01-07 22:29:20', '2019-01-07 22:29:20'),
(70, 3, 7, '2019-01-07 22:29:20', '2019-01-07 22:29:20'),
(71, 3, 8, '2019-01-07 22:29:20', '2019-01-07 22:29:20'),
(72, 3, 9, '2019-01-07 22:29:20', '2019-01-07 22:29:20'),
(80, 3, 1, '2019-01-08 23:47:17', '2019-01-08 23:47:17'),
(81, 3, 2, '2019-01-08 23:47:17', '2019-01-08 23:47:17'),
(93, 1, 34, '2019-01-09 18:15:50', '2019-01-09 18:15:50'),
(94, 1, 35, '2019-01-09 18:35:20', '2019-01-09 18:35:20'),
(95, 1, 36, '2019-01-09 18:35:20', '2019-01-09 18:35:20'),
(96, 1, 37, '2019-01-09 18:35:20', '2019-01-09 18:35:20'),
(97, 1, 38, '2019-01-09 18:35:20', '2019-01-09 18:35:20'),
(98, 1, 39, '2019-01-09 18:35:20', '2019-01-09 18:35:20'),
(99, 1, 40, '2019-01-09 18:35:20', '2019-01-09 18:35:20'),
(100, 2, 35, '2019-01-09 18:35:33', '2019-01-09 18:35:33'),
(101, 2, 36, '2019-01-09 18:35:34', '2019-01-09 18:35:34'),
(102, 2, 37, '2019-01-09 18:35:34', '2019-01-09 18:35:34'),
(103, 2, 38, '2019-01-09 18:35:34', '2019-01-09 18:35:34'),
(104, 2, 39, '2019-01-09 18:35:34', '2019-01-09 18:35:34'),
(106, 2, 41, '2019-01-09 18:44:36', '2019-01-09 18:44:36'),
(107, 1, 41, '2019-01-09 18:45:09', '2019-01-09 18:45:09'),
(108, 3, 41, '2019-01-09 21:40:35', '2019-01-09 21:40:35'),
(109, 1, 42, '2019-01-10 23:19:53', '2019-01-10 23:19:53'),
(110, 2, 42, '2019-01-10 23:20:02', '2019-01-10 23:20:02'),
(112, 1, 43, '2019-01-10 23:51:26', '2019-01-10 23:51:26'),
(113, 1, 44, '2019-01-11 00:16:43', '2019-01-11 00:16:43'),
(120, 3, 44, '2019-01-11 00:37:46', '2019-01-11 00:37:46'),
(122, 2, 44, '2019-01-11 00:39:35', '2019-01-11 00:39:35'),
(123, 2, 43, '2019-01-11 00:39:35', '2019-01-11 00:39:35'),
(125, 1, 45, '2019-01-11 01:03:08', '2019-01-11 01:03:08'),
(126, 1, 46, '2019-01-13 19:52:26', '2019-01-13 19:52:26'),
(127, 2, 46, '2019-01-13 19:52:45', '2019-01-13 19:52:45'),
(128, 3, 46, '2019-01-13 19:52:56', '2019-01-13 19:52:56'),
(129, 1, 47, '2019-01-13 21:14:30', '2019-01-13 21:14:30'),
(130, 2, 47, '2019-01-13 22:03:46', '2019-01-13 22:03:46'),
(131, 3, 47, '2019-01-13 22:05:15', '2019-01-13 22:05:15'),
(132, 1, 48, '2019-01-14 01:24:03', '2019-01-14 01:24:03'),
(133, 2, 48, '2019-01-14 01:24:09', '2019-01-14 01:24:09'),
(134, 1, 49, '2019-01-14 23:21:38', '2019-01-14 23:21:38'),
(135, 2, 49, '2019-01-14 23:21:43', '2019-01-14 23:21:43'),
(136, 3, 49, '2019-01-14 23:22:12', '2019-01-14 23:22:12'),
(137, 1, 50, '2019-01-15 00:24:27', '2019-01-15 00:24:27'),
(138, 1, 51, '2019-02-20 00:36:32', '2019-02-20 00:36:32'),
(139, 1, 52, '2019-02-20 00:36:32', '2019-02-20 00:36:32'),
(140, 1, 53, '2019-02-20 00:36:32', '2019-02-20 00:36:32'),
(141, 1, 54, '2019-02-26 00:56:25', '2019-02-26 00:56:25'),
(142, 1, 55, '2019-02-26 01:31:42', '2019-02-26 01:31:42'),
(143, 2, 54, '2019-04-09 14:27:03', '2019-04-09 14:27:03'),
(144, 2, 55, '2019-04-09 14:27:03', '2019-04-09 14:27:03'),
(145, 2, 56, '2019-04-09 14:31:25', '2019-04-09 14:31:25'),
(146, 2, 57, '2019-04-09 14:31:25', '2019-04-09 14:31:25'),
(147, 2, 58, '2019-04-09 14:31:25', '2019-04-09 14:31:25'),
(148, 1, 56, '2019-04-09 14:31:33', '2019-04-09 14:31:33'),
(149, 1, 57, '2019-04-09 14:31:33', '2019-04-09 14:31:33'),
(150, 1, 58, '2019-04-09 14:31:33', '2019-04-09 14:31:33'),
(151, 1, 59, '2019-04-09 15:14:04', '2019-04-09 15:14:04'),
(152, 1, 60, '2019-04-09 15:14:04', '2019-04-09 15:14:04'),
(153, 2, 59, '2019-04-09 15:14:29', '2019-04-09 15:14:29'),
(154, 2, 60, '2019-04-09 15:14:29', '2019-04-09 15:14:29'),
(155, 1, 61, '2019-04-09 17:55:47', '2019-04-09 17:55:47'),
(156, 1, 62, '2019-04-09 17:55:47', '2019-04-09 17:55:47'),
(157, 1, 63, '2019-04-09 17:55:47', '2019-04-09 17:55:47'),
(158, 1, 64, '2019-04-09 17:55:47', '2019-04-09 17:55:47'),
(159, 1, 65, '2019-04-09 17:55:47', '2019-04-09 17:55:47'),
(160, 2, 61, '2019-04-09 17:55:58', '2019-04-09 17:55:58'),
(161, 2, 62, '2019-04-09 17:55:59', '2019-04-09 17:55:59'),
(162, 2, 63, '2019-04-09 17:55:59', '2019-04-09 17:55:59'),
(163, 2, 64, '2019-04-09 17:55:59', '2019-04-09 17:55:59'),
(164, 2, 65, '2019-04-09 17:55:59', '2019-04-09 17:55:59'),
(165, 1, 66, '2019-04-10 09:55:09', '2019-04-10 09:55:09'),
(166, 1, 67, '2019-04-12 13:50:47', '2019-04-12 13:50:47'),
(167, 1, 68, '2019-04-12 13:50:47', '2019-04-12 13:50:47'),
(168, 2, 67, '2019-04-12 13:50:52', '2019-04-12 13:50:52'),
(169, 2, 68, '2019-04-12 13:50:52', '2019-04-12 13:50:52'),
(170, 1, 69, '2019-04-12 14:00:24', '2019-04-12 14:00:24'),
(171, 1, 70, '2019-04-12 15:38:36', '2019-04-12 15:38:36'),
(172, 1, 71, '2019-04-12 15:38:36', '2019-04-12 15:38:36'),
(173, 2, 69, '2019-04-12 15:38:47', '2019-04-12 15:38:47'),
(174, 2, 70, '2019-04-12 15:38:47', '2019-04-12 15:38:47'),
(175, 2, 71, '2019-04-12 15:38:47', '2019-04-12 15:38:47'),
(176, 1, 72, '2019-04-12 16:48:44', '2019-04-12 16:48:44'),
(177, 2, 72, '2019-04-12 16:48:51', '2019-04-12 16:48:51'),
(178, 1, 73, '2019-05-09 13:56:39', '2019-05-09 13:56:39'),
(179, 1, 74, '2019-05-09 14:32:01', '2019-05-09 14:32:01'),
(180, 4, 36, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(181, 4, 37, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(182, 4, 44, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(183, 4, 42, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(184, 4, 43, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(185, 4, 45, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(186, 4, 46, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(187, 4, 47, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(188, 4, 48, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(189, 4, 49, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(190, 4, 41, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(191, 4, 67, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(192, 4, 68, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(193, 4, 69, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(194, 4, 70, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(195, 4, 71, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(196, 4, 72, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(197, 4, 56, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(198, 4, 57, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(199, 4, 58, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(200, 4, 59, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(201, 4, 60, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(202, 4, 73, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(203, 4, 74, '2019-05-14 09:34:05', '2019-05-14 09:34:05'),
(206, 4, 1, '2019-05-15 13:42:20', '2019-05-15 13:42:20'),
(207, 4, 2, '2019-05-15 13:42:20', '2019-05-15 13:42:20'),
(208, 4, 3, '2019-05-15 13:42:20', '2019-05-15 13:42:20'),
(209, 4, 35, '2019-05-15 13:42:20', '2019-05-15 13:42:20'),
(210, 4, 38, '2019-05-15 13:42:20', '2019-05-15 13:42:20'),
(211, 4, 39, '2019-05-15 13:42:20', '2019-05-15 13:42:20'),
(212, 4, 54, '2019-05-15 13:42:20', '2019-05-15 13:42:20'),
(213, 4, 55, '2019-05-15 13:42:20', '2019-05-15 13:42:20');

-- --------------------------------------------------------

--
-- 表的结构 `wp_roles`
--

CREATE TABLE `wp_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '角色名称',
  `remark` text COLLATE utf8mb4_unicode_ci COMMENT '角色描述',
  `order` tinyint(3) UNSIGNED NOT NULL DEFAULT '255' COMMENT '排序',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态: 1 正常, 2=>禁止',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `wp_roles`
--

INSERT INTO `wp_roles` (`id`, `name`, `remark`, `order`, `status`, `created_at`, `updated_at`) VALUES
(1, '超级管理员', '拥有网站最大权限', 255, 1, '2017-11-11 19:20:51', '2017-11-11 19:20:51'),
(2, '管理员', '管理后台的人员', 255, 1, '2017-11-11 19:21:04', '2017-11-16 18:01:57'),
(3, '外编人员', '发布文章的人', 255, 1, NULL, '2019-01-07 22:02:34'),
(4, 'panyouping', '编辑', 255, 1, '2019-05-14 09:33:04', '2019-05-16 10:43:26');

-- --------------------------------------------------------

--
-- 表的结构 `wp_rules`
--

CREATE TABLE `wp_rules` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '权限名称',
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '权限路由',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '上级权限',
  `is_hidden` tinyint(3) UNSIGNED NOT NULL DEFAULT '0' COMMENT '是否隐藏',
  `sort` int(10) UNSIGNED NOT NULL DEFAULT '255' COMMENT '排序',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '状态: 1 正常, 2=>禁止',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fonts` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '菜单fonts图标'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 转存表中的数据 `wp_rules`
--

INSERT INTO `wp_rules` (`id`, `name`, `route`, `url`, `parent_id`, `is_hidden`, `sort`, `status`, `created_at`, `updated_at`, `fonts`) VALUES
(1, '后台首页', 'App\\Http\\Controllers\\Admin\\IndexController@index', '/admin/index', 0, 0, 1, 1, '2017-11-12 13:45:27', '2019-05-16 09:13:44', 'home'),
(2, '欢迎界面', 'App\\Http\\Controllers\\Admin\\IndexController@index', NULL, 1, 0, 255, 1, '2017-11-12 15:41:14', '2019-05-16 09:13:49', NULL),
(3, '后台授权', NULL, NULL, 0, 0, 2, 1, '2017-11-12 16:06:50', '2017-11-20 18:44:00', 'users'),
(4, '用户信息', 'App\\Http\\Controllers\\Admin\\AdminController@Index', '/admin/list', 3, 0, 9, 1, '2017-11-12 16:09:06', '2019-05-16 09:03:30', NULL),
(5, '添加页面', 'App\\Http\\Controllers\\Admin\\AdminController@Register', NULL, 4, 1, 255, 1, '2017-11-12 18:56:30', '2017-11-12 18:57:48', NULL),
(6, '添加数据', 'App\\Http\\Controllers\\Admin\\AdminController@PostRegister', NULL, 4, 1, 255, 1, '2017-11-12 18:57:46', '2017-11-12 18:58:56', NULL),
(7, '修改页面', 'App\\Http\\Controllers\\Admin\\AdminController@Edit', NULL, 4, 1, 255, 1, '2017-11-12 18:58:44', '2017-11-12 18:59:09', NULL),
(8, '数据更新', 'App\\Http\\Controllers\\Admin\\AdminController@PostEdit', NULL, 4, 1, 255, 1, '2017-11-12 18:59:52', '2017-11-16 21:32:23', NULL),
(9, '状态修改', 'admins.status', NULL, 4, 1, 255, 1, '2017-11-16 18:05:34', '2017-11-16 21:27:06', NULL),
(10, '删除', 'App\\Http\\Controllers\\Admin\\AdminController@delete', NULL, 4, 1, 255, 1, '2017-11-16 18:08:41', '2017-11-16 21:27:35', NULL),
(11, '角色管理', 'App\\Http\\Controllers\\Admin\\RolesController@index', '/admin/roles', 3, 0, 10, 1, '2017-11-12 19:00:47', '2019-05-16 09:02:38', NULL),
(12, '添加页面', 'App\\Http\\Controllers\\Admin\\RolesController@create', '', 11, 0, 255, 1, '2017-11-16 21:02:52', '2019-05-16 09:14:26', NULL),
(13, '添加数据', 'App\\Http\\Controllers\\Admin\\RolesController@store', '', 11, 1, 255, 1, '2017-11-16 21:03:46', '2017-11-16 21:03:46', NULL),
(14, '修改页面', 'App\\Http\\Controllers\\Admin\\RolesController@edit', '', 11, 1, 255, 1, '2017-11-16 21:06:47', '2017-11-16 21:08:30', NULL),
(15, '数据更新', 'App\\Http\\Controllers\\Admin\\RolesController@update', '', 11, 1, 255, 1, '2017-11-16 21:08:12', '2017-11-16 21:08:27', NULL),
(16, '权限分配页面', 'App\\Http\\Controllers\\Admin\\RolesController@access', '', 11, 1, 255, 1, '2017-11-16 21:09:58', '2017-11-16 21:10:31', NULL),
(17, '权限分配', 'App\\Http\\Controllers\\Admin\\RolesController@groupAccess', '', 11, 1, 255, 1, '2017-11-16 21:11:01', '2017-11-16 21:11:01', NULL),
(18, '删除角色', 'App\\Http\\Controllers\\Admin\\RolesController@destroy', '', 11, 1, 255, 1, '2017-11-16 21:12:22', '2017-11-16 21:12:22', NULL),
(19, '权限管理', 'App\\Http\\Controllers\\Admin\\RulesController@index', '/admin/rules', 3, 0, 11, 1, '2017-11-16 21:14:27', '2019-05-16 09:03:22', NULL),
(20, '添加页面', 'App\\Http\\Controllers\\Admin\\RulesController@create', '', 19, 1, 255, 1, '2017-11-16 21:16:30', '2017-11-16 21:16:30', NULL),
(21, '添加数据', 'App\\Http\\Controllers\\Admin\\RulesController@store', '', 19, 1, 255, 1, '2017-11-16 21:17:07', '2017-11-16 21:17:07', NULL),
(22, '修改页面', 'App\\Http\\Controllers\\Admin\\RulesController@edit', '', 19, 1, 255, 1, '2017-11-16 21:19:23', '2017-11-16 21:19:23', NULL),
(23, '数据更新', 'App\\Http\\Controllers\\Admin\\RulesController@update', '', 19, 1, 255, 1, '2017-11-16 21:19:55', '2017-11-16 21:19:55', NULL),
(24, '状态修改', 'App\\Http\\Controllers\\Admin\\RulesController@status', '', 19, 1, 255, 1, '2017-11-16 21:21:26', '2017-11-16 21:21:26', NULL),
(34, '删除权限', 'App\\Http\\Controllers\\Admin\\RulesController@destroy', NULL, 19, 0, 255, 1, '2019-01-07 19:41:58', '2019-05-16 09:14:13', NULL),
(35, '栏目管理', 'App\\Http\\Controllers\\Admin\\CategoryController@Index', '/category', 3, 0, 1, 1, '2019-01-09 18:26:12', '2019-02-25 19:21:32', NULL),
(36, '栏目添加', 'App\\Http\\Controllers\\Admin\\CategoryController@Create', NULL, 35, 0, 255, 1, '2019-01-09 18:28:21', '2019-05-16 09:14:29', NULL),
(37, '栏目修改', 'App\\Http\\Controllers\\Admin\\CategoryController@Edit', NULL, 35, 0, 255, 1, '2019-01-09 18:29:10', '2019-05-16 09:14:30', NULL),
(38, '栏目数据添加', 'App\\Http\\Controllers\\Admin\\CategoryController@PostCreate', NULL, 35, 1, 255, 1, '2019-01-09 18:31:20', '2019-02-19 19:40:05', NULL),
(39, '栏目数据更新', 'App\\Http\\Controllers\\Admin\\CategoryController@PostEdit', NULL, 35, 1, 255, 1, '2019-01-09 18:31:53', '2019-02-19 19:40:12', NULL),
(40, '栏目删除', 'App\\Http\\Controllers\\Admin\\CategoryController@DeleteCategory', NULL, 35, 1, 255, 1, '2019-01-09 18:32:43', '2019-02-19 19:40:16', NULL),
(41, '项目管理', 'App\\Http\\Controllers\\Admin\\AdminController@ArticleInfos', '/admin/article/infos', 3, 0, 3, 1, '2019-01-09 18:41:54', '2019-05-16 09:03:10', NULL),
(42, '文章添加', 'App\\Http\\Controllers\\Admin\\ArticleController@KeywordsCreate', NULL, 44, 1, 255, 1, '2019-01-10 23:19:43', '2019-04-09 14:22:37', NULL),
(43, '文章数据入库', 'App\\Http\\Controllers\\Admin\\ArticleController@PostKeywordsCreate', NULL, 44, 0, 255, 1, '2019-01-10 23:51:19', '2019-04-09 14:22:44', NULL),
(44, '文章管理', 'App\\Http\\Controllers\\Admin\\ArticleController@Keywords', '/article/keywords', 3, 0, 2, 1, '2019-01-11 00:15:29', '2019-04-03 09:40:19', NULL),
(45, '文章删除', 'App\\Http\\Controllers\\Admin\\ArticleController@KeywordsDelete', NULL, 44, 1, 255, 1, '2019-01-11 00:58:15', '2019-04-09 14:22:49', NULL),
(46, '文章修改', 'App\\Http\\Controllers\\Admin\\ArticleController@KeywordsEdit', NULL, 44, 0, 255, 1, '2019-01-13 19:52:17', '2019-04-09 14:22:56', NULL),
(47, '文章修改数据提交', 'App\\Http\\Controllers\\Admin\\ArticleController@KeywordsPost', NULL, 44, 1, 255, 1, '2019-01-13 21:14:14', '2019-04-09 14:23:03', NULL),
(48, '文章操作', 'App\\Http\\Controllers\\Admin\\ArticleController@KeywordsFenpei', NULL, 44, 1, 255, 1, '2019-01-14 01:23:57', '2019-04-09 14:23:15', NULL),
(49, '文章预览', 'App\\Http\\Controllers\\Admin\\ArticleController@KeywordsShow', NULL, 44, 1, 255, 1, '2019-01-14 23:21:30', '2019-04-09 14:23:22', NULL),
(50, '清空通知', 'App\\Http\\Controllers\\Admin\\AdminController@NotificationClear', NULL, 4, 1, 255, 1, '2019-01-15 00:24:19', '2019-01-15 00:24:19', NULL),
(51, '属性列表', 'App\\Http\\Controllers\\Admin\\AttributeController@index', NULL, 0, 0, 255, 0, '2019-02-20 00:35:04', '2019-02-26 00:33:40', NULL),
(52, '属性添加', 'App\\Http\\Controllers\\Admin\\AttributeController@create', NULL, 51, 0, 255, 0, '2019-02-20 00:35:42', '2019-02-20 00:35:42', NULL),
(53, '属性数据添加', 'App\\Http\\Controllers\\Admin\\AttributeController@PostCreater', NULL, 51, 0, 255, 0, '2019-02-20 00:36:05', '2019-02-20 00:38:48', NULL),
(54, '站点配置', 'App\\Http\\Controllers\\Admin\\InfoController@Index', '/info', 3, 0, 255, 1, '2019-02-26 00:34:23', '2019-04-09 14:24:36', NULL),
(55, '站点配置数据提交', 'App\\Http\\Controllers\\Admin\\InfoController@PostIndex', NULL, 54, 0, 255, 1, '2019-02-26 01:31:18', '2019-04-09 14:24:48', NULL),
(56, '单页管理', 'App\\Http\\Controllers\\Admin\\InfoController@spageIndex', '/spageindex', 3, 0, 6, 1, '2019-04-09 14:28:43', '2019-04-09 15:14:39', NULL),
(57, '单页修改', 'App\\Http\\Controllers\\Admin\\InfoController@spageUpdate', NULL, 56, 0, 255, 1, '2019-04-09 14:30:00', '2019-04-09 14:30:08', NULL),
(58, '单页修改数据提交', 'App\\Http\\Controllers\\Admin\\InfoController@spagePostUpdate', NULL, 56, 0, 255, 1, '2019-04-09 14:30:40', '2019-04-09 14:30:55', NULL),
(59, '单页添加', 'App\\Http\\Controllers\\Admin\\InfoController@spageCreate', NULL, 56, 0, 255, 1, '2019-04-09 15:13:22', '2019-04-09 15:13:22', NULL),
(60, '单页添加数据提交', 'App\\Http\\Controllers\\Admin\\InfoController@spagePostCreate', NULL, 56, 0, 255, 1, '2019-04-09 15:13:58', '2019-04-09 15:13:58', NULL),
(61, '友链管理', 'App\\Http\\Controllers\\Admin\\LinkController@index', '/linkindex', 3, 0, 7, 1, '2019-04-09 17:50:06', '2019-04-09 17:50:06', NULL),
(62, '添加友链', 'App\\Http\\Controllers\\Admin\\LinkController@linkCreate', '', 61, 0, 255, 1, '2019-04-09 17:52:19', '2019-04-09 17:52:19', NULL),
(63, '友链数据提交', 'App\\Http\\Controllers\\Admin\\LinkController@linkPostCreate', NULL, 61, 0, 255, 1, '2019-04-09 17:52:55', '2019-04-09 17:52:55', NULL),
(64, '编辑友链', 'App\\Http\\Controllers\\Admin\\LinkController@linkUpdate', NULL, 61, 0, 255, 1, '2019-04-09 17:53:34', '2019-04-09 17:53:34', NULL),
(65, '编辑友链数据提交', 'App\\Http\\Controllers\\Admin\\LinkController@linkPostUpdate', NULL, 61, 0, 255, 1, '2019-04-09 17:54:07', '2019-04-09 17:54:07', NULL),
(66, '删除友链', 'App\\Http\\Controllers\\Admin\\LinkController@delete', NULL, 61, 0, 255, 1, '2019-04-10 09:54:55', '2019-04-10 09:54:55', NULL),
(67, '项目文章列表', 'App\\Http\\Controllers\\Admin\\ArticleController@pindex', '/pnews/index', 3, 0, 4, 1, '2019-04-12 13:49:38', '2019-04-12 14:14:36', NULL),
(68, '项目文章添加', 'App\\Http\\Controllers\\Admin\\ArticleController@PnewsCreate', NULL, 67, 0, 255, 1, '2019-04-12 13:50:10', '2019-04-12 14:14:55', NULL),
(69, '项目文章数据提交', 'App\\Http\\Controllers\\Admin\\ArticleController@PostPnewsCreate', NULL, 67, 0, 255, 1, '2019-04-12 13:50:29', '2019-04-12 14:15:07', NULL),
(70, '修改项目文章', 'App\\Http\\Controllers\\Admin\\ArticleController@PnewsEdit', NULL, 67, 0, 255, 1, '2019-04-12 15:38:02', '2019-04-12 15:38:02', NULL),
(71, '项目文章修改数据提交', 'App\\Http\\Controllers\\Admin\\ArticleController@PostPnewsEdit', NULL, 67, 0, 255, 1, '2019-04-12 15:38:28', '2019-04-12 15:38:28', NULL),
(72, '异步监测项目', 'App\\Http\\Controllers\\Admin\\ArticleController@ajaxSearchXm', NULL, 67, 0, 255, 1, '2019-04-12 16:48:36', '2019-04-12 16:48:36', NULL),
(73, '网站日志', 'App\\Http\\Controllers\\Admin\\InfoController@logs', '/loglogs', 3, 0, 255, 1, '2019-05-09 13:43:34', '2019-05-09 13:43:34', NULL),
(74, '下载日志', 'App\\Http\\Controllers\\Admin\\InfoController@downlogs', NULL, 73, 0, 255, 1, '2019-05-09 14:31:51', '2019-05-09 14:31:51', NULL);

-- --------------------------------------------------------

--
-- 表的结构 `wp_spages`
--

CREATE TABLE `wp_spages` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `post_author` bigint(20) UNSIGNED DEFAULT '0',
  `post_date` timestamp NULL DEFAULT NULL,
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `seotitle` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `seokeys` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `status` bigint(5) DEFAULT '1',
  `subtitle` varchar(100) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `views` bigint(20) DEFAULT '386'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_tags`
--

CREATE TABLE `wp_tags` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_id` bigint(20) DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_tags2`
--

CREATE TABLE `wp_tags2` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `parent` bigint(20) DEFAULT '0',
  `term_id` bigint(20) DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_termmeta`
--

CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_terms`
--

CREATE TABLE `wp_terms` (
  `term_id` bigint(20) UNSIGNED NOT NULL,
  `term_taxonomy_id` int(20) DEFAULT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `seo_title` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `seo_keys` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `seo_des` text COLLATE utf8mb4_unicode_520_ci,
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_520_ci,
  `parent` bigint(20) DEFAULT '0',
  `count` bigint(20) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_term_relationships`
--

CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `parent` bigint(20) DEFAULT '0',
  `term_id` bigint(20) DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_term_taxonomy`
--

CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL,
  `term_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parent` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_usermeta`
--

CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_users`
--

CREATE TABLE `wp_users` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_yoast_seo_links`
--

CREATE TABLE `wp_yoast_seo_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `target_post_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(8) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- 表的结构 `wp_yoast_seo_meta`
--

CREATE TABLE `wp_yoast_seo_meta` (
  `object_id` bigint(20) UNSIGNED NOT NULL,
  `internal_link_count` int(10) UNSIGNED DEFAULT NULL,
  `incoming_link_count` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 转储表的索引
--

--
-- 表的索引 `wp_adminroles`
--
ALTER TABLE `wp_adminroles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_role_admin_id_index` (`admin_id`),
  ADD KEY `admin_role_role_id_index` (`role_id`);

--
-- 表的索引 `wp_admins`
--
ALTER TABLE `wp_admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- 表的索引 `wp_ap_config`
--
ALTER TABLE `wp_ap_config`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `wp_ap_config_group`
--
ALTER TABLE `wp_ap_config_group`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `wp_ap_config_option`
--
ALTER TABLE `wp_ap_config_option`
  ADD PRIMARY KEY (`id`),
  ADD KEY `config_id` (`config_id`);

--
-- 表的索引 `wp_ap_config_url_list`
--
ALTER TABLE `wp_ap_config_url_list`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `wp_ap_flickr_img`
--
ALTER TABLE `wp_ap_flickr_img`
  ADD KEY `id` (`id`);

--
-- 表的索引 `wp_ap_flickr_oauth`
--
ALTER TABLE `wp_ap_flickr_oauth`
  ADD PRIMARY KEY (`oauth_id`);

--
-- 表的索引 `wp_ap_log`
--
ALTER TABLE `wp_ap_log`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `wp_ap_more_content`
--
ALTER TABLE `wp_ap_more_content`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `wp_ap_proxy`
--
ALTER TABLE `wp_ap_proxy`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `wp_ap_qiniu_img`
--
ALTER TABLE `wp_ap_qiniu_img`
  ADD KEY `id` (`id`);

--
-- 表的索引 `wp_ap_updated_record`
--
ALTER TABLE `wp_ap_updated_record`
  ADD PRIMARY KEY (`id`),
  ADD KEY `url` (`url`(333)),
  ADD KEY `title` (`title`);

--
-- 表的索引 `wp_ap_upyun_img`
--
ALTER TABLE `wp_ap_upyun_img`
  ADD KEY `id` (`id`);

--
-- 表的索引 `wp_ap_watermark`
--
ALTER TABLE `wp_ap_watermark`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `wp_archives`
--
ALTER TABLE `wp_archives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archives_click_index` (`click`),
  ADD KEY `archives_typeid_index` (`typeid`),
  ADD KEY `archives_title_index` (`title`),
  ADD KEY `archives_shorttitle_index` (`shorttitle`),
  ADD KEY `archives_flags_index` (`flags`),
  ADD KEY `archives_mid_index` (`mid`),
  ADD KEY `archives_write_index` (`write`),
  ADD KEY `archives_dutyadmin_index` (`dutyadmin`),
  ADD KEY `archives_published_at_index` (`published_at`),
  ADD KEY `archives_created_at_index` (`created_at`);

--
-- 表的索引 `wp_arctypes`
--
ALTER TABLE `wp_arctypes`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `arctypes_reid_index` (`reid`) USING BTREE,
  ADD KEY `arctypes_topid_index` (`topid`) USING BTREE,
  ADD KEY `arctypes_sortrank_index` (`sortrank`) USING BTREE,
  ADD KEY `arctypes_typename_index` (`typename`) USING BTREE,
  ADD KEY `arctypes_typedir_index` (`typedir`) USING BTREE,
  ADD KEY `arctypes_real_path_index` (`real_path`) USING BTREE;

--
-- 表的索引 `wp_autolink`
--
ALTER TABLE `wp_autolink`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `wp_categorys`
--
ALTER TABLE `wp_categorys`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191)),
  ADD KEY `parent` (`parent`),
  ADD KEY `taxonomy` (`taxonomy`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- 表的索引 `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `comment_id` (`comment_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- 表的索引 `wp_comments`
--
ALTER TABLE `wp_comments`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `comment_post_ID` (`comment_post_ID`),
  ADD KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  ADD KEY `comment_date_gmt` (`comment_date_gmt`),
  ADD KEY `comment_parent` (`comment_parent`),
  ADD KEY `comment_author_email` (`comment_author_email`(10));

--
-- 表的索引 `wp_links`
--
ALTER TABLE `wp_links`
  ADD PRIMARY KEY (`link_id`),
  ADD KEY `link_visible` (`link_visible`);

--
-- 表的索引 `wp_news`
--
ALTER TABLE `wp_news`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_date`,`ID`),
  ADD KEY `post_author` (`post_author`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `flags` (`flags`(191)),
  ADD KEY `post_title` (`post_title`(191)),
  ADD KEY `pterm_id` (`pterm_id`),
  ADD KEY `post_jstitle` (`post_jstitle`(191)),
  ADD KEY `status` (`status`),
  ADD KEY `views` (`views`);
ALTER TABLE `wp_news` ADD FULLTEXT KEY `idx_postjstitle` (`post_jstitle`);

--
-- 表的索引 `wp_news2`
--
ALTER TABLE `wp_news2`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_date`,`ID`),
  ADD KEY `post_author` (`post_author`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `flags` (`flags`(191)),
  ADD KEY `post_title` (`post_title`(191)),
  ADD KEY `pterm_id` (`pterm_id`),
  ADD KEY `post_jstitle` (`post_jstitle`(191)),
  ADD KEY `status` (`status`),
  ADD KEY `views` (`views`);
ALTER TABLE `wp_news2` ADD FULLTEXT KEY `idx_postjstitle` (`post_jstitle`);

--
-- 表的索引 `wp_notifications`
--
ALTER TABLE `wp_notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- 表的索引 `wp_options`
--
ALTER TABLE `wp_options`
  ADD PRIMARY KEY (`option_id`),
  ADD UNIQUE KEY `option_name` (`option_name`);

--
-- 表的索引 `wp_pm`
--
ALTER TABLE `wp_pm`
  ADD PRIMARY KEY (`id`);

--
-- 表的索引 `wp_pnews`
--
ALTER TABLE `wp_pnews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_status_date` (`post_date`,`id`),
  ADD KEY `post_author` (`post_author`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `flags` (`flags`(191)),
  ADD KEY `post_title` (`post_title`(191)),
  ADD KEY `pterm_id` (`pterm_id`),
  ADD KEY `post_jstitle` (`post_jstitle`(191)),
  ADD KEY `status` (`status`),
  ADD KEY `views` (`views`),
  ADD KEY `pid` (`pid`);
ALTER TABLE `wp_pnews` ADD FULLTEXT KEY `idx_postjstitle` (`post_jstitle`);

--
-- 表的索引 `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- 表的索引 `wp_posts`
--
ALTER TABLE `wp_posts`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `flags` (`flags`(191)),
  ADD KEY `post_title` (`post_title`(191)),
  ADD KEY `pterm_id` (`pterm_id`),
  ADD KEY `ping_status` (`ping_status`),
  ADD KEY `post_jstitle` (`post_jstitle`(191)),
  ADD KEY `status` (`status`);
ALTER TABLE `wp_posts` ADD FULLTEXT KEY `idx_postjstitle` (`post_jstitle`);

--
-- 表的索引 `wp_projectdatas`
--
ALTER TABLE `wp_projectdatas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  ADD KEY `post_parent` (`post_parent`),
  ADD KEY `post_author` (`post_author`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `flags` (`flags`(191)),
  ADD KEY `post_title` (`post_title`(191)),
  ADD KEY `pterm_id` (`pterm_id`),
  ADD KEY `ping_status` (`ping_status`),
  ADD KEY `post_jstitle` (`post_jstitle`(191)),
  ADD KEY `status` (`status`);
ALTER TABLE `wp_projectdatas` ADD FULLTEXT KEY `idx_postjstitle` (`post_jstitle`);

--
-- 表的索引 `wp_projects`
--
ALTER TABLE `wp_projects`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_date`,`ID`),
  ADD KEY `post_author` (`post_author`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `flags` (`flags`(191)),
  ADD KEY `post_title` (`post_title`(191)),
  ADD KEY `pterm_id` (`pterm_id`),
  ADD KEY `post_jstitle` (`post_jstitle`(191)),
  ADD KEY `status` (`status`),
  ADD KEY `views` (`views`),
  ADD KEY `subtitle` (`subtitle`);
ALTER TABLE `wp_projects` ADD FULLTEXT KEY `idx_postjstitle` (`post_jstitle`);

--
-- 表的索引 `wp_projects2`
--
ALTER TABLE `wp_projects2`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_date`,`ID`),
  ADD KEY `post_author` (`post_author`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `flags` (`flags`(191)),
  ADD KEY `post_title` (`post_title`(191)),
  ADD KEY `pterm_id` (`pterm_id`),
  ADD KEY `post_jstitle` (`post_jstitle`(191)),
  ADD KEY `status` (`status`),
  ADD KEY `views` (`views`);
ALTER TABLE `wp_projects2` ADD FULLTEXT KEY `idx_postjstitle` (`post_jstitle`);

--
-- 表的索引 `wp_projects6`
--
ALTER TABLE `wp_projects6`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_date`,`ID`),
  ADD KEY `post_author` (`post_author`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `flags` (`flags`(191)),
  ADD KEY `post_title` (`post_title`(191)),
  ADD KEY `pterm_id` (`pterm_id`),
  ADD KEY `post_jstitle` (`post_jstitle`(191)),
  ADD KEY `status` (`status`),
  ADD KEY `views` (`views`),
  ADD KEY `subtitle` (`subtitle`);
ALTER TABLE `wp_projects6` ADD FULLTEXT KEY `idx_postjstitle` (`post_jstitle`);

--
-- 表的索引 `wp_roleauths`
--
ALTER TABLE `wp_roleauths`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_auth_role_id_index` (`role_id`),
  ADD KEY `role_auth_rule_id_index` (`rule_id`);

--
-- 表的索引 `wp_roles`
--
ALTER TABLE `wp_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `roles_name_index` (`name`(191)),
  ADD KEY `roles_status_index` (`status`);

--
-- 表的索引 `wp_rules`
--
ALTER TABLE `wp_rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rules_name_index` (`name`(191)),
  ADD KEY `rules_parent_id_index` (`parent_id`),
  ADD KEY `rules_is_hidden_index` (`is_hidden`),
  ADD KEY `rules_status_index` (`status`);

--
-- 表的索引 `wp_spages`
--
ALTER TABLE `wp_spages`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `post_name` (`post_name`(191)),
  ADD KEY `type_status_date` (`post_date`,`ID`),
  ADD KEY `post_author` (`post_author`),
  ADD KEY `post_title` (`post_title`(191)),
  ADD KEY `status` (`status`);

--
-- 表的索引 `wp_tags`
--
ALTER TABLE `wp_tags`
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `object_id` (`object_id`);

--
-- 表的索引 `wp_tags2`
--
ALTER TABLE `wp_tags2`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`),
  ADD KEY `slug` (`slug`(191));

--
-- 表的索引 `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  ADD PRIMARY KEY (`meta_id`),
  ADD KEY `term_id` (`term_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- 表的索引 `wp_terms`
--
ALTER TABLE `wp_terms`
  ADD PRIMARY KEY (`term_id`),
  ADD KEY `slug` (`slug`(191)),
  ADD KEY `name` (`name`(191)),
  ADD KEY `parent` (`parent`),
  ADD KEY `taxonomy` (`taxonomy`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`);

--
-- 表的索引 `wp_term_relationships`
--
ALTER TABLE `wp_term_relationships`
  ADD PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  ADD KEY `term_taxonomy_id` (`term_taxonomy_id`),
  ADD KEY `slug` (`slug`(191));

--
-- 表的索引 `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  ADD PRIMARY KEY (`term_taxonomy_id`),
  ADD UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  ADD KEY `taxonomy` (`taxonomy`);

--
-- 表的索引 `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  ADD PRIMARY KEY (`umeta_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `meta_key` (`meta_key`(191));

--
-- 表的索引 `wp_users`
--
ALTER TABLE `wp_users`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_login_key` (`user_login`),
  ADD KEY `user_nicename` (`user_nicename`),
  ADD KEY `user_email` (`user_email`);

--
-- 表的索引 `wp_yoast_seo_links`
--
ALTER TABLE `wp_yoast_seo_links`
  ADD PRIMARY KEY (`id`),
  ADD KEY `link_direction` (`post_id`,`type`);

--
-- 表的索引 `wp_yoast_seo_meta`
--
ALTER TABLE `wp_yoast_seo_meta`
  ADD UNIQUE KEY `object_id` (`object_id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `wp_adminroles`
--
ALTER TABLE `wp_adminroles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- 使用表AUTO_INCREMENT `wp_admins`
--
ALTER TABLE `wp_admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- 使用表AUTO_INCREMENT `wp_ap_config`
--
ALTER TABLE `wp_ap_config`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;

--
-- 使用表AUTO_INCREMENT `wp_ap_config_group`
--
ALTER TABLE `wp_ap_config_group`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `wp_ap_config_option`
--
ALTER TABLE `wp_ap_config_option`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1854;

--
-- 使用表AUTO_INCREMENT `wp_ap_config_url_list`
--
ALTER TABLE `wp_ap_config_url_list`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7371;

--
-- 使用表AUTO_INCREMENT `wp_ap_flickr_oauth`
--
ALTER TABLE `wp_ap_flickr_oauth`
  MODIFY `oauth_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `wp_ap_log`
--
ALTER TABLE `wp_ap_log`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13850;

--
-- 使用表AUTO_INCREMENT `wp_ap_more_content`
--
ALTER TABLE `wp_ap_more_content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `wp_ap_proxy`
--
ALTER TABLE `wp_ap_proxy`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用表AUTO_INCREMENT `wp_ap_updated_record`
--
ALTER TABLE `wp_ap_updated_record`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77652;

--
-- 使用表AUTO_INCREMENT `wp_ap_watermark`
--
ALTER TABLE `wp_ap_watermark`
  MODIFY `id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `wp_archives`
--
ALTER TABLE `wp_archives`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `wp_arctypes`
--
ALTER TABLE `wp_arctypes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- 使用表AUTO_INCREMENT `wp_autolink`
--
ALTER TABLE `wp_autolink`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `wp_categorys`
--
ALTER TABLE `wp_categorys`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222221;

--
-- 使用表AUTO_INCREMENT `wp_commentmeta`
--
ALTER TABLE `wp_commentmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- 使用表AUTO_INCREMENT `wp_comments`
--
ALTER TABLE `wp_comments`
  MODIFY `comment_ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- 使用表AUTO_INCREMENT `wp_links`
--
ALTER TABLE `wp_links`
  MODIFY `link_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- 使用表AUTO_INCREMENT `wp_news`
--
ALTER TABLE `wp_news`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- 使用表AUTO_INCREMENT `wp_news2`
--
ALTER TABLE `wp_news2`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128589;

--
-- 使用表AUTO_INCREMENT `wp_options`
--
ALTER TABLE `wp_options`
  MODIFY `option_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211851;

--
-- 使用表AUTO_INCREMENT `wp_pm`
--
ALTER TABLE `wp_pm`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `wp_pnews`
--
ALTER TABLE `wp_pnews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用表AUTO_INCREMENT `wp_postmeta`
--
ALTER TABLE `wp_postmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=565760;

--
-- 使用表AUTO_INCREMENT `wp_posts`
--
ALTER TABLE `wp_posts`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130264;

--
-- 使用表AUTO_INCREMENT `wp_projectdatas`
--
ALTER TABLE `wp_projectdatas`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `wp_projects`
--
ALTER TABLE `wp_projects`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130336;

--
-- 使用表AUTO_INCREMENT `wp_projects2`
--
ALTER TABLE `wp_projects2`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130177;

--
-- 使用表AUTO_INCREMENT `wp_projects6`
--
ALTER TABLE `wp_projects6`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130177;

--
-- 使用表AUTO_INCREMENT `wp_roleauths`
--
ALTER TABLE `wp_roleauths`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- 使用表AUTO_INCREMENT `wp_roles`
--
ALTER TABLE `wp_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 使用表AUTO_INCREMENT `wp_rules`
--
ALTER TABLE `wp_rules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- 使用表AUTO_INCREMENT `wp_spages`
--
ALTER TABLE `wp_spages`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1070;

--
-- 使用表AUTO_INCREMENT `wp_termmeta`
--
ALTER TABLE `wp_termmeta`
  MODIFY `meta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `wp_terms`
--
ALTER TABLE `wp_terms`
  MODIFY `term_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222217;

--
-- 使用表AUTO_INCREMENT `wp_term_taxonomy`
--
ALTER TABLE `wp_term_taxonomy`
  MODIFY `term_taxonomy_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222203;

--
-- 使用表AUTO_INCREMENT `wp_usermeta`
--
ALTER TABLE `wp_usermeta`
  MODIFY `umeta_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2056;

--
-- 使用表AUTO_INCREMENT `wp_users`
--
ALTER TABLE `wp_users`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- 使用表AUTO_INCREMENT `wp_yoast_seo_links`
--
ALTER TABLE `wp_yoast_seo_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
