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
                      <div class="form-select">
                        <select>
                          <option>1</option><option>2</option>
                          <option>3</option><option>4</option>
                        </select>
                      </div>
                    </div>
                  </div>
                <div class="pill-button-container">
            <a href="product_added_to_cart.php?id={$p->id}" class="pill-button">Add to cart</a>
          </div>
        </figcaption>
      </div>
    </figure>
  </div>
  HTML;
}

function cartListTemplate($r,$o){
return $r.<<<HTML
<div class="display-flex">
   <div class="flex-none images-thumbs">
      <img src="img/{$o->images}" alt="{$o->name}" class="product-image">
   </div>
   <div class="flex-stretch">
      <h2>{$o->name}</h2>
      <div>Delete</div>
   </div>
   <div class="flex-none">
      &dollar;{$o->price}
   </div>
</div>
HTML;
}

