<?php
require_once("includes/config.php");
require_once("includes/classes/FormSanitizer.php");
require_once("includes/classes/Account.php");
require_once("includes/classes/Constants.php");

$account = new Account($con);

if(isset($_POST['submitButton'])){
    $firstName = FormSanitizer::sanitizeFormString($_POST['firstName']);
    $lastName = FormSanitizer::sanitizeFormString($_POST['lastName']);

    $username = FormSanitizer::sanitizeFormUsername($_POST['username']);

    $email = FormSanitizer::sanitizeFormEmail($_POST['email']);
    $email2 = FormSanitizer::sanitizeFormEmail($_POST['email2']);

    $password = FormSanitizer::sanitizeFormPassword($_POST['password']);
    $password2 = FormSanitizer::sanitizeFormPassword($_POST['password2']);

    $account->register($firstName, $lastName, $username, $email, $email2, $password, $password2);

}

?>
<!DOCTYPE html>
<html>
<head>
    <title>VideoTube</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>

</head>
<body>

<div class="signInContainer">
    <div class="column">
        <div class="header">
            <img src="assets/images/icons/VideoTubeLogo.png" title="logo">
            <h3>Sign Up</h3>
            <span>to continue to VideoTube</span>
        </div>

        <div class="loginForm">
            <form action="signup.php" method="POST">

                <?php
                    echo $account->getError(Constants::$firstNameCharacters);
                ?>

                <input type="text" name="firstName" placeholder="First name" autocomplete="off" required>
                <input type="text" name="lastName" placeholder="Last name" autocomplete="off" required>
                <input type="text" name="username" placeholder="Username" autocomplete="off" required>

                <input type="email" name="email" placeholder="Email" autocomplete="off" required>
                <input type="email" name="email2" placeholder="Confirm Email" autocomplete="off" required>

                <input type="password" name="password" placeholder="Password" autocomplete="off" required>
                <input type="password" name="password2" placeholder="Confirm Password" autocomplete="off" required>

                <input type="submit" name="submitButton" value="SUBMIT">
            </form>
        </div>

        <a class="signInMessage" href="signin.php">Already have an account? Sign in here!</a>
    </div>
</div>

</body>
</html>
