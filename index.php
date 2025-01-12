<?php 
include_once('connection.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


 $searchTerm = isset($_POST['search']) ? trim($_POST['search']) : '';



if (!empty($searchTerm)) {
    $searchTerm = '%'. $_POST['search']. '%';

    $db->where('Title', $searchTerm, 'LIKE');
     $db->orwhere('Tags', $searchTerm, 'LIKE');
 
    $_POST['search'] = "";
    unset($_POST['search']);
}
$db->orderBy('id', 'DESC');
$listdata = $db->get("videos");


?>
<!DOCTYPE html>
<html>
<head>
  <!-- Site made with Mobirise Website Builder v4.0.6, # -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.0.6, #">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
  <meta name="description" content="">
  
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  <style>
.comments-section {
margin-top: 20px;
}
.comments-list {
margin-bottom: 15px;
}
.comment {
padding: 10px;
border: 1px solid #ccc;
margin-bottom: 10px;
border-radius: 5px;
}
    </style>
  
</head>
<body>
<?php include_once ('header.php');?>
<br>
<br>
<br>
<?php if(isset($_SESSION['USERID'])) {?>
<section>
  
<div class="container">
        <div class="media-container-column title col-12 col-lg-8 offset-lg-2">
            <h2 class="align-center display-2 pb-2">
            Search A Video
            </h2>
            
        </div>

        <div class="py-2">
            <div class="row">
                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                    
                    <form class="mbr-form" action="index.php" method="post" name="job">
                        <div class="mbr-subscribe input-group">
                       
                            <input type="text" class="form-control" name="search" placeholder="search here"  value="<?php echo isset($_POST['search_term'])? htmlspecialchars($_POST['search_term']) : '';?>" id="search">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-primary btn-form">Search</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<hr>
<section >

<?php
							$i=0;
							
							foreach($listdata as $row) {
								$i = $i+1;
                            ?>
      <div class="container">                      
<div class="form-group row">
<div class="col-sm-3"></div>

<div class="col-sm-6">
<h5><?=$row['Title'] ?></h5>

<video  controls style = "width:100%;display:block !important;height:400px;">
  <source src="assets/videos/<?=$row['Src'] ?>" type="video/mp4">
  Your browser does not support HTML video.
</video>
<h5><?=$row['Tags'] ?></h5>
<div class = "comments-section">
<div id="comments-list-<?php echo $row['id']; ?>" class="comments-list">
<?php
    $db->where('videoid', $row['id']);

    $listdata1 = $db->get("comments");
    foreach($listdata1 as $row1) {   
        echo '<div class="comment" id="comment-'. $row1['commentid']. '">'.$row1['userid'].' &nbsp;&nbsp;<small>Posted On: '. $row1['entrydate']. '</small>';
         echo '<h6>'. htmlspecialchars($row1['comment']). '</h6>';
        echo '</div>';  
        
           }
    ?>
    </div>
   
    <input type = "hidden" id = "userid" name = "userid" value  = "<?php echo $_SESSION['USERID']?>" />
     <textarea style = "display:block;width:100%;margin-bottom:2px;" id="comment-input-<?php echo $row['id'];?>" placeholder="Write your comment..."></textarea>
      <button onclick="submitComment(<?php echo $row['id'];?>)"> Submit</button>
        </div>

                            </div>
                            <div class="col-sm-3"></div>
                            </div>
                            </div>
<hr>
<?php }?>

</section>

<?php } else {?>

    <section>
        <br>
<br>
<br>
        <h2 class = "align-center">Please Login First To Use This Service</h2>

        <br>
<br>
<br>
    </section>
<?php }?>
<?php include_once('footer.php');
?>

<script>
function submitComment(videoId) {

    var comment = document.getElementById('comment-input-' + videoId).value;
    var userid = document.getElementById('userid').value;
    if (comment === '') {
    alert('Please write a comment.');
    return;
    }
    
    // Send the comment to the server via AJAX
     var xhr = new XMLHttpRequest(); 
     xhr.open('POST', 'submit_comment.php', true);
    xhr.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {

    if (xhr.readyState== 4 && xhr.status == 200) {
    
    // Comment submitted successfully, clear the input field 
    document.getElementById('comment-input-' + videoId).value = '';
    // Reload the comments for this video
    loadComments(videoId);
    }
};
    var data = 'video_id=' + videoId + '&comment=' + encodeURIComponent(comment)+'&userid='+userid;
    console.log(data);
    xhr.send(data);
    }


    
function loadComments (videoId) {
// Fetch existing comments for the video via AJAX 

 var xhr = new XMLHttpRequest();
xhr.open('GET', 'load_comments.php?video_id=' + videoId, true);
xhr.onreadystatechange = function () {
if (xhr.readyState == 4 && xhr.status == 200) {
    document.getElementById('comments-list-' + videoId).innerHTML = xhr.responseText

}
// Update the comments section with the fetched comments 
};
xhr.send();
}


</script>

  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/jquery-mb-ytplayer/jquery.mb.ytplayer.min.js"></script>
  <script src="assets/jquery-mb-vimeo_player/jquery.mb.vimeo_player.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
</body>
</html>