<?php
session_start(); 
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Check Patient Appointment</title>
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
	 				<h5 class="text-center">Total Appointment</h5>
	 				<?php
	 				if (isset($_GET['id'])) {
          				 	$id=$_GET['id'];
          				 	$query="SELECT * FROM appointment WHERE id='$id'";
          				 	$res=mysqli_query($connect,$query);
          				 	$row=mysqli_fetch_array($res);
          				 } 
	 				 ?>
	 				<div class="col-md-12">
	 					<div class="row">
	 						<div class="col-md-6">
	 							<div class='table-responsive' id='orderTable'>
                              <table class= 'table table-striped' >
                              	<tr>
                              		<td colspan="2" class="text-center">Appointment Details</td>
                              	</tr>
                              		<tr>
          				  					<td>Firstname</td>
          				  					<td><?php echo $row['firstname']; ?></td>
          				  				</tr>
          				  				<tr>
          				  					<td>Surname</td>
          				  					<td><?php echo $row['surname']; ?></td>
          				  				</tr>
          				  				<tr>
          				  					<td>Gender</td>
          				  					<td><?php echo $row['gender']; ?></td>
          				  				</tr>
          				  				<tr>
          				  					<td>Phone</td>
          				  					<td><?php echo $row['phone']; ?></td>
          				  				</tr>
          				  				<tr>
          				  					<td>Appointment Date</td>
          				  					<td><?php echo $row['appointment_date']; ?></td>
          				  				</tr>
          				  				<tr>
          				  					<td>Symptoms</td>
          				  					<td><?php echo $row['symptoms']; ?></td>
          				  				</tr>
          				  				<tr>
          				  					<td>Date Booked</td>
          				  					<td><?php echo $row['date_booked']; ?></td>
          				  				</tr>
                              </table>
                          </div>
	 						</div>
	 						<div class="col-md-6">
	 							<h5 class="text-center my-2">Invoice</h5>
	 							<?php
                                    if (isset($_POST['send'])) {
                                        $fee = $_POST['fee'];
                                        $des = $_POST['description'];
                                        $date = $_POST['date'];
                                        if (empty($fee)) {
                                            echo "Fee is empty";
                                        } elseif (empty($des)) {
                                            echo "Description is empty";
                                        } elseif (empty($date)) {
                                            echo "Date is empty";
                                        } else {
                                            $doc = $_SESSION['doctor'];
                                            $fname = $row['firstname'];
                                            $query = "INSERT INTO income (doctor, patient, date_discharge, amount_paid, description,date_check) VALUES('$doc','$fname',NOW(),'$fee','$des','$date')";
                                            $res = mysqli_query($connect, $query);
                                            if ($res) {
                                                echo "<script>alert('you have sent an invoice')</script>";
                                                mysqli_query($connect, "UPDATE appointment SET status='Discharge' WHERE id='$id'");
                                            } else {
                                                echo mysqli_error($connect);
                                            }
                                        }
                                    }
                                    ?>

	 							<form method="post">
	 								<label>Fee</label>
	 								<input type="number" name="fee" class="form-control" autocomplete="off" placeholder="Entrer Fee" required>
	 								<label>Description</label>
	 								<textarea id="description" name="description" rows="4" cols="50" class="form-control" autocomplete="off" placeholder="Enter your Description here, keep it brief" required></textarea>
	 								<label>Date check</label>
	 								<input type="date" name="date" class="form-control" autocomplete="off" placeholder="date" required>
	 								<br>
	 								<input type="submit" name="send" class="btn btn-success" value="Send">
	 							</form>
	 						</div>
	 						
	 					</div>
	 					
	 				</div>
	 				
	 			</div>
	 			
	 		</div>
	 		
	 	</div>
	 	
	 </div>

</body>
</html>