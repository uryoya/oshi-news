<?php
require "./utils.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// POSTの時の処理
	// - URLをDBに保存する
	// - ランキングを更新する
	// - 最新版のランキングを表示する
	$url = $_POST["url"]; 
	if (!$url || !is_url($url)) {
		back_home();
		exit();
 	}
	
	// urlの登録
	$ranking = new NewsRanking();
	$ranking->vote($url);
}
// index.phpにリダイレクトさせる
back_home();
