<?php 
   error_reporting(E_ALL);
   session_start(); 
?>
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
      <a href="test.html">HTML page</a><br><br>

      <?php
         echo "SESSION_NAME(): " . session_name()."<br>"."SESSION ID(): ".session_id()."<br>";
         echo $_SESSION[0];

         echo "<br><br>My Family: " . $familyMems[0];
         // print_r($_SESSION);
         echo "<br><br>Keys: ". $keys;
    
      ?>

      <br><a href="sess.php">Sess PHP</a>

   </body>
</html>
