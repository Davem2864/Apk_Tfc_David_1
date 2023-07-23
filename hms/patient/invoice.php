<?php
session_start(); 
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>My Invoice</title>
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
	 				<h5 class="text-center my-2">My Invoice</h5>
	 				<?php
	 				$pat=$_SESSION['patient'];
	 				$query="SELECT * FROM patient WHERE username='$pat' ";
	 				$res=mysqli_query($connect,$query);
	 				$row=mysqli_fetch_array($res);
	 				$fname=$row['firstname'];
	 				$querys=mysqli_query($connect,"SELECT * FROM income WHERE patient='$fname'");
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
                              <th>Doctor</th>
                              <th>Patient</th>
                              <th>Date Discharge</th>
                              <th>Amount Paid</th>
                              <th>Description</th>
                              <th>Appointment date</th> 
                              <th>Actions</th>
                              </tr>

	 				";
	 				if ( mysqli_num_rows($querys) < 1) {
   	                            $output .="
                                    <tr>
                                       <td colspan='10' class = 'text-center' >no invoice yet.</td>
                                    </tr>
                                  	";
                                  }

	 				    while($row = mysqli_fetch_array($querys)){
                                $output .="
                                    <tr>
                                     <td> ".$row['id']." </td>
                                     <td> ".$row['doctor']." </td>
                                     <td> ".$row['patient']." </td>
                                     <td> ".$row['date_discharge']." </td>
                                     <td> ".$row['amount_paid']." </td>
                                     <td> ".$row['description']." </td>
                                     <td> ".$row['date_check']." </td>
                                     <td> 
                                      <a href='view.php?id=".$row['id']." '><button class = 'btn btn-info'>View</button></a>
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