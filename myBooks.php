<?php 
    include("components/head.php");
    include("api/bookApi.php");

    session_start();

    if (!isset($_SESSION['name'])) {
        header("location: login.php");
    }

    $books = getBooksForUser($_SESSION['name']);
?>
    <div class="jumbotron">
        <div class="container">
            <h1>My Books</h1>
        </div>
    </div>
    <ul>
<?php
    foreach($books as $book) { ?>
        <li> 
            <?php echo $book->title; ?> 
            <?php echo "<img src='$book->image'/>"; ?>
        </li>
    <?php
    }
?>
    </ul>