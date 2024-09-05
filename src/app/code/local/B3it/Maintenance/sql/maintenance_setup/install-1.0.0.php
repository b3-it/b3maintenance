<?php
$installer = $this;
$installer->startSetup();

$installer->run("
	DROP TABLE IF EXISTS {$this->getTable('maintenance_log')};
	CREATE TABLE {$this->getTable('maintenance_log')} (
	  `id` int(11) unsigned NOT NULL auto_increment,
	  `scope` int(4) NOT NULL,
	  `content` text NOT NULL default '',
	  `actpoint` datetime NOT NULL,
	  `user` int(10) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;");

$installer->run("
		DROP TABLE IF EXISTS {$this->getTable('maintenance_offline')};
		CREATE TABLE {$this->getTable('maintenance_offline')} (
		`id` int(11) unsigned NOT NULL auto_increment,
		`website` varchar(50) NOT NULL,
		`store` varchar(50) NOT NULL,
		`off_time` datetime NOT NULL,
		`on_time` datetime NOT NULL,
		`scheduled` int(5) default 0,
		`user` varchar(150) default '',
		PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
");

$installer->run("UPDATE `core_config_data` SET `value` = NULL WHERE `path` = 'general/offline/from_date';");
$installer->run("UPDATE `core_config_data` SET `value` = NULL WHERE `path` = 'general/offline/to_date';");
$installer->run("UPDATE `core_config_data` SET `value` = NULL WHERE `path` = 'general/offline/to_date';");
$installer->run("UPDATE `core_config_data` SET `value` = '0' WHERE `path` = 'general/offline/lock';");

$installer->endSetup();
