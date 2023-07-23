<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Patient</title>
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
          				<?php include("sidenav.php");
          				 ?>	
          			</div>
          			<div class="col-md-10">
          				<h5 class="text-center">Patient's Informations</h5>
          				<?php 
          				if (isset($_GET['id'])) {
          				 	$id=$_GET['id'];
          				 	$query="SELECT * FROM patient WHERE Id='$id'";
          				 	$res=mysqli_query($connect,$query);
          				 	$row=mysqli_fetch_array($res);
          				 }
          				  ?>
          				  <div class="col-md-12">
          				  	<div class="row">
          				  		<div class="col-md-3"></div>
          				  		<div class="col-md-6">
          				  			<?php 
          				  			echo "<img src='../patient/img/".$row['profile']."' class='col-md-12' style='height: 250px;width:250px;margin-left:2.3cm;'>"; 
          				  			?>
          				  			<div class="table-responsive" id="orderTable">
          				  			 <table class="table table-striped">
          				  				<tr>
          				  					<th class="text-center" colspan="2">Invoice Details</th>
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
          				  					<td>Country</td>
          				  					<td><?php echo $row['country']; ?></td>
          				  				</tr>
          				  				<tr>
          				  					<td>Email</td>
          				  					<td><?php echo $row['email']; ?></td>
          				  				</tr>
          				  				<tr>
          				  					<td>Date of registration</td>
          				  					<td><?php echo $row['date_reg']; ?></td>
          				  				</tr>
          				  			 </table>
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