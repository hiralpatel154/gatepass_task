<?php
session_start();

include 'dbcon.php';
if (isset($_POST['submit'])) {
    $emp_id = $_POST['emp_id'];
    $emp_name = $_POST['emp_name'];
    $emp_email = $_POST['emp_email'];
    $password = $_POST['password'];
    $dob = $_POST['dob'];
}
if (!empty($emp_email)) {
    $sql = "INSERT INTO employees (emp_id,emp_name, emp_email, password,dob) VALUES ('$emp_id', '$emp_name', '$emp_email','$password','$dob')";
    $result = sqlsrv_query($con, $sql);

    if ($result) {
        $_SESSION['success'] = "<div class='alert alert-success alert-dismissible fade show'>User Registered Successfully <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>";
        header('Location: login.php');
    } else {
        $_SESSION['error'] = "error";
        header('Location: index.php');
    }
}


?>