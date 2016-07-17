<?php
// - DBからランキングを取得
// - 最新版のランキングを表示する
$url = "GETを受け取りました";

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>推しニュース（仮称）</title>
	</head>
	<body>
		<form action="save.php" method="POST">
			<input type="text" name="url">
			<input type="submit" value="submit">
		</form>
		<?php echo $url ?><br />
	</body>
</html>

