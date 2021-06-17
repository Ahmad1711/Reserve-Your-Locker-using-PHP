<?php
include("includes/init.php");
include("includes/header.html");
?>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><img src="images/baha.jpg" width="30px" height="24px"></a>
            <a class="navbar-brand" href="#"><img src="images/logo.PNG" width="30px" height="24px"></a>
            <a class="navbar-brand" href="#">Reserve Your Locker</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <?php
            if (isset($_SESSION["username"]))
                echo '<li><a href="admin.php">Home</a></li>';
            else if (isset($_SESSION["stuid"])) {
                echo '<li><a href="success.php">Home</a></li>';
            } else {
                echo '
             <li><a href="login.php"> Login</a></li>
             <li><a href="signup.php"> Sign Up</a></li>
            ';
            }
            ?>
            <li><a href="contact_us.php"> Contact us</a></li>
            <li><a href="about_us.php"> About us</a></li>
            <?php
            if (isset($_SESSION["stuid"])) {
            echo '<li><a href="setting.php"> Setting</a></li>';
            }
            if (isset($_SESSION["stuid"]) || isset($_SESSION["username"])) {
                echo '<li><a href="logout.php">Logout</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="success row text-center">
        <div class="col-lg-4">
            <i class="fab fa-facebook"></i>
        </div>
        <div class="col-lg-4">
            <i class="fab fa-twitter"></i>
        </div>
        <div class="col-lg-4">
            <i class="fab fa-google"></i>
        </div>
    </div>
    <div class="row text-center" style="margin:10em;">
        <p>CopyRight &copy 2021</p>
    </div>
</div>

<?php include("includes/footer.html"); ?>