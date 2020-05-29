<?php
	
	if (!isset($_GET['genreID']))
	{
		die("Error, genre id not specified...");
	}

	$genreID = htmlspecialchars($_GET['genreID']);

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
		<!-- <a href="Project_Playlist_Artists.php"> -->
			<input type="button" name="artists" value="Artists" id="artists">
		<!-- </a> -->
		<!-- <a href="Project_Playlist_Albums.php"> -->
			<input type="button" name="albums" value="Albums" id="albums">
		<!-- </a> -->
		<!-- <a href="Project_Playlist_Songs.php"> -->
			<input type="button" name="songs" value="Songs" id="songs">
		<!-- </a> -->
		<!-- <a href="Project_Playlist_Playlists.php"> -->
			<input type="button" name="playlists" value="Playlists" id="playlists">
		<!-- </a> -->
	</div>

	<div id="results">
		<?php  
			$statement = $db->prepare('
				SELECT DISTINCT r.artistName 
				FROM artists r
				JOIN albums a ON a.artistid = r.artistid
				AND a.genreid = :id
				ORDER BY artistName;');
			$statement->bindValue(':id', $genreID, PDO::PARAM_INT);
			$statement->execute();
			$results = $statement->fetchAll(PDO::FETCH_ASSOC);
			$cnt = 0;

			foreach ($results as $row) {
				$cnt++;
				$artistName = $row['artistname']; // I had to change column name (artistname) 
												  // to all lowercase.
				echo $cnt.'. '.'<span style="color:#777;">'.$artistName.'</span><br>';
			}
		?>
	</div>

	<script type="Project_Playlist.js"></script>
</body>
</html>