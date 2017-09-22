<?php
	
	$database = new AS_Dbconn();
	
	$AS_Table_Details = array(	
		'catid int(11) NOT NULL AUTO_INCREMENT',
		'cat_slug varchar(100) NOT NULL',
		'cat_title varchar(100) NOT NULL',
		'cat_icon varchar(100) NOT NULL',
		'cat_content varchar(1000) NOT NULL',
		'cat_details varchar(2000) NOT NULL',
		'cat_createdby int(10) unsigned DEFAULT NULL',
		'cat_created datetime DEFAULT NULL',
		'cat_parentid int(10) unsigned DEFAULT NULL',
		'cat_updatedby int(10) unsigned DEFAULT NULL',
		'cat_updated datetime DEFAULT NULL',
		'cat_position varchar(100) NOT NULL',
		'cat_field1 varchar(100) NOT NULL',
		'cat_field2 varchar(100) NOT NULL',
		'cat_field3 varchar(100) NOT NULL',
		'cat_field4 varchar(100) NOT NULL',
		'cat_field5 varchar(100) NOT NULL',
		'PRIMARY KEY (catid)',
		);
	$add_query = $database->AS_table_exists_create( 'AS_category', $AS_Table_Details ); 
	
	$AS_Table_Details = array(	
		'optid int(11) NOT NULL AUTO_INCREMENT',
		'title varchar(100) NOT NULL',
		'content varchar(2000) NOT NULL',
		'createdby int(10) unsigned DEFAULT NULL',
		'created datetime DEFAULT NULL',
		'updatedby int(10) unsigned DEFAULT NULL',
		'updated datetime DEFAULT NULL',
		'PRIMARY KEY (optid)',
		);
	$add_query = $database->AS_table_exists_create( 'AS_options', $AS_Table_Details ); 
		
	$AS_Table_Details = array(	
		'cardid int(10) unsigned NOT NULL AUTO_INCREMENT',
		'card_cat int(10) NOT NULL DEFAULT 0',
		'card_slug varchar(200) NOT NULL',
		'card_title varchar(100) DEFAULT NULL',
		'card_content varchar(1000) DEFAULT NULL',
		'card_color varchar(100) NOT NULL DEFAULT "#FFFFFF|Default"',
		'card_postedby int(10) unsigned DEFAULT 0',
		'card_posted datetime DEFAULT NULL',
		'card_img varchar(200) NOT NULL DEFAULT "card_default.jpg"',
		'card_updated datetime DEFAULT NULL',
		'card_updatedby int(10) DEFAULT NULL',
		'card_field1 varchar(100) NOT NULL',
		'card_field2 varchar(100) NOT NULL',
		'card_field3 varchar(100) NOT NULL',
		'card_field4 varchar(100) NOT NULL',
		'card_field5 varchar(100) NOT NULL',
		'card_field6 varchar(100) NOT NULL',
		'card_field7 varchar(100) NOT NULL',
		'PRIMARY KEY (cardid)',
		);
	$add_query = $database->AS_table_exists_create( 'AS_card', $AS_Table_Details ); 
	
	$AS_Table_Details = array(	
		'userid int(11) NOT NULL AUTO_INCREMENT',
		'user_name varchar(50) NOT NULL',
		'user_fname varchar(50) NOT NULL',
		'user_surname varchar(50) NOT NULL',
		'user_sex varchar(10) NOT NULL',
		'user_password text NOT NULL',
		'user_email varchar(200) NOT NULL',
		'user_level varchar(50) NOT NULL DEFAULT "student"',
		'user_joined datetime DEFAULT NULL',
		'user_mobile varchar(50) NOT NULL',
		'user_web varchar(100) NOT NULL',
		'user_avatar varchar(50) NOT NULL DEFAULT "user_default.jpg"',
		'user_field1 varchar(100) NOT NULL',
		'user_field2 varchar(100) NOT NULL',
		'user_field3 varchar(100) NOT NULL',
		'user_field4 varchar(100) NOT NULL',
		'user_field5 varchar(100) NOT NULL',
		'PRIMARY KEY (userid)',
		);
	$add_query = $database->AS_table_exists_create( 'AS_user', $AS_Table_Details ); 
	
?>