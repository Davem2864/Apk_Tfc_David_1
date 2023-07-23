<?php 
session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Patient Appointment</title>
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
      				<h5 class="text-center">Book Appointment</h5>
      				<?php
      				$pat=$_SESSION['patient'];
      				$sel=mysqli_query($connect,"SELECT * FROM patient WHERE username='$pat'");
      				$row=mysqli_fetch_array($sel);
      				$firstname=$row['firstname'];
      				$surname=$row['surname'];
      				$gender=$row['gender'];
      				$phone=$row['phone'];

      				if (isset($_POST['book'])) {
                               $date = $_POST['date'];
                               $sym = $_POST['sym'];
                               if (empty($sym)) {
                                   echo "<script>alert('Please enter your symptoms.')</script>";
                               } else {
                                   $query = "INSERT INTO appointment (firstname, surname, gender, phone, appointment_date, symptoms, status, date_booked) VALUES ('$firstname', '$surname', '$gender', '$phone', '$date', '$sym', 'Pending', NOW())";
                                   $res = mysqli_query($connect, $query);
                                   if ($res) {
                                       echo "<script>alert('You have booked an appointment.')</script>";
                                   } else {
                                       echo "<script>alert('An error occurred while booking your appointment. Please try again.')</script>";
                                   }
                               }
                           }

      				 ?>
      				<div class="col-md-12">
      					<div class="row">
      						<div class="col-md-3"></div>
      						<div class="col-md-6 card bg-info">
      							<form method="post">
      								<label>Date Appointment</label>
      								<input type="date" name="date" class="form-control">
      								<label>Symptoms</label>
      								<textarea id="sym" name="sym" rows="4" cols="50" class="form-control" autocomplete="off" placeholder="your symptoms here, keep it brief"></textarea>
      								<input type="submit" name="book" class="btn btn-success my-2" value="Book Appointment">
      							</form>
      						</div>
      						<div class="col-md-3"></div>
      						
      					</div>
      					
      				</div>
      			</div>
      			
      		</div>
      		
      	</div>
      	
      </div>
 </body>
 </html>