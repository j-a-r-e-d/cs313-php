<?php
	include ChromePhp.php;
	// require DBConnection.php;
	// $db = get_db();

	function clog($x) {
		ChromePhp::log($x);
	}

	clog('ChromePhp.php included successfully...');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Database Insert Tester</title>
</head>
<body>
	<p>
		Create a FORM that will take user_name, user_DOB, and user_email input and insert it into the database.
	</p>
</body>
</html>