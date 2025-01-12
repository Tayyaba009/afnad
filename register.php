<?php 
include_once('connection.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_POST['id'])){
	
	$db->where('email', $_POST['email']);
	$user = $db->get('register');
	if ($user != NULL) {
		header('Location: msg.php?h=Registration&msg=Given email is already registered&lnk=register.php&lnkmsg=click here to retry');
		exit (0);
	}
	
	$data = Array(
		'unm'=> $_POST['fullname'],
		'email'=> $_POST['email'],
		'Contact_no'=> $_POST['phoneno'],
		
		// 'u_type'=> $_POST['type'],
		'pwd'=> $_POST['password']
		);
		
	$user = $db->insert('register', $data);
  if($user){

 header('Location: login.php');
    
  } else
  {
    header('Location: msg.php?h=Login&msg=Some thing went wrong');
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
  <title>Register</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>


<section class="menu cid-qqBgi5rudE" id="menu1-0" data-rv-view="120">
    
    <!-- Block parameters controls (Blue "Gear" panel) -->
    
    <!-- End block parameters -->

    <nav class="navbar navbar-dropdown align-items-center navbar-fixed-top navbar-toggleable-sm">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <div class="hamburger">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </button>
        <div class="menu-logo">
            <div class="navbar-brand">
                <span class="navbar-logo">
                    <a href="index.php">
                         <img src="assets/images/logo2.png" alt="Mobirise" media-simple="true">
                    </a>
                </span>
                <span class="navbar-caption-wrap">
                    <a class="navbar-caption text-white" href="#">
                    COM 769
                    </a>
                </span>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                   <ul class="navbar-nav nav-dropdown" data-app-modern-menu="true">
       
                <?php if(!isset($_SESSION['USERID'])) {?>
                <li class="nav-item">
                    <a class="nav-link link text-white" href="login.php">
                        
                        Login
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link link text-white" href="register.php">
                        
                        Register
                    </a>
                </li>
                <?php } else { ?>
                    <li class="nav-item">
                    <a class="nav-link link text-white" href="index.php">
                        
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link link text-white" href="logout.php">
                        
                        Logout
                    </a>
                </li>
                <?php }?>


            </ul>
            
        </div>
    </nav>
</section>




<section class="mbr-section info3 cid-qpeF4iMotk" id="info3-c" data-rv-view="141">
    <div class="container">
        <div class="media-container-column title col-12 col-md-10 offset-md-1">
            <h2 class="align-left display-2 mbr-bold mbr-white pb-3">
                Register With Us</h2>
            
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
                Registeration Form</h2>
            
        </div>
    </div>

    <div class="container">
        <div class="media-container-column col-lg-8 offset-lg-2" data-form-type="formoid">
                

                <form action="register.php" method="post" name="registerform" class="mbr-form" id="registerform">
                   
                        <div class="col-md-8 multi-horizontal" data-for="name">
                            <div class="form-group">
                              <label class="form-control-label" for="fullname">Full Name *</label>
                                <input type="text" class="form-control" name="fullname" data-form-field="Name" required = "required" pattern="[A-Za-z\s]{3,}" title = "please enter only letters" id="fullname"  >
                            </div>
                        </div>
                        
                        <div class="col-md-8 multi-horizontal" data-for="phone">
                          <div class="form-group">
                            <label class="form-control-label" for="phone-form1-d">Contact No: </label>
                            <input type="tel" class="form-control" name="phoneno" data-form-field="Phone" id="phoneno"  title="only enter digits" required="required">
                            </div>
                        </div>
                   
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
                        <div class="col-md-8 multi-horizontal" data-for="password2">
                          <div class="form-group">
                            <label class="form-control-label" for="password2">Re-type Password</label>
                              :
                            <input type="password" class="form-control" name="password2" data-form-field="password2" required id="password2">
                            </div>
                            
                            
                        </div>
					<input name="id" type="hidden" id="id" value="0">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-form">SEND FORM</button>
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