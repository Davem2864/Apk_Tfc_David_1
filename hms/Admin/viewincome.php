<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Income</title>
</head>
<body style="background-color:beige;">
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
          				<h5 class="text-center">Income's Informations</h5>
          				<?php 
          				if (isset($_GET['id'])) {
          				 	$id=$_GET['id'];
          				 	$query="SELECT * FROM income WHERE id='$id'";
          				 	$res=mysqli_query($connect,$query);
          				 	$row=mysqli_fetch_array($res);
          				 }
          				  ?>
          				  <div class="col-md-12">
          				  	<div class="row">
          				  		<div class="col-md-3"></div>
          				  		<div class="col-md-6">
          				  			<div class="table-responsive" id="orderTable">
          				  			 <div class="col-md-12 card my-5">
                                        <table class="table table-striped">
                                        <tr>
                                            <th class="text-center" colspan="2">Details</th>
                                        </tr>
                                        <tr>
                                            <td>Id</td>
                                            <td><?php echo $row['id']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Doctor</td>
                                            <td><?php echo $row['doctor']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Patient</td>
                                            <td><?php echo $row['patient']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Date Discharge</td>
                                            <td><?php echo $row['date_discharge']; ?></td>
                                        </tr>
                                        <tr>
                                            <td>Amount paid</td>
                                            <td><?php echo $row['amount_paid']; ?></td>
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
          	
          </div>
</body>
</html>