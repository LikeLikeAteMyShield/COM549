<?php 
    include("components/head.php");
    include("api/bookApi.php");


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
    <div class="panel-body">

<?php 
    if (count($books) == 0) {
?>
    <p>You have no books.</p>
<?php } ?>

<?php
    foreach($books as $book) { ?>
        <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">
            <?php $id = $book['id']; ?>
            <?php echo "<a href='book.php?id=$id'><img class='book-image' src='$book->image'/></a>"; ?>
            <p></p>
        </div>
    <?php
    }
?>
    </div>
    </div>