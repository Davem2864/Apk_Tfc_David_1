<?php 
  session_start();
  error_reporting(0);
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Doctor's profile page</title>
</head>
<body>
	<?php 
     include("../include/header.php");
     include("../include/connection.php");
     $ad = $_SESSION['doctor'];
     $query = "SELECT * FROM doctors WHERE username='$ad'";
     $res = mysqli_query($connect,$query);
     while ($row = mysqli_fetch_array($res)) {
     	$username=$row['username'];
     	$profiles=$row['profile'];
     }

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
	 				<div class="col-md-12">
	 					<div class="row">
	 						<div class="col-md-6">
	 							<h4><?php echo $username ?> profile</h4>
	 							<?php
	 							if (isset($_POST['update'])) {

	 							 	$profiles = $_FILES['profile']['name'];

	 							 	if (empty($profiles)){ 
                                    	
                                    }else{
                                    	$query = "UPDATE doctors SET profile = '$profiles' WHERE username='$ad'";
                                    	$result = mysqli_query($connect,$query);
                                    	$row = mysqli_fetch_array($res);
                                    	 if ($result) {

                                    		move_uploaded_file($_FILES['profile']['tmp_name'], "img/$profiles");
                                    	}
                                    }
                                } 
	 							 ?>
	 							 <?php 
                                    $ad = $_SESSION['doctor'];
                                    $query = "SELECT * FROM doctors WHERE username='$ad'";
                                    $res = mysqli_query($connect,$query);
                                    $row = mysqli_fetch_array($res);
	 							  ?>
	 							<form method="post" enctype="multipart/form-data">
	 								<?php 
                                    echo " <img src='img/$profiles' class = 'col-md-12' style = 'height: 250px; width : 250px'> "; 
	 								 ?>
	 								 <br><br>
	 								 <div class="form-group">
	 								 	<label>update profile</label>
	 								 	<br>
	 								 	<input type="file" name="profile" class="form-control">
	 								 </div>
	 								 <br>
	 								 <input type="submit" name="update" value="update" class="btn btn-primary">
	 							</form>
	 							<div class="table-responsive" id="orderTable">
	 								<table class="table table-striped">
	 									<tr>
	 										<th class="text-center" colspan="2">Detail</th>
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
	 										<td>Username</td>
	 										<td><?php echo $row['username']; ?></td>
	 									</tr>
	 									<tr>
	 										<td>Email</td>
	 										<td><?php echo $row['email']; ?></td>
	 									</tr>
	 									<tr>
	 										<td>Phone number</td>
	 										<td><?php echo $row['phone']; ?></td>
	 									</tr>
	 									<tr>
	 										<td>Gender</td>
	 										<td><?php echo $row['gender']; ?></td>
	 									</tr>
	 									<tr>
	 										<td>Country</td>
	 										<td><?php echo $row['contry']; ?></td>
	 									</tr>
	 									<tr>
	 										<td>Salary</td>
	 										<td><?php echo "".$row['salary']."$"; ?></td>
	 									</tr>
	 								</table>
	 								
	 							</div>
	 						</div>
	 						<div class="col-md-6">
	 							<?php 

	 							if (isset($_POST['change'])) {
	 								$uname = $_POST['uname'];
	 								if (empty($uname)) {
	 									
	 								}else{
	 									$query = "UPDATE doctors SET username = '$uname' WHERE username='$ad' ";
	 									$res = mysqli_query($connect,$query);
	 									if ($res) {
	 										$_SESSION['doctor'] = $uname;
	 									}
	 								}
	 							}

	 							 ?>
	 							<form method="post">
	 								<label>change username</label>
	 								<br>
	 								<input type="text" name="uname" class="form-control" autocomplete="off">
	 								<br>
	 								<input type="submit" name="change" class="btn btn-primary" value="change username">
	 							</form>
	 							<br>
	 							<?php 
                                 if (isset($_POST['update_pass'])) {
                                 	$old_pass=$_POST['old_pass'];
                                 	$new_pass=$_POST['new_pass'];
                                 	$con_pass=$_POST['con_pass'];

                                 	$error = array();
                                 	$old = mysqli_query($connect,"SELECT * FROM doctors WHERE username='$ad'");
                                  $row = mysqli_fetch_array($old);
                                  $pass = $row['password'];
                                 	if (empty($old_pass)) {
                                 		$error['p']="enter old password";
                                 	}elseif (empty($new_pass)) {
                                 		$error['p']="enter new password";
                                 	}elseif (empty($con_pass)) {
                                 		$error['p']="confirm password";
                                 	}elseif ($old_pass!=$pass) {
                                 		$error['p']="invalid old password";
                                 	}elseif ($new_pass!=$con_pass) {
                                 		$error['p']="both password doesn't match";
                                 	}
                                 	if (count($error)==0) {
                                 		$query = "UPDATE doctors SET password='$new_pass' WHERE username = '$ad'";
                                 		mysqli_query($connect,$query);
                                 	}
                                 	
                                 }
                                 if (isset($error['p'])) {
                                 		$e=$error['p'];
                                 		$show = "<h5 class = 'text-center alert alert-danger'>$e</h5?";
                                 	}else{
                                 		$show="";
                                 	}

	 							 ?>
	 							<form method="post">
	 								<h5 class="text-center my-4">change password</h5>
	 								<div>
	 									<?php 
	 								echo $show;
	 								 ?>
	 								</div>
	 								<div class="form-group">
	 									<label>Old password</label>
	 									<input type="password" name="old_pass" class="form-control">
	 								</div>
	 								<div class="form-group">
	 									<label>New password</label>
	 									<input type="password" name="new_pass" class="form-control">
	 								</div>
	 								<div class="form-group">
	 									<label>Confirm password</label>
	 									<input type="password" name="con_pass" class="form-control">
	 								</div>
	 								<br>
	 								<input type="submit" name="update_pass" value="update password" class="btn btn-primary">
	 							</form>
	 						</div>
	 						<?php
session_start();
// check if the doctor_id session variable is set
if (isset($_SESSION['doctor'])) {
    $doctor_id = $_SESSION['doctor'];
    if(isset($_POST['submit'])) {
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        if ($fileActualExt == "pdf") {
            if ($fileError == 0) {
                if ($fileSize < 1000000) {
                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'cv/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    // database connection
                    include("../include/connection.php");
                    // update the cv column in the doctors table with the file path
                    $query = "UPDATE doctors SET cv='$fileDestination' WHERE id='$doctor_id'";
                    mysqli_query($connect, $query);
                } else {
                    echo "Your file is too big!";
                }
            } else {
                echo "There was an error uploading your file!";
            }
        } else {
            echo "You cannot upload files of this type!";
        }
    }
} else {
    echo "Doctor ID not set";
}
?>
                <div class="form-group">
	               <form action="" method="POST" enctype="multipart/form-data">
                   <input type="file" name="file" class="form-control"><br>
                   <button type="submit" name="submit" class="btn btn-primary">Upload</button>
               </form>

               </div>

	 					</div>
	 					
	 				</div>
	 			</div>
	 			
	 		</div>
	 		
	 	</div>
	 	
	 </div>

</body>
</html>