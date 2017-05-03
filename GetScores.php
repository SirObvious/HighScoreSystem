 <?php
	$config = parse_ini_file('../../private/config.ini');
	$db = mysql_connect('127.0.0.1',$config['username'],$config['password']) or die('Failed to connect: ' .mysql_error());
	mysql_select_db($config['database']) or die('Failed to access database');
	$query = "SELECT * FROM HighScores ORDER by score DESC, ts ASC LIMIT 10";
	$result = mysql_query($query) or die ('Query failed: ' . mysql_error());
	$result_length = mysql_num_rows($result);
	
	for($i = 0; $i < $result_length; $i++)
	{
		$row = mysql_fetch_array($result);
		echo $row['name'] . "\t" . $row['score'] . "\n";
	}
?> 
