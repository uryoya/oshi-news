<?php

/**
 * ページが存在するか確かめる
 */
function is_url($url) {
	$header = @get_headers($url);
	if (strpos($header[0], "200 OK")) {
		return true;
	} else {
		return false;
	}
}

/**
 * index.phpにリダイレクトさせる
 */
function back_home() {
	header("HTTP/1.1 301 Moved Premanently");
	header("Location: http://localhost:8888/index.php");
}


class NewsRanking {
	function __construct() {
		$this->dbh = new PDO("pgsql:dbname=oshinews;host=localhost", "uryoya", "pass");
	}

	/**
	 * 投票
	 */
	function vote($url) {
		// 既にあるURLの確認
		$sql = "SELECT id FROM urls WHERE '".$url."' = url;";
		echo $sql;
		$sth = $this->dbh->prepare($sql);
		$sth->execute();
		$results = $sth->fetch(PDO::FETCH_ASSOC);
		foreach ($results as $result) {
			error_log($result, 0);
		}

//		$datetime = date("Y-m-d H:i:s");
		if ($result > 0) {	// 既にURLがあれば投票数+1
			$sql = "UPDATE urls SET vote=vote+1 WHERE id=".$result.";";
			$this->dbh->exec($sql);
		} else {	// 投票がなければDB登録
			$sql = "INSERT INTO urls (url, vote) VALUES ('".$url."', 1);";
			$this->dbh->exec($sql);
		}
	}

	/**
	 * ランキング取得
	 */
	function get_ranking($limit) {
		$sql = "SELECT url FROM urls ORDER BY vote DESC LIMIT ".$limit.";";
		return $this->dbh->query($sql);
	}
}


