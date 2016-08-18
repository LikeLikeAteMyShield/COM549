<?php

	include ("components/head.php");
	include ("api/bookApi.php");
	
	$book = getBookById($_GET["id"]); 
	
	if ($book != null)
	{
		
?>		
		
		<div class ="container">
			<h1> <?php echo $book->title,"<br><br>" ?></h1>
		</div>	
			
		<div class="container">
		<div class="col-sm-3">
			
			<?php
					echo  "<img class='book-image' src='$book->image'/>";
			?>
			
			
		</div>
		<div class="col-sm-3" style="padding-left: 5px; padding: 5px">

			<table class="table">
			<h4>
			<tr>
				<th>Author: </th>
				<th><?php echo $book->author?></th>
			</tr>

			<tr>
				<th>Genre: </th>
				<th><?php echo $book->genre?></th>
			</tr>
			<tr>
				<th>Price: </th>
				<th><?php echo $book->price?></th>
			</tr>
			<tr>
				<th>Publisher Year: </th>
				<th><?php echo $book->publish_year?></th>
			</tr>
			<tr>
				<th>Pages: </th>
				<th><?php echo $book->pages?></th>
			</tr>
			</h4>
		</table>
		</div>

		
		
		<div class="col-md-6">
			<h3>Suggested Books</h1>
			
			<?php 
				$books = filterByGenre($book->genre);

                foreach ($books as $suggestedBook) {
                    if (strcmp($book->title, $suggestedBook->title) != 0) {
			?> 
			
			
		
				<div class="col-sm-4"> 
					
					<?php 
                    $id = $suggestedBook['id'];
                    echo "<a href='book.php?id=$id'><img class='book-image' style='height:150px' src='$suggestedBook->image'/></a>"; 
                    ?> 
				<p></p> 
				</div> 
			
            <?php }} ?>
			
	

			
		</div>
			
		</div>	
	
	
<?php
	} else { 
?>

	<a href="errorPage.php">
	
<?php } ?>