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
	<a href="Project_Playlist.html"><h3>Go Back</h3></a>
	<div>
		<input type="button" name="artists" value="Artists" id="artists">
		<input type="button" name="albums" value="Albums" id="albums">
		<input type="button" name="songs" value="Songs" id="songs">
	</div>

	<div id="results">
		<?php  
			$statement = $db->query('SELECT artistName FROM artists ORDER BY artistName;');
			$results = $statement->fetchAll(PDO::FETCH_ASSOC);
			$cnt = 0;
			//print_r($results);

			foreach ($results as $row) {
				$cnt++;
				$artistName = htmlentities($row['artistname']); // I had to change column name (artistname) 
																// to all lowercase to all lowercase.
				echo $cnt.'. '.'<span style="color:#777;">'.$artistName.'</span><br>';
			}
		?>
	</div>

	<script type="Project_Playlist.js"></script>
</body>
</html>