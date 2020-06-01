<?php
	include 'ChromePhp.php';
	require 'DBConnection.php';
	$db = get_db();

	function clog($x) { // 'clog' short for 'console log'
		ChromePhp::log($x);
	}

	clog('created clog() successfully...');

	// CHECK AND ASSIGN VARIABLES...
	if (!isset($_GET['firstName']))
	{
		die("Error, first name not specified...");
	}
	if (!isset($_GET['lastName']))
	{
		die("Error, last name not specified...");
	}
	if (!isset($_GET['loginName']))
	{
		die("Error, login name not specified...");
	}
	if (!isset($_GET['city']))
	{
		die("Error, city not specified...");
	}
	if (!isset($_GET['state']))
	{
		die("Error, state not specified...");
	}
	if (!isset($_GET['email']))
	{
		die("Error, email not specified...");
	}
	if (!isset($_GET['travelTime']))
	{
		die("Error, travel time not specified...");
	}

	clog('Input variable checked....');

	$firstName = htmlspecialchars($_GET['firstName']);
	$lastName = htmlspecialchars($_GET['lastName']);
	$loginName = htmlspecialchars($_GET['loginName']);
	$city = htmlspecialchars($_GET['city']);
	$state = htmlspecialchars($_GET['state']);
	$email = htmlspecialchars($_GET['email']);
	$travelTime = htmlspecialchars($_GET['travelTime']);

	clog('Variables assigned...');
	clog('$firstName = '.$firstName);
	clog('$lastName = '.$lastName);
	clog('$loginName = '.$loginName);
	clog('$city = '.$city);
	clog('$state = '.$state);
	clog('$email = '.$email);
	clog('$travelTime = '.$travelTime);

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
