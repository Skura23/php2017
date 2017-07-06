-- 表的结构 `cat`

--坑点：变量名要加反引号''，引号无效；表变量值要加引号''

CREATE TABLE IF NOT EXISTS `cat` (
	`cat_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`catname` char(30) NOT NULL DEFAULT '',
	`num` smallint(5) unsigned NOT NULL DEFAULT '0',
	PRIMARY KEY (`cat_id`)
) ENGINE= MYISAM DEFAULT CHARSET=UTF8;

--转存表中的数据 `cat`

INSERT INTO `cat` (`cat_id`, `catname`,`num`) VALUES
(1,'随笔',0),
(2,'前端',0);

--表的结构 `art`

CREATE TABLE IF NOT EXISTS `art` (
	`art_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`cat_id` smallint(5) unsigned DEFAULT '0',
	`user_id` int(10) unsigned DEFAULT '0',
	`nick` varchar(45) DEFAULT '',
	`title` varchar(45) DEFAULT '',
	`content` text,
	`pubtime` int(10) unsigned NOT NULL DEFAULT '0',
	`lastup` int(10) unsigned DEFAULT '0',
	`comm` smallint(5) unsigned NOT NULL DEFAULT '0',
	PRIMARY KEY (`art_id`)
) ENGINE= MYISAM DEFAULT CHARSET=UTF8 COMMENT='文章表';

--表的结构 `tag`

CREATE TABLE IF NOT EXISTS `tag` (
	tag_id int unsigned AUTO_INCREMENT PRIMARY KEY,
	`art_id` int(10) unsigned NOT NULL DEFAULT '0',
	`tag` char(10) NOT NULL DEFAULT '0',
	KEY `at` (`art_id`, `tag`),
	KEY `ta` (`tag`, `art_id`)
) ENGINE= MYISAM DEFAULT CHARSET=UTF8;

--表的结构 `comment`

CREATE TABLE IF NOT EXISTS `comment` (
	`comment_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`art_id` smallint(5) unsigned DEFAULT '0',
	`user_id` int(10) unsigned DEFAULT '0',
	`nick` varchar(45) DEFAULT '',
	`content` varchar(1000) NOT NULL DEFAULT '',
	`pubtime` int(10) unsigned NOT NULL DEFAULT '0',
	`ip` int(10) unsigned DEFAULT '0',
	PRIMARY KEY (`comment_id`)
) ENGINE= MYISAM DEFAULT CHARSET=UTF8;

--表的结构 `user`

CREATE TABLE IF NOT EXISTS `user` (
	`user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
	`name` char(20) NOT NULL DEFAULT '',
	`nick` char(20) NOT NULL DEFAULT '',
	`email` char(30) NOT NULL DEFAULT '',
	`password` varchar(32) NOT NULL DEFAULT '',
	`lastlogin` int(10) unsigned NOT NULL DEFAULT '0',
	PRIMARY KEY (`user_id`),
	UNIQUE KEY `name` (`name`)
) ENGINE= MYISAM DEFAULT CHARSET=UTF8;