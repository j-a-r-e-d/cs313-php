<?php
include 'ChromePhp.php';
ChromePhp::log('ChromePhp included successfully');

function clog($x) {
	ChromePhp::log($x);
}

clog('clog() function setup and ready to rock-n-roll!');

require 'DBConnection.php';
$db = get_db();

clog('Database connection completed....');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Database Insert Tester</title>
</head>
<body>
	<h3>INSERT TESTER PHP PAGE</h3>
	<p>
		<?php
		echo 'echoed a message here.';
		?>
	</p>
</body>
</html>