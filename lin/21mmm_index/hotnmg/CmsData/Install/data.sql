-- phpMyAdmin SQL Dump
-- version 3.2.0
-- http://www.phpmyadmin.net
--
-- 主机: php.t
-- 生成日期: 2010 年 03 月 19 日 13:37
-- 服务器版本: 6.0.2
-- PHP 版本: 5.2.9-2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `shuguangcms`
--

-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_ad`
--

CREATE TABLE `sgcorp_ad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '名称',
  `category_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '广告分类',
  `title_style` text NOT NULL COMMENT '标题样式',
  `title_style_serialize` text NOT NULL COMMENT '标题样式序列化',
  `ad_type` char(10) NOT NULL DEFAULT 'text' COMMENT '广告类型',
  `link_url` varchar(255) NOT NULL COMMENT '链接地址',
  `description` text NOT NULL COMMENT '简介',
  `code_body` text NOT NULL COMMENT '代码内容',
  `height` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '高度',
  `width` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '宽度',
  `text_body` text NOT NULL COMMENT '文字广告内容',
  `font_size` varchar(255) NOT NULL COMMENT '文字大小',
  `attach_file` varchar(50) NOT NULL COMMENT '附件名称',
  `attach_ext` varchar(50) NOT NULL COMMENT '附件类型',
  `attach_alt` varchar(255) NOT NULL COMMENT 'alt 文字',
  `display_order` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序数值，越小排得越前',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='广告' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `sgcorp_ad`
--

INSERT INTO `sgcorp_ad` (`id`, `title`, `category_id`, `title_style`, `title_style_serialize`, `ad_type`, `link_url`, `description`, `code_body`, `height`, `width`, `text_body`, `font_size`, `attach_file`, `attach_ext`, `attach_alt`, `display_order`, `status`, `create_time`, `update_time`) VALUES(1, 'test1', 33, 'color:#800080;font-weight:bold;TEXT-DECORATION: underline', 'a:3:{s:5:"color";s:7:"#800080";s:4:"bold";s:4:"bold";s:9:"underline";s:9:"underline";}', 'image', 'http://www.sgcms.cn', 'test', 'test', 0, 0, '', '12px', 'Ad/4b89c936da4e9.jpg', '', 'test', 0, 0, 1267282184, 1267324636);
INSERT INTO `sgcorp_ad` (`id`, `title`, `category_id`, `title_style`, `title_style_serialize`, `ad_type`, `link_url`, `description`, `code_body`, `height`, `width`, `text_body`, `font_size`, `attach_file`, `attach_ext`, `attach_alt`, `display_order`, `status`, `create_time`, `update_time`) VALUES(2, 'test2', 33, '', '', 'image', 'http://www.sgcms.cn', '', '', 0, 0, '', '12px', 'Ad/4b89c945afdab.jpg', '', '', 0, 0, 1267321157, 0);
INSERT INTO `sgcorp_ad` (`id`, `title`, `category_id`, `title_style`, `title_style_serialize`, `ad_type`, `link_url`, `description`, `code_body`, `height`, `width`, `text_body`, `font_size`, `attach_file`, `attach_ext`, `attach_alt`, `display_order`, `status`, `create_time`, `update_time`) VALUES(3, 'test3', 33, '', '', 'image', 'http://www.sgcms.cn', '', '', 0, 0, '', '12px', 'Ad/4b89c96059ba3.jpg', '', '', 0, 0, 1267321184, 1267793689);

-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_admin`
--

CREATE TABLE `sgcorp_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '角色组',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `realname` varchar(50) NOT NULL COMMENT '真实姓名',
  `notepad` text NOT NULL COMMENT '备忘录',
  `sex` char(5) NOT NULL DEFAULT '男' COMMENT '性别',
  `telephone` varchar(50) NOT NULL COMMENT '电话',
  `mobile_telephone` varchar(50) NOT NULL COMMENT '手机',
  `fax` varchar(50) NOT NULL COMMENT 'FAX',
  `web_url` varchar(100) NOT NULL COMMENT '网址',
  `email` varchar(50) NOT NULL COMMENT '电子邮件',
  `qq` varchar(50) NOT NULL COMMENT 'QQ',
  `address` varchar(100) NOT NULL DEFAULT '' COMMENT '地址',
  `login_count` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `last_login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='管理员' AUTO_INCREMENT=1 ;


-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_admin_log`
--

CREATE TABLE `sgcorp_admin_log` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` tinyint(3) unsigned NOT NULL COMMENT '用户ID',
  `username` varchar(50) NOT NULL DEFAULT '' COMMENT '用户',
  `action` text NOT NULL COMMENT 'URI',
  `ip` char(15) NOT NULL DEFAULT '127.0.0.1' COMMENT 'IP',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='管理员操作日志' AUTO_INCREMENT=3 ;


-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_admin_role`
--

CREATE TABLE `sgcorp_admin_role` (
  `id` tinyint(1) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL DEFAULT 'all' COMMENT '名称',
  `role_permission` text NOT NULL COMMENT '权限',
  `system` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '系统内置',
  `create_time` int(11) unsigned NOT NULL COMMENT '增加时间',
  `update_time` int(11) unsigned NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='管理员角色' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `sgcorp_admin_role`
--

INSERT INTO `sgcorp_admin_role` (`id`, `role_name`, `role_permission`, `system`, `create_time`, `update_time`) VALUES(1, '超级管理', 'Menu_index,Menu_insert,Menu_modify,Menu_command,Category_index,Category_modify,Category_update,News_index,News_modify,News_insert,News_move,News_command,Product_index,Product_insert,Product_modify,Product_command,Product_order,Product_move,Download_index,Download_insert,Download_modify,Download_command,Download_move,Feedback_index,Feedback_insert,Feedback_modify,Feedback_command,Job_index,Job_insert,Job_modify,Job_resume,Job_command,Notice_index,Notice_insert,Notice_modify,Notice_command,Link_index,Link_insert,Link_modify,Link_command,Page_index,Page_insert,Page_modify,Page_command,Ad_index,Ad_insert,Ad_modify,Ad_command,Tags,Comment_index,Comment_modify,Comment_command,Admin_index,Admin_insert,Admin_modify,Admin_command,Template,AdminRole_index,AdminRole_insert,AdminRole_modify,AdminRole_command', 1, 0, 0);
INSERT INTO `sgcorp_admin_role` (`id`, `role_name`, `role_permission`, `system`, `create_time`, `update_time`) VALUES(2, '禁止访问', 'disable', 1, 0, 0);
INSERT INTO `sgcorp_admin_role` (`id`, `role_name`, `role_permission`, `system`, `create_time`, `update_time`) VALUES(3, '普通管理', 'Menu_index,Menu_insert,Menu_modify,Menu_command,Category_index,Category_modify,News_index,News_modify,News_insert,News_move,News_command,Product_index,Product_insert,Product_modify,Product_command,Product_order,Product_move,Download_index,Download_insert,Download_modify,Download_command,Download_move,Feedback_index,Feedback_insert,Feedback_modify,Feedback_command,Job_index,Job_insert,Job_modify,Job_resume,Job_command,Notice_index,Notice_insert,Notice_modify,Notice_command,Link_index,Link_insert,Link_modify,Link_command,Page_index,Page_insert,Page_modify,Page_command,Ad_index,Ad_insert,Ad_modify,Ad_command,Tags,Comment_index,Comment_modify,Comment_command,Admin_index,Admin_insert,Admin_modify,Admin_command,Theme,AdminRole_index,AdminRole_insert,AdminRole_modify,AdminRole_command,Module_index,Module_install,Config_index,Config_core,Database_index,Database_export,AdminLog,Tools,Label', 1, 0, 1263392210);

-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_category`
--

CREATE TABLE `sgcorp_category` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT,
  `module` char(20) NOT NULL DEFAULT 'N/A' COMMENT '模块',
  `parent_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '上级目录',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '名称',
  `keyword` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` varchar(255) NOT NULL DEFAULT '' COMMENT '描述',
  `display_order` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `protected` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '是否保护',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`),
  KEY `displayorder` (`display_order`),
  KEY `parentid` (`parent_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='全局分类' AUTO_INCREMENT=39 ;

--
-- 转存表中的数据 `sgcorp_category`
--

INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(1, 'News', 0, '新闻模块', '', '', 0, 0, 0, 1262410906, 1262415121);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(2, '', 1, '公司动态', '', '公司动态', 0, 0, 0, 1262410927, 1267288915);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(3, '', 1, '行业动态', '', '行业动态', 0, 0, 0, 1262410939, 1267112341);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(4, '', 1, '市场信息', '', '市场信息', 0, 0, 0, 1262410963, 0);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(5, '', 1, '政策信息', '', '政策信息', 0, 0, 0, 1262410987, 0);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(6, 'Product', 0, '产品模块', '', '产品模块', 0, 0, 0, 1262410998, 0);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(7, '', 6, '新品上市', '', '新品上市', 2, 0, 0, 1262411013, 0);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(8, '', 6, '文化类产品', '', '文化类产品', 0, 0, 0, 1262411055, 0);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(9, '', 6, '休闲类产品', '', '休闲类产品', 1, 0, 0, 1262411067, 1262411073);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(10, '', 6, '体育类产品', '', '体育类产品', 0, 0, 0, 1262411092, 0);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(11, '', 10, '球类', '', '球类', 0, 0, 0, 1262411108, 0);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(12, '', 10, '服饰类', '', '服饰类', 0, 0, 0, 1262411122, 0);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(13, '', 9, '自行车', '', '自行车', 0, 0, 0, 1262411152, 0);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(14, 'Download', 0, '下载模块', '', '下载模块', 0, 0, 0, 1262411171, 1267110782);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(15, '', 14, '系统软件', '', '系统软件', 1, 0, 0, 1262411182, 1262411190);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(16, '', 14, '办公软件', '', '办公软件', 0, 0, 0, 1262411204, 0);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(17, '', 14, '恢复类软件', '', '恢复类软件', 0, 0, 0, 1262411216, 0);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(33, '', 32, '首页横幅', '', '首页横幅', 0, 0, 0, 1267112629, 1267288982);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(32, 'Ad', 0, '广告模块', '', '广告模块', 0, 0, 0, 1267112377, 1267112406);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(34, '', 32, '公共', '', '公共', 0, 0, 0, 1267112648, 0);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(35, 'Link', 0, '链接类型', '', '链接类型', 0, 0, 0, 1267287014, 0);
INSERT INTO `sgcorp_category` (`id`, `module`, `parent_id`, `title`, `keyword`, `description`, `display_order`, `protected`, `status`, `create_time`, `update_time`) VALUES(36, '', 35, '默认类型', '', '普通链接', 0, 0, 0, 1267287066, 1267288647);

-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_comment`
--

CREATE TABLE `sgcorp_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module` char(20) NOT NULL DEFAULT 'News' COMMENT '模块',
  `title_id` int(11) unsigned NOT NULL COMMENT '文章ID',
  `title` varchar(255) NOT NULL COMMENT '文章标题',
  `username` varchar(20) NOT NULL DEFAULT '' COMMENT '用户',
  `email` varchar(255) NOT NULL COMMENT '邮箱',
  `ip` char(15) NOT NULL DEFAULT '' COMMENT 'ip',
  `content` text NOT NULL COMMENT '评论内容',
  `reply_content` text NOT NULL COMMENT '评论回复',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '提交时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='评论' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `sgcorp_comment`
--


-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_config`
--

