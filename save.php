<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// POSTの時の処理
	// - URLをDBに保存する
	// - ランキングを更新する
	// - 最新版のランキングを表示する
	$dbh = new PDO("pgsql:dbname=oshinews;host=localhost", "uryoya", "pass");
	$url = $_POST["url"]; 
	if (!$url) {
		// index.phpにリダイレクトさせる
		header("HTTP/1.1 301 Moved Premanently");
		header("Location: http://localhost:8888/index.php");
		exit();
 	}
	$datetime = date("Y-m-d H:i:s");
	
	// urlの登録
	// 既にあるURLの確認
	$sth= $dbh->prepare( "SELECT id FROM urls WHERE '".$url."' = url;");
	$sth->execute();
	$results = $sth->fetch(PDO::FETCH_ASSOC);
	foreach ($results as $result) {
		error_log($result, 0);
	}
	if ($result > 0) {
		$dbh->exec(
			"UPDATE urls ".
			"SET vote=vote+1, datetime='".$datetime."' ".
			"WHERE id=".$result.";"
		);
	} else {
		$sql = "INSERT INTO urls (url, lank, vote, datetime) VALUES ('".$url."', 1, 1, '".$datetime."');";
		$dbh->exec($sql);
	}
}
// index.phpにリダイレクトさせる
header("HTTP/1.1 301 Moved Premanently");
header("Location: http://localhost:8888/index.php");
