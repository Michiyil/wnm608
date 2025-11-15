<?php
include_once "lib/php/functions.php"; 
resetCart();
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pearlesque Jewelry</title>
 <?php include "parts/meta.php" ?>

</head>
<body>

  <?php include "parts/navbar.php" ?>

<div class="container">
    <div class="pill-button-container">
      <div class="card soft">
        <h1>Thank you for the payment!</h1>
        <p>You will be notified when the order finished processing...</p>
</div>
</div>
  <div class="pill-button-container">
          <a href="product_list.php" class="pill-button">Continue Shopping</a>
        </div>
      </div>
  </body>

</html>