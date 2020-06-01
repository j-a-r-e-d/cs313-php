<?php
	include 'ChromePhp.php';
	require 'DBConnection.php';
	$db = get_db();

	function clog($x) { // 'clog' short for 'console log'
		ChromePhp::log($x);
	}

	clog('created clog() successfully...');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Road-Trip Playlist Maker</title>
	<link rel="stylesheet" href="projectStyle.css" />
</head>
<body>
	<header>
		<h1>ROAD-TRIP PLAYLIST MAKER</h1>
	</header>
	<div id="buttonMenu">
		<table name="genres" id="genres">
			<tr>
				<th>Genres</th>
			</tr>
			<?php

			?>
		</table>
	</div>
</body>
</html>
