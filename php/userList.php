<?php
while ($row = mysqli_fetch_assoc($sql)) {
    $output .= '<div class="user-card">
                    <a href="chat.php?user_id='.$row['unique_id'] .'" alt="">

                   <div class="content" style="background-image: url(php/images/'.$row['profilePhoto'].')";>

                     
                </div>
                <span>'. $row['firstName'] .'</span>

                    </a>   

                        </div> ';
}

?>