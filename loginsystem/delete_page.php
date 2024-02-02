<?php include '_dbconnect.php'?>
<?php 
if(isset($_GET['id'])){
   $id=$_GET['id'];
}
$sql="delete from `employeee` where `sno`='$id'";
 $result=mysqli_query($conn,$sql);
if(!$result){
             die("query failed" .mysqli_error());
         }
else{
    header('location:welcome.php?delete_msg=You have deleted the record!!');
}
?>
