<?php 
include "../lib/php/functions.php";
include "templates.php";

$empty_product = (object)[
    "name" => "Pearl Powder",
    "price" => "20",
    "category" => "earrings",
    "description" => "Testing",
    "images" => "Image.jpg"
];


// CARD TEMPLATE -------------------------------------------------------
function ProductCard($r, $o) {
return $r.<<<HTML
<div class="card soft">
    <div class="display-flex">

        <div class="flex-none images-thumbs">
            <img src="img/{$o->images}" style="width:80px; height:80px; object-fit:cover;">
        </div>

        <div class="flex-stretch" style="padding:1em">{$o->name}</div>

        <div class="flex-none">
            <a href="{$_SERVER['PHP_SELF']}?id={$o->id}" class="form-button">Edit</a>
        </div>

    </div>
</div>
HTML;
}


// LOGIC ---------------------------------------------------------------
try {
    $conn = makePDOConn();

    switch($_GET['action']) {

        /* ---------- UPDATE ---------- */
        case "update":
            $statement = $conn->prepare("
                UPDATE `products`
                SET
                    `name`=?,
                    `price`=?,
                    `category`=?,
                    `description`=?,
                    `images`=?,
                    `date_modify`=NOW()
                WHERE
                    `id`=?
            ");

            $statement->execute([
                $_POST['product-name'],
                $_POST['product-price'],
                $_POST['product-category'],
                $_POST['product-description'],
                $_POST['product-images'],
                $_GET['id']
            ]);

            header("location:{$_SERVER['PHP_SELF']}?id={$_GET['id']}");
        break;



        /* ---------- CREATE ---------- */
        case "create":
            $statement = $conn->prepare("
                INSERT INTO `products`
                (
                    `name`,
                    `price`,
                    `category`,
                    `description`,
                    `images`,
                    `date_create`,
                    `date_modify`
                )
                VALUES
                (
                    ?, ?, ?, ?, ?, NOW(), NOW())
            ");
            $statement->execute([
                $_POST['product-name'],
                $_POST['product-price'],
                $_POST['product-category'],
                $_POST['product-description'],
                $_POST['product-images']
            ]);
            $id = $conn->lastInsertId();
            header("location:{$_SERVER['PHP_SELF']}?id=$id");
        break;
        case "delete":
          $statement = $conn->prepare("DELETE FROM `products` WHERE `id`=?");
          $statement->execute([ $_GET['id'] ]);
          header("location:{$_SERVER['PHP_SELF']}");
        break;
    }

} catch(PDOException $e) {
    die($e->getMessage());
}



// PRODUCT PAGE TEMPLATE ---------------------------------------------
function showProduct($o) {

    $id = $_GET['id'] ?? null;
    $is_new = ($id === "new");

    $addoredit = $is_new ? "Add" : "Edit";
    $action = $is_new ? "create" : "update";
    $button_text = $is_new ? "Add Product" : "Save Changes";

    $delete_button = $is_new ? "" :
        "<a href='{$_SERVER['PHP_SELF']}?action=delete&id={$id}' class='pill-button' style='background:red;'>Delete</a>";



    /* ---------- IMAGES (HTML DISPLAY) ---------- */
    $images_html = array_reduce(
        explode(",", $o->images),
        function($r, $img){
            $img = trim($img);
            return ($img !== "" && preg_match('/\.(jpg|jpeg|png)$/i', $img))
                ? $r."<img src='img/$img' style='width:150px; height:150px; object-fit:cover; margin-right:10px;'>"
                : $r;
        },
        ""
    );

    /* ---------- IMAGES (FORM TEXT ONLY) ---------- */
    $images_text = array_reduce(
        explode(",", $o->images),
        function($r, $img){
            $img = trim($img);
            return ($img !== "" && preg_match('/\.(jpg|jpeg|png)$/i', $img))
                ? $r . ($r ? "," : "") . $img
                : $r;
        },
        ""
    );



    /* ---------- LEFT DISPLAY ---------- */
$display = <<<HTML
<div class="product-display">

    <h2>{$o->name}</h2>

    <div>
        <label class="form-label">Price</label>
        <span>\${$o->price}</span>
    </div>

    <div>
        <label class="form-label">Category</label>
        <span>{$o->category}</span>
    </div>

    <div>
        <label class="form-label">Description</label>
        <span>{$o->description}</span>
    </div>

    <div>
        <label class="form-label">Image</label>
        <span class="image-thumbs">$images_html</span>
    </div>

</div>
HTML;



    /* ---------- RIGHT FORM ---------- */
$form = <<<HTML
<div class="product-form">
    <h2>$addoredit Product</h2>

    <form method="post" action="{$_SERVER['PHP_SELF']}?action={$action}&id={$id}">

        <div class="form-control">
            <label class="form-label" for="product-name">Name</label>
            <input class="form-input" name="product-name" id="product-name" type="text" value="{$o->name}" placeholder="Enter the Product Name">
        </div>

        <div class="form-control">
            <label class="form-label" for="product-price">Price</label>
            <input class="form-input" name="product-price" id="product-price" type="number" min="0" max="10000" step="0.01" value="{$o->price}" placeholder="Enter the Product Price">
        </div>

        <div class="form-control">
            <label class="form-label" for="product-category">Category</label>
            <input class="form-input" name="product-category" id="product-category" type="text" value="{$o->category}" placeholder="Enter the Product Category">
        </div>

        <div class="form-control">
            <label class="form-label" for="product-description">Description</label>
            <textarea class="form-input" name="product-description" id="product-description" placeholder="Enter the Product Description">{$o->description}</textarea>
        </div>

        <div class="form-control">
            <label class="form-label" for="product-images">Images (comma separated)</label>
            <input class="form-input" name="product-images" id="product-images" type="text" value="{$images_text}" placeholder="image1.jpg, image2.jpg">
        </div>

        <div class="pill-button-container">
            <a href="#" class="pill-button" onclick="this.closest('form').submit(); return false;">$button_text</a>
            {$delete_button}
        </div>

    </form>
</div>
HTML;



    /* ---------- PAGE OUTPUT ---------- */
    $output = $is_new
        ? "<div class='card soft'>$form</div>"
        : "<div class='grid gap'>
                <div class='col-xs-12 col-md-7 card soft'>$display</div>
                <div class='col-xs-12 col-md-5 card soft'>$form</div>
           </div>";

    echo $output;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Product Admin Page</title>
    <?php include "../parts/meta.php"; ?>
</head>

<body>

<header class="navbar">
    <div class="container display-flex flex-align-center" style="justify-content: space-between;">
        <h1 class="site-title">Product Admin</h1>
        <nav class="nav nav-flex flex-none">
            <ul class="display-flex">
                <li><a href="<?=$_SERVER['PHP_SELF']?>" class="pill-button">Product List</a></li>
                <li><a href="<?=$_SERVER['PHP_SELF']?>?id=new" class="pill-button">Add New Product</a></li>
            </ul>
        </nav>
    </div>
</header>

<div class="container">
    <div class="back-button-container">
        <?php if (isset($_GET['id'])) { ?>
            <a href="<?=$_SERVER['PHP_SELF']?>" class="pill-button back-button">← Go back</a>
        <?php } ?>
    </div>

    <div class="container">
<?php
if(isset($_GET['id'])) {
    showProduct(
        $_GET['id']=="new" ?
            $empty_product :
            makeQuery(
                makeConn(),
                "SELECT * FROM `products` WHERE `id`=".$_GET['id']
            )[0]
    );
} else {

?>
<h2>Product List</h2>
<?php

    $result = makeQuery(
        makeConn(),
        "SELECT * FROM `products` ORDER BY `date_create` DESC"
    );

    echo array_reduce($result,'ProductCard');

?>
<?php }?>

    </div>

</body>
</html>
