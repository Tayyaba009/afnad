<?php

//$db->where('type', $_SESSION['USERTYPE']);
$menu = $db->get('menu');

?>


<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?=$mUserName?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        
        <?php 
		$i=0;
		while ( $i<count($menu))
		{
			?>
        <li class="active treeview">
          <a href="#">
            <i class=""></i> <span><?php echo $menu[$i]['title'];?></span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          
          <?php $i++;
		  while($i<count($menu) && $menu[$i]['grp'] == false)
		  { ?>
            <li class="active"><a href="index.php?cmd=<?=$menu[$i]['cmd']?>"><i class="fa fa-circle-o"></i> <?=$menu[$i]['title']?></a></li> <?php $i++;
			 }?>
          
           
            
           </ul>
        </li>
        
        <?php }?>
      </ul>
        
    </section>
    <!-- /.sidebar -->
  </aside>