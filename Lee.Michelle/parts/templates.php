<?php
function makeProductCard($p) {
    return <<<HTML
    <div class="col-xs-12 col-md-4">
        <figure class="figure">
            <div class="card soft">
                <a href="product_item.php?id={$p->id}">
                    <img src="img/{$p->images}" alt="{$p->name}" class="product-image">
                </a>
                <figcaption>
                    <div class="product-name">{$p->name}</div>
                    <div class="price-row">
                        <div class="price">&dollar;{$p->price}.00</div>

                        <div class="display-flex">
                            <div class="favorite">
                                <input type="checkbox" id="heart-{$p->id}" class="hidden">
                                <label for="heart-{$p->id}">&hearts;</label>
                            </div>
                            <div class="form-select" style="font-size:1em">
                                <select id="amount-{$p->id}" name="product-amount">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="pill-button-container">
                        <a href="cart_actions.php?action=add-to-cart&id={$p->id}" 
                           class="pill-button" 
                           onclick="addToCartWithAmount(event, {$p->id})">
                           Add to cart
                        </a>
                    </div>
                </figcaption>
            </div>
        </figure>
    </div>
    HTML;
}

function makeProducts($p) {
    return <<<HTML
    <div class="col-xs-12 col-md-4">
        <figure class="figure">
            <div class="container">
                <a href="product_item.php?id={$p->id}">
                    <img src="img/{$p->images}" alt="{$p->name}" class="product-image">
                </a>
                <figcaption>
                    <div class="product-name">{$p->name}</div>
                    <div class="price-row">
                        <div class="price">&dollar;{$p->price}</div>
                    </div>
                </figcaption>
            </div>
        </figure>
    </div>
HTML;
}



function selectAmount($amount=1, $total=4) {
    $output = "<select name='amount'>";
    for($i=1; $i<=$total; $i++) {
        $output .= "<option ".($i==$amount ? "selected" : "").">$i</option>";
    }
    $output .= "</select>";
    return $output;
}

function cartListTemplate($r, $o) {
    $totalfixed = number_format($o->total, 2, '.', ',');
    $selectamount = selectAmount($o->amount ?? 1, 4);

    return $r . <<<HTML
    <div class="cart-item display-flex">
        <div class="cart-image">
            <img src="img/{$o->images}" alt="{$o->name}" class="product-image">
        </div>
        <div class="cart-info">
            <h2>{$o->name}</h2>
            <div class="cart-price">&dollar;{$totalfixed}</div>
            <div class="cart-actions display-flex">
                <div class="favorite">
                    <input type="checkbox" id="heart-{$o->id}" class="hidden">
                    <label for="heart-{$o->id}">&hearts;</label>
                </div>

                <form action="cart_actions.php?action=update-cart-item" method="post" onchange="this.submit()">
                    <input type="hidden" name="id" value="{$o->id}">
                    <div class="form-select" style="font-size:1em">
                        {$selectamount}
                    </div>
                </form>

                <form action="cart_actions.php?action=delete-cart-item" method="post">
                    <input type="hidden" name="id" value="{$o->id}">
                    <input type="submit" class="pill-button back-button" value="Delete">
                </form>
            </div>
        </div>
    </div>
HTML;
}





function cartTotals() {
    $cart = getCartItems();

    $cartprice = array_reduce($cart, function($r, $o) {return $r + $o->total;}, 0);

    $pricefixed = number_format($cartprice,2,'.',',');
    $taxfixed = number_format($cartprice*0.0725,2,'.',',');
    $taxedfixed = number_format($cartprice*1.0725,2,'.',',');


return <<<HTML
       <div class="cart-summary">
      <h2>Subtotal: &dollar;$pricefixed</h2>
      <h2>Tax: &dollar;$taxfixed</h2>
      <h1>Total: &dollar;$taxedfixed</h1>
    </div>

        <div class="pill-button-container">
      <a href="cart_checkout.php" class="pill-button">Proceed to Checkout</a>
    </div>
HTML;
}

function recommendedProductsImages($a) {
    $product = array_reduce($a, function($r, $p) {
        return $r . makeProducts($p);
    }, "");
    return "<div class='grid gap productlist'>$product</div>";
}
?>

<script>
function addToCartWithAmount(event, productId) {
    event.preventDefault();
    const amount = document.getElementById('amount-' + productId).value;
    // Redirect with amount value
    window.location.href = `cart_actions.php?action=add-to-cart&id=${productId}&amount=${amount}`;
}
</script>



