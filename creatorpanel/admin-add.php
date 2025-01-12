<?php 
include_once('connection.php');
if (isset($_POST['id'])){
	$data = Array(
		  'adminname'	=>$_POST['fullname'],
		  
		  'username'		=>$_POST['username'],
		  'password'	=>$_POST['password']
		  );
	if (($_POST['id'] >0)){
		$db->where('id', $_POST['id']);
		$db->update('admin', $data);
	} else {

		$db->insert('admin', $data);
	}
	header("location: index.php?cmd=".$_GET['cmd']);
	exit(0);	
}


$fullname = '';

$username ='';
$pwd ='';

if (isset($_GET['id'])){
	
	$db->where('id', $_GET['id']);
	$values = $db->getOne('admin');
	if ($values !== NULL)
	{
		$fullname = $values['adminname'];
		
		$username = $values['username'];
		$pwd = $values['password'];
	}
	
}


?>

<section class="content">
  <div class="row">
    <div class="col-lg-12 col-xs-12"> 
      <!-- small box -->
      
      <form id="supervisor-add" action="<?=$_SERVER['PHP_SELF'].'?cmd='. $_GET['cmd']?>" method="POST" class="form-horizontal" novalidate>
        <div>
          <input name="id" type="hidden" value="<?=isset($_GET['id'])?$_GET['id']:''?>" required class="form-control">
        </div>
        <fieldset>
          <legend>Please fill the form below</legend>
          <div class="form-group">
            <label for="fullname" class="col-sm-4 control-label">Admin Full Name<sup class="text-danger">* </sup>: </label>
            <div class="col-sm-6">
              <input id="fullname" name="fullname" type="text" value="<?=$fullname?>" required class="form-control">
            </div>
          </div>
          
          
          <div class="form-group">
            <label for="username" class="col-sm-4 control-label">User Name: </label>
            <div class="col-sm-6">
              <input id="username" name="username" type="text" value="<?=$username?>"  class="form-control" required>
            </div>
          </div>
          
		  <div class="form-group">
            <label for="password" class="col-sm-4 control-label">Password: </label>
            <div class="col-sm-6">
              <input id="password" name="password" type="password" value="<?=$pwd?>"  class="form-control" required>
            </div>
          </div>
          
          <div class="form-group">
            <div class="col-sm-offset-4 col-sm-4">
              <button type="submit" name="submit-btn" value="1" class="btn btn-success">Save <i class="fa fa-arrow-right fa-fw"></i></button>
            </div>
          </div>
        </fieldset>
      </form>
    </div>
  </div>
</section>
<script>
$("#supervisor-add").validate();
</script>
