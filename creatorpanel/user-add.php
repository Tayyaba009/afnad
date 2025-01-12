<?php 
include_once('connection.php');
if (isset($_POST['id'])){
	$data = Array(
		  'Unm'	=>$_POST['fullname'],
		  'Email'	=>$_POST['email'],
		  'Contact_no'	=>$_POST['contactno'],
		  'Pwd'	=>$_POST['pwd'],
      'U_type' => '2'
	  
		  );
		  
	if (($_POST['id'] >0)){
		$db->where('id', $_POST['id']);
		$db->update('register', $data);
	} else {

		$db->insert('register', $data);
	}
	header("location: index.php?cmd=".$_GET['cmd']);
	exit(0);	
}


$fullname = '';
$email ='';
$contactno ='';
$pwd ='';

if (isset($_GET['id'])){
	
	$db->where('id', $_GET['id']);
	$values = $db->getOne('register');
	if ($values !== NULL)
	{
		$fullname = $values['Unm'];
		$email = $values['Email'];
		$contactno = $values['Contact_no'];
		$pwd = $values['Pwd'];

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
            <label for="fullname" class="col-sm-4 control-label">Full Name<sup class="text-danger">* </sup>: </label>
            <div class="col-sm-6">
              <input id="fullname" name="fullname" type="text" value="<?=$fullname?>" required class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="fullname" class="col-sm-4 control-label">Contact No<sup class="text-danger">* </sup>: </label>
            <div class="col-sm-6">
              <input id="contactno" name="contactno" type="text" value="<?=$contactno?>" required class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="fullname" class="col-sm-4 control-label">Email<sup class="text-danger">* </sup>: </label>
            <div class="col-sm-6">
              <input id="email" name="email" type="text" value="<?=$email?>" required class="form-control">
            </div>
          </div>
		  
         
          
		  <div class="form-group">
            <label for="password" class="col-sm-4 control-label">Password: </label>
            <div class="col-sm-6">
              <input id="pwd" name="pwd" type="password" value="<?=$pwd?>"  class="form-control" required>
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
