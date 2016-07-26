<?php
// - DBからランキングを取得
// - 最新版のランキングを表示する
$dbh = new PDO("pgsql:dbname=oshinews;host=localhost", "uryoya", "pass");
$sql = "SELECT url FROM urls ORDER BY vote DESC LIMIT 3;";

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>推しニュース（仮称）</title>
	</head>
	<body>
		<form action="save.php" method="POST">
			<input type="url" name="url">
			<input type="submit" value="submit">
		</form>
		<ol>
			<?php
foreach ($dbh->query($sql) as $row) {
	$url = $row['url'];
	echo "<li><a href=\"".$url."\">".$url."</a>" ;
}
?>
		</ol>
	</body>
</html>

