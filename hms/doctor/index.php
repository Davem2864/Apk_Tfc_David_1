<?php 
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
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
	 					    	<div class="col-md-3 my-2 bg-info mx-3" style="height:150px;">
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
	 					    	<div class="col-md-3 my-2 bg-warning mx-3" style="height:150px;">
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
	 					    	<div class="col-md-3 my-2 bg-success mx-3" style="height:150px;">
	 					    		<div class="col-md-12">
	 					    		  <div class="row">
	 					    		  	<div class="col-md-8">
	 					    		  		<?php
	 					    		  		$ad = mysqli_query($connect,"SELECT * FROM appointment WHERE status='Pending' ");
                                               $num4 = mysqli_num_rows($ad); 
	 					    		  		 ?>
	 					    		  		<h5 class="text-white my-2" style="font-size:30px;"><?php echo $num4; ?></h5>
	 					    		  		<h5 class="text-white my-2">Total</h5>
	 					    		  		<h5 class="text-white my-2">Appointment</h5>
	 					    		  	</div>
	 					    		  	<div class="col-md-4">
	 					    		  		<a href="appointment.php"><i class="fa-solid fa-calendar fa-3x my-4" style="color:white;"></i></a>
	 					    		  	</div>
	 					    		  	
	 					    		  </div> 
	 					    			
	 					    		</div>
	 					    		
	 					    	</div>
	 					    	<div class="col-md-3 my-2 bg-danger mx-3" style="height:150px;">
	 					    		<div class="col-md-12">
	 					    		  <div class="row">
	 					    		  	<div class="col-md-8">
	 					    		  		<?php 
                                              $ad = mysqli_query($connect,"SELECT * FROM report");
                                              $num5 = mysqli_num_rows($ad);
                                             ?>

	 					    		  		<h5 class="text-white my-2" style="font-size:30px;"><?php echo $num5; ?></h5>
	 					    		  		<h5 class="text-white my-2">Total</h5>
	 					    		  		<h5 class="text-white my-2">Patient Report</h5>
	 					    		  	</div>
	 					    		  	<div class="col-md-4">
	 					    		  		<a href="patient_report.php"><i class="fa-solid fa-circle-user fa-3x my-4" style="color:white;"></i></a>
	 					    		  	</div>
	 					    		  	
	 					    		  </div> 
	 					    			
	 					    		</div>
	 					    		
	 					    	</div>
	 					    	<div class="col-md-3 my-2 bg-success mx-3" style="height:150px;">
	 					    		<div class="col-md-12">
	 					    		  <div class="row">
	 					    		  	<div class="col-md-8">
	 					    		  		<?php 
                                              $ad = mysqli_query($connect,"SELECT * FROM appointment WHERE status='Discharge' ORDER BY date_booked DESC");
                                              $num6 = mysqli_num_rows($ad);
                                             ?>

	 					    		  		<h5 class="text-white my-2" style="font-size:30px;"><?php echo $num6; ?></h5>
	 					    		  		<h5 class="text-white my-2">Total</h5>
	 					    		  		<h5 class="text-white my-2">Discharge Appointment</h5>
	 					    		  	</div>
	 					    		  	<div class="col-md-4">
	 					    		  		<a href="appointment_discharge.php"><i class="fa-solid fa-circle-user fa-3x my-4" style="color:white;"></i></a>
	 					    		  	</div>
	 					    		  	
	 					    		  </div> 
	 					    			
	 					    		</div>
	 					    		
	 					    	</div>
	 					    	<?php 
	 					if (isset($_POST['send'])) {

	 						$title=$_POST['title'];
	 						$message=$_POST['message'];

	 						if (empty($title)) {
	 							// code...
	 						}elseif (empty($message)) {
	 							// code...
	 						}else{

	 							$user=$_SESSION['doctor'];
	 							$query= "INSERT INTO doctors_report(title,message,username,date_send) VALUES ('$title','$message','$user',NOW())";

	 							$res = mysqli_query($connect,$query);

	 							if ($res) {
	 								echo "<script> alert('you have sent your report') </script>";
	 							}
	 						}
	 					}
	 					 ?>


	 					<div class="col-md-12">
	 						<div class="row">
	 							<div class="col-md-3"></div>
	 							<div class="card col-md-6 bg-info my-5">
	 								<h5 class="text-center">Send a Report to Admin</h5>
	 								<form method="post">
	 									<label>Title</label>
	 									<input type="text" name="title" class="form-control" autocomplete="off" placeholder="Title">
	 									<label>Message</label>
	 									<textarea id="message" name="message" rows="4" cols="50" class="form-control" autocomplete="off" placeholder="your report here, keep it brief"></textarea>
	 									<br>
	 									<input type="submit" id="send" name="send" value="Send" class="btn btn-success my-3">
	 									
	 								</form>
	 							</div>
	 							<div class="col-md-3"></div>
	 							
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