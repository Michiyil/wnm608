<?php
include_once "lib/php/functions.php";

$id = $_GET['id'] ?? 0;


// Get the product info
$product = makeQuery(makeConn(),"SELECT * FROM `products` WHERE `id`=".$_GET['id'])[0];

$cart_product = cartItemById($_GET['id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <title>Added to Cart</title>
   <?php include "parts/meta.php"; ?>
</head>
<body>
   <?php include "parts/navbar.php"; ?>

   <div class="container">
      <div class="back-button-container">
         <a href="product_list.php" class="pill-button back-button">← Go back to Products</a>
      </div>

      <div class="card soft">
         <h2>You have now a total amount <?= $cart_product->amount ?> of <?= $product->name ?> in your cart.</h2>
      </div>

      <div class="pill-button-container">
         <a href="cart.php" class="pill-button add-to-cart">Go to Cart</a>
      </div>
   </div>
</body>
</html>

