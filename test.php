<?php

$dbh = new PDO("pgsql:dbname=oshinews;host=localhost", "uryoya", "pass");
//$sth = $dbh->prepare("SELECT url FROM urls ORDER BY vote DESC LIMIT 3;");
$sql = "select url from urls;";
foreach ($dbh->query($sql) as $row) {
	echo $row['url']."\n";
}
