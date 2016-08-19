<?php
	include("components/head.php");
    include("api/bookApi.php");
		
	if(isset($_POST['author'])){
		$author = $_POST['author'];
		$title = $_POST['title'];
		$genre = $_POST['genre'];
		$price = $_POST['price'];
		$publishyear = $_POST['publishyear'];
		$pages = $_POST['pages'];
		$image = $_POST['image'];


		if( //Only adds a book if all fields are filled with valid data
			$author != NULL &&
			$title != NULL &&
			$genre != NULL &&
			$price != NULL &&
			$publishyear != NULL &&
			$pages != NULL &&
			$image != NULL){
	
			$xml = simplexml_load_file('xml/books.xml'); //Open and parse the xml file

			$count = ($xml->count())+1; //Counts the current number of books in the xml file and adds 1
			$id = 'bk1'.$count; //Creates an id made up of bk1 and then the nuumber above

			$book = $xml->addChild('book'); //Adds a book
			$book->addAttribute('id', $id); //Add the id attribute to the book

			//Next seven lines add the elecments of the book
			$author = $book->addChild('author', $author);
			$title = $book->addChild('title', $title);
			$genre = $book->addChild('genre', $genre);
			$price = $book->addChild('price', $price);
			$publishyear = $book->addChild('publish_year', $publishyear);
			$pages = $book->addChild('pages', $pages);
			$image = $book->addChild('image', $image);

			$xml->asXML('xml/books.xml'); //Saves the xml file
		}
		else{
			echo "<script type=\"text/javascript\">alert(\"Please fill out all of the fields in the form correctly.\")
			</script>";
		}
	}

?>
<div class="jumbotron">
	<div class="container">
		<h1>Add book</h1>
	</div>
</div>


<br />
<div class="container">
	<div class="col-md-6 col-md-offset-3 login-form panel panel-default">
		<form action="addBook.php" method="post">
			<div class="form-group">
				<br />
				<input type="text" name="author" class="form-control" placeholder="Author"> <br />
				<input type="text" name="title" class="form-control" placeholder="Title"> <br />
				<input type="text" name="genre" class="form-control" placeholder="Genre"> <br />
				<input type="number" name="price" class="form-control" placeholder="Price"> <br />
				<input type="number" name="publishyear" class="form-control" placeholder="Year"> <br />
				<input type="number" name="pages" class="form-control" placeholder="Pages"> <br />
				<input type="text" name="image" class="form-control" placeholder="Image"> <br />
				<button type="submit" class="btn btn-success">Submit</button>
			</div>
		</form>
	</div>
</div>

<?php

include("components/foot.php");

?>





