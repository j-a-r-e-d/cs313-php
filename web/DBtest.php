
<?php
	require "DBConnection.php";
	$db = get_db();
?>
<!DOCTYPE html>
<html>
<head>
	<title>DB Test Page</title>
</head>
<body>
	Use this to test DB interactions.
	<?php  
		$statement = $db->query('SELECT title FROM songs ORDER BY title ASC;');
		$results = $statement->fetch(PDO::FETCH_ASSOC);
		$rows = $results->fetchAll();

		foreach ($rows as $row) {
			$title = htmlentities($row['title']);

			echo $title.'<br>';
		}

		print_r($results);

	?>
</body>
</html>