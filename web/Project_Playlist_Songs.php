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
	<a href="Project_Playlist.html"><h3>Back to start page</h3></a>
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
		<?php  
			$statement = $db->query('
				SELECT r.artistname Artist,a.title Album,s.title Song 
				FROM songs s
				JOIN albums a ON a.albumid = s.albumid
				JOIN artists r ON r.artistid = a.artistid
				ORDER BY Artist,Album,Song;
				');
			$results = $statement->fetchAll(PDO::FETCH_ASSOC);
			$cnt = 0;
			//print_r($results);
			echo "ARTIST   |   "."ALBUM   "."|   SONGS<br>";
			foreach ($results as $row) {
				$cnt++;
				$artistName = htmlentities($row['artist']); 
				$songTitle = htmlentities($row["song"]);  
				$albumTitle = htmlentities($row["album"]);
				echo $cnt.'. '.'<span style="color:#777;">'.$artistName.'</span> | <span style="color:dodgerblue;">'.$albumTitle.'</span><span style="color:#777;">  -  </span><span style="color:tomato;">'.$songTitle.'</span><br>';
			}
		?>
	</div>

	<script type="Project_Playlist.js"></script>
</body>
</html>