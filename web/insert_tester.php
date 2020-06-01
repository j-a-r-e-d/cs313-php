<?php 
	// require "DBConnection.php";
	// $db = get_db();

	// // Include php file for commenting in console and create a shorthand function for logging...
	// include 'ChromePhp.php';
	// function clog($x) { // 'clog' short for 'console log'
	// 	ChromePhp::log($x);
	// }

	// clog('DB Connection completed...');
	// clog('clog() created....');

	// // CHECK AND ASSIGN VARIABLES...
	// if (!isset($_GET['firstName']))
	// {
	// 	die("Error, first name not specified...");
	// }
	// if (!isset($_GET['lastName']))
	// {
	// 	die("Error, last name not specified...");
	// }
	// if (!isset($_GET['loginName']))
	// {
	// 	die("Error, login name not specified...");
	// }
	// if (!isset($_GET['city']))
	// {
	// 	die("Error, city not specified...");
	// }
	// if (!isset($_GET['state']))
	// {
	// 	die("Error, state not specified...");
	// }
	// if (!isset($_GET['email']))
	// {
	// 	die("Error, email not specified...");
	// }
	// if (!isset($_GET['travelTime']))
	// {
	// 	die("Error, travel time not specified...");
	// }

	// clog('Input variable checked....');

	// $firstName = htmlspecialchars($_GET['firstName']);
	// $lastName = htmlspecialchars($_GET['lastName']);
	// $loginName = htmlspecialchars($_GET['loginName']);
	// $city = htmlspecialchars($_GET['city']);
	// $state = htmlspecialchars($_GET['state']);
	// $email = htmlspecialchars($_GET['email']);
	// $travelTime = htmlspecialchars($_GET['travelTime']);

	// clog('Variables assigned...');

	// // INSERT ALL THE USER INFORMATION....
	// // Address insert
	// $insert_address_stmt = $db->prepare('
	// 	INSERT INTO dupe_address (city,stateid,datecreated,isdeleted)
	// 	VALUES (
	// 	:city,
	// 	(SELECT stateid FROM states WHERE statecode = :state), 
	// 	date(now()),
	// 	'f'
	// 	);');
	// $insert_address_stmt->bindValue(':city', $city, PDO::PARAM_STR);
	// $insert_address_stmt->bindValue(':state',$state,PDO::PARAM_STR);
	// $insert_address_stmt->execute();

	// clog('Address insert completed...');

	// // User insert
	// $insert_user_stmt = $db->prepare('
	// 	INSERT INTO dupe_music_users (
	// 	firstname,
	// 	lastname,
	// 	loginname,
	// 	addressid,
	// 	email,
	// 	travelmins,
	// 	datecreated,
	// 	isdeleted)
	// 	VALUES (
	// 	:firstname,
	// 	:lastname,
	// 	:loginname,
	// 	(SELECT last_value FROM address_addressid_seq),
	// 	:email,
	// 	:travelmins, 
	// 	date(now()),
	// 	'f'
	// 	);');
	// $insert_user_stmt->bindValue(':firstname', $firstName, PDO::PARAM_STR);
	// $insert_user_stmt->bindValue(':lastname',$lastName,PDO::PARAM_STR);
	// $insert_user_stmt->bindValue(':loginname',$loginName,PDO::PARAM_STR);
	// $insert_user_stmt->bindValue(':email',$email,PDO::PARAM_STR);
	// $insert_user_stmt->bindValue(':travelmins',$travelTime,PDO::PARAM_INT);
	// $insert_user_stmt->execute();

	// clog('User insert completed...');

	// // GET ALL THE GENRE DATA FROM THE DATABASE...
	// $query = "	SELECT genreid, description 
	// 			FROM genres
	// 			ORDER BY description;" ;
	// $stmt = $db->prepare($query);
	// $stmt->execute();
	// $genres = $stmt->fetchAll(PDO::FETCH_ASSOC);

	// clog('Genres query executed and data fetched...');
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
	<a href="Project_Playlist.html"><h3 id="goBackHome">Back to start page</h3></a>

	<div id="buttonMenu">
		<table name="genres" id="genres">
			<tr>
				<th>Genres</th>
			</tr>
		<!-- <?php
		// foreach ($genres as $genre) {
		// 	$genreID = $genre['genreid'];
		// 	$description = $genre['description']; 
		// 	echo "<tr><td><a href='Project_Playlist_Artists.php?genreID=$genreID&genreDesc=$description'>$description</a></td></tr>";
		// 	$text = 'GenreID = '.$genreID.' GenreDesc = '.$description;
		// 	clog($text);
		}

		?>-->

		</table>
		
	</div>

</body>
</html>












<!-- ?php
include 'ChromePhp.php';
ChromePhp::log('ChromePhp included successfully');

function clog($x) {
	ChromePhp::log($x);
}

clog('clog() function setup and ready to rock-n-roll!');

require 'DBConnection.php';
$db = get_db();

clog('Database connection completed....');

// Let's get the variables assigned...
$user_name = htmlspecialchars($_GET['user_name']);
$user_DOB = htmlspecialchars($_GET['user_DOB']);
$user_email = htmlspecialchars($_GET['user_email']);

//PREPARE STATEMENT
$statement = $db->prepare('
	INSERT INTO insert_tester (user_name,user_dob,user_email)
	VALUES (:user_name, :user_DOB, :user_email)');
$statement->bindValue(':user_name', $user_name, PDO::PARAM_STR);
$statement->bindValue(':user_DOB',$user_DOB,PDO::PARAM_STR);
$statement->bindValue(':user_email',$user_email,PDO::PARAM_STR);
$statement->execute();

clog('Prepared statement copmleted...');

// QUERY TO GET RESULTS - NO PREPARED STATEMENT NEEDED.
$query = $db->query('
	SELECT insert_tester_id,user_name, user_dob,user_email
	FROM insert_tester');
$results = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Database Insert Tester</title>
</head>
<body>
	<h3>INSERT TESTER PHP PAGE</h3>
	<p>
		<table>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>DOB</th>
				<th>Email</th>
			</tr>
		?php
		foreach ($results as $row) {
			$user_id = $row['insert_tester_id'];
			$user_name = $row['user_name'];
			$user_DOB = $row['user_dob'];
			$user_email = $row['user_email'];
			$cnt = 1; 
			
			
			echo "<tr><td>$user_id</td><td>$user_name</td><td>$user_DOB</td><td>$user_email</td></tr>";

			$cnt++;
		}
		?>
			
		</table>

		<br>
		<a href="insert_tester.html">
			<input type="button" name="hompage" id="homepage" value="Insert more">
		</a>
	</p>
</body>
</html> -->