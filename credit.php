<?php
include("includes/init.php");
include("includes/header.html");
if (isset($_POST["cancel"])) {
    header("location:payment.php");
}
if (isset($_POST["pay"])) {
    $cardnumber = $_POST["cardnumber"];
    $exp_date = $_POST["exp_date"];
    $cvc = $_POST["cvc"];
    select_card_number($cardnumber,$exp_date,$cvc);
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

<div class="login-form-grids">
    <p class="text-center">You can Pay by Credit Card : </p>
    <form id="credit" action="" method="post">
        <label>Card holders name :</label> <span style="color:red" id="chnameerror">*</span>
        <input type="text" placeholder="Card holders name" id="chname">
        <label>Card number :</label> <span style="color:red" id="cnerror">*</span>
        <input type="text" name="cardnumber" placeholder="Card number" id="cn">
        <div class="row">
            <div class="col-lg-6">
                <label>Expire Date :</label>
                <input type="text" name="exp_date" placeholder="MM\YY">
            </div>
            <div class="col-lg-6">
                <label>Security Code :</label>
                <input type="text" name="cvc" placeholder="CVC">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <input type="submit" name="cancel" value="Cancel">
            </div>
            <div class="col-lg-6">
                <input type="submit" name="pay" value="Pay">
            </div>
        </div>
    </form>
</div>
<?php include("includes/footer.html"); ?>