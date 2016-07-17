<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// POSTの時の処理
	// - URLをDBに保存する
	// - ランキングを更新する
	// - 最新版のランキングを表示する
	
	$dbh = new PDO("pgsql:dbname=oshinews;host=localhost", "uryoya", "pass");
	// urlの登録
	$url = $_POST["url"];
	$datetime = date("Y-m-d H:i:s");
	$sql = "INSERT INTO urls (url, lank, vote, datetime) VALUES ('".$url."', 1, 1, '".$datetime."');";
	$dbh->exec($sql);

}
// index.phpにリダイレクトさせる
header("HTTP/1.1 301 Moved Premanently");
header("Location: http://localhost/oshi-news/index.php");
