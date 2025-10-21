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
  <div class="back-button-container">
    <a href="cart_review.php" class="pill-button back-button">← Go Back to Cart</a>
  </div>

  <div class="card soft">
        <h1>Checkout</h1>
        <?php
      // Example cart items — you could replace this with dynamic data later
      $cart_items = [
        ["id" => 1, "name" => "Pearl Earrings #1", "price" => 100.00],
        ["id" => 2, "name" => "Pearl Earrings #2", "price" => 120.00]
      ];

      foreach ($cart_items as $i => $p): 
      ?>
        <h2><?= htmlspecialchars($p['name']) ?></h2>
        <figcaption>
          <div class="price-row">
            <div class="price"><h2>$<?= number_format($p['price'], 2) ?></h2></div>
            <div class="display-flex">
              <div class="favorite">
                <input type="checkbox" id="heart-<?= $p['id'] ?>" class="hidden">
                <label for="heart-<?= $p['id'] ?>">&hearts;</label>
              </div>
              <div class="form-select">
                <select>
                  <option>1</option><option>2</option>
                  <option>3</option><option>4</option>
                </select>
              </div>
            </div>
          </div>
        </figcaption>
      <?php endforeach; ?>
      </div>
   <h2>Subtotal: $220.00</h2>
   <h2>Tax: $10.00</h2>
   <h1>Total: $230.00</h1>

  </body>
        <div class="pill-button-container">
          <a href="purchase_confirmation.php" class="pill-button">Confirm payment</a>
        </div>
</html>