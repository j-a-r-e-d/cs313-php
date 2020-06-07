<?php
	include 'ChromePhp.php';
	require 'DBConnection.php';
	$db = get_db();

	function clog($x) { // 'clog' short for 'console log'
		ChromePhp::log($x);
	}

	clog('created clog() successfully...');

	// CHECK AND ASSIGN VARIABLES...
	if (!isset($_GET['firstName']))
	{
		die("Error, first name not specified...");
		clog("Error, first name not specified...");
	}
	if (!isset($_GET['lastName']))
	{
		die("Error, last name not specified...");
		clog("Error, first name not specified...");
	}
	if (!isset($_GET['loginName']))
	{
		die("Error, login name not specified...");
		clog("Error, first name not specified...");
	}
	if (!isset($_GET['city']))
	{
		die("Error, city not specified...");
		clog("Error, first name not specified...");
	}
	if (!isset($_GET['state']))
	{
		die("Error, state not specified...");
		clog("Error, first name not specified...");
	}
	if (!isset($_GET['email']))
	{
		die("Error, email not specified...");
		clog("Error, first name not specified...");
	}
	if (!isset($_GET['travelTime']))
	{
		die("Error, travel time not specified...");
		clog("Error, first name not specified...");
	}

	clog('Input variable checked....');

	$firstName 	= htmlspecialchars($_GET['firstName']);
	$lastName 	= htmlspecialchars($_GET['lastName']);
	$loginName 	= htmlspecialchars($_GET['loginName']);
	$city 		= htmlspecialchars($_GET['city']);
	$state 		= htmlspecialchars($_GET['state']);
	$email 		= htmlspecialchars($_GET['email']);
	$travelTime = htmlspecialchars($_GET['travelTime']);

	clog('Variables assigned...');
	clog('$firstName = '.$firstName);
	clog('$lastName = '.$lastName);
	clog('$loginName = '.$loginName);
	clog('$city = '.$city);
	clog('$state = '.$state);
	clog('$email = '.$email);
	clog('$travelTime = '.$travelTime);

	// INSERT ALL THE USER INFORMATION....
	// Address insert
	$insert_address_stmt = $db->prepare("
		INSERT INTO address (city,stateid,datecreated,isdeleted)
		VALUES (:city,(SELECT stateid FROM states WHERE statecode = :state),date(now()),'f'	);");
	$insert_address_stmt->bindValue(':city', $city, PDO::PARAM_STR);
	$insert_address_stmt->bindValue(':state',$state,PDO::PARAM_STR);
	$insert_address_stmt->execute();

	clog('prepare statement created...');
	clog('bindValues set...');
	clog('Address insert executed...');

	// User insert
	$insert_user_stmt = $db->prepare("
		INSERT INTO music_users (
		firstname,
		lastname,
		loginname,
		addressid,
		email,
		travelmins,
		datecreated,
		isdeleted)
		VALUES (
		:firstname,
		:lastname,
		:loginname,
		(SELECT currval('address_addressid_seq')),
		:email,
		:travelmins, 
		date(now()),
		'f'	);");
	$insert_user_stmt->bindValue(':firstname', $firstName, PDO::PARAM_STR);
	$insert_user_stmt->bindValue(':lastname',$lastName,PDO::PARAM_STR);
	$insert_user_stmt->bindValue(':loginname',$loginName,PDO::PARAM_STR);
	$insert_user_stmt->bindValue(':email',$email,PDO::PARAM_STR);
	$insert_user_stmt->bindValue(':travelmins',$travelTime,PDO::PARAM_INT);
	$insert_user_stmt->execute();

	clog('User insert completed...');

	// GET ALL THE GENRE DATA FROM THE DATABASE...
	$query = "	SELECT genreid, description 
				FROM genres
				ORDER BY description;" ;
	$stmt = $db->prepare($query);
	$stmt->execute();
	$genres = $stmt->fetchAll(PDO::FETCH_ASSOC);

	clog('Genres query executed and data fetched...');

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
		<h3>Welcome, <?php echo '$firstName. Pick your genre...'></h3>
	</header>
	<div id="buttonMenu">
		<table name="genres" id="genres">
			<tr>
				<th>Genres</th>
			</tr>
			<?php
			foreach ($genres as $genre) {
				$genreID = $genre['genreid'];
				$description = $genre['description']; 
				echo "<tr><td><a href='Project_Playlist_Artists.php?genreID=$genreID&genreDesc=$description&firstName=$firstName&lastName=$lastName&loginName=$loginName&city=$city&state=$state&email=$email&travelTime=$travelTime'>$description</a></td></tr>";
				$text = 'GenreID = '.$genreID.' GenreDesc = '.$description;
				clog($text);
			}
			?>
		</table>
	</div>
</body>
</html>
