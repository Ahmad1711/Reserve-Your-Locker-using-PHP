<?php
include("includes/init.php");
include("includes/header.html");
if (isset($_POST["save"])) {
    $lockerid = $_POST["lockerid"];
    $status = $_POST["status"];
    edit_locker_status($lockerid, $status);
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
            <li><a href="admin.php"> Home</a></li>
            <li><a href="contact_us.php"> Contact us</a></li>
            <li><a href="about_us.php"> About us</a></li>
            <li><a href="admin_logout.php">Logout</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="list-group">
                <a href="admin.php" class="list-group-item">Reservation Guide</a>
                <a href="#" class="list-group-item">Lockers</a>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">Lockers Info</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Locker name</th>
                                    <th>Building</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = get_all_lockers();
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '
                                    <tr>
                                    <td>' . $row["locker_name"] . '</td>
                                    <td>' . $row["building"] . '</td>
                                    <form action="" method="post">
                                    <input type="hidden" name="lockerid" value="' . $row["id"] . '">
                                    <td>
                                    <select class="form-control" name="status">
                                    <option value="' . $row["status"] . '">' . $row["status"] . '</option>';
                                    if ($row["status"] == "Reserved") {
                                        echo '<option value="Available">Available</option>';
                                    }
                                    echo '
                                    </select>
                                    </td>
                                    <td>
                                    <input type="submit" class="form-control" value="Save" name="save">
                                    </td>
                                    </form>
                                    </tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row text-center" style="margin:5em;">
        <p>CopyRight &copy 2021</p>
    </div>
</div>
<?php include("includes/footer.html"); ?>