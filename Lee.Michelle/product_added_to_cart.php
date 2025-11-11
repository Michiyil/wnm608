<?php
session_start();
include_once "lib/php/functions.php";

$id = $_GET['id'] ?? 0;

// Add product ID to cart
if (!isset($_SESSION['cart'])) $_SESSION['cart'] = [];
$_SESSION['cart'][] = $id;

// Get the product info
$product = makeQuery(makeConn(), "SELECT * FROM `products` WHERE `id`=$id")[0];
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
         <h2>You added <?= $product->name ?> to your cart!</h2>
      </div>

      <div class="pill-button-container">
         <a href="product_cart.php" class="pill-button add-to-cart">Go to Cart</a>
      </div>
   </div>
</body>
</html>

