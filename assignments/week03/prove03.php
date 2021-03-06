<!-- PHP for Week 11 - Jared Kelley-->
<!DOCTYPE html>
<html lang="en-us">
<head>
  <link href="https://fonts.googleapis.com/css?family=IM+Fell+DW+Pica+SC|Lato|Open+Sans+Condensed:700|Oswald|PT+Sans:700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:600&display=swap" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="prove03.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

  <title>Wishlist Checkout Confirmation</title>
</head>
<!-- ASSIGNMENT CHECKLIST
The purchase confirmation page must include the following.
- a title [COMPLETE]
- a heading
- the first and last name
- the address
- the phone #
- a list of the items selected for purchase and their respective costs.
- the total cost of the items being purchased
- the credit card type selected for use
- the credit card expiration date -display using the month and year (i.e. January 2013)
- a <form> element with an "action" attribute that references a 2nd PHP program (assign11_a.php) and with two "submit" buttons.
- a confirm purchase button - which submits this new form
- a cancel purchase button - which also submits this new form
The 2nd PHP program - will simply return an html document to the browser indicating the purchase was either confirmed or cancelled. -->
<?php


  // Declare all variables and set to null.
  $first_name =
  $middle_name =
  $last_name =
  $address =
  $expDate = '';
  $phone =
  $creditCard = 0;

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = test_input($_POST["first_name"]);
    $middle_name = test_input($_POST["middle_name"]);
    $last_name = test_input($_POST["last_name"]);
    $address = test_input($_POST["address"]);
    $expDate = test_input($_POST["exp_date"]); // ???
    $phone = test_input($_POST["phone"]);
    $creditCard = test_input($_POST["creditCard"]);
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  print"Why isn't this working?";
?>


<body>
  <div id="grid_wrapper">
    <header>
      <div id="header">
        Checkout Confirmation
      </div>
    </header>
    <div id="custForm">
      This will be the checkout page
      <?php
        print $first_name;
      ?>
    </div>

  </div>
  <script src="prove03.js"></script>
</body>

</html>
