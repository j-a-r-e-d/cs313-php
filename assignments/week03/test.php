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
    <a href="test.html">HTML page</a><br>
    <a href="test2.php">PHP2 page</a><br>

    <p><b>PHP Results Below:</b><br>===============<br></p>
    <?php
      $userName = htmlspecialchars($_GET['username']);
      $_SESSION['name'] = "$userName";
      $_SESSION['favColor'] = 'yellow';
      $_SESSION["son"] = 'Liam';
      $_SESSION["daughter"] = 'Claire';
      $_SESSION["wife"] = 'Cailin';
      $familyMems = array('son' => $_SESSION["son"],'daughter' => $_SESSION["daughter"],'wife' => $_SESSION["wife"]);
      $_SESSION["myFamily"] = $familyMems;
      $keys = array_keys($_SESSION);

      echo "Your name input is: $userName.";
    ?>
  </body>
</html>
