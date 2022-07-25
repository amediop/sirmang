CREATE TABLE IF NOT EXISTS `#__creativesocialwidget_blocks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `name` text NOT NULL,
  `wrapper_width` text NOT NULL,
  `wrapper_offset` text NOT NULL,
  `wrapper_template` smallint(5) unsigned NOT NULL,
  `wrapper_color` text NOT NULL,
  `wrapper_animate` tinyint(3) unsigned NOT NULL,
  `dummy_field1` text NOT NULL,
  `dummy_field2` text NOT NULL,
  `id_template` smallint(5) unsigned NOT NULL,
  `size` smallint(5) unsigned NOT NULL,
  `animation` smallint(5) unsigned NOT NULL,
  `icons_offset` text NOT NULL,
  `type` tinyint(3) unsigned NOT NULL,
  `align` tinyint(3) unsigned NOT NULL,
  `fixed_place` tinyint(3) unsigned NOT NULL,
  `fixed_top_offset` mediumint(8) unsigned NOT NULL,
  `fixed_corner_offset` mediumint(8) unsigned NOT NULL,
  `fixed_content_width` mediumint(8) unsigned NOT NULL,
  `created` datetime NOT NULL,
  `publish_up` datetime NOT NULL,
  `publish_down` datetime NOT NULL,
  `published` tinyint(1) NOT NULL,
  `checked_out` int(10) unsigned NOT NULL,
  `checked_out_time` datetime NOT NULL,
  `access` int(10) unsigned NOT NULL,
  `featured` tinyint(3) unsigned NOT NULL,
  `ordering` int(11) NOT NULL,
  `language` char(7) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_user` (`id_user`)
) ENGINE=MyISAM  CHARACTER SET = `utf8`;

INSERT INTO `#__creativesocialwidget_blocks` (`id`, `id_user`, `name`, `wrapper_width`, `wrapper_offset`, `wrapper_template`, `wrapper_color`, `wrapper_animate`, `dummy_field1`, `dummy_field2`, `id_template`, `size`, `animation`, `icons_offset`, `type`, `align`, `fixed_place`, `fixed_top_offset`, `fixed_corner_offset`, `fixed_content_width`, `created`, `publish_up`, `publish_down`, `published`, `checked_out`, `checked_out_time`, `access`, `featured`, `ordering`, `language`) VALUES
(1, 0, 'Creative Social Widget Example', '100%', '0px 0px', 0, '#ffffff', 0, '', '', 4, 3, 2, '4px 4px', 0, 0, 2, 15, 15, 990, '2013-11-26 21:54:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 621, '2014-01-09 18:38:45', 0, 0, 0, '');

CREATE TABLE IF NOT EXISTS `#__creativesocialwidget_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_share` int(10) unsigned NOT NULL,
  `id_type` int(10) unsigned NOT NULL,
  `name` text NOT NULL,
  `link` text NOT NULL,
  `published` tinyint(1) NOT NULL,
  `publish_up` datetime NOT NULL,
  `publish_down` datetime NOT NULL,
  `created` datetime NOT NULL,
  `ordering` mediumint(8) unsigned NOT NULL,
  `target` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `id_share` (`id_share`),
  KEY `id_user` (`id_type`),
  KEY `order` (`ordering`)
) ENGINE=MyISAM  CHARACTER SET = `utf8`;

INSERT INTO `#__creativesocialwidget_items` (`id`, `id_share`, `id_type`, `name`, `link`, `published`, `publish_up`, `publish_down`, `created`, `ordering`, `target`) VALUES
(1, 1, 1, 'Follow via Facebook', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, '1'),
(2, 1, 2, 'Follow via Twitter', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-11-22 02:40:28', 2, '1'),
(3, 1, 3, 'Follow via Google', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-11-22 02:41:38', 3, '1'),
(4, 1, 4, 'Follow via YouTube', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-11-22 02:41:58', 5, '1'),
(5, 1, 5, 'Follow via LinkedIn', '', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-11-22 02:42:21', 4, '1'),
(6, 1, 6, 'Follow via Pinterest', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-01 20:47:04', 6, '1'),
(7, 1, 7, 'Follow via Vimeo', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-01 20:49:46', 7, '1'),
(8, 1, 8, 'Follow via SoundCloud', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-01 20:50:36', 8, '1'),
(9, 1, 9, 'Follow via MySpace', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-01 20:52:37', 9, '1'),
(10, 1, 10, 'Follow via Flickr', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-01 20:53:04', 10, '1'),
(11, 1, 11, 'Follow via Delicious', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-01 20:53:22', 11, '1'),
(12, 1, 12, 'Follow via Vkontakte', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-01 20:54:02', 12, '1'),
(13, 1, 13, 'Follow via Odnoklassniki', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-01 20:54:22', 13, '1'),
(14, 1, 14, 'Follow via Rss', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '2013-12-01 20:54:43', 14, '1');

CREATE TABLE IF NOT EXISTS `#__creativesocialwidget_link_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM CHARACTER SET = `utf8`;

INSERT INTO `#__creativesocialwidget_link_types` (`id` ,`name`, `url`)
VALUES 
(1 ,  'Facebook', 'http://www.facebook.com/'),
(2 ,  'Twitter', 'http://twitter.com/'),
(3 ,  'Google', 'http://plus.google.com/'),
(4 ,  'Youtube', 'https://www.youtube.com/'),
(5 ,  'LinkedIn', 'http://www.linkedin.com/'),
(6 ,  'Pinterest', 'http://www.pinterest.com/'),
(7 ,  'Vimeo', 'http://vimeo.com/'),
(8 ,  'Soundcloud', 'http://soundcloud.com/'),
(9 ,  'Myspace', 'http://myspace.com/'),
(10 ,  'Flickr', 'http://www.flickr.com/'),
(11 ,  'Delicious', 'http://delicious.com/'),
(12 ,  'Vkontakte', 'http://vk.com/'),
(13 ,  'Odnoklassniki', 'http://odnoklassniki.ru/'),
(14 ,  'Rss', '#');