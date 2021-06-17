<?php
session_start();
$con = mysqli_connect("localhost", "root", "", "reserve_locker");
$message = "";
mysqli_set_charset($con, "utf8");

function signup($stunumber, $name, $email, $pass)
{
    global $con;
    $pass=md5($pass);
    $query = "insert into student(stunumber,name,email,password) values('$stunumber','$name','$email','$pass')";
    if (mysqli_query($con, $query)) {
        header("location:login.php");
    } else {
        header("location:signup.php");
    }
}
//----------------------------------------------------------------------
function login($email,$pass)
{
    global $con, $message;
    $pass=md5($pass);
    $query = "select id,stunumber from student where email='$email' and password='$pass'";
    $result = mysqli_query($con, $query);
    $student = mysqli_fetch_array($result);
    if ($student) {
        $_SESSION["stuid"] = $student["id"];
        $_SESSION["stunumber"] = $student["stunumber"];
        if (!empty($_POST["remember"])) {
            setcookie("stuemail", $email, time() + (60));
            setcookie("stupass", $pass, time() + (60));
        } else {
            if (isset($_COOKIE["stuemail"])) {
                setcookie("stuemail", "");
            }
            if (isset($_COOKIE["stupass"])) {
                setcookie("stupass", "");
            }
        }
        $result = check_student_reservation($_SESSION["stuid"]);
        if (mysqli_num_rows($result) == 1) {
            header("location:sorry.php");
        } else {
            header("location:success.php");
        }
    } else {
        $message = "Email or Password is incorrect";
    }
}
//----------------------------------------------------------------------------
function select_locker($locker_id,$period_id)
{
    $_SESSION["locker_id"] =$locker_id;
    // $_SESSION["locker_name"]=$locker_name;
    $_SESSION["period_id"] = $period_id;
    header("location:payment.php");
    
}
//----------------------------------------------------------------------------
// function get_locker_id($locker_name){
//     global $con;
//     $query = "select id from locker where locker_name='$locker_name'";
//     $result = mysqli_query($con, $query);
//     $row = mysqli_fetch_array($result);
//     return $row["id"];
// }
//---------------------------------------------------------------------------
function select_payment($method)
{
    $_SESSION["method"] = $method;
    if ($_SESSION["method"] == "Online") {
        header("location:credit.php");
    }
    if ($_SESSION["method"] == "Cash") {
        global $con;
        $stuid = $_SESSION["stuid"];
        $query = "insert into payment_info(payment_type,stuid) values('Cash','$stuid')";
        if (mysqli_query($con, $query)) {
            save();
            header("location:booked.php");
        } 
       
    }
}
//-------------------------------------------------------------------------------
function select_card_number($cardnumber,$exp_date,$cvc){
    $cardnumber=md5($cardnumber);
    $_SESSION["cardnumber"] = $cardnumber;
    $_SESSION["exp_date"] = $exp_date;
    $_SESSION["cvc"] = $cvc;
    $stuid = $_SESSION["stuid"];
    global $con;
    $query = "insert into payment_info(payment_type,card_number,exp_date,cvc,stuid) values('Online','$cardnumber','$exp_date','$cvc','$stuid')";
    if (mysqli_query($con, $query)) {
        save();
    } 
    
}
//-------------------------------------------------------------------------------
function get_all_lockers(){
    global $con;
    $query = "select * from locker";
    $result = mysqli_query($con, $query);
    return $result;
}
//------------------------------------------------------------------------------
function save()
{
    global $con;
    $stuid = $_SESSION["stuid"];
    $lockerid = $_SESSION["locker_id"];
    $period_id=$_SESSION["period_id"];
    $appointment=date('d-m-y');
    $res_date = date('d-m-y');
    $insert = "insert into resbill(stuid,lockerid,period_id,appointment,res_date) values('$stuid','$lockerid','$period_id','$appointment','$res_date')";
    if(mysqli_query($con, $insert)){
        $status = "Reserved";
        $update = "update locker set status='$status' where id='$lockerid'";
        mysqli_query($con, $update);
        //send email
        $to=get_stu_email($stuid);
        $from="reserve_your_locker@gmail.com";
        $fromname="reserve_your_locker";
        $subject="Reserve_Your_Locker";
        $content=file_get_contents('email.php');
        $header='From :'.$fromname.'<'.$from.'>';
        // mail($to,$subject,$content,$header);
    }
    header("location:booked.php");

}
//-----------------------------------------------------------------------------------
function admin_login($email, $pass)
{
    global $con, $message;
    $query = "select username from admin where email='$email' and password='$pass'";
    $result = mysqli_query($con, $query);
    $user = mysqli_fetch_array($result);
    if ($user) {
        $_SESSION["username"] = $user["username"];
        if (!empty($_POST["remember"])) {
            setcookie("adminemail", $email, time() + (60));
            setcookie("adminpass", $pass, time() + (60));
        } else {
            if (isset($_COOKIE["adminemail"])) {
                setcookie("adminemail", "");
            }
            if (isset($_COOKIE["adminpass"])) {
                setcookie("adminpass", "");
            }
        }
        header("location:admin.php");
    } else {
        $message = "Email or Password is incorrect";
    }
}
//----------------------------------------------------------------------------------------
function get_all_bills(){
    global $con;
    $query = "select * from locker,resbill,student,payment_info,period where locker.id=resbill.lockerid and student.id=resbill.stuid and period.id=resbill.period_id and payment_info.stuid=resbill.stuid";
    $result = mysqli_query($con, $query);
    return $result;
}
//----------------------------------------------------------------------------------------
function edit_locker_status($lockerid,$status)
{
    global $con;
    if($status=="Available"){
        $query = "update locker set status='$status' where id='$lockerid'";
        if (mysqli_query($con, $query)) {
            $query = "delete from resbill where lockerid='$lockerid'";
            if (mysqli_query($con, $query)) {
                header("location:admin.php");
            }
        }
    }
    
}
//-----------------------------------------------------------------------------------------
function get_stu_email($stuid){
    global $con;
    $query = "select email from student where id='$stuid'";
    $result = mysqli_query($con, $query);
    $row=mysqli_fetch_array($result);
    return $row["email"];
}
//--------------------------------------------------------------------------------------------
function get_stu_info($id){
    global $con;
    $query = "select * from student where id='$id'";
    $result = mysqli_query($con, $query);
    return $result;
}
//-------------------------------------------------------------------------------------------
function edit($id,$name, $email, $pass)
{
    global $con,$message;
    $query = "update student set name='$name',email='$email',password='$pass' where id='$id'";
    if (mysqli_query($con, $query)) {
        $message = "update Information Successfully";
    } 
}
//----------------------------------------------------------------------------------------------
function check_student_reservation($id){
    global $con;
    $query = "select locker_name,lockerid from locker join resbill on locker.id=resbill.lockerid where resbill.stuid='$id'";
    $result = mysqli_query($con, $query);
    return $result;
}
?>