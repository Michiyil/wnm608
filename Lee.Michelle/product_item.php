<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pearlesque Jewelry</title>
  <?php include "parts/meta.php"; ?>
</head>

<body class="product-page">
  <?php include "parts/navbar.php"; ?>

  <?php
// --- ALL 12 PRODUCTS ---
$products = [
  1 => [
    "name" => "Pearl Earrings #1",
    "price" => 100,
    "img" => "earring1.jpg",
    "description" => "These elegant pearl earrings feature a soft, classic shine. Perfect for adding a timeless touch to your everyday or formal look."
  ],
  2 => [
    "name" => "Pearl Earrings #2",
    "price" => 120,
    "img" => "earring2.jpg",
    "description" => "Polished white pearls meet a sleek, modern setting. A versatile accessory that pairs beautifully with any outfit."
  ],
  3 => [
    "name" => "Pink Pearl Earrings",
    "price" => 135,
    "img" => "earring3.jpg",
    "description" => "Soft pink pearls radiate warmth and femininity. They bring a subtle pop of color and refined charm to your style."
  ],
  4 => [
    "name" => "Black Pearl Earrings",
    "price" => 150,
    "img" => "earring4.jpg",
    "description" => "Bold black pearls create a striking and modern statement. Perfect for elegant evenings or confident daytime looks."
  ],
  5 => [
    "name" => "Pearl Ring #1",
    "price" => 75,
    "img" => "ring1.jpg",
    "description" => "A classic pearl rests on a polished silver band. Simple, sophisticated, and endlessly wearable."
  ],
  6 => [
    "name" => "Pearl Ring #2",
    "price" => 150,
    "img" => "ring2.jpg",
    "description" => "A single radiant pearl rests atop a golden band. Simple yet striking, it embodies modern elegance and classic grace."
  ],
  7 => [
    "name" => "Pink Pearl Ring",
    "price" => 175,
    "img" => "ring3.jpg",
    "description" => "A blush-toned pearl adds romantic elegance to this gold ring. Ideal for those who love soft, graceful tones."
  ],
  8 => [
    "name" => "Black Pearl Ring",
    "price" => 200,
    "img" => "ring4.jpg",
    "description" => "This stunning ring features a lustrous black pearl on a sleek band. A bold design made for statement moments."
  ],
  9 => [
    "name" => "Pearl Necklace #1",
    "price" => 120,
    "img" => "necklace1.jpg",
    "description" => "A single radiant pearl rests atop a golden band. Simple yet striking, it embodies modern elegance and classic grace."
  ],
  10 => [
    "name" => "Pearl Necklace #2",
    "price" => 250,
    "img" => "necklace2.jpg",
    "description" => "Layers of luminous pearls create depth and luxury. A true heirloom piece for moments that matter most."
  ],
  11 => [
    "name" => "Pink Pearl Necklace",
    "price" => 125,
    "img" => "necklace3.jpg",
    "description" => "Delicate pink pearls bring a gentle glow to any look. A graceful statement of femininity and charm."
  ],
  12 => [
    "name" => "Black Pearl Necklace",
    "price" => 175,
    "img" => "necklace4.jpg",
    "description" => "Dark, glossy pearls capture light with mystery and allure. The perfect blend of strength and sophistication."
  ]
];

// --- GET SELECTED PRODUCT ---
$id = $_GET['id'] ?? 1;
$p = $products[$id];
?>

  <!-- GO BACK BUTTON CARD (TOP) -->
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
          <img src="img/<?= htmlspecialchars($p['img']) ?>" alt="<?= htmlspecialchars($p['name']) ?>">
        </div>

        <!-- DETAILS RIGHT -->
        <div class="product-text">
          <h1 class="name"><?= htmlspecialchars($p['name']) ?></h1>
             <h2 class="price">$<?= number_format($p['price'], 2) ?></h2>
          <p><?= htmlspecialchars($p['description']) ?></p>
          <div class="product-actions">
            <!-- FAVORITE BUTTON -->
            <div class="favorite">
              <input type="checkbox" id="heart-<?= $id ?>" class="hidden">
              <label for="heart-<?= $id ?>">&hearts;</label>
            </div>

            <!-- QUANTITY SELECT -->
            <div class="form-select">
              <select>
                <option>1</option><option>2</option>
                <option>3</option><option>4</option>
              </select>
            </div>

            <!-- ADD TO CART -->
            <a href="#" class="pill-button add-to-cart">Add to cart</a>
          </div>

    
        </div>
      </div>
    </div>
  </div>

</body>
</html>
