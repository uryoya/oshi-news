<?php
// - DBからランキングを取得
// - 最新版のランキングを表示する
require "./utils.php";

$ranking = new NewsRanking();
$ranked_urls = $ranking->get_ranking(10);
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
			foreach ($ranked_urls as $url) {
				$url = $url['url'];
				echo "<li><a href=\"".$url."\">".$url."</a>" ;
			}
			?>
		</ol>
	</body>
</html>

