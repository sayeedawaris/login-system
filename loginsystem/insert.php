<?php
include'_dbconnect.php'; 
if(isset($_POST['add_employee'])){
    $employeeCode=  str_replace('YI-', '' , $_POST['employee_no']);
    $first_name= $_POST['first_name'];
    $last_name= $_POST['last_name'];
    $address=$_POST['address'];
    $salary=$_POST['salary'];
    $position= $_POST['position'];
   

    if($first_name == "" || empty($first_name)){
      header('location:welcome.php? message=you need to fill in the first name!!');
    }
    else{
        $sql="INSERT INTO `employeee` (`employee_no`, `first_name`, `last_name`,`position`,`salary`,`address`) VALUES ('$employeeCode','$first_name','$last_name','$position','$salary','$address')";
        $result=mysqli_query($conn, $sql);
        if(!$result)
        {
            die("query failed" .mysqli_error());
        }
        else {  
            header('location:welcome.php?insert_msg= Your data has been added successfully !!');
    }
} 
}
?>