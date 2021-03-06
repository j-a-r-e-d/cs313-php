<?php
	include 'ChromePhp.php';
	function clog($x) { // 'clog' short for 'console log'
		ChromePhp::log($x);
	}

	// Convert seconds to Human Readable time
	function secToHR($seconds) {
	  $minutes = floor(($seconds / 60) % 60);
	  $seconds = $seconds % 60;
	  return "$minutes:$seconds";
	}

	clog('ChromePhp has been included on Songs.php...');
	clog('clog() has been declared');
	clog('secToHR() created successfully');

	// ASSIGN VARIABLE
	// Playlist variables
	if (!isset($_GET['albumID']))
	{
		die("Error, album id not specified...");
		clog("Error, album id not specified...");
	}
	if (!isset($_GET['albumTitle']))
	{
		die("Error, album title not specified...");
		clog("Error, album title not specified...");
	}
	if (!isset($_GET['genreID']))
	{
		die("Error, genre id not specified...");
		clog("Error, genre id not specified...");
	}
	if (!isset($_GET['genreDesc']))
	{
		die("Error, genre description not specified...");
		clog("Error, genre description not specified...");
	}
	if (!isset($_GET['artistID']))
	{
		die("Error, artist id not specified...");
		clog("Error, artist id not specified...");
	}
	if (!isset($_GET['artistname']))
	{
		die("Error, artist name not specified...");
		clog("Error, artist name not specified...");
	}
	// User variables
	if (!isset($_GET['firstName']))
	{
		die("Error, first name not specified...");
		clog("Error, first name not specified...");
	}
	if (!isset($_GET['lastName']))
	{
		die("Error, last name not specified...");
		clog("Error, last name not specified...");
	}
	if (!isset($_GET['loginName']))
	{
		die("Error, login name not specified...");
		clog("Error, login name not specified...");
	}
	if (!isset($_GET['city']))
	{
		die("Error, city not specified...");
		clog("Error, city not specified...");
	}
	if (!isset($_GET['state']))
	{
		die("Error, state not specified...");
		clog("Error, state not specified...");
	}
	if (!isset($_GET['email']))
	{
		die("Error, email not specified...");
		clog("Error, email not specified...");
	}
	if (!isset($_GET['travelTime']))
	{
		die("Error, travel time not specified...");
		clog("Error, travel time not specified...");
	}
	if (!isset($_GET['playlistTitle']))
	{
		die("Error, playlist title not specified...");
		clog("Error, playlist title not specified...");
	}

	// ESCAPE ANY MALICIOUS CHARACTERS IN THE INPUT VARIABLE
	// Playlist variables
	$genreID 	= htmlspecialchars($_GET['genreID']);
	$genreDesc 	= htmlspecialchars($_GET['genreDesc']);
	$artistID 	= htmlspecialchars($_GET['artistID']);
	$artistname = htmlspecialchars($_GET['artistname']);
	$albumID 	= htmlspecialchars($_GET['albumID']);
	$albumTitle = htmlspecialchars($_GET['albumTitle']);
	// User variables
	$firstName 	= htmlspecialchars($_GET['firstName']);
	$lastName 	= htmlspecialchars($_GET['lastName']);
	$loginName 	= htmlspecialchars($_GET['loginName']);
	$city 		= htmlspecialchars($_GET['city']);
	$state 		= htmlspecialchars($_GET['state']);
	$email 		= htmlspecialchars($_GET['email']);
	$travelTime = htmlspecialchars($_GET['travelTime']);
	$playlistTitle = htmlspecialchars($_GET['playlistTitle']);

	clog('All variables assigned...');
	clog('GenreID = '.$genreID);
	clog('GenreDesc = '.$genreDesc);
	clog('ArtistID = '.$artistID);
	clog('ArtistName = '.$artistname);
	clog('AlbumID = '.$albumID);
	clog('AlbumTitle = '.$albumTitle);
	clog('PlaylistTitle = '.$playlistTitle);

	//CONNECT TO THE DATABASE
	require "DBConnection.php";
	$db = get_db();

	clog('connection to database successful...');

	// PREPARE STATEMENT
	$statement = $db->prepare('
		SELECT s.title song, s.seconds 
		FROM songs s
		JOIN albums a ON a.albumid = s.albumid
		AND s.albumid = :id
		ORDER BY song;');
	$statement->bindValue(':id', $albumID, PDO::PARAM_INT);
	$statement->execute();
	$songs = $statement->fetchAll(PDO::FETCH_ASSOC);

	clog('statment created successfully...');
	clog('bindValue successful...');
	clog('execute() successful...');
	//clog(print_r($albums));
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
		<!-- <h3>Welcome, <?php //echo $firstName.". Select the songs youd like to add to your playlist..."?></h3> -->
	</header>
	<a href="Project_Playlist.html"><h3 id="goBackHome">Back to start page</h3></a>
	<div>
		<table name="genres" id="genres">
			<tr>
				<th>Genres</th>
			</tr>
		<?php
			
			echo "<tr><td><span style='color:#ccc'>$genreDesc</span></td></tr>";

		?>

		</table>
		<table name="artists" id="artists">
			<tr>
				<th>Artists</th>
			</tr>
		<?php
			
			echo "<tr><td><span style='color:#ccc'>$artistname</span></td></tr>";

		?>

		</table>
		<table name="albums" id="albums">
			<tr>
				<th>Albums</th>
			</tr>
		<?php
			
			echo "<tr><td><span style='color:#ccc'>$albumTitle</span></td></tr>";
		?>
		<table name="songs" id="songs">
			<tr>
				<th>Songs</th>
			</tr>
			<tr>
				<td>
					<form method="GET" action="Project_Playlist_MyPlaylist.php">
						<fieldset>
							<!-- <legend>Songs selected</legend> -->
							<?php  
								$cnt = 0;
								foreach ($songs as $song) {
									$cnt++;
									$songTitle 	= $song["song"];  
									$seconds 	= $song["seconds"];
									$runtime 	= secToHR($seconds);
									$value 		= $songTitle.' - '.$runtime;
									echo "<input type='checkbox' name='songs[]' value='$value'>$cnt. $songTitle - $runtime<br>";
									clog($cnt.'. '.$value);
								}
							?>
							<input type="hidden" name="genreID" value="<?php echo $genreID;?>">
							<input type="hidden" name="genreDesc" value="<?php echo $genreDesc;?>">
							<input type="hidden" name="artistID" value="<?php echo $artistID;?>">
							<input type="hidden" name="artistname" value="<?php echo $artistname;?>">
							<input type="hidden" name="albumID" value="<?php echo $albumID;?>">
							<input type="hidden" name="albumTitle" value="<?php echo $albumTitle;?>">
							<input type="hidden" name="firstName" value="<?php echo $firstName;?>">
							<input type="hidden" name="lastName" value="<?php echo $lastName;?>">
							<input type="hidden" name="loginName" value="<?php echo $loginName;?>">
							<input type="hidden" name="city" value="<?php echo $city;?>">
							<input type="hidden" name="state" value="<?php echo $state;?>">
							<input type="hidden" name="email" value="<?php echo $email;?>">
							<input type="hidden" name="travelTime" value="<?php echo $travelTime;?>">
							<input type="hidden" name="playlistTitle" value="<?php echo $playlistTitle;?>">
							<input type='submit' value='Add to playlist'>
						</fieldset>
					</form>

				</td>
			</tr>
			<?php
				// <a href='Project_Playlist_MyPlaylist.php?genreID=$genreID&genreDesc=$genreDesc&artistID=$artistID&artistname=$artistname&albumID=$albumID&albumTitle=$albumTitle&firstName=$firstName&lastName=$lastName&loginName=$loginName&city=$city&state=$state&email=$email&travelTime=$travelTime&playlistTitle=$playlistTitle'><input type='button' id='myPlaylist' value='Add to playlist'></a><br>
				echo "<tr><td><a href='Project_Playlist_Albums.php?genreID=$genreID&genreDesc=$genreDesc&artistID=$artistID&artistname=$artistname&firstName=$firstName&lastName=$lastName&loginName=$loginName&city=$city&state=$state&email=$email&travelTime=$travelTime&playlistTitle=$playlistTitle'><input type='button' id='goBack' value='Go Back'></a></td></tr>"
			?>
		</table>
		
	</div>
	<div id="results">
		
	</div>

	<script type="Project_Playlist.js"></script>
</body>
</html>