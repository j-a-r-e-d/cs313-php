<?php
	include 'ChromePhp.php';
	function clog($x) { // 'clog' short for 'console log'
		ChromePhp::log($x);
	}

	// Convert seconds to Human Readable time
	function secToHR($seconds) {
	  $minutes = floor(($seconds / 60) % 60);
	  $seconds = $seconds % 60;
	  return "$minutes:$seconds";
	}

	clog('ChromePhp has been included on Songs.php...');
	clog('clog() has been declared');
	clog('secToHR() created successfully');
	
	// ASSIGN VARIABLE
	// Playlist variables
	if (!isset($_GET['albumID']))
	{
		die("Error, album id not specified...");
		clog("Error, album id not specified...");
	}
	if (!isset($_GET['albumTitle']))
	{
		die("Error, album title not specified...");
		clog("Error, album title not specified...");
	}
	if (!isset($_GET['genreID']))
	{
		die("Error, genre id not specified...");
		clog("Error, genre id not specified...");
	}
	if (!isset($_GET['genreDesc']))
	{
		die("Error, genre description not specified...");
		clog("Error, genre description not specified...");
	}
	if (!isset($_GET['artistID']))
	{
		die("Error, artist id not specified...");
		clog("Error, artist id not specified...");
	}
	if (!isset($_GET['artistname']))
	{
		die("Error, artist name not specified...");
		clog("Error, artist name not specified...");
	}
	// User variables
	if (!isset($_GET['firstName']))
	{
		die("Error, first name not specified...");
		clog("Error, first name not specified...");
	}
	if (!isset($_GET['lastName']))
	{
		die("Error, last name not specified...");
		clog("Error, last name not specified...");
	}
	if (!isset($_GET['loginName']))
	{
		die("Error, login name not specified...");
		clog("Error, login name not specified...");
	}
	if (!isset($_GET['city']))
	{
		die("Error, city not specified...");
		clog("Error, city not specified...");
	}
	if (!isset($_GET['state']))
	{
		die("Error, state not specified...");
		clog("Error, state not specified...");
	}
	if (!isset($_GET['email']))
	{
		die("Error, email not specified...");
		clog("Error, email not specified...");
	}
	if (!isset($_GET['travelTime']))
	{
		die("Error, travel time not specified...");
		clog("Error, travel time not specified...");
	}
	if (!isset($_GET['playlistTitle']))
	{
		die("Error, playlist title not specified...");
		clog("Error, playlist title not specified...");
	}

	// ESCAPE ANY MALICIOUS CHARACTERS IN THE INPUT VARIABLE
	// Playlist variables
	$genreID 	= htmlspecialchars($_GET['genreID']);
	$genreDesc 	= htmlspecialchars($_GET['genreDesc']);
	$artistID 	= htmlspecialchars($_GET['artistID']);
	$artistname = htmlspecialchars($_GET['artistname']);
	$albumID 	= htmlspecialchars($_GET['albumID']);
	$albumTitle = htmlspecialchars($_GET['albumTitle']);
	// User variables
	$firstName 	= htmlspecialchars($_GET['firstName']);
	$lastName 	= htmlspecialchars($_GET['lastName']);
	$loginName 	= htmlspecialchars($_GET['loginName']);
	$city 		= htmlspecialchars($_GET['city']);
	$state 		= htmlspecialchars($_GET['state']);
	$email 		= htmlspecialchars($_GET['email']);
	$travelTime = htmlspecialchars($_GET['travelTime']);
	$playlistTitle = htmlspecialchars($_GET['playlistTitle']);

	clog('All variables assigned...');
	clog('GenreID = '.$genreID);
	clog('GenreDesc = '.$genreDesc);
	clog('ArtistID = '.$artistID);
	clog('ArtistName = '.$artistname);
	clog('AlbumID = '.$albumID);
	clog('AlbumTitle = '.$albumTitle);
	clog('PlaylistTitle = '.$playlistTitle);
	
	require "DBConnection.php";
	$db = get_db();

	// GET DATA FROM THE DATABASE...
	$query = "	SELECT	p.title AS Playlist,
						p.datecreated AS DateCreated,
						COALESCE((	SELECT SUM(seconds) 
									FROM songs 
									JOIN playlists_detail pd ON pd.songid = s.songid 
									JOIN playlists p ON p.playlistid = pd.playlistid
									WHERE p.title = :playlistTitle),0) AS Playlist_Duration,
						COALESCE(s.title,'') AS Song_Title,
						s.seconds::VARCHAR(4) AS Song_Duration,
						mu.firstname||' '||mu.lastname AS Created_By
				FROM 	playlists 			p 
				JOIN 	music_users 		mu ON 	mu.userid = p.userid
				LEFT JOIN playlists_detail 	pd ON 	pd.playlistid = p.playlistid
				LEFT JOIN songs 			s ON	s.songid = pd.songid 
				WHERE 	p.isdeleted = 'f' AND
						p.title = :playlistTitle;" ;
	$stmt = $db->prepare($query);
	$stmt->bindValue(':playlistTitle',$playlistTitle,PDO::PARAM_STR);
	$stmt->execute();
	$playlist = $stmt->fetchAll(PDO::FETCH_ASSOC);

	clog('Query executed and data fetched...');
	clog($playlist['playlist']);
		
	
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
		<h3>You're done! Enjoy "<?php echo $playlistTitle;?>" on your road-trip.</h3>
	</header>
	<a href="Project_Playlist.html"><h3 id="goBackHome">Back to start page</h3></a>
	<div>
		<!-- <a href="Project_Playlist_Genres.php">
			<input type="button" name="genres" value="Genres" id="genres">
		</a>
		<a href="Project_Playlist_Artists.php">
			<input type="button" name="artists" value="Artists" id="artists">
		</a>
		<a href="Project_Playlist_Albums.php">
			<input type="button" name="albums" value="Albums" id="albums">
		</a>
		<a href="Project_Playlist_Songs.php">
			<input type="button" name="songs" value="Songs" id="songs">
		</a>
		<a href="Project_Playlist_Playlists.php">
			<input type="button" name="playlists" value="Playlists" id="playlists">
		</a> -->
	</div>

	<div id="results">
		<?php  
			var_dump($playlist);
			echo "<br><br>";
			print_r($playlist[0]);


		?>
	</div>

	<script type="Project_Playlist.js"></script>
</body>
</html>