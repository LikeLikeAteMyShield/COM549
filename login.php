<?php
    include("components/head.php");
    include("api/authService.php");

    if(isset($_POST['userEmail']) && isset($_POST['userPassword'])){

        $username = authenticateUser($_POST['userEmail'], base64_encode($_POST['userPassword']));
        echo $username;
        if ($username != null) {
            session_start();
            $_SESSION['name'] = $username;
            header("location: index.php");
        }
    }
?>

<div class="container">
    <div class="col-md-6 col-md-offset-3 login-form panel panel-default">
        <h2 id="login-message">Please log in to continue</h2>
        <form action="login.php" method="post">
            <div class="form-group">
                <br>
                <input type="email" class="form-control" name="userEmail" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="userPassword" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary">Log In</button>
        </form>
    </div>
    <div class="col-md-6 col-md-offset-3 regbutton"> 
        <a href="index.php"><button type="button" class="btn btn-primary">Click Here To Register</button></a>
    </div>
</div>