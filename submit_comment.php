<?php 
include_once('connection.php');

if (isset($_POST['video_id']) && isset($_POST['comment'])){


	$data = Array(
		  'userid'	=>$_POST['userid'],
		  'videoid'	=>$_POST['video_id'],
		  'comment'	=>$_POST['comment']
	  
		  );
		  

		$db->insert('comments', $data);
	
}else{
    error_log("Invalid request or missing data.");
}

?>