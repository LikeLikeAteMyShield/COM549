<?php
    include("components/head.php");

    session_start();

    if (isset($_SESSION['name'])) { ?>

    <div class="container">
        <p>Logged in as: <?php echo $_SESSION['name']; ?> <a href="logout.php">Logout</a></p>
    </div>

    <?php } else { ?>

    <div class="container">
        <p>You are not logged in <a href="login.php">Login</a></p>
    </div>

    <?php } ?>