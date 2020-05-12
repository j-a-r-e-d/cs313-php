<?php session_start() ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Testing PHP Skills</title>
    <style media="screen">
      a{color:#777;}
      a:hover{color: tomato;}
      body{font-size: 2rem;font-family: arial;color:#777;}
    </style>
  </head>
  <body>
    <a href="test.html">HTML page</a>
    <?php
      echo "<br><br>This is where the PHP goes.";

      $_SESSION['name'] = htmlspecialchars($_GET['username']);

      echo "<br><br>" . $_SESSION['name'];

     ?>
  </body>
</html>
