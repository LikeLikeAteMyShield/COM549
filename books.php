<?php 
    include("components/head.php");
    include("api/bookApi.php");

    session_start();

    if (!isset($_SESSION['name'])) {
        header("location: login.php");
    }

    $books = getAllBooks();
?>
    <div class="jumbotron">
        <div class="container">
            <h1>All Books</h1>
        </div>
    </div>
    <div class="container">
    <div class="row">

<?php 
    if (count($books) == 0) {
?>
    <p>You have no books.</p>
<?php } ?>

<?php
    foreach($books as $book) { ?>
        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <?php echo "<img class='book-image' src='$book->image'/>"; ?>
            <p></p>
        </div>
    <?php
    }
?>
    </div>
    </div>