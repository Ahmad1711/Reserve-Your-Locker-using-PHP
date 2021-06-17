<?php
include("includes/header.html");
include("includes/init.php");
if (isset($_POST["signup"])) {
	$stunumber = $_POST["stunumber"];
	$name = $_POST["stuname"];
	$email = $_POST["stuemail"];
	$pass = $_POST["stupass"];
	signup($stunumber, $name, $email, $pass);
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
			<li><a href="login.php"> Login</a></li>
			<li><a href="signup.php"> Sign Up</a></li>
			<li><a href="contact_us.php"> Contact us</a></li>
			<li><a href="about_us.php"> About us</a></li>
		</ul>
	</div>
</nav>
<div class="container">
	<div class="login-form-grids">
		<form id="signup" action="" method="post" autocomplete="off">

			<label>Number ID :</label> <span style="color:red" id="numbererror">*</span>
			<input type="text" name="stunumber" placeholder="Enter your Number ID" id="number">

			<label>Student Name :</label> <span style="color:red" id="nameerror">*</span>
			<input type="text" name="stuname" placeholder="Enter your Name" id="name">

			<label>Email :</label> <span style="color:red" id="emailerror">*</span>
			<input type="email" name="stuemail" placeholder="Enter your Email Address" id="email">

			<label>Password :</label> <span style="color:red" id="passerror">*</span>
			<input type="password" name="stupass" placeholder="Enter Password" id="pass">

			<label>Confirm Password :</label> <span style="color:red" id="cpasserror">*</span>
			<input type="password" placeholder="Enter confirm Password" id="cpass">
			<span style="color:red" id="matcherror"></span>
			<input type="submit" name="signup" value="New Account">
		</form>
	</div>
	<div class="row text-center">
		<p>CopyRight &copy 2021</p>
	</div>
</div>

<?php include("includes/footer.html"); ?>