<?php
$showAlert =false;
$showError =false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
   
    include 'partials/_dbconnect.php';
    $username= $_POST["username"];
    $password= $_POST["password"];
    $cpassword= $_POST["cpassword"];
   //$exists=false;
    $existSql="SELECT* FROM users WHERE username='$username'";
    $result=mysqli_query($conn, $existSql);
    $numExistRows =mysqli_num_rows($result);
      if($numExistRows > 0){
       // $exists =true;
       $showError ="Username Already Exists";
      }
      else{
       // $exists=false;
    if (($password==$cpassword)){
       
  $sql ="INSERT INTO `users` (`username`, `password` ) VALUES ( '$username', '$password')";
  $result= mysqli_query($conn, $sql);
  if($result){
    $showAlert =true;
  }

}
else {
    $showError ="Password do not match or Username Already exists";

}
}
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <style>
    form {
   display:flex;
        flex-direction:column;
        align-items:center;
    }
    </style>
  <body>
    <?php require 'partials/_nav.php'?>
    <?php 
   if($showAlert){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your account is now created.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div>
  ' ;
  }
  if($showError){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error !</strong> '. $showError.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
  </div> 
  ' ;
  }
  ?>
    <div class="container my-5">
        <h2 class="text-center" > Sign up  </h2>
        <form action="/Loginsystem/Signup.php" method="post">
  <div class="mb-3 col-md-6">
    <label for="username" class="form-label">Username </label>
    <input type="text" class="form-control" id="username" name ="username" required> 
  </div>
  <div class="mb-3 col-md-6 ">
    <label for="passsword" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" required>
  </div>
  <div class="mb-3 col-md-6">
    <label for="cpassword" class="form-label">Confirm Password</label>
    <input type="password" class="form-control" id="cpassword" name="cpassword">
    <div id="passwordHelp" class="form-text">Make sure to type the same password .</div>
  </div>
  
  <button type="submit" class="btn btn-primary col-md-6">Signup</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
</html>