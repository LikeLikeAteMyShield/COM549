<?php
    include("components/head.php");

    session_start();

    if (isset($_SESSION['name'])) { ?>

    <div>
        <p>Logged in as: <?php echo $_SESSION['name']; ?> <a href="logout.php">Logout</a></p>
    </div>

    <?php } else { ?>

    <div>
        <p>You are not logged in <a href="login.php">Login</a></p>
    </div>

    <?php } ?>

    <html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Image Scroller</title>

    <style type="text/css">
    #scroller {
        position: relative;
    }
    #scroller .innerScrollArea {
        overflow: hidden;
        position: absolute;
        left: 0;
        right: 0;
        top: 0;
        bottom: 0;
    }
    #scroller ul {
        padding: 0;
        margin: 0;
        position: relative;
    }
    #scroller li {
        padding: 0;
        margin: 0;
        list-style-type: none;
        position: absolute;
    }
</style>

</head>
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
            </ul>
        </div>
    </div>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(function(){
            var scroller = $('#scroller div.innerScrollArea');
            var scrollerContent = scroller.children('ul');
            scrollerContent.children().clone().appendTo(scrollerContent);
            var curX = 0;
            scrollerContent.children().each(function(){
                var $this = $(this);
                $this.css('left', curX);
                curX += $this.outerWidth(true);
            });
            var fullW = curX / 2;
            var viewportW = scroller.width();

            // Scrolling speed management
            var controller = {curSpeed:0, fullSpeed:1};
            var $controller = $(controller);
            var tweenToNewSpeed = function(newSpeed, duration)
            {
                if (duration === undefined)
                    duration = 600;
                $controller.stop(true).animate({curSpeed:newSpeed}, duration);
            };

            // Pause on hover
            scroller.hover(function(){
                tweenToNewSpeed(0);
            }, function(){
                tweenToNewSpeed(controller.fullSpeed);
            });

            // Scrolling management; start the automatical scrolling
            var doScroll = function()
            {
                var curX = scroller.scrollLeft();
                var newX = curX + controller.curSpeed;
                if (newX > fullW*2 - viewportW)
                    newX -= fullW;
                scroller.scrollLeft(newX);
            };
            setInterval(doScroll, 20);
            tweenToNewSpeed(controller.fullSpeed);
        });
    </script>

</body>
</html>