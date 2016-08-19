


<br>
<br>
<br>
<br>
	<footer class="footer-distributed">

			<div class="footer-right">

				<a href="http://www.facebook.com"><img src="images/fb.png" style="height: 35px; width:35px; padding : 2.5px"></a>
				<a href="http://www.twitter.com"><img src="images/twit.png" style="height: 35px; width:35px;padding:2.5px"></i></a>
				<a href="http://www.github.com"><img src="images/github.png" style="height: 35px; width:35px; padding : 2.5px"></a>

			</div>

			<div class="footer-left">

				<p class="footer-links">
					· ·
					<a href="index.php">Home</a>
					·
					<a href="books.php">All Books</a>
					·
					<a href="myBooks.php">My Books</a>
					· ·
					<?php if (isset($_SESSION['name']) && basename($_SERVER['PHP_SELF']) != 'logout.php') { ?>
            <br />
            · · <a href="logout.php">Log Out</a> · ·
            <?php } else { ?>
            · · <a href="login.php">Log In</a> · ·
            <?php }?>
				</p>
				<br><br>
				<p>Bookmarker &copy; 2016</p>
			</div>

		</footer>
	
	
