CREATE TABLE `sgcorp_config` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `lang` char(20) NOT NULL DEFAULT 'cn' COMMENT '语言',
  `site_name` varchar(100) NOT NULL COMMENT '网站名称',
  `company_name` varchar(200) NOT NULL COMMENT '公司名称',
  `site_url` varchar(200) NOT NULL COMMENT '网站地址',
  `contact_name` varchar(50) NOT NULL COMMENT '联系人',
  `telephone` varchar(50) NOT NULL COMMENT '电话',
  `email` varchar(100) NOT NULL COMMENT 'email',
  `fax` varchar(50) NOT NULL COMMENT '传真',
  `mobile_telephone` varchar(50) NOT NULL COMMENT '手机',
  `address` varchar(200) NOT NULL COMMENT '地址',
  `icp` varchar(20) NOT NULL COMMENT 'icp',
  `qq` varchar(50) NOT NULL COMMENT 'qq',
  `msn` varchar(100) NOT NULL COMMENT 'msn',
  `im` varchar(250) NOT NULL COMMENT '即时通讯工具',
  `web_status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '网站状态',
  `status_description` text NOT NULL COMMENT '停止描述',
  `header_content` text NOT NULL COMMENT '头部内容',
  `footer_content` text NOT NULL COMMENT '脚部内容',
  `comment_verify` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否开启留言/评论审核',
  `sys_log` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '系统日志',
  `sys_log_ext` varchar(255) NOT NULL COMMENT '记录日志类型',
  `download_suffix` varchar(255) NOT NULL DEFAULT 'Winndows' COMMENT '下载类型',
  `run_system` varchar(255) NOT NULL COMMENT '运行平台',
  `global_thumb_status` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '缩略图开关',
  `watermark_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '水印开关',
  `watermark_size` varchar(50) NOT NULL COMMENT '水印尺寸',
  `watermark_position` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '水印位置',
  `watermark_padding` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '水印边距',
  `watermark_trans` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '水印透明度',
  `global_attach_size` int(10) unsigned NOT NULL DEFAULT '2048000' COMMENT '附件大小',
  `global_attach_suffix` varchar(200) NOT NULL COMMENT '允许附件类型',
  `news_thumb_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '新闻缩略图状态',
  `news_thumb_size` varchar(50) NOT NULL COMMENT '新闻缩略图高',
  `product_thumb_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '产品缩略图开关',
  `product_thumb_size` varchar(50) NOT NULL COMMENT '产品缩略图高',
  `download_thumb_status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '下载缩略图开关',
  `download_thumb_size` varchar(50) NOT NULL COMMENT '下载缩略图高',
  `global_thumb_size` varchar(50) NOT NULL COMMENT '全局缩略图 尺寸',
  `seo_title` varchar(200) NOT NULL,
  `seo_keyword` varchar(240) NOT NULL,
  `seo_description` varchar(240) NOT NULL,
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '提交时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='系统配置' AUTO_INCREMENT=1 ;



-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_download`
--

CREATE TABLE `sgcorp_download` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '软件名称',
  `title_style` varchar(255) NOT NULL DEFAULT '' COMMENT '样式',
  `title_style_serialize` varchar(255) NOT NULL COMMENT '样式序列化',
  `category_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '类别',
  `keyword` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `run_system` varchar(255) NOT NULL DEFAULT 'windows' COMMENT '运行系统',
  `extension` varchar(10) NOT NULL DEFAULT 'zip' COMMENT '扩展名',
  `file_size` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '大小',
  `file_size_unit` char(10) NOT NULL DEFAULT 'KB' COMMENT '大小单位',
  `download_url` text NOT NULL COMMENT '下载地址1',
  `link_url` varchar(100) NOT NULL COMMENT '外链',
  `description` text NOT NULL COMMENT '简单描述',
  `content` text NOT NULL COMMENT '介绍',
  `tags` varchar(255) NOT NULL COMMENT 'tags',
  `template` varchar(100) NOT NULL COMMENT '模板文件',
  `file_attach` varchar(50) NOT NULL DEFAULT '' COMMENT '附件地址',
  `attach` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '附件',
  `attach_image` varchar(50) NOT NULL DEFAULT '' COMMENT '附件大图',
  `attach_thumb` varchar(50) NOT NULL DEFAULT '' COMMENT '缩略图',
  `view_count` int(10) unsigned NOT NULL DEFAULT '1' COMMENT '查看次数',
  `istop` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '置顶',
  `recommend` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '推荐',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `display_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='下载' AUTO_INCREMENT=6 ;

--
-- 转存表中的数据 `sgcorp_download`
--

INSERT INTO `sgcorp_download` (`id`, `user_id`, `title`, `title_style`, `title_style_serialize`, `category_id`, `keyword`, `run_system`, `extension`, `file_size`, `file_size_unit`, `download_url`, `link_url`, `description`, `content`, `tags`, `template`, `file_attach`, `attach`, `attach_image`, `attach_thumb`, `view_count`, `istop`, `recommend`, `status`, `display_order`, `create_time`, `update_time`) VALUES(1, 1, '泄露个人信息 铁道部坦承是个问题 ', '', '', 15, '', '', 'zip', 0, 'KB', 'test', '', '泄露个人信息 铁道部坦承是个问题 ', '<p style="text-indent: 2em">环球网记者范凌志报道，台湾前&ldquo;副总统&rdquo;吕秀莲本周访问美国华府。她在与美方人士会面时称，美国虽然持续对台军售，但不能忽略台湾&ldquo;自我防卫&rdquo;的需求，应该&ldquo;尽快考虑出售F16C/D型战机&rdquo;。</p>\r\n<p style="text-indent: 2em">据台湾&ldquo;中央社&rdquo;24日消息，吕秀莲此行已与美国国务院、美国在台协会（AIT）官员见面，并拜会了美国多位涉台机构官员。</p>\r\n<p style="text-indent: 2em">吕秀莲称，对于美国政府决定新一波的对台军售，台湾当然&ldquo;很感谢&rdquo;，但&ldquo;遗憾的是F16C/D型战机仍未纳入&rdquo;。美方亲台官员与议员还说，洛克希德马丁公司（LockheedMartin）万一关闭F16生产线，台湾要取得F-35战机将&ldquo;更为困难&rdquo;。</p>\r\n<p style="text-indent: 2em">同时，&ldquo;台湾连线&rdquo;共同主席、共和党籍众议员狄亚士巴拉特（Lincoln Diaz-Balart）等人承诺&ldquo;将发动国会连署&rdquo;要求行政部门尽快决定F16C/D的军售案。</p>\r\n<p style="text-indent: 2em">此前，美联社及路透两大国际通讯社在22日都在台北发布新闻，指根据美国政府最新公布的报告指出，台湾在与大陆进行战斗时，&ldquo;可供作战的战机数量将不敷使用，也凸显台湾空防战力已有&lsquo;不堪一击&rsquo;的危机&rdquo;。</p>\r\n<p style="text-indent: 2em">路透认为，这份报告可能促成美国在肯定触怒北京的情况下，对台提供新的军售，以确保台海情势稳定；美联社则点出，美国防部强烈怀疑：台湾是否拥有足够</p>', '', '', '', 0, '', '', 0, 0, 0, 0, 0, 1266940800, 0);
INSERT INTO `sgcorp_download` (`id`, `user_id`, `title`, `title_style`, `title_style_serialize`, `category_id`, `keyword`, `run_system`, `extension`, `file_size`, `file_size_unit`, `download_url`, `link_url`, `description`, `content`, `tags`, `template`, `file_attach`, `attach`, `attach_image`, `attach_thumb`, `view_count`, `istop`, `recommend`, `status`, `display_order`, `create_time`, `update_time`) VALUES(2, 1, '广西公务员考试涉嫌试题泄露 已立案调查 ', 'color:#800080;font-weight:bold', 'a:2:{s:5:"color";s:7:"#800080";s:4:"bold";s:4:"bold";}', 15, '', '', 'zip', 0, 'KB', 'http://test.com\r\nhttp://www.sss.com', 'http://www.sss.com', '', '<p style="text-indent: 2em">吕秀莲称，对于美国政府决定新一波的对台军售，台湾当然&ldquo;很感谢&rdquo;，但&ldquo;遗憾的是F16C/D型战机仍未纳入&rdquo;。美方亲台官员与议员还说，洛克希德马丁公司（LockheedMartin）万一关闭F16生产线，台湾要取得F-35战机将&ldquo;更为困难&rdquo;。</p>\r\n<p style="text-indent: 2em">同时，&ldquo;台湾连线&rdquo;共同主席、共和党籍众议员狄亚士巴拉特（Lincoln Diaz-Balart）等人承诺&ldquo;将发动国会连署&rdquo;要求行政部门尽快决定F16C/D的军售案。</p>\r\n<p style="text-indent: 2em">此前，美联社及路透两大国际通讯社在22日都在台北发布新闻，指根据美国政府最新公布的报告指出，台湾在与大陆进行战斗时，&ldquo;可供作战的战机数量将不敷使用，也凸显台湾空防战力已有&lsquo;不堪一击&rsquo;的危机&rdquo;。</p>\r\n<p style="text-indent: 2em">路透认为，这份报告可能促成美国在肯定触怒北京的情况下，对台提供新的军售，以确保台海情势稳定；美联社则点出，美国防部强烈怀疑：台湾是否拥有足够抵御大陆攻击的能力。</p>\r\n<p style="text-indent: 2em">台空军对此表示，美方正在评估台湾采购F-16C/D的可行性，目前台方尚未取得这份报告，因此不便对媒体报道评论。而台当局高层官员则分析称，美国官方刻意将这份报告提供给国际媒体并选在台北发出，是向两岸发出极为明显的政治讯息，可能是为宣布出售F-16C/D给台湾进行&ldquo;暖身铺路&rdquo;，台湾静观这项发展，并&ldquo;将会做好准备&rdquo;。</p>', '了修正,55,aaaxxx', '', '', 0, '', '', 0, 0, 0, 0, 0, 1266940800, 0);
INSERT INTO `sgcorp_download` (`id`, `user_id`, `title`, `title_style`, `title_style_serialize`, `category_id`, `keyword`, `run_system`, `extension`, `file_size`, `file_size_unit`, `download_url`, `link_url`, `description`, `content`, `tags`, `template`, `file_attach`, `attach`, `attach_image`, `attach_thumb`, `view_count`, `istop`, `recommend`, `status`, `display_order`, `create_time`, `update_time`) VALUES(3, 1, 'fsg', '', '', 17, '', '', 'zip', 0, 'MB', 'fsg', '', 'fasdf', '<p>fsg</p>', 'fsdf', '', '', 1, 'Download/201003/4b910457af736.jpg', 'Download/201003/4b910457af736_s.jpg', 0, 0, 0, 0, 0, 1267718400, 0);
INSERT INTO `sgcorp_download` (`id`, `user_id`, `title`, `title_style`, `title_style_serialize`, `category_id`, `keyword`, `run_system`, `extension`, `file_size`, `file_size_unit`, `download_url`, `link_url`, `description`, `content`, `tags`, `template`, `file_attach`, `attach`, `attach_image`, `attach_thumb`, `view_count`, `istop`, `recommend`, `status`, `display_order`, `create_time`, `update_time`) VALUES(4, 1, 'asdf', '', '', 15, '', '', 'zip', 0, 'MB', 'asdf', '', '', '<p>fasdf</p>', '', '', '', 1, 'Download/201003/4b91048378829.gif', 'Download/201003/4b91048378829_s.gif', 0, 0, 0, 0, 0, 1267718400, 0);
INSERT INTO `sgcorp_download` (`id`, `user_id`, `title`, `title_style`, `title_style_serialize`, `category_id`, `keyword`, `run_system`, `extension`, `file_size`, `file_size_unit`, `download_url`, `link_url`, `description`, `content`, `tags`, `template`, `file_attach`, `attach`, `attach_image`, `attach_thumb`, `view_count`, `istop`, `recommend`, `status`, `display_order`, `create_time`, `update_time`) VALUES(5, 1, 'ccc', '', '', 15, '', '', 'zip', 0, 'MB', 'cc', '', '', '<p>cc</p>', '了修正,55,fadsf,hghdf', '', '', 0, '', '', 0, 0, 0, 0, 0, 1267891200, 0);

