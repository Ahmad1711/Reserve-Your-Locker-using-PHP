<?php
include("includes/init.php");
include("includes/header.html");
if (isset($_POST["credit"])) {
    $method = "Online";
    select_payment($method);
}
if (isset($_POST["cash"])) {
    $method = "Cash";
    select_payment($method);
}
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
    <div class="row text-center">
        <p>Please Choose The Payment Method :</p>
    </div>
    <form action="" method="post">
        <div class="row">
            <div class="col-lg-6">
                <i class="glyphicon glyphicon-credit-card"></i>
                <input type="submit" name="credit" value="Pay by credit card">
            </div>
            <div class="col-lg-6">
                <i class="glyphicon glyphicon-usd"></i>
                <input type="submit" name="cash" value="Pay Cash">
            </div>
        </div>
    </form>
    <div class="row text-center" style="margin:6em;">
        <p>Note: The request Expired after 24 hours</p>
    </div>
    <div class="row text-center">
        <p>CopyRight &copy 2021</p>
    </div>
</div>

<?php include("includes/footer.html"); ?>