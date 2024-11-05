<?php
declare(strict_types=1);
define('ROOT_DIRECTORY','.');
require_once "helpers/AutoLoader.php";
require_once 'helpers/UrlParameter.php';
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Website Registration</title>
    <link rel="stylesheet" href="styles/shared/styles.css"/>
    <link rel="stylesheet" href="styles/pages/sign-up"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script defer src="scripts/signup&signin/sign-up.js"></script>

  </head>
  <body>
    <main>
      <div class="full-screen-container">
        <div class="logo-container">
          <image src="amazon-logo-white.png" class="logo"/>
        </div>
        <div class="form-container container">
          <h1 class="header">Create account</h1>
          <form action="includes/SignUpInc.php" method="post">
            <input type="hidden" id="timeInMs" class="timeInMs" name="timeInMs" value="">
            <?php
             echo "
            <div class=\"input-group input-name $nameErrorClass\">
              <label for=\"name\">Your name</label>
                <input
                type=\"text\" placeholder=\"First and last name\"
                name=\"yourName\"
                id=\"name\"
                minlength=\"2\"
                value=\"$name\"
                required
              />
              <span class=\"msg\">$nameErrorMessage</span>
            </div>
            <div class=\"input-group input-mobileNo $mobileErrorClass\">
              <label for=\"MobileNo\">Mobile number</label>
              <input
                type=\"tel\" inputmode=\"numeric\"
                name=\"mobileNo\"
                id=\"MobileNo\"
                minlength=\"10\"
                pattern=\"[0-9]+\"
                maxlength=\"12\" 
                value=\"$mobile\"
                placeholder=\"Enter 10-digit mobile number\" 
                required
                > 
              <span class=\"msg\">$mobileErrorMessage</span> 
            </div>
            <div class=\"input-group input-email $emailErrorClass\">
              <label for=\"id\">Email</label>
              <input
                type=\"email\"
                name=\"email\"
                id=\"id\"
                title=\"please enter a valid email\"
                placeholder=\"name@example.com\"
                value=\"$email\"
                pattern=\".*@.*\"
              /> 
              <span class=\"msg\">$emailErrorMessage
              </span>
            </div>
            <div class=\"input-group input-password $passwordErrorClass\">
              <label for=\"password\">Password</label>
                <input
                type=\"password\" 
                name=\"pswd\"
                placeholder=\"At least 8 characters\"
                id=\"password\"
                minlength=\"8\"
                required
                >
              <span class=\"msg\">$passwordErrorMessage</span>
            </div>
            <div class=\"input-group input-confirmPswd $passwordConfirmErrorClass\">
              <label for=\"confirmPswd\">Re-enter password</label>
              <input
                type=\"password\" name=\"confirmPswd\"
                id=\"confirmPswd\"
                placeholder=\"confirm password\"
                required
                >
              <span class=\"msg\">$passwordConfirmErrorMessage</span>
            </div>"
            ?>
            <button class="continue" name="sign-up" type="submit" disabled>Continue</button>
            <p class="sign-in-para">Already have an account?<a href="sign-in.php" class="sign-in-link"> Sign In</a></p>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>