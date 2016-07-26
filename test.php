<?php
require "./utils.php";

$r = new NewsRanking();
$ranking = $r->get_ranking(10);
foreach ($ranking as $n) {
	echo $n['url']."\n";
	echo $n['title']."\n";
}
