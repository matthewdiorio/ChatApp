<?php 
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
    include_once "config.php";
    $out_id = $_SESSION['unique_id'];
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE NOT unique_id = {$out_id}");
    $output = "";
    if(mysqli_num_rows($sql) == 1){
        $output = "No users are available to chat";
    } elseif(mysqli_num_rows($sql) > 0){
        include "userList.php";
    }
    echo $output;
?>