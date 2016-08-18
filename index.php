<?php
    include("components/head.php");

    if (isset($_SESSION['name'])) { ?>

    <div>
        <p>Logged in as: <?php echo $_SESSION['name']; ?> <a href="logout.php">Logout</a></p>
    </div>

    <?php } else { ?>

    <div>
        <p>You are not logged in <a href="login.php">Login</a></p>
    </div>

    <?php } ?>

<body>
    <div id="scroller" style="height: 200px; margin: 0 auto;">
        <div class="innerScrollArea">
            <ul>
                <!-- HARD CODED PHOTOS -->
                <li><img src="images/15thaffair.jpg" height="200" /></li>
                <li><img src="images/afteryou.jpg" height="200" /></li>
                <li><img src="images/colddarkground.jpg" height="200" /></li>
                <li><img src="images/gosetawatchman.jpg" height="200" /></li>
                <li><img src="images/localgirlmissing.jpg" height="200" /></li>
                <li><img src="images/marblecollector.jpg" height="200" /></li>
                <li><img src="images/15thaffair.jpg" height="200" /></li>
                <li><img src="images/afteryou.jpg" height="200" /></li>
                <li><img src="images/colddarkground.jpg" height="200" /></li>
                <li><img src="images/gosetawatchman.jpg" height="200" /></li>
                <li><img src="images/localgirlmissing.jpg" height="200" /></li>
                <li><img src="images/marblecollector.jpg" height="200" /></li>
                <li><img src="images/15thaffair.jpg" height="200" /></li>
                <li><img src="images/afteryou.jpg" height="200" /></li>
                <li><img src="images/colddarkground.jpg" height="200" /></li>
                <li><img src="images/gosetawatchman.jpg" height="200" /></li>
                <li><img src="images/localgirlmissing.jpg" height="200" /></li>
                <li><img src="images/marblecollector.jpg" height="200" /></li>
            </ul>
        </div>
    </div>
</body>