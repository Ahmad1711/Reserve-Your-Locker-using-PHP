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
            if (isset($_SESSION["stuid"])|| isset($_SESSION["username"])) {
                echo '<li><a href="logout.php">Logout</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <h3>who we are ??</h3>
            <p>Reserve Your Lockers System is online website we believed it would increase facilitaiton and accurancy of the lockers reservation process where students can reserve and pay online via the internet.</p>
        </div>
        <div class="col-lg-4">
            <h3>FAQ</h3>
            <p>This lockers are provided to current students.</p>
            <p>Reservations for a one-academic semester or one year.</p>
            <p>Each Student may apply for up 1 locker per semester.</p>
            <p>All Lockers must be returned and lockers emptied by the end of finals.</p>
        </div>
        <div class="col-lg-4">
            <h3>Locations</h3>
            <p>The lockers are located on the bottom floor near the cafeteria.</p>
        </div>
    </div>
    <div class="row text-center" style="margin:10em;">
        <p>CopyRight &copy 2021</p>
    </div>
</div>

<?php include("includes/footer.html"); ?>