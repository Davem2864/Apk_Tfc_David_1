<?php
session_start(); 
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<title>View invoice</title>
</head>
<body>
	<?php
	include("../include/header.php");
	include("../include/connection.php"); 
	 ?>
	 <div class="container-fluid">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-2" style="margin-left:-30px; ">
	 				<?php
	 				include("sidenav.php"); 
	 				 ?>
	 			</div>
	 			<div class="col-md-10">
	 				<h5 class="text-center my-2">View Invoice</h5>
	 				<div class="col-md-12">
	 					<div class="row">
	 						<div class="col-md-3"></div>
	 						<div class="col-md-6">
	 								<?php 
          				                 if (isset($_GET['id'])) {
          				 	                 $id=$_GET['id'];
          				 	                 $query="SELECT * FROM income WHERE Id='$id'";
          				 	                 $res=mysqli_query($connect,$query);
          				 	                 $row=mysqli_fetch_array($res);
          				                  }
          				            ?>
          				  			<div class="table-responsive" id="orderTable">
          				  			 <table class="table table-striped">
          				  				<tr>
          				  					<th class="text-center" colspan="2">Invoice Details</th>
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
          				  					<td>Amount Paid</td>
          				  					<td><?php echo $row['amount_paid']; ?></td>
          				  				</tr>
          				  				<tr>
          				  					<td>Descrption</td>
          				  					<td><?php echo $row['description']; ?></td>
          				  				</tr>
          				  				<tr>
          				  					<td>Date Check</td>
          				  					<td><?php echo $row['date_check']; ?></td>
          				  				</tr>
          				  			 </table>

	 						</div>
	 						<div class="col-md-3">
	 							
          				  				<button class="btn btn-primary" id="downloadPDF">print the invoice</button>
                                         <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
                                         <script>
                                           document.getElementById('downloadPDF').addEventListener('click', function() {
                                             var element = document.getElementById('orderTable');
                                             html2pdf().from(element).save('invoice.pdf');
                                           });
                                         </script>
	 						</div>
	 						
	 					</div>
	 					
	 				</div>
	 				
	 			</div>
	 			
	 		</div>
	 		
	 	</div>
	 	
	 </div>


</body>
</html>