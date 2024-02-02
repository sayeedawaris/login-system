<?php include '_nav.php';?>
<?php include 'insert.php' ;?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
<?php
if(isset($_GET['id'])){
    $id = $_GET['id'];

$sql = "SELECT * FROM `employeee` WHERE `sno`= '$id'";
$result = mysqli_query($conn , $sql);
if(!$result)
{
    die("query failed" .mysqli_error());
}
else {  

   
    $row =mysqli_fetch_assoc($result);
}
}
?>


<?php

if(isset($_POST['update_employeee'])){

    if(isset($_GET['id_new'])){
        $idnew=$_GET['id_new'];
    }
    $employee_no=$_POST['employee_no'];
    $first_name=$_POST['first_name'];
    $last_name=$_POST['last_name'];
    $address=$_POST['address'];
    $salary=$_POST['salary'];
    $position=$_POST['position'];
    $sql = "update `employeee` set `first_name`='$first_name' , `last_name`='$last_name' , `address`='$address', `salary`='$salary', `position`='$position' where `sno`='$idnew'";

              $result = mysqli_query($conn , $sql);
          if(!$result)
          {
              die("query failed" .mysqli_error());
          }
          else{
            header ('location:welcome.php?update_msg= You have successfully updated the data ');
          }
}
?>
<form action="update_page_1.php?id_new=<?php echo $id; ?>" method="post">
<div class="form-group">
                <label for="employee_no"> employee_id </label>
                <input type="number" name ="employee_no" class="form-control"value ="<?php echo $row['employee_no'] ?>">
            </div>
            <div class="form-group">
                <label for="first_name"> first_name</label>
                <input type="text" name ="first_name" class="form-control"value ="<?php echo $row['first_name'] ?>">
            </div>
            <div class="form-group">
                <label for="last_name"> last_name </label>
                <input type="text" name ="last_name" class="form-control"value ="<?php echo $row['last_name'] ?>">
            </div>
            <div class="form-group">
                <label for="address"> address </label>
                <input type="text" name ="address" class="form-control"value ="<?php echo $row['address'] ?>">
            </div>
            <div class="form-group">
                <label for="salary"> salary </label>
                <input type="text" name ="salary" class="form-control"value ="<?php echo $row['salary'] ?>">
            </div>
            <div class="form-group">
                <div class="box">
                <label for="position"> position   </label>
                <input type="select" name ="positon" class="form-control"value ="<?php echo $row['position'] ?>">
                <select name="position" >
	             <option value="Software developer">Software developer</option>
	             <option value="Quality Assurance">Quality Assurance</option>
	              <option value="Front-end developer">Front-end developer</option>
                <option value="back-end developer">Back-end developer </option>
                <option value="Full-stack developer">Full-stack developer </option>
               </select>
            </div>
</div>
      </div>
      <div class="button">
      <input type="submit" class="btn btn-success" name="update_employeee" value="update"></button>
</div>
</form>