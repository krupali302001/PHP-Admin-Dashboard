<?php
include('../includes/dbcon.php');
$sql="SELECT * FROM userData WHERE ID='31'";
$result=sqlsrv_query($Con, $sql);
$row= sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF DEMO</title>
</head>
<body>
    <table>
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
        <tr>
                <td><img src="../pages/profile/<?php echo $row['profile_image']; ?>" alt="profile_image" width="40px" height="40px"></td>
                <td class="empid"><?php echo $row['empid'] ?></td>
                <td class="firstName"><?php echo $row['firstName'] ?></td>
                <td class="lastName"><?php echo $row['lastName'] ?></td>    
                <td class="contact_number"><?php echo $row['contact_number'] ?></td>
                <td class="email"><?php echo $row['email'] ?></td>
                <td class="department"><?php echo $row['department'] ?></td>
                <td class="designation"><?php echo $row['designation'] ?></td>
                <td class="join_date"><?php echo $row['join_date']->format('Y-m-d')?></td>
                </tr>
        </tbody>

</body>
<!-- Name -->
<span>
   <?php echo $row['firstName'] ?>
   <?php echo $row['lastName'] ?>
</span>
<br>
<!-- Contact Information 
     Emai
     Number-->
<span>
<?php echo $row['contact_number'] ?><br>
<?php echo $row['email'] ?>
</span>     

</html>