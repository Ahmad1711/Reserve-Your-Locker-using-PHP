<?php
include("includes/header.html");
include("includes/init.php");
if (isset($_POST["edit"])) {
    $name = $_POST["stuname"];
    $email = $_POST["stuemail"];
    $pass = $_POST["stupass"];
    edit($_SESSION["stuid"],$name, $email, $pass);
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
    <div class="login-form-grids">
        <form id="signup" action="" method="post" autocomplete="off">
            <?php
            $result=get_stu_info($_SESSION["stuid"]);
            $row=mysqli_fetch_array($result);
            echo '
            <label>Student Name :</label> <span style="color:red" id="nameerror">*</span>
            <input type="text" name="stuname" value="'.$row["name"]. '"  id="name">

            <label>Email :</label> <span style="color:red" id="emailerror">*</span>
            <input type="email" name="stuemail" value="' . $row["email"] . '"  id="email">

            <label>Password :</label> <span style="color:red" id="passerror">*</span>
            <input type="password" name="stupass" value="' . $row["password"] . '"  id="pass">

            <input type="submit" name="edit" value="Edit Info">
            ';
            ?>
        </form>
    </div>
    <div class="row text-center text-danger">
        <?php
        if(isset($message)){
            echo $message;
        }
        ?>
    </div>
    <div class="row text-center">
        <p>CopyRight &copy 2021</p>
    </div>
</div>

<?php include("includes/footer.html"); ?>