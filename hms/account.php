<?php 
include("include/connection.php");

if (isset($_POST['create'])) {
	$fname=$_POST['fname'];
	$sname=$_POST['sname'];
	$uname=$_POST['uname'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$gender=$_POST['gender'];
	$country=$_POST['country'];
	$password=$_POST['pass'];
	$con_pass=$_POST['con_pass'];

	$error = array();
	if (empty($fname)) {
		$error['ac']="Enter Firstname";
	}elseif (empty($sname)) {
		$error['ac']="Enter Surname";
	}elseif (empty($uname)) {
		$error['ac']="Enter Username";
	}elseif (empty($email)) {
		$error['ac']="Enter Email";
	}elseif (empty($phone)) {
		$error['ac']="Enter Phone Number";
	}elseif ($gender ==" ") {
		$error['ac']="Select your Gender";
	}elseif ($country == " ") {
		$error['ac']="Select your Country";
	}elseif (empty($password)) {
		$error['ac']="Enter your Password";
	}elseif ($con_pass != $password) {
		$error['ac']="both password do not match";
	}
	if (count($error)==0) {
		$query="INSERT INTO patient(firstname,surname,username,email,phone,gender,country,password,date_reg,profile) VALUES('$fname','$sname','$uname','$email','$phone','$gender','$country','$password',NOW(),'patient.jpg')";
		$res= mysqli_query($connect,$query);
		if ($res) {
			header("Location:patientlogin.php");
		}else{
			echo "<script> alert('failed')  </script>";
		}
	}
}
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Patient account</title>
</head>
<body style="background-image : url(https://th.bing.com/th/id/OIP.K08kdb-E9Kb6fB0rL0N4ZQHaDt?w=303&h=174&c=7&r=0&o=5&dpr=1.3&pid=1.7); background-repeat: no-repeat; background-size:cover;">
	<?php 
	include("include/header.php");

	 ?>
	 <div class="container-fluid">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-3">
	 				
	 			</div>
	 			<div class="col-md-6 card card-fluid my-3" style="margin-left:10cm;">
	 				<h5 class="text-center text-info my-2">create account</h5>
	 				<form method="post" class="col-md-6">
	 					<div class="form-group">
	 						<label>Firstname</label>
	 						<input type="text" name="fname" class="form-control" autocomplete="off" placeholder="Firstname">
	 					</div>
	 					<div class="form-group">
	 						<label>Surname</label>
	 						<input type="text" name="sname" class="form-control" autocomplete="off" placeholder="Surname">
	 					</div>
	 					<div class="form-group">
	 						<label>Username</label>
	 						<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Username">
	 					</div>
	 					<div class="form-group">
	 						<label>Email</label>
	 						<input type="email" name="email" class="form-control" autocomplete="off" placeholder="Email">
	 					</div>
	 					<div class="form-group">
	 						<label>Phone Number</label>
	 						<input type="text" name="phone" class="form-control" autocomplete="off" placeholder="Phone Number">
	 					</div>
	 					<form method="post" class="col-md-6">
	 						
	 					<div class="form-group">
	 						<label>Gender</label>
	 						<select name="gender" class="form-control">
	 							<option value="">select your gender</option>
	 							<option value="Male">Male</option>
	 							<option value="Female">Female</option>
	 							<option value="Other">Other</option>
	 						</select>
	 					</div>
	 					<div class="form-group">
	 						<label>Country</label>
	 						<select name="country" class="form-control">
	 							<option value="">select your country</option>
	 							<option value="RD Congo">RD Congo</option>
	 							<option value="Rwanda">Rwanda</option>
	 							<option value="Congo Braza">Congo Braza</option>
	 							<option value="Cameroun">Cameroun</option>
	 							<option value="Zambia">Zambia</option>
	 							<option value="Zimbabwe">Zimbabwe</option>
	 							<option value="Tanzania">Tanzania</option>
	 							<option value="Ouganda">Ouganda</option>
	 							<option value="Kenya">Kenya</option>
	 							<option value="Burundi">Burundi</option>
	 							<option value="Center-African Republic">Center-African Republic</option>
	 							<option value="Soudan">Soudan</option>
	 						</select>
	 					</div>
	 					<div class="form-group">
	 						<label>Password</label>
	 						<input type="password" name="pass" class="form-control" autocomplete="off" placeholder="Password">
	 					</div>
	 					<div class="form-group">
	 						<label>Confirm Password</label>
	 						<input type="password" name="con_pass" class="form-control" autocomplete="off" placeholder="Confirm Password">
	 					</div>
	 					<br>
	 					<input type="submit" name="create" class="btn btn-success" value="Create account">
	 					<p>i already have an account<a href="patientlogin.php"> click here </a></p>
	 					</form>
	 				</form>
	 			</div>
	 		<!-- </div> -->
	 			<div class="col-md-3">
	 				
	 			</div>
	 			
	 		</div>
	 		
	 	</div>
	 	
	 </div>

</body>
</html>