-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_feedback`
--

CREATE TABLE `sgcorp_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL COMMENT '留言主题',
  `username` varchar(50) NOT NULL COMMENT '留言者',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是为男，否为女',
  `mobile_tel` varchar(20) NOT NULL DEFAULT '' COMMENT '手机',
  `telephone` varchar(50) NOT NULL DEFAULT '' COMMENT '电话',
  `fax` varchar(50) NOT NULL COMMENT '传真',
  `qq` varchar(50) NOT NULL COMMENT 'QQ',
  `email` varchar(50) NOT NULL COMMENT 'email',
  `web_url` varchar(200) NOT NULL DEFAULT '' COMMENT '个人主页',
  `address` varchar(50) NOT NULL DEFAULT '' COMMENT '地址',
  `content` text NOT NULL COMMENT '留言内容',
  `reply_content` text NOT NULL COMMENT '回复内容',
  `status` smallint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `ip` char(15) NOT NULL DEFAULT '0' COMMENT '留言IP',
  `reply_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '回复时间',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '留言时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='留言' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `sgcorp_feedback`
--


-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_job`
--

CREATE TABLE `sgcorp_job` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '工作名称或招聘对象',
  `title_style` varchar(255) NOT NULL COMMENT '标题样式',
  `title_style_serialize` varchar(255) NOT NULL COMMENT '标题样式序列化',
  `keyword` varchar(250) NOT NULL COMMENT '关键字',
  `number` int(11) unsigned NOT NULL COMMENT '招聘人数',
  `description` text NOT NULL COMMENT '招聘要求',
  `content` text NOT NULL COMMENT '详细介绍',
  `template` varchar(100) NOT NULL COMMENT '模板文件',
  `tags` varchar(255) NOT NULL COMMENT 'tags',
  `copy_from` varchar(255) NOT NULL COMMENT '来源',
  `from_link` varchar(255) NOT NULL COMMENT '来源链接',
  `link_url` varchar(200) NOT NULL COMMENT '链接地址',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `time_type` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '招聘时间/1长期2限时',
  `end_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '有效天数',
  `attach_file` varchar(100) NOT NULL DEFAULT '' COMMENT '附件',
  `istop` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '置顶',
  `view_count` mediumint(8) unsigned NOT NULL DEFAULT '1' COMMENT '查看次数',
  `display_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='招聘' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `sgcorp_job`
--

INSERT INTO `sgcorp_job` (`id`, `user_id`, `title`, `title_style`, `title_style_serialize`, `keyword`, `number`, `description`, `content`, `template`, `tags`, `copy_from`, `from_link`, `link_url`, `status`, `time_type`, `end_time`, `attach_file`, `istop`, `view_count`, `display_order`, `create_time`, `update_time`) VALUES(1, 1, '网页设计师', 'color:#00ff00;font-weight:bold;TEXT-DECORATION: underline', 'a:3:{s:5:"color";s:7:"#00ff00";s:4:"bold";s:4:"bold";s:9:"underline";s:9:"underline";}', '', 10, '一年以上工作经验，熟练使用网页制作三剑客等专业软件，懂ASP，有美工基础或有成功作品者优先。\r\n注：无工作经验者勿投简历', '<p>一年以上工作经验，熟练使用网页制作三剑客等专业软件，懂ASP，有美工基础或有成功作品者优先。<br />\r\n注：无工作经验者勿投简历</p>', '', '', '', '', '', 0, 1, 2010, '', 0, 0, 0, 1266940800, 0);
INSERT INTO `sgcorp_job` (`id`, `user_id`, `title`, `title_style`, `title_style_serialize`, `keyword`, `number`, `description`, `content`, `template`, `tags`, `copy_from`, `from_link`, `link_url`, `status`, `time_type`, `end_time`, `attach_file`, `istop`, `view_count`, `display_order`, `create_time`, `update_time`) VALUES(2, 1, '市区送货员', '', '', '', 0, '电脑员要求：熟悉电脑操作的女性，打字速度一般，敬业! \r\n会计要求：能够熟悉电算化操作，有良好的职业道德精神.', '<p>电脑员要求：熟悉电脑操作的女性，打字速度一般，敬业! <br />\r\n会计要求：能够熟悉电算化操作，有良好的职业道德精神.</p>', '', '', '', '', '', 0, 1, 2010, '', 0, 0, 0, 1266940800, 0);
INSERT INTO `sgcorp_job` (`id`, `user_id`, `title`, `title_style`, `title_style_serialize`, `keyword`, `number`, `description`, `content`, `template`, `tags`, `copy_from`, `from_link`, `link_url`, `status`, `time_type`, `end_time`, `attach_file`, `istop`, `view_count`, `display_order`, `create_time`, `update_time`) VALUES(3, 1, '市区送货员', '', '', '', 10, '能吃苦耐劳，具备团队合作精神，年龄25-35岁，有一定销售经验者优先，行业不限。 \r\n待遇：1500元—3000元', '<p>能吃苦耐劳，具备团队合作精神，年龄25-35岁，有一定销售经验者优先，行业不限。 <br />\r\n待遇：1500元&mdash;3000元</p>', '', '', '', '', '', 0, 1, 2010, '', 0, 0, 0, 1266940800, 0);
INSERT INTO `sgcorp_job` (`id`, `user_id`, `title`, `title_style`, `title_style_serialize`, `keyword`, `number`, `description`, `content`, `template`, `tags`, `copy_from`, `from_link`, `link_url`, `status`, `time_type`, `end_time`, `attach_file`, `istop`, `view_count`, `display_order`, `create_time`, `update_time`) VALUES(4, 1, '新概念英语教师', 'font-weight:bold', 'a:1:{s:4:"bold";s:4:"bold";}', '', 0, '职位要求1.本科以上学历，有特殊才能者条件可适当放宽  \r\n2.英语基础扎实，发音标准，口语流利，有较强的听说读写译能力  \r\n3.性格开朗外向，赋予朝气和活力 \r\n4.具有较强的幽默感，课堂气氛生动活泼', '<p>职位要求1.本科以上学历，有特殊才能者条件可适当放宽&nbsp; <br />\r\n2.英语基础扎实，发音标准，口语流利，有较强的听说读写译能力&nbsp; <br />\r\n3.性格开朗外向，赋予朝气和活力 <br />\r\n4.具有较强的幽默感，课堂气氛生动活泼&nbsp; <br />\r\n5..有口语教学经验可优先考虑&nbsp;&nbsp; <br />\r\n薪金待遇: <br />\r\n基础工资&nbsp;+各项岗位补贴\\奖金&nbsp;+保险（养老保险&nbsp;&nbsp;医疗保险&nbsp;&nbsp;失业保险&nbsp;&nbsp;工伤保险&nbsp;&nbsp;生育保险）1000-3000元\\月</p>', '', '', '', '', '', 0, 1, 2010, '', 0, 0, 0, 1266940800, 0);
INSERT INTO `sgcorp_job` (`id`, `user_id`, `title`, `title_style`, `title_style_serialize`, `keyword`, `number`, `description`, `content`, `template`, `tags`, `copy_from`, `from_link`, `link_url`, `status`, `time_type`, `end_time`, `attach_file`, `istop`, `view_count`, `display_order`, `create_time`, `update_time`) VALUES(5, 1, '工程招标代理', 'TEXT-DECORATION: underline', 'a:1:{s:9:"underline";s:9:"underline";}', '', 0, '1、专科及以上学历（工程类） \r\n2、具有一年以上工作经验者优先 \r\n3、年龄40岁以下 \r\n4、待遇面议', '<p>1、专科及以上学历（工程类） <br />\r\n2、具有一年以上工作经验者优先 <br />\r\n3、年龄40岁以下 <br />\r\n4、待遇面议</p>', '', '了修正,55,fadsf,hghdf', '', '', '', 0, 0, 1970, '', 0, 0, 0, 1267027200, 1267893427);
INSERT INTO `sgcorp_job` (`id`, `user_id`, `title`, `title_style`, `title_style_serialize`, `keyword`, `number`, `description`, `content`, `template`, `tags`, `copy_from`, `from_link`, `link_url`, `status`, `time_type`, `end_time`, `attach_file`, `istop`, `view_count`, `display_order`, `create_time`, `update_time`) VALUES(8, 1, '健身操、瑜伽、拉丁舞教练', '', '', '', 0, '女性，已婚，25-45岁，工作地点在开发区，4812军工厂对面。 ', '<p>女性，已婚，25-45岁，工作地点在开发区，4812军工厂对面。</p>', '', '女性,已婚,25-45岁,工作地点在开发区，4812军工厂对面。 ', '', '', '', 0, 0, 1267891200, '', 0, 2, 0, 1267891200, 1267934226);

-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_label`
--

CREATE TABLE `sgcorp_label` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `description` text NOT NULL COMMENT '简述',
  `content` text NOT NULL COMMENT '内容',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='标签调用' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `sgcorp_label`
--


-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_link`
--

CREATE TABLE `sgcorp_link` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL COMMENT '网站名称',
  `title_style` varchar(255) NOT NULL COMMENT '标题样式',
  `title_style_serialize` varchar(255) NOT NULL COMMENT '标题样式序列化',
  `category_id` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '链接类型：首页，内页，论坛,文字',
  `link_type` enum('text','image') NOT NULL DEFAULT 'text' COMMENT '链接类型',
  `link_url` varchar(255) NOT NULL DEFAULT '' COMMENT '地址',
  `description` text NOT NULL COMMENT '简介',
  `attach_image` varchar(50) NOT NULL DEFAULT '' COMMENT '附件图片',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '首页显示、内页显示等显示方式',
  `display_order` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序数值，越小排得越前',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '重新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='链接' AUTO_INCREMENT=11 ;

--
-- 转存表中的数据 `sgcorp_link`
--

INSERT INTO `sgcorp_link` (`id`, `title`, `title_style`, `title_style_serialize`, `category_id`, `link_type`, `link_url`, `description`, `attach_image`, `status`, `display_order`, `create_time`, `update_time`) VALUES(1, 'shuguangCMS', 'color:#ff0000;font-weight:bold', 'a:2:{s:5:"color";s:7:"#ff0000";s:4:"bold";s:4:"bold";}', 1, 'text', 'http://www.sgcms.cn', '', '', 0, 0, 1266392534, 0);
INSERT INTO `sgcorp_link` (`id`, `title`, `title_style`, `title_style_serialize`, `category_id`, `link_type`, `link_url`, `description`, `attach_image`, `status`, `display_order`, `create_time`, `update_time`) VALUES(2, 'php开源代码网', 'color:#ff0000;font-weight:bold', 'a:2:{s:5:"color";s:7:"#ff0000";s:4:"bold";s:4:"bold";}', 1, 'text', 'http://www.osphp.com.cn', '', '', 0, 0, 1266392534, 0);

