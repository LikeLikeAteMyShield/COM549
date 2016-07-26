<?php
    include("components/head.php");

    session_start();

    if(!isset($_SESSION['name'])) {
        header("location: login.php");
    }

    $message = "Logged in as: " . $_SESSION['name'];
?>

<div class="container">
    <?php echo $message; ?>
    <br>
    <a href="logout.php">Logout</a>
</div>