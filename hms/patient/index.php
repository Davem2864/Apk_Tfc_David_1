<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Patient dashboard</title>
</head>
<body>
	<?php 
	include("../include/header.php");
	include("../include/connection.php");
	 ?>
	 <div class="container-fluid">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-2 my-0" style="margin-left:-30px">
	 				<?php
	 				 include("sidenav.php");
	 				 ?>
	 			</div>
	 			<div class="col-md-10">
	 				<h5 class="my-2 text-center">Patient Dashbord</h5>
	 				<div class="col-md-12">
	 					<div class="row">
	 						<div class="row">
	 							<div class="col-md-3 bg-info mx-3" style="height: 150px;">
	 								<div class="col-md-12">
	 					    		  <div class="row">
	 					    		  	<div class="col-md-8">
	 					    		  		<h5 class="text-white my-4">My profile</h5>
	 					    		  	</div>
	 					    		  	<div class="col-md-4">
	 					    		  		<a href="profile.php"><i class="fa-solid fa-circle-user fa-3x my-4" style="color:white;"></i></a>
	 					    		  	</div>
	 					    		  	
	 					    		  </div> 
	 					    			
	 					    		</div>
	 								
	 							</div>
	 							<div class="col-md-3 bg-warning mx-3" style="height: 150px;">
	 								<div class="col-md-12">
	 					    		  <div class="row">
	 					    		  	<div class="col-md-8">
	 					    		  		<h5 class="text-white my-2">Book Appointment</h5>
	 					    		  	</div>
	 					    		  	<div class="col-md-4">
	 					    		  		<a href="appointment.php"><i class="fa-solid fa-calendar fa-3x my-4" style="color:white;"></i></a>
	 					    		  	</div>
	 					    		  	
	 					    		  </div> 
	 					    			
	 					    		</div>
	 							</div>
	 							<div class="col-md-3 bg-success mx-3" style="height: 150px;">
	 								<div class="col-md-12">
	 					    		  <div class="row">
	 					    		  	<div class="col-md-8">
	 					    		  		<h5 class="text-white my-2">My invoice</h5>
	 					    		  	</div>
	 					    		  	<div class="col-md-4">
	 					    		  		<a href="invoice.php"><i class="fas fa-file-invoice-dollar fa-3x my-4" style="color:white;"></i></a>
	 					    		  	</div>
	 					    		  	
	 					    		  </div> 
	 					    			
	 					    		</div>
	 								
	 							</div>
	 							<div class="col-md-3 bg-danger mx-3 my-3" style="height: 150px;">
	 								<div class="col-md-12">
	 					    		  <div class="row">
	 					    		  	<div class="col-md-8">
	 					    		  		<?php 
	 					    		  		$pat=$_SESSION['patient'];
	 				                         $query="SELECT * FROM patient WHERE username='$pat' ";
	 				                         $res=mysqli_query($connect,$query);
	 				                         $row=mysqli_fetch_array($res);
                                             $fname=$row['firstname'];
	 				                         $querys = mysqli_query($connect,"SELECT * FROM appointment WHERE firstname='$fname'") or die(mysqli_error($connect));
                                              $num = mysqli_num_rows($querys);
                                             ?>
	 					    		  		<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num; ?></h5>
                                            <h5 class="text-white">Total</h5>
	 					    		  		<h5 class="text-white my-4">My Appointment</h5>
	 					    		  	</div>
	 					    		  	<div class="col-md-4">
	 					    		  		<a href="my_appointment.php"><i class="fa-solid fa-circle-user fa-3x my-4" style="color:white;"></i></a>
	 					    		  	</div>
	 					    		  	
	 					    		  </div> 
	 					    			
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

	 							$user=$_SESSION['patient'];
	 							$query= "INSERT INTO report(title,message,username,date_send) VALUES ('$title','$message','$user',NOW())";

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
	 								<h5 class="text-center">Send a Report</h5>
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

</body>
</html>