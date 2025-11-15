<?php

include_once "lib/php/functions.php";

switch($_GET['action']) {
case "add-to-cart":
    $product_id = $_POST['product-id'] ?? $_GET['id'] ?? 0;
    $amount = $_POST['product-amount'] ?? $_GET['amount'] ?? 1;
    if(!$product_id) die("No product ID provided.");
    $product = makeQuery(makeConn(),"SELECT * FROM `products` WHERE `id` = $product_id")[0];
    addToCart($product_id, $amount);
    header("Location: product_added_to_cart.php?id=$product_id");
    exit;
    break;

    case "update-cart-item":
        $p = cartItemById($_POST['id']);
        $p->amount = $_POST['amount'];
        header("Location: cart.php");
        break;

    case "delete-cart-item":
        $_SESSION['cart'] = array_filter($_SESSION['cart'], function($o) {
            return $o->id != $_POST['id'];
        });
        header("Location: cart.php");
        break;

    case "reset-cart":
        resetCart();
        header("Location: cart.php");
        break;

    default:
        die("Incorrect Action");
}

print_p([$_GET, $_POST, $_SESSION]);
?>

