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
				SELECT art.artistname,alb.title 
				FROM albums alb
				JOIN artists art ON art.artistid = alb.artistid
				ORDER BY art.artistname,alb.title;
				');
			$results = $statement->fetchAll(PDO::FETCH_ASSOC);
			$cnt = 0;
			//print_r($results);
			echo "ARTIST   "."|   ALBUM<br>";
			foreach ($results as $row) {
				$cnt++;
				$artistName = htmlentities($row['artistname']); // I had to change column name (artistname) 
																// to all lowercase to all lowercase.
				$title = htmlentities($row['title']);
				echo $cnt.'. '.'<span style="color:#777;">'.$artistName.'  -  </span><span style="color:dodgerblue;">'.$title.'</span><br>';
			}
		?>
	</div>

	<script type="Project_Playlist.js"></script>
</body>
</html>