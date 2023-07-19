<?php 
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Doctor's Dashboard</title>
</head>
<body>
	<?php 
	include("../include/header.php");
	include("../include/connection.php");

	 ?>
	 <div class="container-fluid">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-2" style="margin-left:-30px;">
	 				<?php include("sidenav.php"); ?>
	 			</div>
	 			<div class="col-md-10">
	 				<div class="container-fluid">
	 					<h5 class="text-center">Doctor's Dashboard</h5>
	 					<div class="col-md-12">
	 					    <div class="row">
	 					    	<div class="col-md-3 my-2 bg-info mx-5" style="height:150px;">
	 					    		<div class="col-md-12">
	 					    		  <div class="row">
	 					    		  	<div class="col-md-8">
	 					    		  		<h5 class="text-white my-2">My profile</h5>
	 					    		  	</div>
	 					    		  	<div class="col-md-4">
	 					    		  		<a href="profile.php"><i class="fa-solid fa-circle-user fa-3x my-4" style="color:white;"></i></a>
	 					    		  	</div>
	 					    		  	
	 					    		  </div> 
	 					    			
	 					    		</div>
	 					    		
	 					    	</div>
	 					    	<div class="col-md-3 my-2 bg-warning mx-5" style="height:150px;">
	 					    		<div class="col-md-12">
	 					    		  <div class="row">
	 					    		  	<div class="col-md-8">
	 					    		  		<?php 
                                               $ad = mysqli_query($connect,"SELECT * FROM patient");
                                               $num3 = mysqli_num_rows($ad);
                                             ?>
	 					    		  		<h5 class="text-white my-2" style="font-size:30px"><?php echo $num3; ?></h5>
	 					    		  		<h5 class="text-white my-2">Total</h5>
	 					    		  		<h5 class="text-white my-2">Patient</h5>
	 					    		  	</div>
	 					    		  	<div class="col-md-4">
	 					    		  		<a href="patient.php"><i class="fa-solid fa-procedures fa-3x my-4" style="color:white;"></i></a>
	 					    		  	</div>
	 					    		  	
	 					    		  </div> 
	 					    			
	 					    		</div>
	 					    		
	 					    	</div>
	 					    	<div class="col-md-3 my-2 bg-success mx-4" style="height:150px;">
	 					    		<div class="col-md-12">
	 					    		  <div class="row">
	 					    		  	<div class="col-md-8">
	 					    		  		<h5 class="text-white my-2" style="font-size:30px;">0</h5>
	 					    		  		<h5 class="text-white my-2">Total</h5>
	 					    		  		<h5 class="text-white my-2">Appointment</h5>
	 					    		  	</div>
	 					    		  	<div class="col-md-4">
	 					    		  		<a href="#"><i class="fa-solid fa-calendar fa-3x my-4" style="color:white;"></i></a>
	 					    		  	</div>
	 					    		  	
	 					    		  </div> 
	 					    			
	 					    		</div>
	 					    		
	 					    	</div>
	 					    	
	 					    </div> 
	 						
	 					</div>
	 					
	 				</div>
	 			</div>
	 			
	 		</div>
	 		
	 	</div>
	 </div>

</body>
</html>