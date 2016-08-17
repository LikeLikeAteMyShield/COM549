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
    <div class="container">
    <div class="row">
<?php
    foreach($books as $book) { ?>
        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
         
            <?php echo "<img src='$book->image'/>"; ?>
            <p><?php echo $book->title; ?></p>
        
        </div>
    <?php
    }
?>
    </div>
    </div>