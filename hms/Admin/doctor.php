<?php 
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
   <link href="https://cdn.datatables.net/v/bs5/dt-1.13.4/datatables.min.css" rel="stylesheet"/>
	<title>All Doctors </title>
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
	 				<h5 class="text-center">All Doctors</h5>
	 				<?php 
	 				$query="SELECT * FROM doctors WHERE status= 'Approved' ORDER BY date_reg ASC ";
	 				$res=mysqli_query($connect,$query);

	 				 $output = "";
   $output .= "
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
   <th>Country</th>
   <th>CV</th>
   <th>Username</th>
   <th>Salary</th>
   <th>Date Registered</th> 
   <th>Actions</th>
   </tr>
   ";
   if ( mysqli_num_rows($res) < 1) {
   	$output .="
        <tr>
           <td colspan='10' class = 'text-center' >no job request yet.</td>
        </tr>
   	";
   }
   while($row = mysqli_fetch_array($res)){
      $output .="
          <tr>
           <td> ".$row['Id']." </td>
           <td> ".$row['firstname']." </td>
           <td> ".$row['surname']." </td>
           <td> ".$row['gender']." </td>
           <td> ".$row['phone']." </td>
           <td> ".$row['contry']." </td>
           <td> <a href='#' class='btn btn-success btn-sm' id='export'><i class='fas fa-table'></i>".$row['cv']." </a> </td>
           <td> ".$row['username']." </td>
           <td> ".$row['salary']." </td>
           <td> ".$row['date_reg']." </td>
            <td> 
               <a href='edit.php?id=".$row['Id']." '>
                <button class = 'btn btn-info'>Edit<button>
               </a>
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