<?php
	//Create a config file outside of the webroot.
	$config = parse_ini_file('../../private/config.ini');
	$db = mysql_connect('127.0.0.1',$config['username'],$config['password']) or die('Failed to connect: ' .mysql_error());
	mysql_select_db($config['database']) or die('Failed to access database');
	$username = mysql_real_escape_string($_GET['name'], $db);
	$score = mysql_real_escape_string($_GET['score'], $db);
	$hash = $_GET['hash'];
	$expected_hash = md5($username . $score . $config['privatekey']);
	if($expected_hash == $hash) {
		$query = "INSERT INTO HighScores (name, score, ts)
		VALUES ('$username', '$score', CURRENT_TIMESTAMP);";
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	}
?>
