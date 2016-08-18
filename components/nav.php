<?php session_start(); ?>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a class="navbar-brand" href="index.php">Book<strong>markers</strong></a></li>
            <li><a href="books.php">All Books</a></li>
            <li><a href="myBooks.php">My Books</a></li>
            <?php if (isset($_SESSION['name']) && strcmp($_SESSION['name'], 'admin') == 0) { ?>
            <li><a href="addBook.php">Add Book</a></li>
            <?php }?>
            <?php if (isset($_SESSION['name']) && basename($_SERVER['PHP_SELF']) != 'logout.php') { ?>
            <li><a href="logout.php">Log Out</a></li>
            <?php } else { ?>
            <li><a href="login.php">Log In</a></li>
            <?php }?>
        </ul>
    </div>
</nav>