<?php
// - DBからランキングを取得
// - 最新版のランキングを表示する
require "./utils.php";

$ranking = new NewsRanking();
$ranking = $ranking->get_ranking(10);
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
			foreach ($ranking as $row) {
				echo '<li><a href="'.$row['url'].'">'.$row['title'].'</a></li>' ;
			}
			?>
		</ol>
	</body>
</html>

