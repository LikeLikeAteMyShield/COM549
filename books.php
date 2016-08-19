<?php 
    include("components/head.php");
    include("api/bookApi.php");

    

    $books = getAllBooks();
?>
    <div class="jumbotron">
        <div class="container">
            <h1>All Books</h1>
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
        <div class="col-xs-6 col-sm-3 col-md-3 col-lg-3">
            <?php $id = $book['id']; ?>
            <?php echo "<a href='book.php?id=$id'><img class='book-image' src='$book->image'/></a>"; ?>
            <p></p>
        </div>
    <?php
    }
?>
    </div>
    </div>