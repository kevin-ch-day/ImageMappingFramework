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

	
	createTable('members',
			'user VARCHAR(16) NOT NULL,
			pass VARCHAR(16) NOT NULL,
			INDEX(user(6))');
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

function showProfile($user){
	if (file_exists("$user.jpg")){
		echo "<img src='$user.jpg' style='float:left;'>";
	}
	
	$result = aQuery("SELECT * FROM profiles WHERE user='$user'");
	if ($result->num_rows){
		$row = $result->fetch_array(MYSQLI_ASSOC);
		echo stripslashes($row['text']) . "<br style='clear:left;'><br>";
	}
}
?>