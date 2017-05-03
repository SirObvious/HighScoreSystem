<?php
	$db = mysql_connect('127.0.0.1','XXX','XXX') or die('Failed to connect: ' .mysql_error());
	mysql_select_db('pogopogo_highscores') or die('Failed to access database');
	$username = mysql_real_escape_string($_GET['name'], $db);
	$score = mysql_real_escape_string($_GET['score'], $db);
	$hash = $_GET['hash'];
	$privateKey = file_get_contents('~/HighScoreSettings/pk.txt');
	$expected_hash = md5($username . $score . $privateKey);
	if($expected_hash == $hash) {
		$query = "INSERT INTO HighScores (name, score, ts)
		VALUES ('$username', '$score', CURRENT_TIMESTAMP);";
		$result = mysql_query($query) or die('Query failed: ' . mysql_error());
	}
?>
