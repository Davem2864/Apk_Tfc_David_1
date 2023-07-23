<?php 
session_start();
 ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Total report</title>
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
	 				include("sidenav.php"); ?>
	 			</div>
	 			<div class="col-md-10">
	 				<h5 class="text-center my-3">Total report</h5>
	 				<style type="text/css">
	 					@media print {
                            .no-print {
                              display: none;
                            }
                          }
	 				</style>
	 				<button id="downloadPDF" class="btn btn-primary" style="margin-right:30cm ;">print the list</button>
                          <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
                          <script>
                            document.getElementById('downloadPDF').addEventListener('click', function() {
                              var element = document.getElementById('orderTable');
                              html2pdf().from(element).save('doctor_list.pdf');

                              var element = document.getElementById('orderTable');
                               var opt = {
                                 margin: [0.5, 0.3],
                                 filename: 'doctor_list.pdf',
                                 image: { type: 'jpeg', quality: 0.98 },
                                 html2canvas: { scale: 2 },
                                 jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
                               };
                                html2pdf().from(element).set(opt).save();
                            });
                          </script>
	 				<?php
	 				$query="SELECT * FROM doctors_report ORDER BY date_send DESC";
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
                    <th class='no-print'>Action</th> 
                     </tr>
                     ";
                     if ( mysqli_num_rows($res) < 1) {
                     	$output .="
                          <tr>
                             <td colspan='10' class = 'text-center' >no doctor Report yet.</td>
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
                                 <a href='view_doctor_report.php?id=".$row['id']." '>
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