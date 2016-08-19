<?php 
    include("components/head.php");
    include("api/bookApi.php");

    if (isset($_GET['genre'])) {
        $books = filterByGenre($_GET['genre']);
    } else {
        $books = getAllBooks();
    }
?>
    <div class="jumbotron">
        <div class="container">
            <h1>All Books</h1>
        </div>
    </div>
    <div class="container">
    <form method="get" class="form-inline">
    <div class="form-group">
    <label for="select">Filter by genre</label>
    <select name="genre" value="genre" class="form-control">
        <?php
        $genres = getAllGenres();
        foreach($genres as $genre) {
            echo "<option>$genre</option>";
        }
        ?>
    </select>
    <button type="submit" class="btn btn-primary">Filter</button>
    <p></p>
    </div>
    </form>
    <?php if (isset($_GET['genre'])) { ?>
    <span class="label label-default"><?php echo $_GET['genre']; ?> Books</span>
    <?php } ?>
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
	
	<?php

include("components/foot.php");

?>

