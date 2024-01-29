<?php 
include('../includes/dbcon.php');

//delete
if (isset($_POST['recordId'])) {
    $ID = $_POST['recordId'];      
    $deleteSql = "DELETE userData WHERE ID = '$ID'";
    $deleteQuery = sqlsrv_query($Con, $deleteSql);

    if ($deleteQuery === false) {
        echo "Error: " . print_r(sqlsrv_errors(), true);
    } else {
        echo 'Deleted!';
    }
}
//Update
    if (isset($_POST['update'])) {
    $ID=$_POST['ID'];
    $empid=$_POST['empid'];
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
    
    if (!empty($_FILES['profile_image']['name'])) {
        $profile_image = $_FILES['profile_image']['name'];
        move_uploaded_file($_FILES['profile_image']['tmp_name'], '../pages/profile/' . $profile_image);
    } else {
        $profile_image = $_POST['imageName'];
    }

    $updateSql = "UPDATE userData SET
                empid='$empid',
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
            header('Location:user.php');
        }
    }
?>