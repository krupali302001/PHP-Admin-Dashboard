<?php
include('../includes/dbcon.php');
    if (isset($_POST['recordId'])) {
    $ID=$_POST['recordId'];
    $profile_image=$_FILES['profile_image']['name'];
    move_uploaded_file($_FILES['profile_image']['tmp_name'],'../pages/profile/'.$profile_image);
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $education=$_POST['education'];
    $contact_number=$_POST['contact_number'];
    $email=$_POST['email'];
    $department=$_POST['department'];
    $designation=$_POST['designation'];
    $salary = $_POST['salary'];
    $DOB = $_POST['DOB'];
    $marital_status = $_POST['marital_status'];
    $gender = $_POST['gender'];
    $join_date = $_POST['join_date'];

    $updateSql = "UPDATE userData SET 
                firstName = '$firstName', 
                lastName = '$lastName', 
                email = '$email', 
                contact_number = '$contact_number', 
                department = '$department', 
                designation = '$designation', 
                salary = '$salary', 
                DOB = '$DOB', 
                marital_status = '$marital_status', 
                gender = '$gender', 
                join_date = '$join_date', 
                profile_image = '$profile_image' 
                WHERE ID = $ID";


        $updateQuery = sqlsrv_query($Con, $updateSql);

        if ($updateQuery === false) {
            echo "Update failed: " . print_r(sqlsrv_errors(), true);
        } else {
            echo "Data Submitted";
        }
    }

include('../includes/dbcon.php');

//insert
if (isset($_POST['save'])) {
   
    $profile_image=$_FILES['profile_image']['name'];
    move_uploaded_file($_FILES['profile_image']['tmp_name'],'../pages/Profile_photo/'.$profile_image);
    // print_r($_FILES);
    // die();
    $emp_id = $_POST['emp_id'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $education = $_POST['education'];
    $contact_number = $_POST['contact_number'];
    $email_id = $_POST['email_id'];
    $address = $_POST['address'];
    $designation = $_POST['designation'];
    $date_of_joining = $_POST['date_of_joining'];
    $salary = $_POST['salary'];
    $martial_status = $_POST['martial_status'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];

    $sql = "INSERT into user_data (emp_id, first_name, middle_name, last_name, education, contact_number,email_id,designation,date_of_joining,salary,martial_status,gender,birthdate,profile_image,isActive) 
                values ('$emp_id', '$first_name', '$middle_name', '$last_name', '$education', '$contact_number','$email_id','$designation','$date_of_joining','$salary','$martial_status','$gender','$birthdate','$profile_image','1')";
    $run = sqlsrv_query($Con, $sql);

    if ($updateQuery === false) {
      echo 'Update failed: ' . print_r(sqlsrv_errors(), true);
    } else {
      header('Location:user.php');
    }
  }

  //soft_delete

  if (isset($_POST['restoreId'])) {
    $id = $_POST['restoreId'] ;
  

    // Perform the delete query
    $deleteSql = "UPDATE user_data  set isActive='0' WHERE id = ?";
    $params = array($id);

    $deleteQuery = sqlsrv_query($Con, $deleteSql, $params);

    if ($deleteQuery === false) {
        echo "error: " . print_r(sqlsrv_errors(), true);
    } else {
        echo 'data successfully deleted';
        header('Location:user.php');
}
}
?>

