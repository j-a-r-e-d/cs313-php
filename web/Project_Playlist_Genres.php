<?php
	require "DBConnection.php";
	$db = get_db();

	$query = '	SELECT description 
				FROM genres
				ORDER BY description;' ;
	$stmt = $db->prepare($query);
	$stmt->execute();
	$genres = $stmt->fetchAll(PDO::FETCH_ASSOC);
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

	<div id="buttonMenu">
		<!-- <a href="Project_Playlist_Genres.php">
			<input type="button" name="genres" value="Genres" id="genres">
		</a> -->
		<SELECT name="genres" id="genres">
		<?php
			
		foreach ($genres as $genre) {
			$description = $genre['description']; 
			echo '<option value="$description">$description</option>';
		}

		?>
		</SELECT>
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
		<p>The results will go here.</p>
	</div>

	<script type="Project_Playlist.js"></script>
</body>
</html>