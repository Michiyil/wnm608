<?php
include_once "lib/php/functions.php";
include_once "parts/templates.php";


$cart_items = getCartItems();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Cart - Pearlesque Jewelry</title>
  <?php include "parts/meta.php"; ?>
</head>
<body>

  <?php include "parts/navbar.php"; ?>

  <div class="container">

    <!-- Back Button -->
    <div class="back-button-container">
      <a href="product_list.php" class="pill-button back-button">← Go back to Products</a>
    </div>

    <!-- Cart Review Section -->
    <div class="card soft cart-review">
      <h1>Cart Review</h1>

      <!-- Dynamic cart listing -->
      <div class="cart-items">
        <?= array_reduce($cart_items,'cartListTemplate') ?>
      </div>
    </div>
<?= cartTotals() ?>

 

  </div>

</body>
</html>

