<?php

$url = "www.google.com";
$datetime = date("Y-m-d H:i:s");
$dbh = new PDO("pgsql:dbname=oshinews;host=localhost", "uryoya", "pass");
$sql = "INSERT INTO urls (url, lank, vote, datetime) VALUES ('".
	$url."', 1, 1, '".$datetime."');";
echo $sql;
$dbh->exec($sql);