-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_member`
--

CREATE TABLE `sgcorp_member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '角色组',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `realname` varchar(50) NOT NULL COMMENT '真实姓名',
  `question` varchar(50) NOT NULL COMMENT '问题',
  `answer` varchar(50) NOT NULL COMMENT '答案',
  `sex` tinyint(4) NOT NULL COMMENT '性别真为男',
  `telephone` varchar(50) NOT NULL COMMENT '电话',
  `mobile_telephone` varchar(50) NOT NULL COMMENT '手机',
  `fax` varchar(50) NOT NULL COMMENT 'FAX',
  `web_url` varchar(100) NOT NULL COMMENT '网址',
  `email` varchar(50) NOT NULL COMMENT '电子邮件',
  `address` varchar(100) NOT NULL,
  `login_count` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '登录次数',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  `last_login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '最后登录时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='会员' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `sgcorp_member`
--


-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_menu`
--

CREATE TABLE `sgcorp_menu` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL DEFAULT '' COMMENT '标题',
  `title_style` varchar(255) NOT NULL COMMENT '标题样式',
  `title_style_serialize` varchar(255) NOT NULL COMMENT '标题模式序列化',
  `parent_id` tinyint(4) NOT NULL DEFAULT '0' COMMENT '上级',
  `link_url` varchar(100) NOT NULL DEFAULT '' COMMENT '跳转URL',
  `target` varchar(10) NOT NULL DEFAULT '_blank' COMMENT '新窗口',
  `display_order` tinyint(4) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='导航' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `sgcorp_menu`
--

INSERT INTO `sgcorp_menu` (`id`, `title`, `title_style`, `title_style_serialize`, `parent_id`, `link_url`, `target`, `display_order`, `status`, `create_time`, `update_time`) VALUES(1, 'shuguangCMS', '', '', 0, 'http://www.sgcms.cn', '_blank', 0, 0, 1267540911, 1267541659);
INSERT INTO `sgcorp_menu` (`id`, `title`, `title_style`, `title_style_serialize`, `parent_id`, `link_url`, `target`, `display_order`, `status`, `create_time`, `update_time`) VALUES(2, 'php源码网', '', '', 0, 'http://www.osphp.com.cn', '_blank', 0, 0, 1267541417, 0);

-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_module`
--

CREATE TABLE `sgcorp_module` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `module_title` varchar(100) NOT NULL COMMENT '中文',
  `module_name` varchar(50) NOT NULL DEFAULT '' COMMENT '模块名称',
  `module_permission` text NOT NULL COMMENT '包含权限',
  `system_module` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否内置',
  `left_menu` tinyint(1) unsigned NOT NULL DEFAULT '1' COMMENT '是否显示在管理菜单左侧',
  `developer` text NOT NULL COMMENT '开发者版权',
  `build_version` varchar(255) NOT NULL DEFAULT 'N/A' COMMENT '版本',
  `display_order` smallint(3) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '安装时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='模块' AUTO_INCREMENT=105 ;

--
-- 转存表中的数据 `sgcorp_module`
--

INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(4, '导航管理', 'Menu', '浏览=Menu_index|录入=Menu_insert|编辑=Menu_modify|批量操作=Menu_command', 1, 1, '', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(7, '类别管理', 'Category', '浏览=Category_index|编辑=Category_modify|批量操作=Category_update', 1, 1, '', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(8, '新闻管理', 'News', '浏览=News_index|编辑=News_modify|录入=News_insert|移动栏目=News_move|批量操作=News_command', 1, 1, '', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(9, '产品管理', 'Product', '浏览=Product_index|录入=Product_insert|编辑=Product_modify|批量操作=Product_command|订单管理=Product_order|移动类别=Product_move', 0, 1, '', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(10, '下载管理', 'Download', '浏览=Download_index|录入=Download_insert|编辑=Download_modify|批量操作=Download_command|移动栏目=Download_move', 0, 1, '', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(11, '留言管理', 'Feedback', '浏览=Feedback_index|录入=Feedback_insert|编辑=Feedback_modify|批量操作=Feedback_command', 0, 1, '', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(12, '招聘管理', 'Job', '浏览=Job_index|录入=Job_insert|编辑=Job_modify|应聘管理=Job_resume|批量操作=Job_command', 0, 1, '', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(13, '公告管理', 'Notice', '浏览=Notice_index|录入=Notice_insert|编辑=Notice_modify|批量操作=Notice_command', 0, 1, '', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(14, '链接管理', 'Link', '浏览=Link_index|录入=Link_insert|编辑=Link_modify|批量操作=Link_command', 0, 1, '', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(15, '单页管理', 'Page', '浏览=Page_index|录入=Page_insert|编辑=Page_modify|批量操作=Page_command', 1, 1, '', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(16, '广告管理', 'Ad', '浏览=Ad_index|录入=Ad_insert|编辑=Ad_modify|批量操作=Ad_command', 0, 1, '', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(27, 'Tags', 'Tags', '管理=Tags', 1, 1, '', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(28, '评论管理', 'Comment', '浏览=Comment_index|回复=Comment_modify|批量操作=Comment_command', 0, 1, '', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(29, '管理员管理', 'Admin', '浏览=Admin_index|录入=Admin_insert|编辑=Admin_modify|批量操作=Admin_command', 1, 0, '', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(31, '模板风格', 'Theme', '管理=Theme', 1, 0, 'developer:shuguangcms\r\nweb:http://www.sgcms.cn', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(30, '角色管理', 'AdminRole', '浏览=AdminRole_index|录入=AdminRole_insert|编辑=AdminRole_modify|批量操作=AdminRole_command', 1, 0, 'developer:shuguangcms\r\nweb:http://www.sgcms.cn', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(32, '模块管理', 'Module', '浏览=Module_index|编辑=Module_modify|安装=Module_install|卸载=Module_uninstall', 1, 0, 'developer:shuguangcms\r\nweb:http://www.sgcms.cn', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(33, '系统配置', 'Config', '浏览系统配置=Config_index|编辑系统配置=Config_modify|浏览核心配置=Config_core|编辑核心配置=Config_coreModify', 1, 0, 'developer:shuguangcms\r\nweb:http://www.sgcms.cn', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(34, '数据库管理', 'Database', '浏览=Database_index|执行SQL=Database_query|备份数据库=Database_export|恢复数据库=Database_import', 1, 0, 'developer:shuguangcms\r\nweb:http://www.sgcms.cn', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(35, '操作日志管理', 'AdminLog', '管理=AdminLog', 1, 0, 'developer:shuguangcms\r\nweb:http://www.sgcms.cn', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(36, '工具箱管理', 'Tools', '管理=Tools', 1, 0, 'developer:shuguangcms\r\nweb:http://www.sgcms.cn', '2.0', 0, 0, 0, 0);
INSERT INTO `sgcorp_module` (`id`, `module_title`, `module_name`, `module_permission`, `system_module`, `left_menu`, `developer`, `build_version`, `display_order`, `status`, `create_time`, `update_time`) VALUES(37, '数据调用', 'Label', '管理=Label', 1, 0, 'developer:shuguangcms', '', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_news`
--

CREATE TABLE `sgcorp_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '类别',
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `username` varchar(100) NOT NULL DEFAULT '' COMMENT '发布用户名',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '标题',
  `title_style` varchar(255) NOT NULL DEFAULT '' COMMENT '标题样式',
  `title_style_serialize` varchar(255) NOT NULL COMMENT '标题样式序列化',
  `keyword` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `copy_from` varchar(255) NOT NULL DEFAULT '' COMMENT '来源',
  `from_link` varchar(255) NOT NULL DEFAULT '0' COMMENT '来源链接 ',
  `link_url` varchar(255) NOT NULL DEFAULT '' COMMENT '外链地址',
  `description` text NOT NULL COMMENT '简单描述',
  `content` mediumtext NOT NULL COMMENT '内容',
  `tags` varchar(255) NOT NULL COMMENT 'tags',
  `template` varchar(100) NOT NULL COMMENT '模板文件',
  `attach` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '附件',
  `attach_image` varchar(100) NOT NULL DEFAULT '' COMMENT '图片',
  `attach_thumb` varchar(100) NOT NULL DEFAULT '' COMMENT '缩略图',
  `istop` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '置顶',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `recommend` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '推荐',
  `display_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `view_count` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '查看次数',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '发布时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='新闻' AUTO_INCREMENT=13 ;

--
-- 转存表中的数据 `sgcorp_news`
--

