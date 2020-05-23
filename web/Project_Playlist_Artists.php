<?php
	require "DBConnection.php";
	$db = get_db();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Road-Trip Playlist Maker</title>
	<!-- <link rel="stylesheet" href="styles.css" /> -->

</head>
<body>
	<a href="Project_Playlist.html"><h3>Go Back</h3></a>
	<div>
		<input type="button" name="artists" value="Artists" id="artists">
		<input type="button" name="albums" value="Albums" id="albums">
		<input type="button" name="songs" value="Songs" id="songs">
	</div>
	<?php
		echo "Hello"."<br>";
	?>
	<div id="results">
		<?php  
			$statement = $db->query('SELECT artistName FROM artists ORDER BY artistName;');
			$results = $statement->fetchAll(PDO::FETCH_ASSOC);
			

			foreach ($results as $row) {
				$artistName = htmlentities($row['artistName']);

				echo $artistName.'<br>';
			}

			echo "What's up";
		?>
	</div>

	<script type="Project_Playlist.js"></script>
</body>
</html>