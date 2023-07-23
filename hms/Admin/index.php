<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
	<title> Admin Dashboard </title>
</head>
<body>
<?php 
include("../include/header.php");
include("../include/connection.php");
 ?>
     <div class="container-fluid">
     	<div class="col-md-12">
     		<div class="row">
     			<div class="col-md-2" style="margin-left: -30px;">
     				<?php
     				include("sidenav.php"); 
     				 ?>
     			</div>
     			<div class="col-md-10">
     			<h4 class="text-center my-2">Admin DashBoard</h4>
     				<div class="col-md-12">
     					<div class="row">
     						<div class="col-md-3 bg-success mx-3 my-3" style="height : 130px;">
     							<div class="col-md-12">
     								<div class="row">
     									<div class="col-md-8">
     										<?php 
                                               $ad = mysqli_query($connect,"SELECT * FROM admin");
                                               $num = mysqli_num_rows($ad);
     										 ?>
     										<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num; ?></h5>
     										<h5 class="text-white">Total</h5>
     										<h5 class="text-white">Admin</h5>
     										
     									</div>
     									<div class="col-md-4">
     										<a href="admin.php"><i class="fa fa-users-cog fa-3x my-4" style="color: white;"></i></a>
     									</div>
     									
     								</div>
     								
     							</div>
     							
     						</div>
     						<div class="col-md-3 bg-info mx-3 my-3" style="height : 130px;">
     								<div class="col-md-12">
     								<div class="row">
     									<div class="col-md-8">
                                            <?php   
                                             $doctor= mysqli_query($connect,"SELECT * FROM doctors WHERE status = 'Approved' ");
                                             $num2 = mysqli_num_rows($doctor);
                                             ?>
     										<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num2;  ?> </h5>
     										<h5 class="text-white">Total</h5>
     										<h5 class="text-white">Doctors</h5>
     										
     									</div>
     									<div class="col-md-4">
     										<a href="doctor.php"><i class="fa fa-user-doctor fa-3x my-4" style="color: white;"></i></a>
     									</div>
     									
     								</div>
     								
     							</div>
     						</div>
     						<div class="col-md-3 bg-warning mx-3 my-3" style="height : 130px;">
     								<div class="col-md-12">
     								<div class="row">
     									<div class="col-md-8">
                                            <?php 
                                               $ad = mysqli_query($connect,"SELECT * FROM patient");
                                               $num3 = mysqli_num_rows($ad);
                                             ?>
     										<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num3;  ?></h5>
     										<h5 class="text-white">Total</h5>
     										<h5 class="text-white">Patients</h5>
     										
     									</div>
     									<div class="col-md-4">
     										<a href="patient.php"><i class="fa fa-bed-pulse fa-3x my-4" style="color: white;"></i></a>
     									</div>
     									
     								</div>
     								
     							</div>
     						</div>
     						<div class="col-md-3 bg-danger mx-3 my-3" style="height : 130px;">
     								<div class="col-md-12">
     								<div class="row">
     									<div class="col-md-8">
                                 <?php 
                                 $ad = mysqli_query($connect,"SELECT * FROM report");
                                 $num4 = mysqli_num_rows($ad);
                                 ?>
     										<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num4; ?></h5>
     										<h5 class="text-white">Total</h5>
     										<h5 class="text-white">Reports</h5>
     										
     									</div>
     									<div class="col-md-4">
     										<a href="report.php"><i class="fa fa-flag fa-3x my-4" style="color: white;"></i></a>
     									</div>
     									
     								</div>
     								
     							</div>
     						</div>
                           
     						<div class="col-md-3 bg-warning mx-3 my-3" style="height : 130px;">
     								<div class="col-md-12">
     								<div class="row">
     									<div class="col-md-8">
                                            <?php   
                                             $job= mysqli_query($connect,"SELECT * FROM doctors WHERE status = 'Pending' ");
                                             $num1 = mysqli_num_rows($job);
                                             ?>
     										<h5 class="my-2 text-white" style="font-size: 30px;"> <?php echo $num1;  ?> </h5>
     										<h5 class="text-white">Total</h5>
     										<h5 class="text-white">Job Request</h5>
     										
     									</div>
     									<div class="col-md-4">
     										<a href="Job_request.php"><i class="fa fa-book-open fa-3x my-4" style="color: white;"></i></a>
     									</div>
     									
     								</div>
     								
     							</div>
     						</div>
     						<div class="col-md-3 bg-success mx-3 my-3" style="height : 130px">
     								<div class="col-md-12">
     								<div class="row">
     									<div class="col-md-8">
                                 <?php 
                                  $in= mysqli_query($connect,"SELECT sum(amount_paid) as profit FROM income");
                                  $row=mysqli_fetch_array($in);
                                  $inc=$row['profit'];
                                  ?>
     										<h5 class="my-2 text-white" style="font-size: 30px;"><?php echo "$$inc"; ?></h5>
     										<h5 class="text-white">Total</h5>
     										<h5 class="text-white">Income</h5>
     										
     									</div>
     									<div class="col-md-4">
     										<a href="income.php"><i class="fa fa-money-check-alt fa-3x my-4" style="color: white;"></i></a>
     									</div>
     									
     								</div>
     								
     							</div>
     						</div>
                     <div class="col-md-3 bg-warning mx-3 my-3" style="height : 130px;">
                           <div class="col-md-12">
                           <div class="row">
                              <div class="col-md-8">
                                 <?php 
                                 $ad = mysqli_query($connect,"SELECT * FROM doctors_report");
                                 $num0 = mysqli_num_rows($ad);
                                 ?>
                                 <h5 class="my-2 text-white" style="font-size: 30px;"><?php echo $num0; ?></h5>
                                 <h5 class="text-white">Total</h5>
                                 <h5 class="text-white">Doctors Reports</h5>
                                 
                              </div>
                              <div class="col-md-4">
                                 <a href="doctor_report.php"><i class="fa fa-flag fa-3x my-4" style="color: white;"></i></a>
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