INSERT INTO `sgcorp_news` (`id`, `category_id`, `user_id`, `username`, `title`, `title_style`, `title_style_serialize`, `keyword`, `copy_from`, `from_link`, `link_url`, `description`, `content`, `tags`, `template`, `attach`, `attach_image`, `attach_thumb`, `istop`, `status`, `recommend`, `display_order`, `view_count`, `create_time`, `update_time`) VALUES(1, 5, 1, 'fsg', '镇长酒驾被查 称造成负面影响交警要负责任 ', 'font-weight:bold', 'a:1:{s:4:"bold";s:4:"bold";}', '精测试', '', '', '', '本报讯 2月1日，黄山市耿城镇副镇长陈某和记者说起醉酒后驾驶的事情时，仍显得很“无奈”：“我是为陪好投资商而喝酒的，这个事情确实是没办法的。”据悉，1月25日晚，陈某醉酒后，驾驶投资商的宝马车被交警抓个正着。', '<p style="text-indent: 2em">本报讯 2月1日，黄山市耿城镇副镇长陈某和记者说起醉酒后驾驶的事情时，仍显得很&ldquo;无奈&rdquo;：&ldquo;我是为陪好投资商而喝酒的，这个事情确实是没办法的。&rdquo;据悉，1月25日晚，陈某醉酒后，驾驶投资商的宝马车被交警抓个正着。</p>\r\n<p style="text-indent: 2em">据悉，1月25日晚，黄山市交警支队高速二大队民警在屯黄高速公路及匝道开展酒后驾驶统一查处行动。8时半许，一辆江苏牌照的宝马轿车驶进高速公路匝道，在距离交警检查点200米处突然停车。民警上前询问，当驾驶人打开车窗时，车内散发着浓烈的酒精气味，4个人坐在车里不知所措。</p>\r\n<p style="text-indent: 2em">面对呼气式酒精测试仪，驾驶员拒绝配合检测，一再推脱自己不是驾驶人。&ldquo;我是为了招商引资工作的，你们这样做要造成负面影响，要负责任的。&rdquo;该驾驶人态度恶劣。一小时后，驾驶人接受了酒精测试，显示为酒后驶驾。</p>\r\n<p style="text-indent: 2em">随后，该驾驶人陈某被带到黄山市区进行血液酒精含量检测，陈某此时还找来&ldquo;替身&rdquo;，称&ldquo;我的驾驶员来了，你们抽他的血化验吧&rdquo;。最终，陈某的血液检验结果超过了醉酒标准。</p>\r\n<p style="text-indent: 2em">1月26日上午，交警部门查实陈某是黄山区耿城镇党委委员、副镇长、该镇金桥工业园区管委会主任。陈某也承认了醉酒事实，称事发当晚喝完酒后，想开车把客人送到高速公路入口，当时同车4人都饮酒了。当天中午，陈某被处以暂扣驾驶证6个月、罚款1000元并行政拘留的处罚。</p>\r\n<p style="text-indent: 2em">&ldquo;当晚，我是和领导一起陪投资商喝酒的，是为了工作。喝完酒后，想开着宝马车玩玩，没想到被交警逮着了。&rdquo;昨日，陈某和记者说，他醉酒也是为了工作。</p>', '', '', 0, '', '', 0, 0, 0, 0, 0, 1265040000, 1267899050);
INSERT INTO `sgcorp_news` (`id`, `category_id`, `user_id`, `username`, `title`, `title_style`, `title_style_serialize`, `keyword`, `copy_from`, `from_link`, `link_url`, `description`, `content`, `tags`, `template`, `attach`, `attach_image`, `attach_thumb`, `istop`, `status`, `recommend`, `display_order`, `view_count`, `create_time`, `update_time`) VALUES(2, 5, 1, 'fsg', '重庆永川被劫孕妇34天后产下健康女婴(图) ', 'color:#3366ff;font-weight:bold', 'a:2:{s:5:"color";s:7:"#3366ff";s:4:"bold";s:4:"bold";}', '', '网络', 'http://www.sgcms.cn', 'http://www.sgcms.cn', '2009年12月21日上午10点，一声枪响过后，头上被砍了5刀，伤及颅骨的王芳精疲力竭地瘫倒在地。破门而入的警方迅疾将她送往重医大附属永川医院抢救。“我啥子都不担心，就担心肚子里的娃娃。”此时的王芳已经怀孕8个月，未婚夫陈永海在她面前被砍死，自己又被挟持为人质长达3小时，早已经精疲力竭。', '<p style="text-indent: 2em">2009年12月21日清晨7点，永川区万寿镇（场）发生一起劫持人质事件。27岁的当地男子刘勇闯入他人家中，杀死24岁男子陈永海后，用菜刀劫持了陈永海怀有8个月身孕的女友王芳，并将其全身多处砍伤。在与警方对峙3个多小时后，凶手在上午10点被击毙。</p>\r\n<p style="text-indent: 2em"><strong>新生命</strong></p>\r\n<p style="text-indent: 2em">1月30日上午9点，永川区妇幼保健院尤为热闹。5天前在这里剖腹产下一名健康女婴的王芳，要带着女儿出院了。</p>\r\n<p style="text-indent: 2em">所有的医生和护士都认识这个产妇，因为在一个多月前的一起案件中，她被劫持为人质，最后劫匪被击毙，她才获救。当时，她腹中的胎儿只有8个月。</p>\r\n<p style="text-indent: 2em">当王芳离开时，当班的医生和护士全都出门相送。院方派出了一辆救护车，将母女俩送往距离永川城区29公里的金龙镇福兴街道4村2社，这里是王芳的家。</p>\r\n<p style="text-indent: 2em"><strong>回家养伤常做噩梦</strong></p>\r\n<p style="text-indent: 2em">2009年12月21日上午10点，一声枪响过后，头上被砍了5刀，伤及颅骨的王芳精疲力竭地瘫倒在地。破门而入的警方迅疾将她送往重医大附属永川医院抢救。&ldquo;我啥子都不担心，就担心肚子里的娃娃。&rdquo;此时的王芳已经怀孕8个月，未婚夫陈永海在她面前被砍死，自己又被挟持为人质长达3小时，早已经精疲力竭。</p>\r\n<p style="text-indent: 2em">当天下午，记者在永川医院的病房见到王芳时，她一头齐腰秀发已经被剪掉，头上缠满绷带，满眼仍是惊恐。&ldquo;我们本来该明天领证（结婚证）的。&rdquo;王芳对记者只说了一句话。</p>\r\n<p style="text-indent: 2em">在住院的前几天，王芳几乎不能闭眼入睡，&ldquo;一闭眼就是他的惨状，完全睡不着。&rdquo;王芳的母亲张金玉每天都陪在女儿床头，担心女儿，更担心女儿肚子里的孩子。</p>\r\n<p style="text-indent: 2em">1月6日，头上的伤口基本愈合的王芳出院，王芳回到娘家继续养伤和保胎。&ldquo;娃娃经常踢我！&rdquo;一边是痛失未婚夫的切肤之痛，一边是孩子即将出生前的兴奋和不安，王芳备受煎熬。</p>\r\n<p style="text-indent: 2em">回家后，王芳依然怕黑，一到晚上如果身边没人就吓得瑟瑟发抖。&ldquo;我晚上都要陪她睡，她一睡觉就做梦。&rdquo;张金玉每晚都要在女儿惊恐的叫声中惊醒。</p>\r\n<p style="text-indent: 2em">&ldquo;梦里面都是他（陈永海），我真的不想再梦到了啊！&rdquo;王芳的噩梦一直挥之不去，直到1月25日，她即将临盆。</p>', '', '', 1, 'News/201002/4b68496a021df.jpg', 'News/201002/4b68496a021df_s.jpg', 0, 0, 0, 0, 0, 1265040000, 0);
INSERT INTO `sgcorp_news` (`id`, `category_id`, `user_id`, `username`, `title`, `title_style`, `title_style_serialize`, `keyword`, `copy_from`, `from_link`, `link_url`, `description`, `content`, `tags`, `template`, `attach`, `attach_image`, `attach_thumb`, `istop`, `status`, `recommend`, `display_order`, `view_count`, `create_time`, `update_time`) VALUES(3, 2, 1, 'fsg', '陕西丹凤高中生受讯猝死续：县公安局长获刑 ', '', '', '', '', '', '', '一审宣判后，除王庆保外，其余4人均不服一审判决，提出上诉。商洛中院经过二审审理认为，原审判决认定事实清楚，证据确实、充分。定罪准确，量刑适当。审判程序合法。依法作出上述裁定', '<p>备受社会各界关注的<a target="_blank" href="http://news.qq.com/a/20090316/000095.htm"><font color="#0b3b8c">陕西丹凤县公安人员刑讯逼供一案</font></a>，商洛中级人民法院2月1日作出二审裁定：驳回上诉，维持原判。</p>\r\n<p>　　2009年11月24日，商南县人民法院对该案作出作出一审判决：以滥用职权罪判处原丹凤县副县长、县公安局长闫耀锋有期徒刑2年；以刑讯逼供罪判处丹凤县公安局刑警大队原教导员赵朔有期徒刑期2年又6个月；以刑讯逼供罪判处丹凤县原民警贾严刚有期徒刑1年又6个月；以刑讯逼供罪判处原商洛市刑警支队民警李红卫有期徒刑1年，缓刑1年；以玩忽职守罪对原丹凤县公安局纪委书记王庆保判处免予刑事处罚。</p>\r\n<p>　　一审宣判后，除王庆保外，其余4人均不服一审判决，提出上诉。商洛中院经过二审审理认为，原审判决认定事实清楚，证据确实、充分。定罪准确，量刑适当。审判程序合法。依法作出上述裁定。</p>', '', '', 1, 'News/201002/4b684a483f092.jpg', 'News/201002/4b684a483f092_s.jpg', 0, 0, 0, 0, 0, 1265040000, 0);
INSERT INTO `sgcorp_news` (`id`, `category_id`, `user_id`, `username`, `title`, `title_style`, `title_style_serialize`, `keyword`, `copy_from`, `from_link`, `link_url`, `description`, `content`, `tags`, `template`, `attach`, `attach_image`, `attach_thumb`, `istop`, `status`, `recommend`, `display_order`, `view_count`, `create_time`, `update_time`) VALUES(4, 2, 1, 'fsg', '贝卢斯科尼称妻子与威尼斯市长有婚外情(图) ', '', '', '', '', '', '', '悉，贝卢斯科尼披露妻子外遇，主要是希望以此反击拉里奥对他提出巨额离婚赔偿的要求。此前拉里奥指责贝卢斯科尼对离婚应负全部责任，要求贝氏每年提供4300万欧元的离婚赔偿', '<p style="text-indent: 2em">国际在线专稿：据德国《南德意志报》报道，意大利总理贝卢斯科尼与妻子的&ldquo;离婚大战&rdquo;兼&ldquo;隐私揭露战&rdquo;目前进入下一轮。面对妻子韦罗妮卡&middot;拉里奥的巨额离婚赔偿要求，贝卢斯科尼大声指责妻子对其不忠，并揭露了妻子的婚外情。</p>\r\n<p style="text-indent: 2em">据意大利《晚邮报》(Corriere della Sera)报道，贝卢斯科尼与韦罗妮卡&middot;拉里奥日前对簿公堂，二人在罗马地方法院申诉了20分钟左右，然后交由律师代理。双方律师进行了长达几个小时的申诉和辩论，焦点无疑又是隐私新闻&mdash;&mdash;贝卢斯科尼指控妻子有外遇。瑞士《视野报》(Blick)披露了拉里奥外遇事件的两名当事人，一个是47岁的保镖阿尔波特&middot;奥兰帝，另一个是65岁的威尼斯市市长马西莫&middot;卡恰里。</p>\r\n<p style="text-indent: 2em">据悉，贝卢斯科尼披露妻子外遇，主要是希望以此反击拉里奥对他提出巨额离婚赔偿的要求。此前拉里奥指责贝卢斯科尼对离婚应负全部责任，要求贝氏每年提供4300万欧元的离婚赔偿，即每月350万欧元的生活费。而贝卢斯科尼只答应每月支付20万欧元。</p>\r\n<p style="text-indent: 2em">贝卢斯科尼名下确实拥有巨额资产，他拥有一家包括电视台、杂志和报纸在内的传媒集团，还是AC米兰足球俱乐部的老板。《福布斯》杂志曾估计，贝卢斯科尼的个人身家多达65亿美元。</p>\r\n<p style="text-indent: 2em">贝卢斯科尼5个孩子对其媒体王国的继承是整个离婚诉讼的另一个核心问题，拉里奥要求贝氏的5个孩子可以平等地分享这笔财产。事实上，拉里奥与贝卢斯科尼只生养了3个孩子，另2个孩子是贝卢斯科尼与第一任妻子所生，而且他们已经拥有了电视台TV-Holding。拉里</p>', '', '', 0, '', '', 0, 0, 0, 0, 0, 1265040000, 0);
INSERT INTO `sgcorp_news` (`id`, `category_id`, `user_id`, `username`, `title`, `title_style`, `title_style_serialize`, `keyword`, `copy_from`, `from_link`, `link_url`, `description`, `content`, `tags`, `template`, `attach`, `attach_image`, `attach_thumb`, `istop`, `status`, `recommend`, `display_order`, `view_count`, `create_time`, `update_time`) VALUES(5, 5, 1, 'fsg', '韩国前总统金大中陵墓起火 疑似人为纵火(图) ', '', '', '', '', '', '', '今天上午，金大中生前所属的韩国民主党相关人士查看陵墓情况后表示，从起火位置来看，应该是有人故意躲开摄像监控在后面实施的纵火，因为火势自然会蔓延到整个陵墓。', '<p style="text-indent: 2em">环球网实习记者宋伟钢报道 据韩联社2月2日报道，今天上午，位于韩国首尔国立献忠院的前总统金大中陵墓起火，种种迹象显示，起火原因很可能是人为纵火。</p>\r\n<p style="text-indent: 2em">报道称，韩国献忠院的清洁人员在当地时间上午10点准备打扫卫生时，发现陵墓起火，马上将火扑灭。该工作人员称，在之前的上午9点10分巡查时并没有发现有异常情况。</p>\r\n<p style="text-indent: 2em">国立献忠院墓管理人员表示，起火的位置因为处于监视摄像头的盲区，因此还不能确定起火的原因。</p>\r\n<p style="text-indent: 2em">今天上午，金大中生前所属的韩国民主党相关人士查看陵墓情况后表示，从起火位置来看，应该是有人故意躲开摄像监控在后面实施的纵火，因为火势自然会蔓延到整个陵墓。</p>\r\n<p style="text-indent: 2em">据悉，韩国警方已经就此事展开了调查。</p>', '', '', 1, 'News/201002/4b684a8926ef9.jpg', 'News/201002/4b684a8926ef9_s.jpg', 0, 0, 0, 0, 0, 1265040000, 0);
INSERT INTO `sgcorp_news` (`id`, `category_id`, `user_id`, `username`, `title`, `title_style`, `title_style_serialize`, `keyword`, `copy_from`, `from_link`, `link_url`, `description`, `content`, `tags`, `template`, `attach`, `attach_image`, `attach_thumb`, `istop`, `status`, `recommend`, `display_order`, `view_count`, `create_time`, `update_time`) VALUES(6, 3, 1, 'fsg', '每年数十亿停车费去何处 汽车业注重服务了 ', '', '', '', '', '', '', '根据中国质量协会公布的一项调查，相比2008年，2009年国内汽车售后服务态度方面的投诉增加了13.8%,说明车主在购买、维修和保养车辆时，开始日益关注企业服务的“软环境”。', '<p style="text-indent: 2em">昨天接到几个汽车公司公关部门负责同志的电话，询问我们在&ldquo;3&middot;15&rdquo;之前有没有涉及到其企业相关投诉稿件的策划。这不免让人想起，又到了车企在&ldquo;3&middot;15&rdquo;之前集中召回问题车的时候了，而这种情况已经从2005年延续至今。</p>\r\n<p style="text-indent: 2em">不管公关公司与媒体这样做沟通是否有用，单就出发点而言，笔者感觉很遗憾。企业的责任在于将最好的产品和服务带给消费者，与其这时候漫无目的地去做媒体沟通，还不如事先强化产品品质和服务体系建设，尽最大程度地让用户满意，才是根本之道。</p>\r\n<p style="text-indent: 2em">根据中国质量协会公布的一项调查，相比2008年，2009年国内汽车售后服务态度方面的投诉增加了13.8%,说明车主在购买、维修和保养车辆时，开始日益关注企业服务的&ldquo;软环境&rdquo;。</p>\r\n<p style="text-indent: 2em">分析一下几个在售后服务方面颇有心得的企业就会知道，<!--keyword--><a class="a-tips-Article-QQ" title="上海通用别克" href="http://data.auto.qq.com/car_brand/127/" target="_blank"><!--/keyword--><font color="#000000">上海通用别克<!--keyword--></font></a><!--/keyword-->、<!--keyword--><a class="a-tips-Article-QQ" title="广州本田" href="http://data.auto.qq.com/car_brand/108/" target="_blank"><!--/keyword--><font color="#000000">广州本田<!--keyword--></font></a><!--/keyword-->和<!--keyword--><a class="a-tips-Article-QQ" title="上海大众" href="http://data.auto.qq.com/car_brand/122/" target="_blank"><!--/keyword--><font color="#000000">上海大众<!--keyword--></font></a><!--/keyword-->无一不是在构建服务品牌方面摸索出了相当多的经验。无论是别克&ldquo;BuickCare&rdquo;的人性关怀，还是提倡服务标准化体系，让每一位顾客都能得到&ldquo;喜悦&rdquo;感受的广州<!--keyword--><a class="a-tips-Article-QQ" title="本田" href="http://data.auto.qq.com/car_brand/144/" target="_blank"><!--/keyword--><font color="#000000">本田<!--keyword--></font></a><!--/keyword-->的&ldquo;3V&rdquo;服务；抑或是推出&ldquo;TECH CARE&rdquo;<!--keyword--><a class="a-tips-Article-QQ" title="大众" href="http://data.auto.qq.com/car_brand/147/" target="_blank"><!--/keyword--><font color="#000000">大众<!--keyword--></font></a><!--/keyword-->关爱形象的上海大众，虽然在4S店内接受的服务感受有所区别，但最终都是要达到让顾客满意的目的。</p>', '', '', 0, '', '', 0, 0, 0, 0, 1, 1265040000, 0);
INSERT INTO `sgcorp_news` (`id`, `category_id`, `user_id`, `username`, `title`, `title_style`, `title_style_serialize`, `keyword`, `copy_from`, `from_link`, `link_url`, `description`, `content`, `tags`, `template`, `attach`, `attach_image`, `attach_thumb`, `istop`, `status`, `recommend`, `display_order`, `view_count`, `create_time`, `update_time`) VALUES(7, 5, 1, 'fsg', '科比加冕队史得分王 郝海东：早知道高层会出问题 ', '', '', '', '', '', '', '该财长还要求中国驻巴格达使馆简化伊拉克商人去中国的入境签证手续。祖贝迪确认，2009年前9个月中伊双边贸易往来比2008年增长78%，达到近40亿美元。', '<p style="text-indent: 2em">科威特《政治报》2月1日报道：</p>\r\n<p style="text-indent: 2em">伊拉克财长巴格勒&middot;祖贝迪1月31日宣布，北京已经同意一项双边协议，即免除巴格达80%的债务，该债务总额为85亿美元。对于草签于北京的该项双边协议，中国驻巴格达大使常毅向祖贝迪转达了中国人大常委会对此的批准。</p>\r\n<p style="text-indent: 2em">此外，该财长还要求中国驻巴格达使馆简化伊拉克商人去中国的入境签证手续。祖贝迪确认，2009年前9个月中伊双边贸易往来比2008年增长78%，达到近40亿美元。</p>\r\n<p style="text-indent: 2em">中石油公司是战后进入伊拉克油田的首家外国公司，该公司在2008年8月获得了开发瓦希特省艾哈代卜油田合同，投资额为30亿美元。该项合同签署于1997年，但伊拉克现政府对此进行了修正。</p>\r\n<p style="text-indent: 2em">中石化和英国&ldquo;BP&rdquo;还签署了开发鲁迈拉大型油田合同，该油田原油储量达177亿桶，合同为期20年。（驻科威特使馆经商处 徐放）</p>', '', '', 0, '', '', 0, 0, 0, 0, 1, 1265040000, 0);
INSERT INTO `sgcorp_news` (`id`, `category_id`, `user_id`, `username`, `title`, `title_style`, `title_style_serialize`, `keyword`, `copy_from`, `from_link`, `link_url`, `description`, `content`, `tags`, `template`, `attach`, `attach_image`, `attach_thumb`, `istop`, `status`, `recommend`, `display_order`, `view_count`, `create_time`, `update_time`) VALUES(8, 37, 1, 'fsg', '中国放开转基因水稻商业种植 安全性引发担忧 ', '', '', '', '', '', '', '安全证书是转基因作物品种上市之前最难的一个关口，这意味着该品种的生产性试验结束并获得农业主管部门认可，技术方面的障碍基本扫除，接下来就可以申请生产许可证了。', '<p style="text-indent: 2em"><strong>《国际先驱导报》记者金微发自北京</strong> &ldquo;中国成为国外转基因粮的生死试验场&rdquo;&ldquo;民族的噩梦&rdquo;&hellip;&hellip;已经两个月了，有关转基因水稻商业化种植的各种担忧仍然在网络上持续发酵，并逐渐蔓延形成一种恐慌。有的论坛还发起&ldquo;反转基因主粮&rdquo;的签名活动。</p>\r\n<p style="text-indent: 2em">2009年11月27日，农业部批准了两种转基因水稻、一种转基因玉米的安全证书，获得两个转基因水稻安全证书的是华中农业大学张启发教授及其同事。这是中国首次为转基因水稻颁发安全证书。</p>\r\n<p style="text-indent: 2em">安全证书是转基因作物品种上市之前最难的一个关口，这意味着该品种的生产性试验结束并获得农业主管部门认可，技术方面的障碍基本扫除，接下来就可以申请生产许可证了。</p>\r\n<p style="text-indent: 2em">作为全球最大的水稻生产和消费国，中国即将打开转基因水稻商业化种植的&ldquo;闸门&rdquo;，但这也引起了担忧。</p>\r\n<p style="text-indent: 2em">&ldquo;如果在全球还远未达到共识的情况下，我们贸然去进行转基因水稻大面积的商业化种植，这种&lsquo;敢为天下先&rsquo;是不是也太超前了？&rdquo;中国人民大学农业与农村发展学院副院长郑风田发出的疑问颇具代表性。</p>\r\n<p style="text-indent: 2em"><strong>真没害处吗？</strong></p>', '', '', 0, '', '', 0, 0, 0, 0, 1, 1265040000, 0);
INSERT INTO `sgcorp_news` (`id`, `category_id`, `user_id`, `username`, `title`, `title_style`, `title_style_serialize`, `keyword`, `copy_from`, `from_link`, `link_url`, `description`, `content`, `tags`, `template`, `attach`, `attach_image`, `attach_thumb`, `istop`, `status`, `recommend`, `display_order`, `view_count`, `create_time`, `update_time`) VALUES(9, 37, 1, 'fsg', '31名省级行政首长解析：平均在政坛历练25年', '', '', '', '', '', '', '内地现任31名省级地方行政首长中，有两位“60后”，新疆维吾尔自治区主席努尔·白克力，今年48岁，湖南省省长周强则是49岁；“50后”占31省份行政首长中的70%以上，有22人；“40后”有7人，其中最年长的是福建省省长黄小晶、浙江省省长吕祖善、广东省省长黄华华和贵州省省长林树森，均为63岁。', '<p>日前，骆惠宁当选为青海省省长。至此，我国5个&ldquo;代理&rdquo;省级地方行政首长均顺利转&ldquo;正&rdquo;。其他4位分别为：西藏自治区主席白玛赤林、重庆市市长黄奇帆、吉林省省长王儒林、河北省省长陈全国。</p>\r\n<p>　　通过对内地31位省级地方行政首长的履历进行统计分析，记者发现，他们参加工作的平均年龄是19.5岁，都是从事基层的工作，大多人的第一份工作并非进入政坛。他们平均在23岁入党、29岁步入政坛，再在政坛经过25年的历练和成长，才能担当地方大员的重任。值得一提的是，在全国恢复高考这一年，至少有1/3人的命运被改变，他们顺利考取大学并毕业后，大多分入政府部门工作，并平步青云。</p>\r\n<p>　　<strong>平均年龄57岁 有两位&ldquo;60后&rdquo;</strong></p>\r\n<p>　　内地现任31名省级地方行政首长中，有两位&ldquo;60后&rdquo;，新疆维吾尔自治区主席努尔&middot;白克力，今年48岁，湖南省省长周强则是49岁；&ldquo;50后&rdquo;占31省份行政首长中的70%以上，有22人；&ldquo;40后&rdquo;有7人，其中最年长的是福建省省长黄小晶、浙江省省长吕祖善、广东省省长黄华华和贵州省省长林树森，均为63岁。</p>\r\n<p>　　31人平均年龄57岁，正是年富力强，经验丰富的时候。我国规定正部级退休年龄为65岁，因此，在未来近10年，他们当中很多人将继续在我国政治舞台中发挥重要的作用。</p>\r\n<p>　　据统计，现任31个省份党委&ldquo;一把手&rdquo;，有15人曾担任过省级地方行政首长，占近一半；在我国政治核心领导层中，也是如此，现任25名中央政治局委员，曾经担任过省级地方行政首长的有11人；9位中央政治局常委中，就有5人曾担任过省长。</p>\r\n<p>　　<strong>超七成首份工作并非从政</strong></p>\r\n<p>　　31名省级地方行政首长，参加工作的平均年龄为19.5岁，值得一提的是，他们当中，只有7人的第一份工作就进入基层的政府部门，只占22.6%；其他大部分人则是下乡当知青或车间工人、窑矿工人、工厂技术员、仓库管理员，还有的是部队服役战士，只有努尔&middot;白克力的起点比较高，大学毕业就到新疆大学政治系任辅导员。</p>', '', '', 0, '', '', 0, 0, 0, 0, 3, 1265040000, 0);
INSERT INTO `sgcorp_news` (`id`, `category_id`, `user_id`, `username`, `title`, `title_style`, `title_style_serialize`, `keyword`, `copy_from`, `from_link`, `link_url`, `description`, `content`, `tags`, `template`, `attach`, `attach_image`, `attach_thumb`, `istop`, `status`, `recommend`, `display_order`, `view_count`, `create_time`, `update_time`) VALUES(10, 5, 1, 'fsg', '1977年12月，我国恢复了中断10年的高考', 'color:#ff00ff;font-weight:bold', 'a:2:{s:5:"color";s:7:"#ff00ff";s:4:"bold";s:4:"bold";}', '', 'fsg', 'http://www.sgcms.com', '', '近3年知青后，考入吉林大学，毕业后进入沈阳市政府办公厅秘书处；青海省省长骆惠宁从原来炼钢厂团委干事考进安徽大学，毕业后进入安徽省政府办公厅任秘书；湖南省省长周强在湖北黄梅县农村插队当知青2年后，考入西南政法学院，获得硕士学位后调入司法部法律政策研究室法规处；河北省省长', '<p><strong>大学毕业多调往政坛</strong></p>\r\n<p>　　1977年12月，我国恢复了中断10年的高考。记者统计发现，现任31名省级地方行政首长，有1/3成为恢复高考后第一年的幸运儿，其命运也由此发生重大转折。</p>\r\n<p>　　其中，广西壮族自治区主席马飚在钢铁厂当6年工人后考入中央民族学院，毕业后调入广西计委计划经济研究所当助理研究员；湖北省省长李鸿忠在沈阳农村当了近3年知青后，考入吉林大学，毕业后进入沈阳市政府办公厅秘书处；青海省省长骆惠宁从原来炼钢厂团委干事考进安徽大学，毕业后进入安徽省政府办公厅任秘书；湖南省省长周强在湖北黄梅县农村插队当知青2年后，考入西南政法学院，获得硕士学位后调入司法部法律政策研究室法规处；河北省省长陈全国由一名汽车配件厂工人，考入郑州大学，毕业后调到河南省平舆县辛店公社工作，2年后升任河南驻马店地委办公室秘书(副县级)；海南省省长罗保铭当年也是由一名工人，考入天津师范专科学校，毕业后分配到共青团天津市委。</p>\r\n<p>　　<strong>学者型官员成为一道风景</strong></p>\r\n<p>　　31人中，大多在工作中继续学习、深造。据统计，有28人进行过1年以上的学习和培训，有14人有过2次或2次以上的学习深造阶段。</p>\r\n<p>　　31人均具有大学以上学历，有21人具有研究生学历。引人瞩目的是，学者型官员日渐增多。天津市市长黄兴国是管理学博士、骆惠宁是经济学博士、王正伟是民族经济学博士、陕西省省长袁纯清在湖南大学国际商学院管理科学与工程专业攻读博士研究生并获管理学博士学位，随后又在北京大学经济学院从事理论经济学博士后研究工作并获博士后证书，袁纯清2002年出版了《金融共生理论与城市商业银行研究》一书，由此成为&ldquo;国内运用共生理论研究经济的第一人&rdquo;。</p>\r\n<p>　　31人中，所学专业中文、法律、经济、哲学、管理等居多，理工科较少。新时期，我国的市场经济和民主法制走向成熟，在转型期间，群体事件多发，出于构建和谐社会的需要，过去&ldquo;工程师主政&rdquo;的局面正悄然发生变化，一些人文、公共管理、法律出身的职业政治家正在形成。据《南方都市报》报道</p>', '', '', 1, 'News/201003/4b93aebd4cc5e.jpg', 'News/201003/4b93aebd4cc5e_s.jpg', 0, 0, 0, 0, 4, 1265040000, 1267969725);

