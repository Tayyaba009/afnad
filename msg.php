<?php 
include_once('connection.php');

?>
<!DOCTYPE html>
<html>
<head>
  <!-- Site made with Mobirise Website Builder v4.0.6, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.0.6, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
  <meta name="description" content="Web Page Generator Description">
  <title>  COM 769</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>

<?php include "header.php" ?>



<section class="mbr-section info3 cid-qpeF4iMotk" id="info3-c" data-rv-view="141">

    <!-- Block parameters controls (Blue "Gear" panel) -->    
    
    <!-- End block parameters -->

    

    <div class="container">
        <div class="media-container-column title col-12 col-md-10 offset-md-1">
            <h2 class="align-left display-2 mbr-bold mbr-white pb-3">
                <?=isset($_GET['h'])? $_GET['h']:''?></h2>
            
            
        </div>
    </div>
</section>

<section class="mbr-section form1 cid-qpeFYbQqq9" id="form1-d" data-rv-view="144">
    
    <!-- Block parameters controls (Blue "Gear" panel) -->   
    
    <!-- End block parameters -->

    
    <div class="container">
        <div class="media-container-column title col-12 col-lg-8 offset-lg-2">
            <h2 class="mbr-section-title align-center display-2 pb-3">
                <?=isset($_GET['h'])? $_GET['h']:''?></h2>
            <h3 class="mbr-section-subtitle align-center mbr-light display-5 pb-3">
                <?=isset($_GET['msg'])? $_GET['msg']:''?>.
            </h3>
            <p class="align-center">
             <a class="btn btn-info" href="<?=isset($_GET['lnk'])? $_GET['lnk']:''?>">
                 <?=isset($_GET['lnkmsg'])? $_GET['lnkmsg']:''?> 
                 </a>
                 </p>
        </div>
    </div>

    
</section>

<?php include "footer.php" ?>

  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
</body>
</html>