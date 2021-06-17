<?php
include("includes/header.html");
include("includes/init.php");
if (isset($_POST["login"])) {
    $email = $_POST["adminemail"];
    $pass = $_POST["adminpass"];
    admin_login($email, $pass);
}
?>
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="#"><img src="images/baha.jpg" width="30px" height="24px"></a>
            <a class="navbar-brand" href="#"><img src="images/logo.PNG" width="30px" height="24px"></a>
            <a class="navbar-brand" href="#">Reserve Your Locker</a>
        </div>
        <!-- <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php"> Login</a></li>
            <li><a href="signup.php"> Sign Up</a></li>
        </ul> -->
    </div>
</nav>

<div class="container">
    <div class="login-form-grids">
        <form action="" method="post" autocomplete="off">

            <label>Email :</label> <span style="color:red" id="emailerror">*</span>
            <input type="email" value="<?php if (isset($_COOKIE["adminemail"])) {
                                            echo $_COOKIE["adminemail"];
                                        } ?>" name="adminemail" placeholder="Email">

            <label>Password :</label> <span style="color:red" id="passerror">*</span>
            <input type="password" value="<?php if (isset($_COOKIE["adminpass"])) {
                                                echo $_COOKIE["adminpass"];
                                            } ?>" name="adminpass" placeholder="Password">

            <!-- <label>Forget Password ?</label> -->
            <input type="submit" name="login" value="Login">

            <input type="checkbox" name="remember" <?php if (isset($_COOKIE["adminemail"])) { ?>checked<?php } ?>> <label>Remember Me</label><br />
            <!-- <label>Don't have an account ?</label> <a href="signup.php">Signup</a> -->
        </form>
    </div>
    <div class="text-danger text-center"><?php if (isset($message)) {
                                                echo $message;
                                            } ?></div>
    <div class="row text-center" style="margin:5em;">
        <p>CopyRight &copy 2021</p>
    </div>
</div>

<?php include("includes/footer.html"); ?>