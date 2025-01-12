
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
