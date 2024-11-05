<?php
declare(strict_types=1);
define('ROOT_DIRECTORY','.');
require_once "helpers/AutoLoader.php";
require_once 'helpers/UrlParameter.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Website Sign-In</title>
    <link rel="stylesheet" href="styles/shared/styles.css"/>
    <link rel="stylesheet" href="styles/pages/sign-in.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="scripts/signup&signin/sign-in.js" defer></script>

  </head>
  <body>
    <main>
      <div class="full-screen-container">
        <div class="logo-container">
          <image src="amazon-logo-white.png" class="logo"/>
        </div>
        <div class="form-container container">
          
          <h1 class="header">Sign in</h1>
          <form action="includes/LoginInc.php" method="post">
            <?php
            echo "<div class=\"input-group input-EmailOrMobileNo $error\">"
            ?>
              <label for="MobileNo"> Email or Mobile Phone number</label>
              <input
                type = "text" 
                name = "emailOrPhoneNo"
                id = "MobileNo" 
                placeholder = "Enter email or Mobile Number" 
                required
              />
              <span class="msg"></span>
            </div>
            <div class="input-group input-password">
              <label for="password">Password</label>
              <input
                type="password" 
                name="pswd" 
                placeholder="Enter password"
                id="password"
                required/>
              <span class="msg"></span>
            </div>
            <button class="continue" type="submit" name="sign-in" disabled>Continue</button>
          </form>
        </div>
        <div class="sign-up-container container">
          <hr class="hr-text" data-content="New to Amazon?">
          <a href="sign-up.php" class="sign-up-link">Create your Amazon account</a>
        </div>
      </div>
    </main>
  </body>
</html>
