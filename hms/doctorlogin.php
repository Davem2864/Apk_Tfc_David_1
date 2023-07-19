<?php 	
session_start();

include("include/connection.php");
if (isset($_POST['login'])) {
	$uname=$_POST['uname'];
	$password=$_POST['pass'];
	$error = array();
	$q="SELECT * FROM doctors WHERE username='$uname' AND password = '$password'";
	$qq=mysqli_query($connect,$q);
	$row = mysqli_fetch_array($qq);

	if (empty($uname)) {
		$error['login'] = "Enter Username";
	}elseif (empty($password)){
		$error['login'] = "Enter password";
	}elseif ($row['status']=="Pending"){
		$error['login'] = "please wait for the admin to confirm acces";
	}elseif ($row['status'] == "Rejected") {
		$error['login'] = "your apply has been rejected, please try again or resend your CV";
	}elseif ($row['status']=="") {
		$error['login'] = "you haven't yet an account";
	}

	if (count($error) == 0) {
		$query = "SELECT * FROM patient WHERE username='$uname' AND password='$password'";
		$res = mysqli_query($connect,$query);
		if ( mysqli_num_rows($res) ) {
			echo "<script>alert('done')</script>";
			$_SESSION['doctor']=$uname;
			header("Location:patient/index.php");
		}else{
			echo "<script>alert ('invalid account') </script>";
		}
	}
}

if (isset($error['login'])) {
	$l=$error['login'];
	$show="<h5 class= 'text-center alert alert-danger'>$l</h5>";
}else{
	$show="";
}

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Doctor Login Page</title>
</head>
<body style="background-image : url(https://www.jeuneafrique.com/medias/2013/10/23/Hopital-cinquantenaire-RDC_dr-e1520589911830.jpg); background-repeat : no-repeat; background-size : cover;">
	<?php
	include("include/header.php"); 
	 ?>
	 <div style="margin-top: 60px;"></div>
	 <div class="container-fluid">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-3"></div>
	 			<!-- <div class="card" style="width: 600px; height: 600px; border-radius: 20px; padding: 20px;"> -->
	 			<div class="col-md-6 card my-5">
	 				<img src="img/doctors icon.jpg" class="col-md-12" style="height: 80px; width: 80px; align-content: center; text-align: center;">
	 				<h5 class="text-center my-3"> Doctors Login</h5>
	 				<div>
	 					<?php echo $show; ?>
	 				</div>
	 				<form method="post">
	 					<div class="form-group">
	 						<label>User Name</label>
	 						<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Username">
	 					</div>
	 					<div class="form-group">
	 						<label>Password</label>
	 						<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Password">
	 					</div><br>
	 					<input type="submit" name="login" class="btn btn-success" value="Login">
	 					<p>i don't have an account <a href="apply.php">Apply today!!!</a></p>
	 					
	 				</form>
	 			</div>
	 			<!-- </div> -->
	 			<div class="col-md-3"></div>
	 			
	 		</div>
	 		
	 	</div>
	 	
	 </div>

</body>
</html>