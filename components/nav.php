<?php session_start(); ?>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <ul class="nav navbar-nav">
            <li><a class="navbar-brand" href="index.php">Book<strong>markers</strong></a></li>
            <li><a href="books.php">All Books</a></li>
            <li><a href="myBooks.php">My Books</a></li>
            <?php if (isset($_SESSION['name'])) { ?>
            <li><a href="addBook.php">TEST</a></li>
            <?php }?>
        </ul>
    </div>
</nav>