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
            <li><a href="success.php"> Home</a></li>
            <li><a href="contact_us.php"> Contact us</a></li>
            <li><a href="about_us.php"> About us</a></li>
            <li><a href="setting.php"> Setting</a></li>
            <li><a href="logout.php"> Logout</a></li>
        </ul>
    </div>
</nav>
<div class="container">
    <div class="success row text-center">
        <h2>You Locker has been booked Successfully</h2>
        <i class="glyphicon glyphicon-ok"></i>
        <!-- <p>Your barcode is :</p>
        <i class="glyphicon glyphicon-barcode"></i> -->
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
    <div class="row text-center" style="margin:4em;">
        <p>Note: You will receive an email</p>
        <p>Thank you for using <a href="#">Reserve Locker</a></p>
        <p>CopyRight &copy 2021</p>
    </div>
</div>

<?php include("includes/footer.html"); ?>