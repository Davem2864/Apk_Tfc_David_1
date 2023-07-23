<?php
session_start(); 
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>patient report</title>
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
	 				<h5 class="text-center my-3">Total report</h5>
	 				<?php
	 				$query="SELECT * FROM report ORDER BY date_send DESC";
	 				$res=mysqli_query($connect,$query);
	 				$output="";
	 				$output.="   
	 				 <div class='table-responsive' id='orderTable'>
                     <table class= 'table table-striped' >
                     <tr>
                     <th>ID</th>
                     <th>Title</th>
                     <th>Message</th>
                     <th>Username</th>
                     <th>Date Send</th>
                     <th>Action</th>
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
                             <td> ".$row['id']." </td>
                             <td> ".$row['title']." </td>
                             <td> ".$row['message']." </td>
                             <td> ".$row['username']." </td>
                             <td> ".$row['date_send']." </td>
                              <td> 
                                 <a href='view_patient_report.php?id=".$row['id']." '>
                                  <button class = 'btn btn-info'>View Report<button>
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