<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !=true){
    header("location:login.php");
    exit;
}
    ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <?php include '_nav.php';?>
    <?php include 'insert.php';?>
    
    
    <div class="box1">
    <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#exampleModal"> Add employee </button>
</div>
    <div class="container">
    <table class="table table-hover table-bordered table-striped">
        <thead> 
            <tr> 
                <th> sno</th>
                <th> employee_no</th>
                <th> first_name</th>
                <th> last_name</th>
                <th> address </th>
                <th> position </th>
                <th> salary </th>
                <th> update </th>
                <th> delete </th>
</tr>
        </thead>
        <tbody>

        <?php 
        $sql = "SELECT* from employeee";
        $result = mysqli_query($conn , $sql);
        if(!$result)
        {
            die("query failed" .mysqli_error());
        }
        else {  

            while ($row = mysqli_fetch_assoc($result)){
        ?>

             <tr>
              
            <td><?php echo $row['sno']; ?></td>
            <td><?php echo $row['employee_no'];?></td>
            <td><?php echo $row['first_name'];?></td>
            <td><?php echo $row['last_name'];?></td>
            <td><?php echo $row['address'];?></td>
            <td><?php echo $row['position'];?> </td>
            <td><?php echo $row['salary'];?> </td>
            <td><a href="update_page_1.php? id=<?php echo $row['sno']; ?>" class="btn btn-success">update</a></td>
            <td> <a href="delete_page.php? id=<?php echo $row['sno']; ?>"class="btn btn-danger" >delete</td>
             </tr> 
<?php
            }

        }
        ?>
</tbody>
</table>
<?php
$query = "select max(employee_no)+1 as new_emp_code from employeee order by sno desc limit 1";
$result = mysqli_query($conn , $query);
$row =mysqli_fetch_assoc($result);

$newEmployeeCode = "";
if(null === $row['new_emp_code']){
  $newEmployeeCode = "YI-"."10001";
}else{
  $newEmpCode =$row['new_emp_code'];
  $newEmployeeCode = "YI-".$newEmpCode;
}

 if(isset($_GET['update_msg'])){
    echo "<h6>" .$_GET['update_msg'] ."</h6>";
 }
 if(isset($_GET['insert_msg'])){
    echo "<h6>" .$_GET['insert_msg'] ."</h6>";
 }
 if(isset($_GET['delete_msg'])){
  echo "<h6>" .$_GET['delete_msg'] ."</h6>";
}
?>
<form action=insert.php method="post">
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Employee Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
        </button>
      </div>
      <div class="modal-body">
            <div class="form-group">
                <label for="employee_no"> Employee Code </label>
                <input type="text" value="<?= $newEmployeeCode;?>" name ="employee_no" readonly class="form-control">
            </div>
            <div class="form-group">
                <label for="first_name"> first_name</label>
                <input type="text" name ="first_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="last_name"> last_name </label>
                <input type="text" name ="last_name" class="form-control">
            </div>
            <div class="form-group">
                <label for="address"> address </label>
                <input type="text" name ="address" class="form-control">
            </div>
            <div class="form-group">
                <label for="salary"> salary </label>
                <input type="text" name ="salary" class="form-control">
            </div>
            <div class="form-group">
                <label for="position"> position </label>
                <select name="position" id="position">
	             <option value="Software developer">Software developer</option>
	             <option value="Quality Assurance">Quality Assurance</option>
	              <option value="Front-end developer">Front-end developer</option>
                <option value="back-end developer">Back-end developer </option>
                <option value="Full-stack developer">Full-stack developer </option>
               </select>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success" name="add_employee" value="ADD"></button>
    </div>
      </div>
    </div>
  </div>
</div>
</div>

</form> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>


  </body>
</html>