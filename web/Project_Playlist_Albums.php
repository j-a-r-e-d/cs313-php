<?php
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
	// ESCAPE ANY MALICIOUS CHARACTERS IN THE INPUT VARIABLE
	$genreID = htmlspecialchars($_GET['genreID']);
	$genreDesc = htmlspecialchars($_GET['genreDesc']);
	$artistID = htmlspecialchars($_GET['artistID']);
	$artistname = htmlspecialchars($_GET['artistname']);

	//CONNECT TO THE DATABASE
	require "DBConnection.php";
	$db = get_db();

	// PREPARE STATEMENT
	$statement = $db->prepare('
		SELECT DISTINCT a.title, a.albumid 
		FROM albums a
		JOIN artists r ON r.artistid = a.artistid
		AND r.artistid = :id
		ORDER BY a.title;');
	$statement->bindValue(':id', $artistID, PDO::PARAM_INT);
	$statement->execute();
	$albums = $statement->fetchAll(PDO::FETCH_ASSOC);

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
		<table name="genres" id="genres">
			<tr>
				<th>Genres</th>
			</tr>
		<?php
			
			echo "<tr><td><span style='color:#ccc'>$genreDesc</span></td></tr>";

		?>

		</table>
		<table name="artists" id="artists">
			<tr>
				<th>Artists</th>
			</tr>
		<?php
			
			echo "<tr><td><span style='color:#ccc'>$artistname</span></td></tr>";

		?>

		</table>
		<table name="albums" id="albums">
			<tr>
				<th>Albums</th>
			</tr>
		<?php
			
		foreach ($albums as $album) {
			$albumID = $album['a.albumid'];
			$albumTitle = $album['a.title']; 
			
			echo "<tr><td><a href='Project_Playlist_Songs.php?genreID=$genreID&genreDesc=$genreDesc&artistID=$artistID$artistname=$artistname&albumID=$albumID&albumTitle=$albumTitle'>$albumTitle</a></td></tr>";
		}

		?>

		</table>

		<!-- <a href="Project_Playlist_Artists.php">
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
		</a>	 -->
	</div>
	<div id="results">
		
	</div>

	<script type="Project_Playlist.js"></script>
</body>
</html>