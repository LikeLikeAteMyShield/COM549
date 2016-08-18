<?php
    include("components/head.php");


    if(isset($_SESSION['name'])){
        unset($_SESSION['name']);
    }
?>

<div class="container col-md-6 col-md-offset-3">
    <h1 id="logout-message">Logout Successful</h1>
    <p>You have successfully logged out.</p>
    <p>Thank you for visiting the site.</p>
    <a class="btn btn-primary" href="login.php">Log In</a>
</div>