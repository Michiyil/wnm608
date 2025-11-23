<?php
include_once "lib/php/functions.php";
include_once "parts/templates.php";
?>

<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pearlesque Jewelry</title>
  <?php include "parts/meta.php"; ?>

  <script src="lib/js/function.js"></script>
  <script src="js/templates.js"></script>
  <script src="js/ProductCard.js"></script>
<script>
query({ type: 'products_all' }).then(d => {
  $(".ProductCard").html(
    templater(makeProductCard)(d.result)
  );
});
</script>

</head>
<body>

<?php include "parts/navbar.php"; ?>

<div class="view-window" style="background-image:url('img/bg1.jpg')"></div>
<div class="section-background"></div>

<main>
  <div class="form-control">
    <div class="container card soft">
      <h1>Our Products</h1>
      <form class="hotdog" id="product-search">
        <span>&equiv;</span>
        <input type="search" placeholder="Search Products">
      </form>
    </div>

  <section class="container card soft">
  <div class="form-control display-flex">
    <div class="flex-stretch display-flex">
      <div class="flex-none">
        <button data-filter="category" data-value="" type="button" class="form-button">All</button>
      </div>
      <div class="flex-none">
        <button data-filter="category" data-value="necklace" type="button" class="form-button">Necklace</button>
      </div>
      <div class="flex-none">
        <button data-filter="category" data-value="ring" type="button" class="form-button">Ring</button>
      </div>
      <div class="flex-none">
        <button data-filter="category" data-value="earrings" type="button" class="form-button">Earrings</button>
      </div>
    </div>

    <div class="flex-none">
     <div class="form-select">
      <select class="js-sort">
          <option value="1">Newest</option>
          <option value="2">Oldest</option>
          <option value="3">Least Expensive</option>
          <option value="4">Most Expensive</option>>
        </select>
      </div>
    </div>
  </div>
</section>

<section class="container">
  <div class="ProductCard grid gap"></div>
</section>
<!--  <?php

        $result = makeQuery(
          makeConn(),
          "
          SELECT `id`, `name`, `price`, `images`
          FROM `products`
          ORDER BY `id` ASC
          LIMIT 12
          "
        );
        // Output Products
        echo array_reduce($result, function($r, $o){ return $r . makeProductCard($o); });
        ?> -->

      </div>
    </div>
  </div>
</main>

<footer><p>WNM 608 - Michelle Lee</p></footer>

</body>
</html>

