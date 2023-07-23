<?php 
session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin</title>
</head>
<body>
      <?php 
       include ("../include/header.php");
       ?>
       <div class="container-fluid">
       	<div class="col-md-12">
       		<div class="row">
       			<div class="col-md-2" style="margin-left: -30px;">
                  <?php 
                   include("sidenav.php");
                   include("../include/connection.php");
                   ?>
       				
       			</div>
       			<div class="col-md-10">
       				<div class="col-md-12">
       					<div class="row">
       						<div class="col-md-6">
       							<h5 class="text-center">All Admin</h5>
                               <?php
    $ad = $_SESSION['Admin'];
    $query = "SELECT * FROM admin WHERE Username!='$ad' ";
    $res = mysqli_query($connect, $query);
    $output = "
        <table class='table table-bordered'>
            <tr>
                <th>Id</th>
                <th>Admin</th>
                <th>role</th>
                <th style='width : 10%;'>Action</th>
            </tr>";
    if (mysqli_num_rows($res) < 1) {
        $output .= "<tr><td colspan ='4' class='text-center'>No New Admin</td></tr>";
    }
    while ($row = mysqli_fetch_array($res)) {
        $id = $row['Id'];
        $Username = $row['Username'];
        $role = $row['role'];
        $_SESSION['role'] = 'Admin';
        if ($role == 'admin') {
            
            $output .= "
                <tr>
                    <td>$id</td>
                    <td>$Username</td>
                    <td>$role</td>";
            if ($_SESSION['role'] == 'admin') {
                $output .= "<td></td>";
            } else {
                $output .= "<td><a href='admin?id=$id'><button id='$id' class='btn btn-danger'>Remove</button></a></td>";
            }
            $output .= "</tr>";
        } else {
            $output .= "
                <tr>
                    <td>$id</td>
                    <td>$Username</td>
                    <td>$role</td>
                    <td></td>
                </tr>";
        }
    }
    $output .= "</table>";
    echo $output;

    if (isset($_GET['id']) && $_SESSION['role'] != 'admin') {
        $id = $_GET['id'];
        $query = "DELETE FROM admin WHERE Id = '$id'";
        mysqli_query($connect, $query);
    }
?>




                               </div>
       						<div class="col-md-6">
                             <?php 
                          if(isset($_POST['add'])){

                                                $uname=$_POST['uname'];
                                                $pass=$_POST['pass'];
                                                $image=$_FILES['img']['name'];

                                                $error = array();

                                                if(empty($uname)){
                                                    $error['u']="enter admin Username";
                                                }elseif (empty($pass)) {
                                                    $error ['u'] = "enter admin password";
                                                }elseif(empty($image)){
                                                    $error ['u'] = "add admin picture";
                                                }

                                                // Vérification de l'unicité de l'adresse e-mail
                                                $query = "SELECT * FROM admin WHERE Username='$uname'";
                                                $result = mysqli_query($connect, $query);
                                                if(mysqli_num_rows($result) > 0) {
                                                $error['u'] = "This admin already exists";
                                                }

                                            if(count($error)==0){
                                                $q="INSERT INTO admin (Username,Password,Profile,role) VALUES ('$uname','$pass','$image','admin')";
                                                $result = mysqli_query($connect,$q);
                                                if($result){
                                                    move_uploaded_file($_FILES['img']['tmp_name'], "img/$image");
                                                }else{

                                                }
                                            }
                                        }
                                        if(isset($error['u'])){
                                            $er=$error['u'];
                                            $show="<h5 class = 'text-center alert alert-danger'>$er<h5/>";
                                        }else{
                                            $show="";
                                        }

                                        ?>



       							<h5 class="text-center">Add Admin</h5>
       							<div class="card" style="margin-left : 30px; background-color: white;">
       							<form method="post" enctype="multipart/form-data">
       								<div><?php echo $show; ?></div>
       								<div class="form-group">
       									<label>Username</label>
       									<input type="text" name="uname" class="form-control" autocomplete="off" placeholder="Username">
       									
       								</div>
       								<div class="form-group">
       									<label>Password</label>
       									<input type="password" name="pass" class="form-control" placeholder="PassWord">
       									
       								</div>
       								<div class="form-group">
       									<label>Add admin picture</label>
       									<input type="file" name="img" class="form-control">
       									
       								</div><br>
       								<input type="submit" name="add" value="Add new admin" class="btn btn-success">
       								
       							</form>
       							</div>
       						</div>
       					</div>
       					
       				</div>
       				
       			</div>
       		</div>
       		
       	</div>
       	
       </div>
</body>
</html>