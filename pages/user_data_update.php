<?php
include('../includes/header.php');
include('../includes/dbcon.php');
$id = $_GET['id'];
$sql = "SELECT * FROM userData WHERE ID='$id' AND isValid = 1";
$query = sqlsrv_query($Con, $sql);
$row = SQLSRV_FETCH_ARRAY($query, SQLSRV_FETCH_ASSOC);
?>
<form action="user_db.php" method="post" id="update_form" enctype="multipart/form-data">
    <div class="mb-3 ms-2 d-flex ">
        <label for="" class="form-label mt-3 w-25">EMP ID
            <input type="text" class="form-control" name="empid" value="<?php echo $row['empid'] ?>" /> </label>
        <label for="" class="form-label mt-3 w-25">First Name
            <input type="text" class="form-control" name="firstName" value="<?php echo $row['firstName'] ?>" /></label>
        <label for="" class="form-label mt-3 w-25">Last Name
            <input type="text" class="form-control" name="lastName" value="<?php echo $row['lastName'] ?>" /> </label>
    </div>
    <div class="mb-3 ms-2 d-flex">
        <label for="" class="form-label mt-3 w-25">Education
            <input type="text" class="form-control" name="education" value="<?php echo $row['education'] ?>" /></label>
        <label for="" class="form-label mt-3 w-25">Contact Number
            <input type="text" class="form-control" name="contact_number" value="<?php echo $row['contact_number'] ?>" /></label>
        <label for="" class="form-label mt-3 w-25">Email
            <input type="text" class="form-control" name="email" value="<?php echo $row['email'] ?>" /></label>
    </div>
    <div class="mb-3 ms-2 d-flex">
        <label for="" class="form-label mt-3 w-25">Department
            <input type="text" class="form-control" name="department" value="<?php echo $row['department'] ?>" /></label>
        <label for="" class="form-label mt-3 w-25">Designation
            <input type="text" class="form-control" name="designation" value="<?php echo $row['designation'] ?>" /></label>
        <label for="" class="form-label mt-3 w-25">Salary
            <input type="text" class="form-control" name="salary" value="<?php echo $row['salary'] ?>" /></label>
    </div>
    <div class="mb-3 ms-2 d-flex">
        <label for="" class="form-label mt-3 w-25">DOB
            <?php $birthdate = $row['DOB']->format('Y-m-d'); ?>
            <input type="date" class="form-control" name="DOB" value="<?php echo $birthdate ?>" /></lable>
    </div>
    <div class="mb-3 ms-2 d-flex">
        <label for="" class="form-label mt-3 w-25">Joined Date
            <?php $dateOfJoining = $row['join_date']->format('Y-m-d'); ?>
            <input type="date" class="form-control" name="join_date" value="<?php echo $dateOfJoining ?>" /></label>
    </div>
    <div class="mb-3 ms-2 d-flex">
        <label for="" class="form-label mt-3 w-25">Martial Status
        <input type="text" class="form-control" name="marital_status" value="<?php echo $row['marital_status'] ?>" /></label>

        <label for="gender" class="form-label mt-3 w-25 ">Gender
            <select class="form-select" id="gender" name="gender">
                <option value="Male" <?php echo ($row['gender'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($row['gender'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                <option value="Other" <?php echo ($row['gender'] == 'Other') ? 'selected' : ''; ?>>Other</option>
            </select>
        </label>
    </div>
    <div class="d-flex">
        <label class="w-25 ms-2" for="">Profile Pic
            <div class="input-group mb-1">
                <input type="file" class="form-control" name="profile_image" accept="image/*">
                <input type="hidden" name="imageName" value="<?php echo $row['profile_image'] ?>">
                <?php if (!empty($row['profile_image'])) {
                    $img_path = "http://localhost/Project1/pages/profile/"
                ?>
                    <div class="input-group-append">
                        <span class="input-group-text">
                            <img src="<?php echo $img_path . $row['profile_image'] ?>" width="50" height="50" alt="Profile Image">
                        </span>
                    </div>
                <?php } ?>
            </div>
        </label>
    </div>
    <input type="hidden" name="ID" value="<?php echo $row['ID'] ?>">
    <button name="update" type="submit" class="btn btn-primary" form="update_form">Submit</button>
</form>