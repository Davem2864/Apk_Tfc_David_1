<?php 
  include("include/connection.php");

 if (isset($_POST['apply'])) {

  	$firstname = $_POST['fname'];
  	$surname = $_POST['sname'];
  	$email = $_POST['email'];
  	$username = $_POST['uname'];
  	$gender = $_POST['gender'];
  	$phone = $_POST['phone'];
  	$country = $_POST['country'];
  	$password = $_POST['pass'];
  	$confirm_password = $_POST['con_pass'];

  	$error = array();

  	if(empty($firstname)) {
  		$error['apply']="enter firstname";
  	}elseif (empty($surname)) {
  		$error['apply']="enter surname";
  	}elseif (empty($email)) {
  		$error['apply'] = "Enter email";
  	}elseif (empty($username)) {
  		$error['apply'] = "Enter Username";
  	}elseif($gender=="") {
  		$error['apply'] = "select your gender";
  	}elseif(empty($phone)) {
  		$error['apply'] = "Enter phone";
  	}elseif($country=="") {
  		$error['apply'] = "select your country";
  	}elseif (empty($password)) {
  		$error['apply'] = "Enter password";
  	}elseif ($confirm_password != $password) {
  		$error['apply'] = "both password do not match";
  	}

  	if (count($error) ==  0) {
  		$query = "INSERT INTO doctors(firstname,surname,email,gender,phone,contry,cv,username,password,salary,date_reg,status,profile) VALUES ('$firstname','$surname','$email','$gender','$phone','$country','doc.pdf','$username','$password','0',NOW(),'Pending','doctor2.jpg')";

  		$result = mysqli_query($connect,$query);
  		if ($result) {
  			header("Location: doctorlogin.php");
  			echo "<script>alert('you have successfully Aplled')</script>";
  		}else{
  			echo "<script>alert('appled failed')</script>";
  		}
  	} 
  }
  if (isset($error['apply'])) {
  	$s=$error['apply'];
  	$show = "<h5 class = 'text-center alert alert-danger'>$s</h5>";
  }else{
  	$show = "";
  }

 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<title>Apply now!!!</title>
</head>
<body style="background-image : url(https://www.jeuneafrique.com/medias/2013/10/23/Hopital-cinquantenaire-RDC_dr-e1520589911830.jpg); background-repeat : no-repeat; background-size : cover;">
	<?php 
     include("include/header.php");
	 ?>
	 <div class="container-fluid">
	 	<div class="col-md-12">
	 		<div class="row">
	 			<div class="col-md-3"></div>
	 			<div class="col-md-6 card card-fluid my-3">
	 				<h5 class="text-center">Apply Now</h5>
	 				<div>
	 					<?php echo $show; ?>
	 				</div>
	 				<form method="post">
	 					<div class="form-group">
	 						<label>Firstname</label>
	 						<input type="text" name="fname" class="form-control form-control-lg" autocomplete="off" placeholder="Firstname" value="<?php if (isset($_POST['fname'])) echo $_POST['fname'] ;?>">
	 					</div>
	 					<div class="form-group">
	 						<label>Surname</label>
	 						<input type="text" name="sname" class="form-control form-control-lg" autocomplete="off" placeholder="Surname" value="<?php if (isset($_POST['sname'])) echo $_POST['sname'] ;?>">>
	 					</div>
	 					<div class="form-group">
	 						<label>Email</label>
	 						<input type="email" name="email" class="form-control form-control-lg" autocomplete="off" placeholder="Email" value="<?php if (isset($_POST['email'])) echo $_POST['email'] ;?>">>
	 					</div>
	 					<div class="form-group">
	 						<label>Username</label>
	 						<input type="text" name="uname" class="form-control form-control-lg" autocomplete="off" placeholder="Username">
	 					</div>
	 					
	 				</form>
	 				<form method="post" class="col-md-6">
	 					<div class="form-group">
	 						<label>Gender</label>
	 						<select name="gender" class="form-control form-control-lg">
	 							<option value="">select gender</option>
	 							<option value="male">male</option>
	 							<option value="female">female</option>
	 							<option value="other">other</option>
	 						</select>
	 					</div>
	 					<div class="form-group">
	 						<label>Phone number</label>
	 						<input type="text" name="phone" class="form-control form-control-lg" autocomplete="off" placeholder="Phone number" value="<?php if (isset($_POST['phone'])) echo $_POST['phone'] ;?>">>
	 					</div>
	 					<div class="form-group">
	 						<label>Country</label>
	 						<select name="country" class="form-control form-control-lg">
	 							<option value="">select country</option>
	 							<option value="Nigeria">Nigeria</option>
	 							<option value="South_Africa">south_Africa</option>
	 							<option value="Ghana">Ghana</option>
	 							<option value="DR congo">DR congo</option>
	 							<option value="Congo Brazza">Congo Brazza</option>
	 							<option value="Kenya">Kenya</option>
	 							<option value="Burundi">Burundi</option>
	 							<option value="Ouganda">Ouganda</option>
	 						</select>
	 					</div>
	 					<div class="form-group">
	 						<label>Password</label>
	 						<input type="password" name="pass" class="form-control form-control-lg" autocomplete="off" placeholder="PassWord">
	 					</div>
	 					<div class="form-group">
	 						<label>Confirm password</label>
	 						<input type="password" name="con_pass" class="form-control form-control-lg" autocomplete="off" placeholder="Confirm password">
	 					</div><br>
	 					<input type="submit" name="apply" class="btn btn-primary" value="Apply">
	 					<br>
	 					<p> i alraedy have an account <a href="doctorlogin.php">click here</a> </p>
	 				</form>
	 				
	 			</div>
	 			<!-- </div> -->
	 			<div class="col-md-3"></div>
	 			 
	 		</div>
	 		
	 	</div>
	 	
	 </div>

</body>
</html>