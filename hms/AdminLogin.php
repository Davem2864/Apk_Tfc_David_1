<?php 
session_start();
include("include/connection.php");
if (isset($_POST['login'])) {
	$Username = $_POST['uname'];
	$Password = $_POST['pass'];
	$Error = array();
	if (empty($Username)) {
		$Error['Admin'] = "Enter Username";
	}
	elseif (empty($Password)) {
		$Error['Admin'] = "Enter Password";
	}
	if (count($Error)==0) {
		$query = " select * from admin where Username='$Username' and Password='$Password' ";
		$Result = mysqli_query($connect, $query);
		if ( mysqli_num_rows ($Result)==1) {
			echo "<script> alert ('you have been login as an admin') </script>";
			$_SESSION['Admin']= $Username;
			header("Location:Admin/index.php");
			exit();
		}else{
			echo "<script> alert ('invalid Username or Password') </script>";
		}
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin login page</title>
</head>
<body style="background-image: url(https://www.jeuneafrique.com/medias/2013/10/23/Hopital-cinquantenaire-RDC_dr-e1520589911830.jpg); background-repeat: no-repeat; background-size: cover;">
<?php
include("include/header.php");
?>
<div style="margin-top: 60px"></div>
<div class="container">
	<div class="col-md-12">
		<div class="row">
			<div class="col-md-3"></div>
			<!-- <div class="card" style="width: 600px; height: 400px; border-radius: 20px; align-content: center;"> -->
				<div class="col-md-6 card" style="padding: 10px;">
				<img src="img/admin log2.jfif" class="col-md-12" style="height: 80px; width: 80px; align-content: center; text-align: center;">
					<form method="post">
						<div class="alert alert-danger">
							<<?php 
							if (isset($Error['Admin'])) {
								$sh = $Error['Admin'];
								$show = "<h4 class = 'alert alert-danger'>$sh</h4>";
							}else{
								$show="";
							}
							echo "$show";

							 ?>
						</div>
						<div class="form-group" style="padding: 5px; align-content: center;">
							<label>User Name</label><br>
							<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="User Name">
						</div>
						<br>
						<div class="form-group">
							<label>PassWord</label><br>
							<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="PassWord">
						</div>
						<br>
 						<input type="submit" name="login" class="btn btn-success" value="Login">
					</form>
				</div>
				<!-- </div> -->
		</div>
		
	</div>
	</div>
</body>
</html>