<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once "config.php";
$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
$out_id = $_SESSION['unique_id'];
$output = "";
$sql = mysqli_query($conn, "SELECT * FROM users 
                            WHERE NOT unique_id = {$out_id} 
                            AND (firstName LIKE '%{$searchTerm}%' OR lastName LIKE '%{$searchTerm}%')");
if (mysqli_num_rows($sql) > 0) {
   include 'userList.php';

} else {
    $output .= "No users found...";
}

echo $output;
