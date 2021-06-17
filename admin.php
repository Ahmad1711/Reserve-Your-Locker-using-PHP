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
                <a href="#" class="list-group-item">Reservation Guide</a>
                <a href="lockers.php" class="list-group-item">Lockers</a>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="panel panel-default">
                <div class="panel-heading">Reservation Guide</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Locker</th>
                                    <th>Reserved By</th>
                                    <th>Period Type</th>
                                    <th>Payment Type</th>
                                    <th>appointment</th>
                                    <th>Reservation Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $result = get_all_bills();
                                while ($row = mysqli_fetch_array($result)) {
                                    echo '
                                    <tr>
                                    <td>' . $row["locker_name"] . '</td>
                                    <td>' . $row["stunumber"] . '</td>
                                    <td>' . $row["period_type"] . '</td>
                                    <td>' . $row["Payment_type"] . '</td>
                                    <td>' . $row["appointment"] . '</td>
                                    <td>' . $row["res_date"] . '</td>
                                    </tr>
                                    ';
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