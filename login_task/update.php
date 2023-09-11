<?php
include("auth_session.php");
include('dbcon.php');
if(isset($_POST['submit'])){
    $sr_no = $_POST['sr_no'];
    $emp_id = $_POST['empid'];
    $emp_name = $_POST['emp_name'];
    $DOB = $_POST['dob'];
    $password = $_POST['password'];

    $sql = "UPDATE employees SET emp_id='$emp_id', emp_name='$emp_name',DOB = '$DOB',password='$password' where sr_no=$sr_no";
    $result=sqlsrv_query($con, $sql);
    if($result){
        header('location: dashboard.php');
    }else{
        die(print_r( sqlsrv_errors(), true));
    }
}


?>