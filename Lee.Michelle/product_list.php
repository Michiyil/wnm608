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
</head>
<body>

<?php include "parts/navbar.php"; ?>

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
        ?>

      </div>
    </div>
  </div>
</main>

<footer><p>WNM 608 - Michelle Lee</p></footer>

</body>
</html>

