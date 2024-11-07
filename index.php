<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
$name = $_SESSION["username"] ?? "Sign In";
$link = $_SESSION["username"] ? '<a href="includes/LogoutInc.php">sign out</a>':"<a href=\"sign-in.php\">sign in</a>";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Amazon Project</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles/shared/general.css">
    <link rel="stylesheet" href="styles/shared/amazon-header.css">
    <link rel="stylesheet" href="styles/pages/amazon.css">
    <script defer type="module" src="scripts/amazon.js"></script>

  </head>
  <body>
    <div class="amazon-header">
      <div class="amazon-header-left-section">
        <a href="index.php" class="header-link">
          <img class="amazon-logo"
            src="images/amazon-logo-white.png">
          <img class="amazon-mobile-logo"
            src="images/amazon-mobile-logo-white.png">
        </a>
      </div>

      <div class="amazon-header-middle-section">
        <input class="search-bar" type="text" placeholder="Search">

        <button class="search-button">
          <img class="search-icon" src="images/icons/search-icon.png">
        </button>
      </div>

      <div class="amazon-header-right-section">
        <div class="account-details">
          <p class="name">Hello, <?php echo"{$name}";?></p>
          <p class="account">Account</p>
          <div class="account-more-details-wrapper">
            <div class ="account-more-details">
                  <?php echo"{$link}";?></p>
            </div>
          </div>
        </div>
        <a class="orders-link header-link" href="orders.html">
          <span class="returns-text">Returns</span>
          <span class="orders-text">& Orders</span>
        </a>
        <a class="cart-link header-link" href="checkout.php">
          <img class="cart-icon" src="images/icons/cart-icon.png">
          <div class="cart-quantity"></div>
          <div class="cart-text">Cart</div>
        </a>
      </div>
    </div>
    
    <div class="main">
      <div class="products-grid js-product-grid">
        <!-- <div class="product-container">
          <div class="product-image-container">
            <img class="product-image"
              src="images/products/athletic-cotton-socks-6-pairs.jpg">
          </div>

          <div class="product-name limit-text-to-2-lines">
            Black and Gray Athletic Cotton Socks - 6 Pairs
          </div>

          <div class="product-rating-container">
            <img class="product-rating-stars"
              src="images/ratings/rating-45.png">
            <div class="product-rating-count link-primary">
              87
            </div>
          </div>

          <div class="product-price">
            $10.90
          </div>

          <div class="product-quantity-container">
            <select>
              <option selected value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>

          <div class="product-spacer"></div>

          <div class="added-to-cart">
            <img src="images/icons/checkmark.png">
            Added
          </div>

          <button class="add-to-cart-button button-primary">
            Add to Cart
          </button>
        </div>

        <div class="product-container">
          <div class="product-image-container">
            <img class="product-image"
              src="images/products/intermediate-composite-basketball.jpg">
          </div>

          <div class="product-name limit-text-to-2-lines">
            Intermediate Size Basketball
          </div>

          <div class="product-rating-container">
            <img class="product-rating-stars"
              src="images/ratings/rating-40.png">
            <div class="product-rating-count link-primary">
              127
            </div>
          </div>

          <div class="product-price">
            $20.95
          </div>

          <div class="product-quantity-container">
            <select>
              <option selected value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>

          <div class="product-spacer"></div>

          <div class="added-to-cart">
            <img src="images/icons/checkmark.png">
            Added
          </div>

          <button class="add-to-cart-button button-primary">
            Add to Cart
          </button>
        </div>

        <div class="product-container">
          <div class="product-image-container">
            <img class="product-image"
              src="images/products/adults-plain-cotton-tshirt-2-pack-teal.jpg">
          </div>

          <div class="product-name limit-text-to-2-lines">
            Adults Plain Cotton T-Shirt - 2 Pack
          </div>

          <div class="product-rating-container">
            <img class="product-rating-stars"
              src="images/ratings/rating-45.png">
            <div class="product-rating-count link-primary">
              56
            </div>
          </div>

          <div class="product-price">
            $7.99
          </div>

          <div class="product-quantity-container">
            <select>
              <option selected value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
              <option value="7">7</option>
              <option value="8">8</option>
              <option value="9">9</option>
              <option value="10">10</option>
            </select>
          </div>

          <div class="product-spacer"></div>

          <div class="added-to-cart">
            <img src="images/icons/checkmark.png">
            Added
          </div>

          <button class="add-to-cart-button button-primary">
            Add to Cart
          </button>
        </div> -->
      </div>
    </div>
  </body>
</html>
