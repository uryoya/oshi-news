<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$check_word = "POSTを受け取りました";
} else {
	$check_word = "GETを受け取りました";
}

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>推しニュース（仮称）</title>
	</head>
	<body>
		<?php echo $check_word ?>
	</body>
</html>

