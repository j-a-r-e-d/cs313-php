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
	<a href="Project_Playlist.html"><h3>Back to startpage</h3></a>
	<div>
		<a href="Project_Playlist_Artists.php">
			<input type="button" name="artists" value="Artists" id="artists">
		</a>
		<a href="Project_Playlist_Albums.php">
			<input type="button" name="albums" value="Albums" id="albums">
		</a>
		<a href="Project_Playlist_Songs.php">
			<input type="button" name="songs" value="Songs" id="songs">
		</a>	
	</div>
	<div id="results">
		Results for albums go here.
	</div>

	<script type="Project_Playlist.js"></script>
</body>
</html>