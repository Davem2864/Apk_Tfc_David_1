<!DOCTYPE html>
<html lang="en">
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" >
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js" integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.2.1/css/fontawesome.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-info bg-info" >
        <h5 class="text-black"> HOSPITAL APPOINTMENT SYSTEM </h5>
        <div class="mr-auto"> </div>
        <div class="navbar-colapse colapse justify-content-between">
<ul class="navbar-nav mr-auto">
 <?php 
if (isset($_SESSION['Admin'])){
    $user=$_SESSION['Admin'];
    echo'
<li class="nav-item"><a href="#" class="nav-link text-white" style="text-align: left;">'.$user.'</a></li>
<li class="nav-item"><a href="../index.php" class="nav-link text-white" style="text-align: left;">Logout</a></li>

    ';
}elseif (isset($_SESSION['doctor'])) {
         $user=$_SESSION['doctor'];
    echo'
<li class="nav-item"><a href="#" class="nav-link text-white" style="text-align: left;">'.$user.'</a></li>
<li class="nav-item"><a href="../index.php" class="nav-link text-white" style="text-align: left;">Logout</a></li>

    ';
}elseif (isset($_SESSION['patient'])) {
         $user=$_SESSION['patient'];
    echo'
<li class="nav-item"><a href="#" class="nav-link text-white" style="text-align: left;">'.$user.'</a></li>
<li class="nav-item"><a href="../index.php" class="nav-link text-white" style="text-align: left;">Logout</a></li>

    ';
}else{
    echo'
    <li class="nav-item"><a href="index.php" class="nav-link text-white" style="text-align: left;">Home</a></li>
    <li class="nav-item"><a href="AdminLogin.php" class="nav-link text-white" style="text-align: left;">Admin</a></li>
    <li class="nav-item"><a href="doctorlogin.php" class="nav-link text-white" style="text-align: left;">Doctor</a></li>
    <li class="nav-item"><a href="patientlogin.php" class="nav-link text-white"style="text-align:left;">Patient</a></li>
';
 
}
?>
</ul>
</div>
    </nav>
</body>
</html>