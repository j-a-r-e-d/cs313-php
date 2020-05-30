<?php
	require "DBConnection.php";
	$db = get_db();

	// Include php file for commenting in console...
	include 'ChromePhp.php';

	// $query = "	SELECT genreid, description 
	// 			FROM genres
	// 			UNION
	// 			SELECT 0,'Undecided'
	// 			ORDER BY description;" ;
	$query = "	SELECT genreid, description 
				FROM genres
				ORDER BY description;" ;
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

		<table name="genres" id="genres">
			<tr>
				<th>Genres</th>
			</tr>
		<?php
		ChromePhp::log("The PHP console extension is working....");
		foreach ($genres as $genre) {
			$genreID = $genre['genreid'];
			$description = $genre['description']; 
			//echo "<a href='Project_Playlist_Artists.php' target='_blank'>Albums</a><br>";
			echo "<tr><td><a href='Project_Playlist_Artists.php?genreID=$genreID&genreDesc=$description'>$description</a></td></tr>";
			ChromePhp::log($genreID.'blahblah');
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
		</a> -->
	</div>

	<div id="results">
		<p>The results will go here.</p>
	</div>

	<script type="Project_Playlist.js"></script>
</body>
</html>