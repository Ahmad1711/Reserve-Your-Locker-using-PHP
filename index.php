<?php
include("includes/header.html");
include("includes/init.php");
?>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><img src="images/baha.jpg" width="30px" height="24px"></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php"> Login</a></li>
            <li><a href="signup.php"> Sign Up</a></li>
            <li><a href="contact_us.php"> Contact us</a></li>
            <li><a href="about_us.php"> About us</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row text-center" style="margin:3em;">
        <img src="images/logo.png">
    </div>
    <div class="row text-center" style="margin:8em;">
        <a href="login.php" class="btn btn-primary">Reserve Your Locker</a>
    </div>

    <div class="row text-center" style="margin:5em;">
        <p>CopyRight &copy 2021</p>
    </div>
</div>

<?php include("includes/footer.html"); ?>