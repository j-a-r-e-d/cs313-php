<?php
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

$query = $db->query('
	SELECT insert_tester_id,user_name, user_dob,user_email
	FROM insert_tester');
$results = $query->fetchAll(PDO::FETCH_ASSOC);

clog('Prepared statement copmleted...');
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
				<th>Name</th>
				<th>DOB</th>
				<th>Email</th>
			</tr>
		<?php
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
</html>