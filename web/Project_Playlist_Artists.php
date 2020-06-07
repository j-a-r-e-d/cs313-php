<?php
	// Include php file for commenting in console and create a shorthand function for logging...
	include 'ChromePhp.php';
	function clog($x) { // 'clog' short for 'console log'
		ChromePhp::log($x);
	}

	clog('ChromePhp has been included on Artists.php...');

	// ASSIGN VARIABLE
	// New variables
	if (!isset($_GET['genreID']))
	{
		die("Error, genre id not specified...");
		clog("Error, first name not specified...");
	}
	if (!isset($_GET['genreDesc']))
	{
		die("Error, genre description not specified...");
		clog("Error, first name not specified...");
	}
	// Carry-overs 
	if (!isset($_GET['firstName']))
	{
		die("Error, first name not specified...");
		clog("Error, first name not specified...");
	}
	if (!isset($_GET['lastName']))
	{
		die("Error, last name not specified...");
		clog("Error, first name not specified...");
	}
	if (!isset($_GET['loginName']))
	{
		die("Error, login name not specified...");
		clog("Error, first name not specified...");
	}
	if (!isset($_GET['city']))
	{
		die("Error, city not specified...");
		clog("Error, first name not specified...");
	}
	if (!isset($_GET['state']))
	{
		die("Error, state not specified...");
		clog("Error, first name not specified...");
	}
	if (!isset($_GET['email']))
	{
		die("Error, email not specified...");
		clog("Error, first name not specified...");
	}
	if (!isset($_GET['travelTime']))
	{
		die("Error, travel time not specified...");
		clog("Error, first name not specified...");
	}

	// ESCAPE ANY MALICIOUS CHARACTERS IN THE INPUT VARIABLE
	// New variables
	$genreID 	= htmlspecialchars($_GET['genreID']);
	$genreDesc 	= htmlspecialchars($_GET['genreDesc']);
	// Carry-overs
	$firstName 	= htmlspecialchars($_GET['firstName']);
	$lastName 	= htmlspecialchars($_GET['lastName']);
	$loginName 	= htmlspecialchars($_GET['loginName']);
	$city 		= htmlspecialchars($_GET['city']);
	$state 		= htmlspecialchars($_GET['state']);
	$email 		= htmlspecialchars($_GET['email']);
	$travelTime = htmlspecialchars($_GET['travelTime']);

	clog('All variables assigned...');
	clog('GenreID = '.$genreID);
	clog('GenreDesc = '.$genreDesc);
	//CONNECT TO THE DATABASE
	require "DBConnection.php";
	$db = get_db();
	clog('connected to the database...');

	//PREPARE STATEMENT
	$statement = $db->prepare('
		SELECT DISTINCT r.artistName, r.artistid 
		FROM artists r
		JOIN albums a ON a.artistid = r.artistid
		AND a.genreid = :id
		ORDER BY artistName;');
	$statement->bindValue(':id', $genreID, PDO::PARAM_INT);
	$statement->execute();
	$artists = $statement->fetchAll(PDO::FETCH_ASSOC);

	clog('Prepared statement copmleted...');
	//print_r($artists);
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
		<h3>Welcome, <?php echo '$firstName. Pick an artist...'?></h3>
	</header>
	<a href="Project_Playlist.html"><h3 id="goBackHome">Back to start page</h3></a>
	<div>
		<table name="genres" id="genres">
			<tr>
				<th>Genres</th>
			</tr>
		<?php
			// Grey out and show the previously selected Genre for reference ....
			echo "<tr><td><span style='color:#ccc'>$genreDesc</span></td></tr>";

		?>

		</table>
		<table name="artists" id="artists">
			<tr>
				<th>Artists</th>
			</tr>
		<?php
		// Show the list of Artists within the selected Genre...	
		foreach ($artists as $artist) {
			$artistID = $artist['artistid'];
			$artistname = $artist['artistname']; 
			
			echo "<tr><td><a href='Project_Playlist_Albums.php?genreID=$genreID&genreDesc=$genreDesc&artistID=$artistID&artistname=$artistname'>$artistname</a></td></tr>";
		}

		echo "<tr><td><a href='Project_Playlist_GenresRevisit.php?firstName=$firstName&lastName=$lastName&loginName=$loginName&city=$city&state=$state&email=$email&travelTime=$travelTime'><input type='button' id='goBack' value='Go Back'></a></td></tr>"
		// $firstName 	= htmlspecialchars($_GET['firstName']);
		// $lastName 	= htmlspecialchars($_GET['lastName']);
		// $loginName 	= htmlspecialchars($_GET['loginName']);
		// $city 		= htmlspecialchars($_GET['city']);
		// $state 		= htmlspecialchars($_GET['state']);
		// $email 		= htmlspecialchars($_GET['email']);
		// $travelTime = htmlspecialchars($_GET['travelTime']);

		?>

		</table>
	</div>

	<div id="results">

	</div>

	<script type="Project_Playlist.js"></script>
</body>
</html>