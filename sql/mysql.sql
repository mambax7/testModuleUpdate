# SQL Dump for testmoduleupdate module
# PhpMyAdmin Version: 4.0.4
# http://www.phpmyadmin.net
#
# Host: localhost
# Generated on: Mon Nov 29, 2021 to 08:26:00
# Server version: 5.5.5-10.4.10-MariaDB
# PHP Version: 8.0.1

#
# Structure table for `testmoduleupdate_categories` 5
#

CREATE TABLE `testmoduleupdate_categories` (
  `cat_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cat_name` VARCHAR(255) NOT NULL DEFAULT '',
  `cat_logo` VARCHAR(100) NOT NULL DEFAULT '',
  `cat_created` INT(10) NOT NULL DEFAULT '0',
  `cat_submitter` INT(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB;

#
# Structure table for `testmoduleupdate_articles` 11
#

CREATE TABLE `testmoduleupdate_articles` (
  `art_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `art_cat` INT(10) NOT NULL DEFAULT '0',
  `art_title` VARCHAR(200) NOT NULL DEFAULT '',
  `art_descr` MEDIUMTEXT NOT NULL ,
  `art_img` VARCHAR(200) NULL DEFAULT '',
  `art_status` INT(1) NOT NULL DEFAULT '0',
  `art_file` VARCHAR(200) NOT NULL DEFAULT '',
  `art_ratings` DOUBLE(10, 2) NOT NULL DEFAULT '0.00',
  `art_votes` INT(10) NOT NULL DEFAULT '0',
  `art_created` INT(10) NOT NULL DEFAULT '0',
  `art_submitter` INT(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`art_id`)
) ENGINE=InnoDB;

#
# Structure table for `testmoduleupdate_testfields` 28
#

CREATE TABLE `testmoduleupdate_testfields` (
  `tf_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tf_text` VARCHAR(255) NOT NULL DEFAULT '',
  `tf_textarea` TEXT NOT NULL ,
  `tf_dhtml` TEXT NOT NULL ,
  `tf_checkbox` INT(10) NOT NULL DEFAULT '0',
  `tf_yesno` INT(1) NOT NULL DEFAULT '0',
  `tf_selectbox` INT(10) NOT NULL DEFAULT '0',
  `tf_user` INT(10) NOT NULL DEFAULT '0',
  `tf_color` VARCHAR(7) NOT NULL DEFAULT '',
  `tf_imagelist` VARCHAR(255) NOT NULL DEFAULT '',
  `tf_urlfile` VARCHAR(255) NOT NULL DEFAULT '',
  `tf_uplimage` VARCHAR(255) NOT NULL DEFAULT '',
  `tf_uplfile` VARCHAR(255) NOT NULL DEFAULT '',
  `tf_textdateselect` INT(10) NOT NULL DEFAULT '0',
  `tf_selectfile` VARCHAR(255) NOT NULL DEFAULT '',
  `tf_password` VARCHAR(255) NOT NULL DEFAULT '',
  `tf_country_list` VARCHAR(3) NOT NULL DEFAULT '',
  `tf_language` VARCHAR(100) NOT NULL DEFAULT '',
  `tf_radio` INT(10) NOT NULL DEFAULT '0',
  `tf_status` INT(1) NOT NULL DEFAULT '0',
  `tf_datetime` INT(10) NOT NULL DEFAULT '0',
  `tf_combobox` INT(10) NOT NULL DEFAULT '0',
  `tf_comments` INT(10) NOT NULL DEFAULT '0',
  `tf_ratings` DOUBLE(10, 2) NOT NULL DEFAULT '0.00',
  `tf_votes` INT(10) NOT NULL DEFAULT '0',
  `tf_uuid` VARCHAR(45) NOT NULL DEFAULT '',
  `tf_ip` VARCHAR(16) NOT NULL DEFAULT '',
  `tf_reads` INT(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tf_id`)
) ENGINE=InnoDB;

#
# Structure table for `testmoduleupdate_ratings` 6
#

CREATE TABLE `testmoduleupdate_ratings` (
  `rate_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `rate_itemid` INT(8) NOT NULL DEFAULT '0',
  `rate_source` INT(8) NOT NULL DEFAULT '0',
  `rate_value` INT(1) NOT NULL DEFAULT '0',
  `rate_uid` INT(8) NOT NULL DEFAULT '0',
  `rate_ip` VARCHAR(60) NOT NULL DEFAULT '',
  `rate_date` INT(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rate_id`)
) ENGINE=InnoDB;

