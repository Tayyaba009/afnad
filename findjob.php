<?php 
include_once('connection.php');
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


?>
<!DOCTYPE html>
<html>
<head>
  <!-- Site made with Mobirise Website Builder v4.0.6, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.0.6, mobirise.com">
  <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    
  <link rel="shortcut icon" href="assets/images/logo.png" type="image/x-icon">
  <meta name="description" content="Website Generator Description">
  <title>Find A Job</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik:300,300i,400,400i,500,500i,700,700i,900,900i">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/dropdown/css/style.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>

<?php include "header.php"; ?>


<section class="engine"><a rel="nofollow" href="https://mobirise.com">mobirise.com</a></section><section class="mbr-section form2 cid-qqBrNAw3gy" id="form2-e" data-rv-view="160">

    <div class="container">
        <div class="media-container-column title col-12 col-lg-8 offset-lg-2">
            <h2 class="align-center display-2 pb-2">
            Search A Job
            </h2>
            
        </div>

        <div class="py-2">
            <div class="row">
                <div class="col-12 col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                    
                    <form class="mbr-form" action="findjob.php" method="post" name="job">
                        <div class="mbr-subscribe input-group">
                            <input type="text" class="form-control" name="search" placeholder="search here" required="" id="search">
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

<section class="mbr-section form4 cid-qpeHaFZ4yH" id="form4-h" data-rv-view="157">
    
    <!-- Block parameters controls (Blue "Gear" panel) --> 
    
    <!-- End block parameters -->

    
    <div class="container">
 
      <div class="row">
        <div class="col-md-12" data-form-type="formoid">
         
            
			
			<?php 
				if (isset($_POST['search'])){
	
					$search = $_POST['search'];
					
					$db->where('skill', Array('like'=> '%'. $search.'%'));
					$db->orWhere('catname', Array('like'=> '%'. $search.'%'));
					$db->orWhere('title', Array('like'=> '%'. $search.'%'));
					
					$data = $db->get('qryjobs');
				?>
				<h2> Jobs found </h2>
			
            <table id="data" class="table table-striped" width="100%">
            <tr>
				<td><strong>Job </strong></td>
				<td><strong>Category </strong></td>
				<td><strong>Sub Category </strong></td>
				<td><strong>Skill </strong></td>
				<td><strong>Post Date </strong></td>
				<td><strong>Max Days </strong></td>
				<td><strong> </strong></td>
            </tr> 
			<?php foreach($data as $d) { ?>
			<tr>
				<td><?=$d['Title']?> </td>
				<td><?=$d['catname']?> </td>
				<td></td>
				<td> <?=$d['Skill']?> </td>
				<td> <?=$d['Posted']?> </td>
				<td> <?=$d['Days']?> </td>
				<td><a href="postbid.php?id=<?=$d['p_id']?>"> Make a Bid</a> </td>
            </tr>
			<?php }?>
            </table>
            <?php }?>
			
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
  <script src="assets/jarallax/jarallax.min.js"></script>
  <script src="assets/theme/js/script.js"></script>
  <script src="assets/formoid/formoid.min.js"></script>
  
  <script>
      	  
      var marker;
	  var map;
	  var infoWins=[];
      function initMap() {
         map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: {lat: 0, lng: 0}
        });
		
		
		if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(function(position) {
            var pos = {
              lat: position.coords.latitude,
              lng: position.coords.longitude
            };

		marker = new google.maps.Marker({
          map: map,
          draggable: true,
          animation: google.maps.Animation.DROP,
          position: {lat: pos.lat, lng: pos.lng}
		  
        });
		map.setCenter(pos);
		
		map.zoom = 20;
        marker.addListener('drag', toggleBounce);
           
        });
        
          }
		
		

        
      }

      function toggleBounce() {
		  
		  // console.log(marker.getPosition().lat());
        
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAouGG98et6H1FgZ9H0DjUBolGhVgk8j10&callback=initMap">
    </script>
	<script>
	$("#getworkshops").on('click', function(){
		console.log(marker.getPosition().lat() + ',' + marker.getPosition().lng());
		$.get("getworkshops.php?loc=" + marker.getPosition().lat() + ',' + marker.getPosition().lng(), function(data, status){
        console.log( JSON.parse(data) );
		var i;
		var tblRow;
		data = JSON.parse(data);
		var infoWindow;
		for (var i = 0; i < infoWins.length; i++) {
          infoWins[i].setMap(map);
        }
		infoWins = [];
		
		for(i=0; i<data.length; i++){
			if (data[i].distance !== -1){
				tblRow +='<tr><td>' + data[i].workshopname + 
				'</td><td>'+ data[i].contactperson + 
				
				'</td><td>'+ data[i].address + ', '+ data[i].city +
				'</td><td>'+ data[i].phoneno +
				'</td><td>'+ data[i].distance +
				'</td><td>'+ data[i].time + '</td></tr>';
				var pos = {
					  lat: data[i].location.lat,
					  lng: data[i].location.long
					};
				infoWindow = new google.maps.InfoWindow;
				infoWindow.setPosition(pos);
				infoWindow.setContent(data[i].workshopname);
				infoWindow.open(map);
				infoWins.push(infoWindow);
			}
			
			
		}
		$('#data').find("tr:gt(0)").remove();
		$('#data tr:last').after(tblRow);
		
		
    });
	});
	</script>
	
</body>


</html>