<?php
	// ASSIGN VARIABLE
	if (!isset($_GET['genreID']))
	{
		die("Error, genre id not specified...");
	}
	// ESCAPE ANY MALICIOUS CHARACTERS IN THE INPUT VARIABLE
	$genreID = htmlspecialchars($_GET['genreID']);

	//CONNECT TO THE DATABASE
	require "DBConnection.php";
	$db = get_db();

	// PREPARE STATEMENT
	$statement = $db->prepare('
		SELECT DISTINCT r.artistName, r.artistid 
		FROM artists r
		JOIN albums a ON a.artistid = r.artistid
		AND a.genreid = :id
		ORDER BY artistName;');
	$statement->bindValue(':id', $genreID, PDO::PARAM_INT);
	$statement->execute();
	$artists = $statement->fetchAll(PDO::FETCH_ASSOC);
	$cnt = 0;
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
		<table name="artists" id="artists">
			<tr>
				<th>Artists</th>
			</tr>
		<?php
			
		foreach ($artists as $artist) {
			$artistID = $artist['artistid'];
			$artistname = $artist['artistname']; 
			
			echo "<tr><td><a href='Project_Playlist_Albums.php?genreID=$genreID&artistID=$artistID'>$artistname</a></td></tr>";
		}

		?>

		</table>
<!-- 		<a href="Project_Playlist_Artists.php">
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
 -->	</div>

	<div id="results">
		<?php  
			

			foreach ($artists as $artist) {
				$cnt++;
				$artistName = $artist['artistname']; // I had to change column name (artistname) 
												  // to all lowercase.
				echo $cnt.'. $artistName<br>';
			}
		?>
	</div>

	<script type="Project_Playlist.js"></script>
</body>
</html>