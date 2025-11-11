<?php
include_once "lib/php/functions.php";

// --- GET PRODUCT FROM DATABASE ---
$id = $_GET['id'] ?? 1;

$product = makeQuery(
  makeConn(),
  "SELECT * FROM `products` WHERE `id` = $id"
)[0];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pearlesque Jewelry</title>
  <?php include "parts/meta.php"; ?>
</head>

<body class="product-page">
  <?php include "parts/navbar.php"; ?>

  <!-- GO BACK BUTTON -->
  <div class="container">
    <div class="back-button-container">
      <a href="product_list.php" class="pill-button back-button">← Go back</a>
    </div>
  </div>

  <!-- PRODUCT DISPLAY -->
  <div class="container product-section">
    <div class="card soft">
      <div class="product-content">
        
        <!-- IMAGE LEFT -->
        <div class="product-image">
          <img src="img/<?= htmlspecialchars($product->images) ?>" alt="<?= htmlspecialchars($product->name) ?>">
        </div>

        <!-- DETAILS RIGHT -->
        <div class="product-text">
          <h1 class="name"><?= htmlspecialchars($product->name) ?></h1>
          <h2 class="price">$<?= number_format($product->price, 2) ?></h2>
          <p><?= htmlspecialchars($product->description) ?></p>

          <div class="product-actions">
            <!-- FAVORITE -->
            <div class="favorite">
              <input type="checkbox" id="heart-<?= $id ?>" class="hidden">
              <label for="heart-<?= $id ?>">&hearts;</label>
            </div>

            <!-- QUANTITY SELECT -->
            <div class="form-select">
              <select>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
              </select>
            </div>

      
            <a href="product_added_to_cart.php?id=<?= $product->id ?>" class="pill-button add-to-cart">
              Add to cart
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>

</body>
</html>