-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_notice`
--

CREATE TABLE `sgcorp_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT 'udi',
  `title` varchar(50) NOT NULL COMMENT '标题',
  `title_style` varchar(255) NOT NULL COMMENT '标题样式',
  `title_style_serialize` varchar(255) NOT NULL COMMENT '样式序列化',
  `username` varchar(50) NOT NULL COMMENT '用户名',
  `come_from` varchar(50) NOT NULL DEFAULT '' COMMENT '来源名称',
  `come_from_url` varchar(255) NOT NULL COMMENT '来源地址',
  `link_url` varchar(100) NOT NULL COMMENT '链接地址',
  `content` text NOT NULL COMMENT '内容',
  `template` varchar(100) NOT NULL COMMENT '模板文件',
  `tags` varchar(255) NOT NULL COMMENT 'tags',
  `start_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '开始时间',
  `end_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '结束时间',
  `attach_file` varchar(100) NOT NULL DEFAULT '' COMMENT '附件文件',
  `keyword` varchar(250) NOT NULL COMMENT '关键字',
  `view_count` int(11) unsigned NOT NULL COMMENT '查看次数',
  `display_order` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '状态',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='公告' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `sgcorp_notice`
--


-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_order`
--

CREATE TABLE `sgcorp_order` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '主题ID',
  `realname` varchar(255) NOT NULL DEFAULT '' COMMENT '收货人',
  `sex` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '性别',
  `address` varchar(255) NOT NULL DEFAULT '' COMMENT '地址',
  `zipcode` varchar(50) NOT NULL DEFAULT '' COMMENT '邮编',
  `telephone` varchar(255) NOT NULL DEFAULT '' COMMENT '电话',
  `fax` varchar(50) NOT NULL COMMENT '传真',
  `email` varchar(100) NOT NULL DEFAULT '' COMMENT '电子邮件',
  `introduction` text NOT NULL COMMENT '详细内容',
  `remark` text NOT NULL COMMENT '备注',
  `status` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '状态(0未阅 1已阅 2已处理)',
  `ip` char(15) NOT NULL DEFAULT '127.0.0.1' COMMENT 'IP',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '订货日期',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='订单' AUTO_INCREMENT=17 ;



--
-- 表的结构 `sgcorp_page`
--

CREATE TABLE `sgcorp_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '' COMMENT '标题',
  `link_label` char(50) NOT NULL DEFAULT '' COMMENT '链接标识',
  `keyword` varchar(250) NOT NULL DEFAULT '' COMMENT '关键字',
  `description` text NOT NULL COMMENT '简述',
  `content` text NOT NULL COMMENT '内容',
  `template` varchar(100) NOT NULL COMMENT '模板',
  `attach_image` varchar(100) NOT NULL DEFAULT '' COMMENT '附件图片',
  `attach_thumb` varchar(100) NOT NULL DEFAULT '' COMMENT '附件缩略图',
  `attach_ext` varchar(50) NOT NULL COMMENT '附件类型',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否显示',
  `view_count` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '查看次数',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '录入时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='单页' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `sgcorp_page`
