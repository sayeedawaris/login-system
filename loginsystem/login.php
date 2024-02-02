<?php require '_nav.php'
    ?>
    <?php
$login =false;
$showError =false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
   
    include '_dbconnect.php';
    $username= $_POST["username"];
    $password= $_POST["password"]; 
    $sql ="Select  * from users where username='$username' AND password='$password'";
 
  $result= mysqli_query($conn, $sql);
  $num = mysqli_num_rows($result);
  if($num == 1){
    $login =true;
    session_start();
    $_SESSION['loggedin']=true;
    $_SESSION['username']=$username;
    header("location:welcome.php");
  }

else {
$showError ="Invalid Credentials";
}
}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
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
    <?php
   if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You are logged in.
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

    <div class="container my-5  ">
        <h2 class="text-center" > Login   </h2>
        <form action="/Loginsystem/Login.php" method="post">
  <div class="mb-3 col-md-6">
    <label for="username" class="form-label">Username </label>
    <input type="text" class="form-control" id="username" name ="username" aria-describedby="emailHelp"> 
  </div>
  <div class="mb-3 col-md-6 ">
    <label for="passsword" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" >
  </div>
  
  <button type="submit" class="btn btn-primary col-md-6">Login</button>
</form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>

</html>