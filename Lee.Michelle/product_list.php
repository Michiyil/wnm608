<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pearlesque Jewelry</title>
 <?php include "parts/meta.php" ?>

</head>
<body>

  <?php include "parts/navbar.php" ?>


<div class="view-window" style="background-image:url('img/bg1.jpg')"></div>
<div class="section-background"></div>
  <main>
    <div class="form-control">
      <div class="container card soft">
        <h1>Our Products</h1>
        <form class="hotdog">
          <span>&equiv;</span>
          <input type="search" placeholder="Search">
        </form>
      </div>

 <div class="container display-flex flex-align-center">
        <div class="grid gap">

          <?php
          // ---- PRODUCTS ARRAY ----
          $products = [
            ["id"=>1, "name"=>"Pearl Earrings #1", "price"=>100, "img"=>"earring1.jpg"],
            ["id"=>2, "name"=>"Pearl Earrings #2", "price"=>120, "img"=>"earring2.jpg"],
            ["id"=>3, "name"=>"Pink Pearl Earrings", "price"=>135, "img"=>"earring3.jpg"],
            ["id"=>4, "name"=>"Black Pearl Earrings", "price"=>150, "img"=>"earring4.jpg"],
            ["id"=>5, "name"=>"Pearl Ring #1", "price"=>75, "img"=>"ring1.jpg"],
            ["id"=>6, "name"=>"Pearl Ring #2", "price"=>150, "img"=>"ring2.jpg"],
            ["id"=>7, "name"=>"Pink Pearl Ring", "price"=>175, "img"=>"ring3.jpg"],
            ["id"=>8, "name"=>"Black Pearl Ring", "price"=>200, "img"=>"ring4.jpg"],
            ["id"=>9, "name"=>"Pearl Necklace #1", "price"=>120, "img"=>"necklace1.jpg"],
            ["id"=>10, "name"=>"Pearl Necklace #2", "price"=>250, "img"=>"necklace2.jpg"],
            ["id"=>11, "name"=>"Pink Pearl Necklace", "price"=>125, "img"=>"necklace3.jpg"],
            ["id"=>12, "name"=>"Black Pearl Necklace", "price"=>175, "img"=>"necklace4.jpg"]
          ];

          // ---- FUNCTION TO RENDER PRODUCT CARD ----
          function makeProductCard($p) {
            echo <<<HTML
            <div class="col-xs-12 col-md-4">
              <figure class="figure">
                <div class="card soft">
                  <a href="product_item.php?id={$p['id']}">
                    <img src="img/{$p['img']}" alt="{$p['name']}" class="product-image">
                  </a>
                  <figcaption>
                    <div class="product-name">{$p['name']}</div>
                    <div class="price-row">
                      <div class="price">\${$p['price']}.00</div>
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
                    <div class="pill-button-container">
                      <a href="#" class="pill-button">Add to cart</a>
                    </div>
                  </figcaption>
                </div>
              </figure>
            </div>
HTML;
          }

          // ---- LOOP THROUGH PRODUCTS ----
          array_map('makeProductCard', $products);
          ?>

        </div>
      </div>
    </div>
  </main>


    <footer><p>WNM 608 - Michelle Lee</p></footer>
</body>
</html>