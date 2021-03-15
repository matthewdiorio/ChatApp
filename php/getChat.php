<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
if (!isset($_SESSION['unique_id'])) {
    header("location: login.php");
} else {
    include_once "config.php";
    $out_id = mysqli_real_escape_string($conn, $_POST['out_id']);
    $in_id = mysqli_real_escape_string($conn, $_POST['in_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $messageList = "";

    $sql = "SELECT * FROM messages 
    LEFT JOIN users ON users.unique_id = messages.out_message_id
    WHERE (out_message_id = {$out_id} 
    AND in_message_id = {$in_id}) OR (out_message_id = {$in_id} AND in_message_id = {$out_id}) ORDER BY message_id";
    $query = mysqli_query($conn, $sql);
    if (mysqli_num_rows($query) > 0) {

        while ($row = mysqli_fetch_assoc($query)) {
            if ((int)$row['out_message_id'] == $out_id) { // user is the sender
                
                $messageList .= '<div class="chat out">
                                         <div class="message">
                                            <p>' . $row['message'] . '</p>
                                         </div>
                                     </div>';
            } else { // user is the reciever

                $messageList .= '<div class="chat in">
                                         <img src="php/images/'. $row['profilePhoto'] . '" alt="">
                                          <div class="message">
                                          <p>' . $row['message'] . '</p>
                                           </div>
                                    </div>';
            }
        }
        echo $messageList;
    }

}
