CREATE TABLE `ldap_attr_mappings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `oc_map_id` int(10) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `sel_expr` varchar(255) NOT NULL,
  `sel_expr_u` varchar(255) DEFAULT NULL,
  `from_tbls` varchar(255) NOT NULL,
  `join_where` varchar(255) DEFAULT NULL,
  `add_proc` varchar(255) DEFAULT NULL,
  `delete_proc` varchar(255) DEFAULT NULL,
  `param_order` tinyint(4) NOT NULL,
  `expect_return` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ldap_attr_mappings` WRITE;

INSERT INTO `ldap_attr_mappings` (`id`, `oc_map_id`, `name`, `sel_expr`, `sel_expr_u`, `from_tbls`, `join_where`, `add_proc`, `delete_proc`, `param_order`, `expect_return`)
VALUES
	(1,1,'uidNumber','users.userID',NULL,'users',NULL,NULL,NULL,3,0),
	(2,1,'uid','users.username',NULL,'users',NULL,NULL,NULL,3,0),
	(3,1,'cn','users.username',NULL,'users',NULL,NULL,NULL,3,0),
	(4,1,'mail','users.email',NULL,'users',NULL,NULL,NULL,3,0),
	(5,1,'telephoneNumber','users.phone',NULL,'users',NULL,NULL,NULL,3,0),
	(6,1,'givenName','users.first_name',NULL,'users',NULL,NULL,NULL,3,0),
	(7,1,'displayName','concat(users.first_name, \' \', users.last_name)',NULL,'users',NULL,NULL,NULL,3,0),
	(8,1,'sn','users.last_name',NULL,'users',NULL,NULL,NULL,3,0),
	(9,1,'userPassword','concat(\'{SSHA}\', users.password)',NULL,'users','users.password IS NOT NULL',NULL,NULL,3,0),
	(10,2,'o','ldap_org.o',NULL,'ldap_org',NULL,NULL,NULL,3,0),
	(11,2,'dc','ldap_org.dc',NULL,'ldap_org',NULL,NULL,NULL,3,0),
	(12,3,'ou','ldap_ou.ou',NULL,'ldap_ou',NULL,NULL,NULL,3,0),
	(13,4,'cn','ldap_groups.name',NULL,'ldap_groups','',NULL,NULL,3,0),
	(14,4,'gidNumber','ldap_groups.id',NULL,'ldap_groups',NULL,NULL,NULL,3,0),
	(21,4,'member','seeAlso.dn',NULL,'ldap_entries AS seeAlso,ldap_groups,users_groups,users','seeAlso.keyval=users.userID AND seeAlso.oc_map_id=1 AND users_groups.userID=users.userID AND users_groups.groupID=(ldap_groups.id-40000)',NULL,NULL,3,0);

UNLOCK TABLES;

CREATE TABLE `ldap_entry_objclasses` (
  `entry_id` int(11) NOT NULL,
  `oc_name` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ldap_entry_objclasses` WRITE;

INSERT INTO `ldap_entry_objclasses` (`entry_id`, `oc_name`)
VALUES
	(4,'groupOfNames'),
	(1,'inetOrgPerson'),
	(2,'organization'),
	(3,'organizationalUnit');

UNLOCK TABLES;

CREATE TABLE `ldap_oc_mappings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `keytbl` varchar(64) NOT NULL,
  `keycol` varchar(64) NOT NULL,
  `create_proc` varchar(255) DEFAULT NULL,
  `delete_proc` varchar(255) DEFAULT NULL,
  `expect_return` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ldap_oc_mappings` WRITE;

INSERT INTO `ldap_oc_mappings` (`id`, `name`, `keytbl`, `keycol`, `create_proc`, `delete_proc`, `expect_return`)
VALUES
	(1,'inetOrgPerson','users','userID',NULL,NULL,0),
	(2,'organization','ldap_org','id',NULL,NULL,0),
	(3,'organizationalUnit','ldap_ou','id',NULL,NULL,0),
	(4,'groupOfNames','ldap_groups','id',NULL,NULL,0);

UNLOCK TABLES;

CREATE TABLE `ldap_org` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `o` varchar(255) NOT NULL DEFAULT '',
  `dc` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ldap_org` WRITE;

INSERT INTO `ldap_org` (`id`, `o`, `dc`)
VALUES
	(65535,'studentrnd.org','studentrnd');

UNLOCK TABLES;

CREATE TABLE `ldap_ou` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ou` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ldap_ou` WRITE;

INSERT INTO `ldap_ou` (`id`, `ou`)
VALUES
	(50001,'People'),
	(50002,'Groups');

UNLOCK TABLES;
