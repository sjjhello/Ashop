

DROP TABLE IF EXISTS `imooc_admin`;
CREATE TABLE `imooc_admin`(
`id` tinyint unsigned auto_increment key,
`username` varchar(20) not null unique,
`password` char(32) not null,
`email` varchar(50) not null
);


DROP TABLE IF EXISTS `imooc_cate`;
CREATE TABLE `imooc_cate`(
`id` smallint unsigned auto_increment key,
`cName` varchar(50) unique
);


DROP TABLE IF EXISTS `imooc_pro`;
CREATE TABLE `imooc_pro`(
`id` int unsigned auto_increment key,
`pName` varchar(50) not null unique,
`pSn` varchar(50) not null,
`pNum` int unsigned default 1,
`mPrice` decimal(10,2) not null,
`iPrice` decimal(10,2) not null,
`pDesc` text,
`pImg` varchar(50) not null,
`pubTime` int unsigned not null,
`isShow` tinyint(1) default 1,
`isHot` tinyint(1) default 0,
`cId` smallint unsigned not null
);


DROP TABLE IF EXISTS `imooc_user`;
CREATE TABLE `imooc_user`(
`id` int unsigned auto_increment key,
`username` varchar(20) not null unique,
`password` char(32) not null,
`sex` enum("男","女","保密") not null default "保密",
`face` varchar(50) not null,
`regTime` int unsigned not null
);


DROP TABLE IF EXISTS `imooc_album`;
CREATE TABLE `imooc_album`(
`id` int unsigned auto_increment key,
`pid` int unsigned not null,
`albumPath` varchar(50) not null

);

