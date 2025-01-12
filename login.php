<?php 
include_once('connection.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
unset($_SESSION['FULLNAME']) ; 
unset($_SESSION['USERID']);


if(isset($_POST['email'])){
	
	$db->where('email', $_POST['email']);
	$db->where('pwd', $_POST['password']);
	$user = $db->getOne('register');
	if ($user != NULL){
		$_SESSION['FULLNAME'] = $user['Unm'];
		$_SESSION['USERID'] = $user['id'];
		header('Location: index.php');
		
	} else
	{
		header('Location: msg.php?h=Login&msg=Invalid user name or password&lnk=login.php&lnkmsg=Click here to retry');
		exit (0);
	}
		
}
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
  <title>Login</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i">
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
                Login here</h2>
            <h3 class="mbr-section-subtitle align-left display-5 mbr-light mbr-white pb-3">
                </h3>
            <p class="mbr-text align-left mbr-white display-7">
                 .
            </p>
            
        </div>
    </div>
</section>

<section class="mbr-section form1 cid-qpeFYbQqq9" id="form1-d" data-rv-view="144">
    
    <!-- Block parameters controls (Blue "Gear" panel) -->   
    
    <!-- End block parameters -->

    
    <div class="container">
        <div class="media-container-column title col-12 col-lg-8 offset-lg-2">
            <h2 class="mbr-section-title align-center display-2 pb-3">
                Login </h2>
            <h3 class="mbr-section-subtitle align-center mbr-light display-5 pb-3">
                To continue please login.
            </h3>
        </div>
    </div>

    <div class="container">
        <div class="media-container-column col-lg-8 offset-lg-2" data-form-type="formoid">
                

                <form action="login.php" method="post" name="registerform" class="mbr-form" id="registerform">
                  <div class="col-md-8 multi-horizontal" data-for="email">
                            <div class="form-group">
                              <label class="form-control-label" for="password">Email</label>
                                :
                              <input type="email" class="form-control" name="email" data-form-field="Email" required id="email">
                   </div>
                  </div>
                        
                        <div class="col-md-8 multi-horizontal" data-for="password">
                          <div class="form-group">
                            <label class="form-control-label" for="password">Password</label>
                              :
                            <input type="password" class="form-control" name="password" data-form-field="password" required id="password">
                            </div>
                            
                            
                        </div>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-form">LOGIN</button>
                    </span>
                   
                    
                </form>
        </div>
    </div>
</section>

<?php include "footer.php" ?>

  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smooth-scroll/smooth-scroll.js"></script>
  <script src="assets/validation/jquery.validate.js"></script>
  <script src="assets/validation/additional-methods.js"></script>
  
  <script src="assets/dropdown/js/script.min.js"></script>
  <script src="assets/touch-swipe/jquery.touch-swipe.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
</body>

<script>
$('form').validate({
			rules : {
				password : {
					minlength : 5
				},
				password2 : {
					minlength : 5,
					equalTo : "#password"
				}
			}
		}); 
</script>
</html>