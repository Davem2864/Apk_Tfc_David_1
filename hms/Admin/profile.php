<?php 
  session_start();
  error_reporting(0);

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin profile page</title>
</head>
<body>
	<?php 
     include("../include/header.php");
     include("../include/connection.php");
     $ad = $_SESSION['Admin'];
     $query = "SELECT * FROM admin WHERE Username='$ad'";
     $res = mysqli_query($connect,$query);
     while ($row = mysqli_fetch_array($res)) {
     	$username=$row['Username'];
     	$profiles=$row['Profile'];
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
                                    	$query = "UPDATE admin SET Profile = '$profiles' WHERE Username='$ad'";
                                    	$result = mysqli_query($connect,$query);
                                    	 if ($result) {

                                    		move_uploaded_file($_FILES['profile']['tmp_name'], "img/$profiles");
                                    	}
                                    }
                                } 
	 							 ?>
	 							<form method="post" enctype="multipart/form-data">
	 								<?php 
                    echo " <img src='img/$profiles' class = 'col-md-12' style = 'height: 250px; width : 220px'> "; 
	 								 ?>
	 								 <br><br>
	 								 <div class="form-group">
	 								 	<label>update profile</label>
	 								 	<br>
	 								 	<input type="file" name="profile" class="form-control">
	 								 </div>
	 								 <br>
	 								 <input type="submit" name="update" value="update" class="btn btn-success">
	 							</form>
	 						</div>
	 						<div class="col-md-6">
	 							<?php 

	 							if (isset($_POST['change'])) {
	 								$uname = $_POST['uname'];
	 								if (empty($uname)) {
	 									
	 								}else{
	 									$query = "UPDATE admin SET Username = '$uname' WHERE Username='$ad' ";
	 									$res = mysqli_query($connect,$query);
	 									if ($res) {
	 										$_SESSION['admin'] = $uname;
	 									}
	 								}
	 							}

	 							 ?>
	 							<form method="post">
	 								<label>change username</label>
	 								<br>
	 								<input type="text" name="uname" class="form-control" autocomplete="off">
	 								<br>
	 								<input type="submit" name="change" class="btn btn-success" value="change username">
	 							</form>
	 							<br>
	 							<?php 
                                 if (isset($_POST['update_pass'])) {
                                 	$old_pass=$_POST['old_pass'];
                                 	$new_pass=$_POST['new_pass'];
                                 	$con_pass=$_POST['con_pass'];

                                 	$error = array();
                                 	$old = mysqli_query($connect,"SELECT * FROM admin WHERE Username='$ad'");
                                    $row = mysqli_fetch_array($old);
                                    $pass = $row['Password'];
                                 	if (empty($old_pass)) {
                                 		$error['p']="enter old password";
                                 	}elseif (empty($new_pass)) {
                                 		$error['p']="enter new password";
                                 	}elseif (empty($con_pass)) {
                                 		$error['p']="confirm password";
                                 	}elseif ($old_pass != $pass) {
                                 		$error['p'] = "invalid old password";
                                 	}elseif ($new_pass != $con_pass) {
                                 		$error['p'] = "both password doesn't match";
                                 	}
                                 	if (count($error)==0) {
                                 		$query = "UPDATE admin SET Password='$new_pass' WHERE Username = '$ad'";
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
	 								<input type="submit" name="update_pass" value="update password" class="btn btn-success">
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