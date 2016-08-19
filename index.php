<?php
    include("components/head.php");

    $books = getAllBooks();

    if(isset($_POST['email'])){
        $email = $_POST['email'];
        $name = $_POST['name'];
        $password = base64_encode($_POST['password']);
        $favgenre = $_POST['favgenre'];


        if( //Only adds a book if all fields are filled with valid data
            $email != NULL &&
            $name != NULL &&
            $password != NULL &&
            $favgenre != NULL){

            $xml = simplexml_load_file('xml/users.xml'); //Open and parse the xml file

            $count = ($xml->count())+1; //Counts the current number of users in the xml file and adds 1
            $id = 'usr0'.$count; //Creates an id made up of bk1 and then the nuumber above

            $user = $xml->addChild('user'); //Adds a user
            $user->addAttribute('id', $id); //Add the id attribute to the user

            //Next seven lines add the elecments of the book
            $name = $user->addChild('name', $name);
            $email = $user->addChild('email', $email);
            $password = $user->addChild('password', $password);
            $books = $user->addChild('books');
            $favgenre = $user->addChild('favGenre', $favgenre);

            $xml->asXML('xml/users.xml'); //Saves the xml file
        }
        else{
            echo "<script type=\"text/javascript\">alert(\"Please fill out all of the fields in the form correctly.\")
            </script>";
        }
    }

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
        <div class="panel-heading">Recommended for your favourite genre - <strong><?php echo $currentUser->favGenre; ?></strong></div>
        <div class="panel-body">
        
        <?php 
        foreach ($recommendedBooks as $book) {

            ?>
            
            <div class="col-md-4">
                <?php $id = $book['id']; ?>
                <?php echo "<a href='book.php?id=$id'><img class='book-image' src='$book->image'/></a>"; ?>
                <p></p>
            </div>

            <?php

        }
        ?>

        </div>
    </div>
    </div>
    <?php } else { ?>
        <div class="container">
            <div class="col-md-6 col-md-offset-3 login-form panel panel-default">
                <form action="index.php" method="post">
                    <div class="form-group">
                        <h1>Register</h1>
                        <br />
                        <input type="email" name="email" class="form-control" placeholder="Email" /> <br />
                        <input type="text" name="name" class="form-control" placeholder="Name" /> <br />
                        <input type="text" name="password" class="form-control" placeholder="Password" /> <br />
                        <select name="favgenre" class="form-control" placeholder="Favourite Genre">
                            <option disabled selected>Favourite Genre</option>
                            <?php 
                                $genrelist = getAllGenres();
                                foreach ($genrelist as $genre) {
                                    echo "<option value=\"$genre\">$genre</option>";
                                }
                            ?>
                        </select> <br />
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    <?php } ?>
</body>

<?php

include("components/foot.php");

?>