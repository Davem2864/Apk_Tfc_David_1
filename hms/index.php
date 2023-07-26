<!DOCTYPE html>
<html lang="fr">
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <title>Home Page</title>
</head>
<body>
<?php
include("include/header.php");
?>    
<div style="margin-top: 50px;"></div>
<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-md-3 mx-1 shadow">
            <img src="img/more info2.jpg" style="width=100%">
            <h5 class="text-center">click on the button for more information</h5>
           <a href="information.html">
               <button class="btn btn-primary my-2"  style="width: 100%;height: 50px;">More Information</button>
           </a>
        </div>
        <div class="col-md-4 mx-1 shadow">
           <img src="img/doctors.jfif" width="330px" height="290px"> 
           <h5 class="text-center">we are employing doctors</h5>
           <a href="apply.php">
               <button class="btn btn-primary"  style="width: 100%;height: 50px;">Apply Now</button>
           </a>
        </div>
        <div class="col-md-4 mx-1 shadow"style="width=100%"> 
         <img src="img/OIP.jfif">  
         <h5 class="text-center">Create acount so that we can take good care of you.</h5>
           <a href="account.php">
               <button class="btn btn-primary"  style="width: 100%;height: 50px;">Create acount</button>
           </a> 
        </div>
        
    </div>
    
</div>
</body>
</html>