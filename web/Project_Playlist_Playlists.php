<?php
	require "DBConnection.php";
	$db = get_db();
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
		<a href="Project_Playlist_Genres.php">
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
		</a>
	</div>

	<div id="results">
		<?php  
			echo "<p>All selected songs for the playlist should go here. Also show TOTAL PLAY TIME, UserName, date created, and playlistTitle</p>"
		?>
	</div>

	<script type="Project_Playlist.js"></script>
</body>
</html>