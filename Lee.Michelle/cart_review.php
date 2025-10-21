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
    <a href="product_list.php" class="pill-button back-button">← Go back to Products</a>
  </div>

  <div class="card soft">
        <h1>Cart Review</h1>
        <h2>Pearl Earrings #1</h2>
                  <figcaption>
                    <div class="price-row">
                      <div class="price"><h2>$100.00</h2></div>
                      <div class="display-flex">
                        <div class="favorite">
                          <input type="checkbox" id="heart-{$p['id']}" class="hidden">
                          <label for="heart-{$p['id']}">&hearts;</label>
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
                     <h2>Pearl Earrings #2</h1>
                  <figcaption>
                    <div class="price-row">
                      <div class="price"><h2>$120.00</h2></div>
                      <div class="display-flex">
                          <div class="favorite">
                          <input type="checkbox" id="heart-{$p['id']}" class="hidden">
                          <label for="heart-{$p['id']}">&hearts;</label>
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
</div>
        <div class="pill-button-container">
          <a href="cart_checkout.php" class="pill-button">Proceed to Checkout</a>
        </div>
</div>




  </body>
</html>