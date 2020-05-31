<?php
	include 'ChromePhp.php';
	function clog($x) { // 'clog' short for 'console log'
		ChromePhp::log($x);
	}

	// Convert seconds to Human Readable time
	function secToHR($seconds) {
	  $hours = floor($seconds / 3600);
	  $minutes = floor(($seconds / 60) % 60);
	  $seconds = $seconds % 60;
	  return "$hours:$minutes:$seconds";
	}

	clog('ChromePhp has been included on Songs.php...');
	clog('clog() has been declared');
	clog('secToHR() created successfully');

	// ASSIGN VARIABLE
	if (!isset($_GET['genreID']))
	{
		die("Error, genre id not specified...");
	}
	if (!isset($_GET['genreDesc']))
	{
		die("Error, genre description not specified...");
	}
	if (!isset($_GET['artistID']))
	{
		die("Error, artist id not specified...");
	}
	if (!isset($_GET['artistname']))
	{
		die("Error, artist name not specified...");
	}
	if (!isset($_GET['albumID']))
	{
		die("Error, album id not specified...");
	}
	if (!isset($_GET['albumTitle']))
	{
		die("Error, album title not specified...");
	}
	// ESCAPE ANY MALICIOUS CHARACTERS IN THE INPUT VARIABLE
	$genreID = htmlspecialchars($_GET['genreID']);
	$genreDesc = htmlspecialchars($_GET['genreDesc']);
	$artistID = htmlspecialchars($_GET['artistID']);
	$artistname = htmlspecialchars($_GET['artistname']);
	$albumID = htmlspecialchars($_GET['albumID']);
	$albumTitle = htmlspecialchars($_GET['albumTitle']);

	clog('All variables assigned...');
	clog('GenreID = '.$genreID);
	clog('GenreDesc = '.$genreDesc);
	clog('ArtistID = '.$artistID);
	clog('ArtistName = '.$artistname);
	clog('AlbumID = '.$albumID);
	clog('AlbumTitle = '.$albumTitle);

	//CONNECT TO THE DATABASE
	require "DBConnection.php";
	$db = get_db();

	clog('connection to database successful...');

	// PREPARE STATEMENT
	$statement = $db->prepare('
		SELECT s.title song, s.seconds 
		FROM songs s
		JOIN albums a ON a.albumid = s.albumid
		JOIN artists r ON r.artistid = a.artistid
		ORDER BY song;');
	$statement->bindValue(':id', $artistID, PDO::PARAM_INT);
	$statement->execute();
	$albums = $statement->fetchAll(PDO::FETCH_ASSOC);

	clog('statment created successfully...');
	clog('bindValue successful...');
	clog('execute() successful...');
	//clog(print_r($albums));
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
	<a href="Project_Playlist.html"><h3>Back to start page</h3></a>
	<div>
		<?php  
			// $cnt = 0;
			// foreach ($albums as $album) {
			// 	$cnt++;
			// 	$songTitle = $album["song"];  
			// 	$seconds = $album["seconds"];
			// 	$runtime = secToHR($seconds);
			// 	echo "$cnt <span style='color:#777;'>$songTitle</span><span style='color:#777;'>   $runtime</span><br>";
			// }
			echo "Peekaboo";
		?>
	</div>
	<div id="results">
		
	</div>

	<script type="Project_Playlist.js"></script>
</body>
</html>