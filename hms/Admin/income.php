<?php 
session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Total income</title>
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
 	 				<h5 class="text-center my-3">Total income</h5>
 	 				<?php
 	 				$query="SELECT * FROM income";
 	 				$res=mysqli_query($connect,$query);
 	 				$output="   
	 				 <div class='table-responsive' id='orderTable'>
                     <table class= 'table table-striped' >
                     <tr>
                     <th>ID</th>
                     <th>Doctor</th>
                     <th>Patient</th>
                     <th>Date Discharge</th>
                     <th>Amount Paid</th>
                     </tr>
                     "; 
                     if ( mysqli_num_rows($res) < 1) {
                     	$output .="
                          <tr>
                             <td colspan='10' class = 'text-center' >no patient Discharge yet.</td>
                          </tr>
                          ";
                     }

                     while($row = mysqli_fetch_array($res)){
                        $output .="
                            <tr>
                             <td> ".$row['id']." </td>
                             <td> ".$row['doctor']." </td>
                             <td> ".$row['patient']." </td>
                             <td> ".$row['date_discharge']." </td>
                             <td> ".$row['amount_paid']." </td>
                              <td> 
                                 // <a href='viewreport.php?id=".$row['id']." '>
                                 //  <button class = 'btn btn-info'>View Report<button>
                                 // </a>
                              <td/>
         
                            ";
                         }
                         $output .= "
                                   </tr>
                                   </table>
                                   </div>
                                 </div>
                                 </html>
                               ";
                            echo $output;
 	 				 ?>
 	 			</div>
 	 			
 	 		</div>
 	 		
 	 	</div>
 	 	
 	 </div>
 
 </body>
 </html>