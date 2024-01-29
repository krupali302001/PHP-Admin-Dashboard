<?php 
include('../includes/dbcon.php');

if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $gender = $_POST['gender'];
    $department=$_POST['department'];
    $marital_status=$_POST['marital_status'];
    $empid=$_POST['empid'];
    $email=$_POST['email'];
    $condition = '';

    if (!empty($name)) {
        $condition .= " AND firstName = '$name'";
    }
    if (!empty($designation)) {
        $condition .= " AND designation = '$designation'";
    }
    if (!empty($gender)) {
        $condition .= " AND gender = '$gender'";
    }
    if (!empty($department)) {
        $condition .= " AND department = '$department'";
    }
    if (!empty($marital_status)) {
        $condition .= " AND marital_status = '$marital_status'";
    }
    if (!empty($empid)) {
        $condition .= " AND empid = '$empid'";
    }
    if (!empty($email)) {
        $condition .= " AND email = '$email'";
    }

    $sql = "SELECT * FROM userData WHERE id > 0".$condition;
    $run = sqlsrv_query($Con, $sql);
?>
<table class="table table-bordered table-hover mt-3" id="userDataTable">
    <thead>
        <tr>
            <th>Profile</th>
            <th>Employee ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Contact Number</th>
            <th>Email</th>
            <th>Departmanet</th>
            <th>Designation</th>
            <th>Joined Date</th>

        </tr>
    </thead>
    <tbody>
        <?php
        while ($row = SQLSRV_FETCH_ARRAY($run, SQLSRV_FETCH_ASSOC)) {
            $img_path = "http://localhost/Php-Admin-Dashboard/pages/Profile_photo/";
            $date_of_joining = date('Y-m-d', strtotime($row['join_date']->format('Y-m-d')));
            $birthdate = date('Y-m-d', strtotime($row['DOB']->format('Y-m-d')));
        ?>
            <tr>
                <td><img src="<?php echo $img_path.$row['profile_image'] ?>" alt="profile_image" width="40px" height="40px"></td>
                <td class="empid"><?php echo $row['empid'] ?></td>
                <td class="firstName"><?php echo $row['firstName'] ?></td>
                <td class="lastName"><?php echo $row['lastName'] ?></td>    
                <td class="contact_number"><?php echo $row['contact_number'] ?></td>
                <td class="email"><?php echo $row['email'] ?></td>
                <td class="department"><?php echo $row['department'] ?></td>
                <td class="designation"><?php echo $row['designation'] ?></td>
                <td class="join_date"><?php echo $date_of_joining?></td>    
                </tr>
        <?php } ?>
    </tbody>
</table>
<?php
}
?>