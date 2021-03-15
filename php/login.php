<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include_once "config.php";
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

if (!empty($email) && !empty($password)) {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
    if (mysqli_num_rows($sql) > 0) {
        $row = mysqli_fetch_assoc($sql);
        if (password_verify($password, $row['password'])) {
            $status = "Active";
            $updateStatusQuery = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
            if ($updateStatusQuery) {
                $_SESSION['unique_id'] = $row['unique_id'];
                echo "success";
            }

        } else {
            echo "Email or password is incorrect.";
        }

    } else {
        echo "Email or password is incorrect.";
    }
} else {
    echo 'All fields are required.';
}
