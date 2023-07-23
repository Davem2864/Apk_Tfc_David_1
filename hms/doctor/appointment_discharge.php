<?php
session_start(); 
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Total Discharge Appointment</title>
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
	 				<?php
	 				include("sidenav.php"); 
	 				 ?>
	 			</div>
	 			<div class="col-md-10">
	 				<h5 class="text-center">Total Discharge Apointment</h5>
	 				<?php
	 				$query="SELECT * FROM appointment WHERE status ='Discharge' ORDER BY date_booked DESC";
	 				$res=mysqli_query($connect,$query);
	 				$output="";
	 				$output.="
                      <!DOCTYPE html>
                           <html>
                           <head>
                              <meta charset='utf-8'>
                              <meta name='viewport' content='width=device-width, initial-scale=1'>
                              <link href='https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css' rel='stylesheet'/>
                              <title></title>
                           </head>
                               <div class='dropdown-divider border-warning'></div>
                               <div class='row'>
                               <div class='table-responsive' id='orderTable'>
                              <table class= 'table table-striped' >
                              <tr>
                              <th>ID</th>
                              <th>Firstname</th>
                              <th>Surname</th>
                              <th>Gender</th>
                              <th>Phone</th>
                              <th>Appointment date</th>
                              <th>Symptoms</th>
                              <th>Date Booked</th> 
                              <th>Actions</th>
                              </tr>
                                   ";
                               if ( mysqli_num_rows($res) < 1) {
   	                            $output .="
                                    <tr>
                                       <td colspan='10' class = 'text-center' >no Appointment yet.</td>
                                    </tr>
                                  	";
                                  }
	 				    while($row = mysqli_fetch_array($res)){
                                $output .="
                                    <tr>
                                     <td> ".$row['id']." </td>
                                     <td> ".$row['firstname']." </td>
                                     <td> ".$row['surname']." </td>
                                     <td> ".$row['gender']." </td>
                                     <td> ".$row['phone']." </td>
                                     <td> ".$row['appointment_date']." </td>
                                     <td> ".$row['symptoms']." </td>
                                     <td> ".$row['date_booked']." </td>
                                     <td> 
                                      <a href='appointment_discharge_view.php?id=".$row['id']." '><button class = 'btn btn-success'>Check</button></a>
                                   </td>
         
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