--

INSERT INTO `sgcorp_page` (`id`, `title`, `link_label`, `keyword`, `description`, `content`, `template`, `attach_image`, `attach_thumb`, `attach_ext`, `status`, `view_count`, `create_time`, `update_time`) VALUES(1, '关于我们', 'about', '', '', '<p><strong>大学毕业多调往政坛</strong></p>\r\n<p>　　1977年12月，我国恢复了中断10年的高考。记者统计发现，现任31名省级地方行政首长，有1/3成为恢复高考后第一年的幸运儿，其命运也由此发生重大转折。</p>\r\n<p>　　其中，广西壮族自治区主席马飚在钢铁厂当6年工人后考入中央民族学院，毕业后调入广西计委计划经济研究所当助理研究员；湖北省省长李鸿忠在沈阳农村当了近3年知青后，考入吉林大学，毕业后进入沈阳市政府办公厅秘书处；青海省省长骆惠宁从原来炼钢厂团委干事考进安徽大学，毕业后进入安徽省政府办公厅任秘书；湖南省省长周强在湖北黄梅县农村插队当知青2年后，考入西南政法学院，获得硕士学位后调入司法部法律政策研究室法规处；河北省省长陈全国由一名汽车配件厂工人，考入郑州大学，毕业后调到河南省平舆县辛店公社工作，2年后升任河南驻马店地委办公室秘书(副县级)；海南省省长罗保铭当年也是由一名工人，考入天津师范专科学校，毕业后分配到共青团天津市委。</p>\r\n<p>　　<strong>学者型官员成为一道风景</strong></p>\r\n<p>　　31人中，大多在工作中继续学习、深造。据统计，有28人进行过1年以上的学习和培训，有14人有过2次或2次以上的学习深造阶段。</p>\r\n<p>　　31人均具有大学以上学历，有21人具有研究生学历。引人瞩目的是，学者型官员日渐增多。天津市市长黄兴国是管理学博士、骆惠宁是经济学博士、王正伟是民族经济学博士、陕西省省长袁纯清在湖南大学国际商学院管理科学与工程专业攻读博士研究生并获管理学博士学位，随后又在北京大学经济学院从事理论经济学博士后研究工作并获博士后证书，袁纯清2002年出版了《金融共生理论与城市商业银行研究》一书，由此成为&ldquo;国内运用共生理论研究经济的第一人&rdquo;。</p>\r\n<p>　　31人中，所学专业中文、法律、经济、哲学、管理等居多，理工科较少。新时期，我国的市场经济和民主法制走向成熟，在转型期间，群体事件多发，出于构建和谐社会的需要，过去&ldquo;工程师主政&rdquo;的局面正悄然发生变化，一些人文、公共管理、法律出身的职业政治家正在形成。据《南方都市报》报道</p>', '', '', '', '', 0, 0, 1265943064, 0);
INSERT INTO `sgcorp_page` (`id`, `title`, `link_label`, `keyword`, `description`, `content`, `template`, `attach_image`, `attach_thumb`, `attach_ext`, `status`, `view_count`, `create_time`, `update_time`) VALUES(2, '公司荣誉', 'honor', '', '', '<p>日前，骆惠宁当选为青海省省长。至此，我国5个&ldquo;代理&rdquo;省级地方行政首长均顺利转&ldquo;正&rdquo;。其他4位分别为：西藏自治区主席白玛赤林、重庆市市长黄奇帆、吉林省省长王儒林、河北省省长陈全国。</p>\r\n<p>　　通过对内地31位省级地方行政首长的履历进行统计分析，记者发现，他们参加工作的平均年龄是19.5岁，都是从事基层的工作，大多人的第一份工作并非进入政坛。他们平均在23岁入党、29岁步入政坛，再在政坛经过25年的历练和成长，才能担当地方大员的重任。值得一提的是，在全国恢复高考这一年，至少有1/3人的命运被改变，他们顺利考取大学并毕业后，大多分入政府部门工作，并平步青云。</p>\r\n<p>　　<strong>平均年龄57岁 有两位&ldquo;60后&rdquo;</strong></p>\r\n<p>　　内地现任31名省级地方行政首长中，有两位&ldquo;60后&rdquo;，新疆维吾尔自治区主席努尔&middot;白克力，今年48岁，湖南省省长周强则是49岁；&ldquo;50后&rdquo;占31省份行政首长中的70%以上，有22人；&ldquo;40后&rdquo;有7人，其中最年长的是福建省省长黄小晶、浙江省省长吕祖善、广东省省长黄华华和贵州省省长林树森，均为63岁。</p>\r\n<p>　　31人平均年龄57岁，正是年富力强，经验丰富的时候。我国规定正部级退休年龄为65岁，因此，在未来近10年，他们当中很多人将继续在我国政治舞台中发挥重要的作用。</p>\r\n<p>　　据统计，现任31个省份党委&ldquo;一把手&rdquo;，有15人曾担任过省级地方行政首长，占近一半；在我国政治核心领导层中，也是如此，现任25名中央政治局委员，曾经担任过省级地方行政首长的有11人；9位中央政治局常委中，就有5人曾担任过省长。</p>\r\n<p>　　<strong>超七成首份工作并非从政</strong></p>\r\n<p>　　31名省级地方行政首长，参加工作的平均年龄为19.5岁，值得一提的是，他们当中，只有7人的第一份工作就进入基层的政府部门，只占22.6%；其他大部分人则是下乡当知青或车间工人、窑矿工人、工厂技术员、仓库管理员，还有的是部队服役战士，只有努尔&middot;白克力的起点比较高，大学毕业就到新疆大学政治系任辅导员。</p>', '', '', '', '', 0, 0, 0, 1265943442);
INSERT INTO `sgcorp_page` (`id`, `title`, `link_label`, `keyword`, `description`, `content`, `template`, `attach_image`, `attach_thumb`, `attach_ext`, `status`, `view_count`, `create_time`, `update_time`) VALUES(3, '联系方式', 'contact', '', '', '<p>联系方式</p>', '', '', '', '', 0, 0, 1267352147, 0);

