<?php
include("includes/header.html");
include("includes/init.php");
if (isset($_POST["term"]) && isset($_POST["locker_id"])) {
    $locker_id = $_POST["locker_id"];
    $period_id = 1;
    select_locker($locker_id, $period_id);
}
if (isset($_POST["year"]) && isset($_POST["locker_id"])) {
    $locker_id = $_POST["locker_id"];
    $period_id = 2;
    select_locker($locker_id, $period_id);
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
        <p>Choose The Locker available to you :</p>
    </div>
    <form action="" method="post">
        <?php
        $result = get_all_lockers();
        echo '<div class="row">';
        while ($row = mysqli_fetch_array($result)) {
            echo '<div class="col-lg-3">
                 <input title="building : ' . $row["building"] . ' , status : ' . $row["status"] . '" type="radio" name="locker_id" value="' . $row["id"] . '"';
            if ($row["status"] == "Reserved") echo 'disabled';
            echo '>' . $row["locker_name"] .
                '</div>';
        }
        echo '</div>';
        ?>
        <div class="row">
            <div class="col-lg-6"><input type="submit" name="term" value="one Term 50$"></div>
            <div class="col-lg-6"><input type="submit" name="year" value="one Year 100$"></div>
        </div>
    </form>
    <div class="row text-center" style="margin:3em;">
        <p>CopyRight &copy 2021</p>
    </div>
</div>
<?php include("includes/footer.html"); ?>