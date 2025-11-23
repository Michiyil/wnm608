

const makeProductCard = o => `
<div class="col-xs-12 col-md-4">
  <figure class="figure">
    <div class="card soft">
      <a href="product_item.php?id=${o.id}">
        <img src="img/${o.images}" alt="${o.name}" class="product-image">
      </a>
      <figcaption>
        <div class="product-name">${o.name}</div>
        <div class="price-row">
          <div class="price">&dollar;${o.price.toFixed(2)}</div>

          <div class="display-flex">
            <div class="favorite">
              <input type="checkbox" id="heart-${o.id}" class="hidden">
              <label for="heart-${o.id}">&hearts;</label>
            </div>

            <div class="form-select" style="font-size:1em">
              <select id="amount-${o.id}" name="product-amount">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>
          </div>
        </div>

        <div class="pill-button-container">
          <a href="cart_actions.php?action=add-to-cart&id=${o.id}" 
             class="pill-button" 
             onclick="addToCartWithAmount(event, ${o.id})">
             Add to cart
          </a>
        </div>
      </figcaption>
    </div>
  </figure>
</div>
`;