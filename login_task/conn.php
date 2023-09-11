<?php
// Create connection with mysql
$conn = new mysqli('localhost', 'root', '');
if (!$conn) {
    echo "connection with mysql is not established";
} else {
    // echo "connection with mysql is established";
}

// Create Database
// $sql = "CREATE Database store";
// $db = mysqli_query($conn, $sql);
// if ($db) {
//     echo "Database Created Successully!";
// } else {
//     echo "Error in creating database", mysqli_connect_error();
// }

 
//connect with database
$sdb = mysqli_select_db( $conn,'store' );
if($sdb){
    // echo "Database selected!";
}

// Create Table
$sql = "CREATE TABLE users(id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, name VARCHAR(30) NOT NULL,email VARCHAR(50), password VARCHAR(100))";
// $result = mysqli_query( $conn,$sql );

// if(!$result ) {
//     echo 'Could not create table: ' ,mysqli_error();
// }else{
//     echo 'table created ';
// }
?>