<?php
include_once('connection.php');

if(isset($_GET['video_id'])){


    $db->where('videoid', $_GET['video_id']);

    $listdata1 = $db->get("comments");
    foreach($listdata1 as $row1) {   
        echo '<div class="comment" id="comment-'. $row1['commentid']. '">'.$row1['userid'].' &nbsp;&nbsp;<small>Posted On: '. $row1['entrydate']. '</small>';
         echo '<h6>'. htmlspecialchars($row1['comment']). '</h6>';
        echo '</div>';  
        
           }
       }
    ?>