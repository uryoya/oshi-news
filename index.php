<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// POSTの時の処理
	// - URLをDBに保存する
	// - ランキングを更新する
	// - 最新版のランキングを表示する
	$url = $_POST["url"];
} else {
	// GETの時の処理
	// - DBからランキングを取得
	// - 最新版のランキングを表示する
	$url = "GETを受け取りました";
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>推しニュース（仮称）</title>
	</head>
	<body>
		<form action="index.php" method="POST">
			<input type="text" name="url">
			<input type="submit" value="submit">
		</form>
		<?php echo $url ?><br />
	</body>
</html>

