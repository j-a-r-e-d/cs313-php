<?php
try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}

$statement = $db->query('SELECT s.songID, s.title, ar.artistName FROM songs s JOIN albums al ON al.ablumID = s.albumID JOIN artists ar ON ar.artistID = al.artistID WHERE ar.artistName = 'ALABAMA'');
$results = $statement->fetchAll(PDO::FETCH_ASSOC);
echo $results;
?>