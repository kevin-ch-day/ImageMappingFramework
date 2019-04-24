<?php

$appname = "Image Framework";

/*
image_name (on your server images director)
link_id
link_url
link_name
link_target
*/

function setupDatabase(){
	
	createTable('imageLinks',
			'image_name VARCHAR(25) NOT NULL,
			link_url VARCHAR(25) NOT NULL,
			link_name VARCHAR(25) NOT NULL,
			link_target VARCHAR(25) NOT NULL');

	
	/* CREATE TABLE users (
    	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    	username VARCHAR(50) NOT NULL UNIQUE,
    	password VARCHAR(255) NOT NULL,
    	created_at DATETIME DEFAULT CURRENT_TIMESTAMP); */

	createTable('imagelinks',
		"image_name varchar(30),
		image_url varchar(70),
		image_name varchar(50),
		image_target varchar(10),
		image_coords varchar(20)");

	createTable('mainimage', 'image_name varchar(50)');

	createTable('users',
		'id int(10),
		username varchar(50),
		password varchar(255),
		admin char(1),
		created_at datetime');
}

function createTable($tableName, $query){
	aQuery("create table if not exists $tableName($query)");
	//echo "Table {$tableName} created or already exists<br/>";
}

function aQuery($query){
	global $conn;
	
	$result = $conn->query($query);
	if(!$result){
		die("Query Failed: ".$conn->error);
	}
	
	return $result;
}

function destorySession(){
	$_SESSION = array();
	if(session_id() != "" || isset($_COOKIE[session_name()])){
		setcookie(session_name(), '', time()-2592000, '/');
	}
	session_destroy();
}

function sanitizeString($var){
	global $conn;
	
	$var = strip_tags($var);
	$var = htmlentities($var);
	$var = stripslashes($var);
	
	return $conn->real_escape_string($var);
}
?>