<?php
// - DBからランキングを取得
// - 最新版のランキングを表示する
require "./utils.php";

$ranking = new NewsRanking();
$ranking = $ranking->get_ranking(100);
?>

<!DOCTYPE html>
<html lang="ja">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viesport" content="with=device-widh, initial-scale=1">
		<title>推しニュース!</title>
		<!-- import css of bootstrap -->
		<link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
		<!-- import jquery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<!-- import javascript of bootstrap -->
		<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-6">
					<header>
						<h1>推しニュース!</h1>
						<p>自分の今気になっているニュースを共有しよう！</p>
					<form action="save.php" method="POST">
						<div class="input-group">
							<input class="form-control" type="url" name="url" placeholder="e.g. https://example.com/path/to/news">
							<span class="input-group-btn">
								<button class="btn btn-primary btn-default" type="submit">Submit!</button>
							</span>
						</div>
					</form>
					<br/>
					</header>

					<ul class="list-group">
						<?php
						foreach ($ranking as $row) {
							echo '<li class="list-group-item"><a href="'.$row['url'].'" target="_blank">'.$row['title'].'</a></li>'."\n";
						}
						?>
					</ul>
				</div>
				<div class="col-sm-3"></div>
			</div>
		</div>
	</body>
</html>

