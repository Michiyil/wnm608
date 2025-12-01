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

<body class="home">

<?php include "parts/navbar.php"; ?>

<div class="view-window" style="background-image:url('img/storeimage.jpg')">
    <div class="view-window-content">
        <h1 class="headline">Timeless Elegance</h1>
        <p class="subheadline">Pearl jewelry crafted to shine with your story.</p>
        <div class="pill-button-container">
            <a href="product_list.php" class="pill-button">Scroll Down for More</a>
        </div>
    </div>
</div>

<div class="section-background"></div>

<div class="container">
    <div class="card soft">
        <h1>About Us</h1>
        <p>At Pearlesque Jewelry, we specialize in handcrafted pearl jewelry that embodies timeless beauty and individuality. Each piece is carefully made using high-quality materials and years of expertise in jewelry design.</p>
        <div class="pill-button-container">
            <a href="about.php" class="pill-button">Click to learn more</a>
        </div>
    </div>
</div>

   <div class="container card soft" id="gridsystem">
      <h1>Bestseller Jewelries</h1>
      <p>Our bestselling pearl jewelries embody sophistication and charm loved by customers.</p>
      <div class="grid gap">
        <div class="col-xs-12 col-md-4">
          <figure class="figure product-overlay">
            <img src="img/earring4.jpg" alt="" class="product-image">
            <figcaption>
              <div class="caption-body">
                <div>Black Pearl Earrings</div>
                <div>$150.00</div>
              </div>
            </figcaption>
          </figure>
        </div>
        <div class="col-xs-12 col-md-4">
          <figure class="figure product-overlay">
            <img src="img/ring3.jpg" alt="" class="product-image">
            <figcaption>
              <div class="caption-body">
                <div>Pink Pearl Ring</div>
                <div>$175.00</div>
              </div>
            </figcaption>
          </figure>
        </div>
        <div class="col-xs-12 col-md-4">
          <figure class="figure product-overlay">
            <img src="img/necklace2.jpg" alt="" class="product-image">
            <figcaption>
              <div class="caption-body">
                <div>Pearl Necklace #2</div>
                <div>$250.00</div>
              </div>
            </figcaption>
          </figure>
        </div>
      </div>
          <div class="pill-button-container">
          <a href="products.html" class="pill-button">Browse more products</a>
        </div>
    </div>

<div class="container soft card">
    <h1>Recommended Products</h1>
    <?php
        $result = makeQuery(makeConn(),
            "SELECT * FROM `products` ORDER BY `date_create` DESC LIMIT 3"
        );
        echo recommendedProductsImages($result);
    ?>
</div>

<div class="container" id="forms">
    <div class="card soft">
        <h1>Want to Book an Appointment?</h1>

        <form>
            <div class="form-control">
                <label class="form-label">Full Name</label>
                <input type="text" class="form-input" placeholder="First and Last Name">
            </div>

            <div class="form-control">
                <label class="form-label">Phone Number</label>
                <input type="number" class="form-input" placeholder="(123) - 456 - 7890">
            </div>

            <div class="form-control">
                <label class="form-label">Email</label>
                <input type="email" class="form-input" placeholder="example@anonymous.com">
            </div>

            <div class="form-control">
                <label class="form-label">Reason</label>
                <input type="text" class="form-input" placeholder="e.g., Wedding Jewelry">
            </div>

            <div class="form-control display-flex" style="gap:10px;">
                <div class="flex-none"><label class="form-label">Date</label></div>
                <div><input type="datetime-local" class="form-input"></div>
                <span style="font-size:0.9em; color:#3d3533;">Mon–Sun: 11am–5pm</span>
            </div>
        </form>

        <div class="pill-button-container">
            <a href="#" class="pill-button">Book Appointment</a>
        </div>
    </div>
</div>

<footer>
    <p>WNM 608 - Michelle Lee</p>
</footer>

</body>
</html>