-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_product`
--

CREATE TABLE `sgcorp_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '用户ID',
  `username` varchar(20) NOT NULL COMMENT '发布者',
  `category_id` tinyint(3) unsigned NOT NULL DEFAULT '0' COMMENT '分类ID',
  `title` varchar(255) NOT NULL DEFAULT '' COMMENT '产品名称',
  `title_style` varchar(255) NOT NULL DEFAULT '' COMMENT '标题样式',
  `title_style_serialize` varchar(255) NOT NULL COMMENT '标题样式序列化',
  `standard` varchar(50) NOT NULL DEFAULT '' COMMENT '规格',
  `number` varchar(50) NOT NULL DEFAULT '' COMMENT '产品型号',
  `keyword` varchar(255) NOT NULL DEFAULT '' COMMENT '关键字',
  `sale_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '价格',
  `market_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '市场价',
  `shop_price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT '商场价',
  `description` text NOT NULL COMMENT '描述',
  `content` text NOT NULL COMMENT '产品说明',
  `tags` varchar(255) NOT NULL COMMENT 'tags',
  `template` varchar(100) NOT NULL COMMENT '模板文件',
  `attach` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否附件 1是0否',
  `attach_image` varchar(100) NOT NULL DEFAULT '' COMMENT '图片',
  `attach_thumb` varchar(100) NOT NULL DEFAULT '' COMMENT '缩略图',
  `link_url` varchar(100) NOT NULL COMMENT '外链接',
  `istop` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '置顶',
  `status` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否审核',
  `recommend` tinyint(1) unsigned NOT NULL DEFAULT '0' COMMENT '是否推荐',
  `display_order` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '排序',
  `view_count` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '点击次数',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '添加时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='产品' AUTO_INCREMENT=4 ;

--
-- 转存表中的数据 `sgcorp_product`
--

INSERT INTO `sgcorp_product` (`id`, `user_id`, `username`, `category_id`, `title`, `title_style`, `title_style_serialize`, `standard`, `number`, `keyword`, `sale_price`, `market_price`, `shop_price`, `description`, `content`, `tags`, `template`, `attach`, `attach_image`, `attach_thumb`, `link_url`, `istop`, `status`, `recommend`, `display_order`, `view_count`, `create_time`, `update_time`) VALUES(1, 1, 'fsg', 13, '不得插手房地产开发', 'color:#3366ff', 'a:1:{s:5:"color";s:7:"#3366ff";}', 'test', 'test', '', 0.00, 0.00, 0.00, 'test', '<p style="text-indent: 2em">中新网北京2月24日电 中共中央近日印发了《<a target="_blank" href="http://news.qq.com/a/20100224/000132.htm"><font color="#0b3b8c">中国共产党党员领导干部廉洁从政若干准则</font></a>》，并发出通知，要求各地区各部门认真贯彻执行。</p>\r\n<p style="text-indent: 2em">通知指出，1997年3月中共中央印发的《中国共产党党员领导干部廉洁从政若干准则(试行)》，对于促进党员领导干部廉洁从政，加强和改进党的建设发挥了重要作用，但是随着新时期党的建设特别是反腐倡廉建设的不断深入，已经不能完全适应现实需要，中央决定予以修订。通知要求，各级党员领导干部要认真贯彻执行《廉政准则》，严于律己，洁身自好，严格要求配偶、子女及其配偶、其他亲属以及身边工作人员，坚决杜绝违反《廉政准则》行为的发生。</p>\r\n<p style="text-indent: 2em">新华社于23日公布了《准则》全文。《准则》包括总则、廉洁从政行为规范、实施与监督、附则，共18条。其中&ldquo;廉洁从政行为规范&rdquo;一章，详细规定了领导干部从政行为八大方面的&ldquo;禁止&rdquo;，并详细列出52种&ldquo;不准&rdquo;的行为。</p>', '', '', 1, 'Product/201003/4ba37bf0561d5.png', 'Product/201003/4ba37bf0561d5_s.png', '', 0, 0, 0, 0, 1, 1266940800, 0);
INSERT INTO `sgcorp_product` (`id`, `user_id`, `username`, `category_id`, `title`, `title_style`, `title_style_serialize`, `standard`, `number`, `keyword`, `sale_price`, `market_price`, `shop_price`, `description`, `content`, `tags`, `template`, `attach`, `attach_image`, `attach_thumb`, `link_url`, `istop`, `status`, `recommend`, `display_order`, `view_count`, `create_time`, `update_time`) VALUES(2, 1, 'fsg', 7, '方地区大风降温将超14℃ 东北有大到暴雪 ', '', '', '', '', '', 0.00, 0.00, 0.00, '方地区大风降温将超14℃ 东北有大到暴雪 ', '<p style="text-indent: 2em">中新网2月24日电 中央气象台24日发布天气预报，未来三天，中国北方地区将有大风降温天气，局部地区可达14℃以上，黑龙江、吉林部分地区有大到暴雪；而长江中下游部分地区则有大雨和强对流天气。</p>\r\n<p style="text-indent: 2em">受较强冷空气影响，24~26日，内蒙古大部、华北中北部、东北等地气温将下降6~8℃，内蒙古东部偏南地区、东北地区南部和东部等地气温下降8~12℃,局部地区可达14℃以上；上述地区将先后出现4~6级偏北风；南疆盆地、内蒙古中东部偏北的部分地区有扬沙或浮尘天气。</p>\r\n<p style="text-indent: 2em">受冷暖空气共同影响，未来三天，新疆北部、西藏西南部和青藏高原东部、内蒙古中东部、东北等地由小到中雪或雨夹雪，其中，黑龙江东南部、吉林中东部等地的部分地区有大到暴雪；华北东部和南部、黄淮大部、江淮、江汉大部、江南、华南大部及西南地区东部等地有小到中雨或阵雨，其中，湖北东南部、安徽南部、江西北部、浙江西部等地的部分地区有大雨；24日下午开始，江淮、江南北部等地将先后出现雷暴天气，其中湖北东部、安徽南部及江西北部等地的局部地区可能有短时强降水、冰雹或雷雨大风等强对流天气。</p>\r\n<p style="text-indent: 2em">今天早晨到上午，西南地区东部、辽宁中部和南部、河北东部、天津、山西东南部、河南北部、山东中东部、华南南部、福建西部等地有轻雾或霾，其中，重庆西</p>', '', '', 1, 'Product/201003/4ba37be30dd68.jpg', 'Product/201003/4ba37be30dd68_s.jpg', '', 0, 0, 0, 0, 0, 1267286400, 0);

-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_resume`
--

CREATE TABLE `sgcorp_resume` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `job_id` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '岗位ID',
  `realname` varchar(50) NOT NULL DEFAULT '' COMMENT '姓名',
  `sex` char(2) NOT NULL DEFAULT '男' COMMENT '性别',
  `birthday` varchar(50) NOT NULL DEFAULT '' COMMENT '出生日期',
  `marry` char(10) NOT NULL DEFAULT '未婚' COMMENT '婚否',
  `school` varchar(255) NOT NULL DEFAULT '' COMMENT '学校',
  `degree` varchar(255) NOT NULL DEFAULT '' COMMENT '学历',
  `gradyear` varchar(50) NOT NULL DEFAULT '' COMMENT '毕业时间',
  `telephone` varchar(50) NOT NULL COMMENT '电话',
  `address` varchar(50) NOT NULL COMMENT '联系地址',
  `introduction` text NOT NULL COMMENT '简介',
  `remark` text NOT NULL COMMENT '备注',
  `ip` char(15) NOT NULL DEFAULT '127.0.0.1' COMMENT 'IP',
  `attach_file` varchar(100) NOT NULL COMMENT '附件',
  `status` smallint(6) NOT NULL DEFAULT '0' COMMENT '状态(0未阅 1已阅 2录用 3未录用)',
  `create_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '应聘时间',
  `update_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='应聘简历' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `sgcorp_resume`
--


-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_tags`
--

CREATE TABLE `sgcorp_tags` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT 'id',
  `tag_name` char(20) NOT NULL DEFAULT '' COMMENT '标签',
  `module` char(20) NOT NULL DEFAULT '' COMMENT '模块',
  `total_count` mediumint(8) unsigned NOT NULL DEFAULT '0' COMMENT '出现主题数',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='tag标签' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `sgcorp_tags`
--


-- --------------------------------------------------------

--
-- 表的结构 `sgcorp_tags_cache`
--

CREATE TABLE `sgcorp_tags_cache` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `module` char(20) NOT NULL DEFAULT '' COMMENT '模块',
  `tag_name` char(20) NOT NULL COMMENT '标签名',
  `title_id` int(10) unsigned NOT NULL COMMENT '主题ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 CHECKSUM=1 DELAY_KEY_WRITE=1 ROW_FORMAT=DYNAMIC COMMENT='tag主题关联' AUTO_INCREMENT=1 ;

--
-- 转存表中的数据 `sgcorp_tags_cache`
--

