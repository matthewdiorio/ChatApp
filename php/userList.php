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

/*
<a href="chat.php?user_id='.$row['unique_id'] .'" alt="">
<div class="content">
<img src="php/images/'. $row['profilePhoto'] .'" alt="">
<div class="details">
<span>'. $row['firstName'] . ' ' . $row['lastName'] . '</span>

</div>
</div>
<div class="status-dot ' . $offline . '"><i class="fas fa-circle"></i></div>
</a>




                            <div class="thumbnail" style="background-image: url(php/images/'.$row['profilePhoto'].');>

 */
?>