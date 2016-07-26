<?php
    include("components/head.php");

    if(isset($_POST['userEmail'])){
        session_start();
        $_SESSION['name'] = $_POST['userEmail'];
        header("location: index.php");
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
</div>