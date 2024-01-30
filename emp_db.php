<?php 
include('includes/dbcon.php');
if(isset($_POST['signup'])){
    $empid = $_POST['empid'];
    $empname = $_POST['empname'];
    $password = $_POST['password'];
    $designation=$_POST['designation'];
    $department=$_POST['department'];



   /* The code is performing a database query to check if the provided employee ID and password match
   any records in the "empdata" table. */
    $sql = "INSERT INTO empdata (empid, empname, department, designation, password)
     values('$empid','$empname','$department','$designation','$password')";
    $run = sqlsrv_query($Con,$sql);
    header("location: pages/index.php");

}
?>