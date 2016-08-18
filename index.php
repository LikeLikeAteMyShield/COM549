<?php
    include("components/head.php");
    include("api/bookApi.php");

    $books = getAllBooks();
?>

    <div id="scroller" style="height: 200px; margin: 0 auto;">
        <div class="innerScrollArea">
            <ul>
                <?php 
                foreach ($books as $book) {
                    $id = $book['id'];
                    echo "<li><a href='book.php?id=$id'><img src='$book->image' height='200' /></a></li>";
                }
                ?>
            </ul>
        </div>
    </div>
    <br>

    <?php 
    if (isset($_SESSION['name'])) {
        $currentUser = getUser($_SESSION['name']);
        $recommendedBooks = filterByGenre($currentUser->favGenre);
    ?>

    <div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">Recommended for your favourite genre, <strong><?php echo $currentUser->favGenre; ?></strong></div>
        <div class="panel-body">
        
        <?php 
        foreach ($recommendedBooks as $book) {

            ?>
            
            <div class="col-md-4">
                <?php echo "<img class='book-image' src='$book->image'/>"; ?>
                <p></p>
            </div>

            <?php

        }
        ?>

        </div>
    </div>
    </div>
    <?php } ?>
</body>