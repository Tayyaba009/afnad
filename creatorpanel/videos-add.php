<?php 
include_once('connection.php');
if (isset($_POST['id'])){

  If ($_FILES['video']['error'] === UPLOAD_ERR_OK) 
{

 $fileTmpPath = $_FILES['video']['tmp_name']; 
 $fileName = $_FILES['video']['name']; 
 $fileSize = $_FILES['video']['size'];
  $fileType = $_FILES['video']['type'];
   $fileNameCmps = explode(".", $fileName); 
   $fileExtension = strtolower(end($fileNameCmps));

        // Specify the allowed file extensions.
        $allowablefileExtensions = ['mp4', 'avi','mov','mkv'];

        if (in_array($fileExtension, $allowablefileExtensions)) { 
        // Directory for video storage
             $uploadFileDir = './../assets/videos/';
                $dest_path = $uploadFileDir.$fileName;

            // Transfer the file to the desired directory
             if (move_uploaded_file($fileTmpPath, $dest_path)) {
              echo "Video file successfully uploaded."; 
              } else { 
              echo "There was an error moving the uploaded file."; 
              return 0;
              } 
              } else {
               echo "Upload failed. Allowed file types: 'mp4', 'avi','mov','mkv'"; 
               return 0;
               }
               } else {
                echo "Error: ". $_FILES['video']['error']; 
                return 0;
                }

	$data = Array(
		  'Title'	=>$_POST['Title'],
      'Tags'	=>$_POST['Tags'],
      'Src'	=> $fileName
	  
		  );

	if (($_POST['id'] >0)){
		$db->where('id', $_POST['id']);
		$db->update('videos', $data);



	} else {

		$db->insert('videos', $data);


	}
	header("location: index.php?cmd=".$_GET['cmd']);
	exit(0);	
}


$Title = '';
$Tags = '';

if (isset($_GET['id'])){
	
	$db->where('id', $_GET['id']);
	$values = $db->getOne('videos');
	if ($values !== NULL)
	{
		$Title = $values['Title'];
    $Tags = $values['Tags'];
		

	}
	
}


?>

<section class="content">
  <div class="row">
    <div class="col-lg-12 col-xs-12"> 
      <!-- small box -->
      
      <form id="video-add" enctype = "multipart/form-data" action="<?=$_SERVER['PHP_SELF'].'?cmd='. $_GET['cmd']?>" method="POST" class="form-horizontal" >
        <div>
          <input name="id" type="hidden" value="<?=isset($_GET['id'])?$_GET['id']:''?>" required class="form-control">
        </div>
        <fieldset>
          <legend>Please fill the form below</legend>
          <div class="form-group">
            <label for="Title" class="col-sm-4 control-label">Title<sup class="text-danger">* </sup>: </label>
            <div class="col-sm-6">
              <input id="Title" name="Title" type="text" value="<?=$Title?>" required class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label for="Tags" class="col-sm-4 control-label"># Tags<sup class="text-danger">* </sup>: </label>
            <div class="col-sm-6">
              <input id="Tags" name="Tags" type="text" value="<?=$Tags?>" required class="form-control">
            </div>
          </div>
          <div class="form-group">
          <label for="Video" class="col-sm-4 control-label">Select a video file:</label>
          <div class="col-sm-6">
           <input type="file" name="video" id="video" required acceptance="video/*" class="form-control"> 
           </div>
        </div>
		   <div class="form-group">
            <label for="name" class="col-sm-4 control-label"> <sup class="text-danger">  </sup> </label>
            <div class="col-sm-6">
              <button type="submit" class="btn btn-balanced"> Save </button>
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
