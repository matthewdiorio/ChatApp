<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
    session_start();
    $logout_id = $_SESSION['unique_id'];
    if(isset($_SESSION['unique_id'])){
        include_once "config.php";
        if(isset($logout_id)){
            $status = "Offline";
            $sql = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = '{$logout_id}'");
            if($sql){  
                session_destroy();
                session_unset();
                header("location: ../login.php");

            }
        } else {
       
           header("location: ../users.php");

        }
    } else {
        header("location: ../login.php");
    }
?>