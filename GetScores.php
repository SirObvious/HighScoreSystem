<?php
	$config = parse_ini_file('../../private/config.ini');
	$db = mysql_connect('127.0.0.1',$config['username'],$config['password']) or die('Failed to connect: ' .mysql_error());
	mysql_select_db($config['database']) or die('Failed to access database');
	$query = "SELECT * FROM HighScores"
	$result = mysql_query($query) or die ('Query failed: ' . mysql_error());
?> 
