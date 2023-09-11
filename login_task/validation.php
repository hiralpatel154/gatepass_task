<?php
include('dbcon.php');
if (isset($_POST['empid'])) {
    $empid = $_POST['empid'];

    $sql = "SELECT count(sr_no) as count FROM employees where emp_id = '$empid'";
    $run = sqlsrv_query($con, $sql);
    $row = sqlsrv_fetch_array($run, SQLSRV_FETCH_ASSOC);
    if ($row['count'] > 0) {
        $print = 'Yes';
    } else {
        $print = 'No';
    }
    echo $print;
}

//Email validation
if (isset($_POST['empemail'])) {
    
        $empemail = $_POST['empemail'];
        $sql = "SELECT count(sr_no) as count FROM employees where emp_email='$empemail'";
        $result = sqlsrv_query($con, $sql);
        $row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);

        if ($row['count'] > 0) {
            $response = 'exist';
        } else {
            $response = 'not exist';
        }
        echo $response;
    

}
?>