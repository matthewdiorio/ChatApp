<?php
while($row = mysqli_fetch_assoc($sql)){
            $lastMessageQuery = mysqli_query($conn, "SELECT * FROM messages 
                                                WHERE (in_message_id = {$row['unique_id']}
                                                OR out_message_id = {$row['unique_id']})
                                                AND (out_message_id = {$out_id}
                                                OR in_message_id = {$out_id})
                                                ORDER BY message_id DESC LIMIT 1");
            $lastMessage =  mysqli_fetch_assoc($lastMessageQuery);
            if(mysqli_num_rows($lastMessageQuery) > 0){
                $result = $lastMessage['message'];
            } else {
                $result = "No messages";
            }

            if(strlen($result > 25)){
                $message = substr($result, 0, 25) . '...';
            } else {
                $message = $result;
            }

            if($lastMessage !== null && $out_id == $lastMessage['out_message_id']){
                $you = "You: ";
            } else {
                $you = "";
            }
            if($row['status'] == "Offline"){
                $offline = "offline";
            } else {
                $offline = "";
            }
            $output .= ' <a href="chat.php?user_id='.$row['unique_id'] .'" alt="">
                            <div class="content">
                                <img src="php/images/'. $row['profilePhoto'] .'" alt="">
                                <div class="details">
                                  <span>'. $row['firstName'] . ' ' . $row['lastName'] . '</span>
                                  <p>'. $you .$message . '</p>
                                </div>
                             </div>
                             <div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
                         </a>';
        }
?>