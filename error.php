<?php 
    include("components/head.php");
    include("api/bookApi.php");
	
	$books = getAllBooks();


    if (!isset($_SESSION['name'])) {
        header("location: login.php");
    }

    $books = getBooksForUser($_SESSION['name']);
?>
    <div class="container">
    <div class="panel-body">
	
	<h2> error '400' <br><br>Book Not Found<br></h2>
	
    </div>
    </div>
	
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
	include("components/foot.php");
	?>