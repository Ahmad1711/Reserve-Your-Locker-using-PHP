<?php
include("includes/header.html");
include("includes/init.php");
?>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><img src="images/baha.jpg" width="30px" height="24px"></a>
            <a class="navbar-brand" href="#"><img src="images/logo.PNG" width="30px" height="24px"></a>
            <a class="navbar-brand" href="#">Reserve Your Locker</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="success.php"> Home</a></li>
            <li><a href="contact_us.php"> Contact us</a></li>
            <li><a href="about_us.php"> About us</a></li>
            <li><a href="setting.php"> Setting</a></li>
            <li><a href="logout.php"> Logout</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <form action="locker_board.php" method="post" id="formid"></form>
    <div class="success row text-center">
        <h2>You Have been Successfully Signed in</h2>
        <i class="glyphicon glyphicon-ok"></i>
        <button type="submit" name="start" form="formid" class="btn btn-primary">Start</button>
    </div>
    <div class="row text-center" style="margin:10em;">
        <p>CopyRight &copy 2021</p>
    </div>
</div>

<?php include("includes/footer.html"); ?>