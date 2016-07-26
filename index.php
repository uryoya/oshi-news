<?php
// - DBからランキングを取得
// - 最新版のランキングを表示する
require "./utils.php";

$ranking = new NewsRanking();
$ranking = $ranking->get_ranking(10);
?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viesport" content="with=device-widh, initial-scale=1">
		<title>推しニュース（仮称）</title>
		<!-- import css of bootstrap -->
		<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- import jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- import javascript of bootstrap -->
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	</head>
	<body>
		<h1>推しニュース!</h1>
		<p>自分の今気になっているニュースを共有しよう！</p>
		<form action="save.php" method="POST">
			<input type="url" name="url">
			<input type="submit" value="submit">
		</form>
		<ol>
			<?php
			foreach ($ranking as $row) {
				echo '<li><a href="'.$row['url'].'">'.$row['title'].'</a></li>' ;
			}
			?>
		</ol>
	</body>
</html>

