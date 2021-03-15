<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();   
    if (!isset($_SESSION['unique_id'])) {
        header("location: login.php");
    }
    else{
        include_once "config.php";
        $out_id = mysqli_real_escape_string($conn, $_POST['out_id']);
        $in_id = mysqli_real_escape_string($conn, $_POST['in_id']);
        $message= mysqli_real_escape_string($conn, $_POST['message']);


        if(!empty($message)){
            $sql = mysqli_query($conn, "INSERT INTO messages (in_message_id, out_message_id, message) VALUES ({$in_id}, {$out_id}, '{$message}')") or die();
        }
    }
?>
