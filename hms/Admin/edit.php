<?php 
session_start();
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<meta charset="utf-8">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<title>Edit Doctor</title>
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
 	 				<?php include("sidenav.php"); ?>
 	 			</div>
 	 			<div class="col-md-10">
 	 				<h5 class="text-center">Edit Doctor</h5>
 	 				<?php 
                      if (isset($_GET['id'])) {
                          $id=$_GET['id'];
                          $query="SELECT * FROM doctors WHERE Id='$id' ";
                          $res = mysqli_query($connect,$query);
                          $row = mysqli_fetch_array($res);
                      }
                     ?>
                     <div class="row">
                        <div class="col-md-8">
                            <h5 class="text-center">Doctor details</h5>
                            <h5 class="my-2">ID : <?php echo $row['Id']; ?></h5>
                            <h5 class="my-2">Firstname : <?php echo $row['firstname']; ?></h5>
                            <h5 class="my-2">Surname : <?php echo $row['surname']; ?></h5>
                            <h5 class="my-2">Email : <?php echo $row['email']; ?></h5>
                            <h5 class="my-2">Gender : <?php echo $row['gender']; ?></h5>
                            <h5 class="my-2">Phone : <?php echo $row['phone']; ?></h5>
                            <h5 class="my-2">Country : <?php echo $row['contry']; ?></h5>
                            <h5 class="my-2">Date Regidtred : <?php echo $row['date_reg']; ?></h5>
                            <h5 class="my-2">Salary : <?php echo $row['salary']; ?>$</h5>
                        </div>
                        <div class="col-md-4">
                            <h5 class="text-center">Update salary</h5>
                            <?php 
                            if (isset($_POST['update'])) {
                                 $salary=$_POST['salary'];
                                 $q="UPDATE doctors SET salary='$salary' WHERE Id='$id' ";
                                 mysqli_query($connect,$q);
                             } ?>
                            <form method="post">
                                <label>Doctor's salary</label>
                                <input type="number" name="salary" class="form-control" autocomplete="off" placeholder="Doctor's salary" required value="<?php echo $row['salary']; ?>">
                                <br>
                                <input type="submit" name="update" class="btn btn-info" value="Update Salary">
                            </form>
                        </div>
                         
                     </div>
 	 			</div>
 	 			
 	 		</div>
 	 	</div>
 	 </div>
 
 </body>
 </html>