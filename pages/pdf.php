<?php
include('../includes/dbcon.php');
$sql = "SELECT * FROM userData WHERE ID='31'";
$result = sqlsrv_query($Con, $sql);
$row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF DEMO</title>
    <style>
        .header {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
        }

        .name {
            display: flex;
            flex-direction: row;
        }

        .firstname {
            font-size: 36px;
            font-family: monospace;
        }

        .lastname {
            font-size: 36px;
            font-family: serif;
        }

        .contactinfo {
            display: block;
            float: right;
            font-size: 18px;
        }
    </style>
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
                <td class="join_date"><?php echo $row['join_date']->format('Y-m-d') ?></td>
            </tr>
        </tbody>

</body>
<div class="header">
    <div class="name">
        <img class="image" src="../pages/profile/<?php echo $row['profile_image']; ?>" alt="profile_image" width="150px" height="150px">
        <!-- Name -->
        <h3 class="firstname"><?php echo $row['firstName'] ?></h3>
        <br>
        <h3 class="lastname"><?php echo $row['lastName'] ?></h3>

    </div>
    <div class="contactinfo">
        <!-- Contact Information Emai Number-->
        <?php echo $row['contact_number'] ?><br>
        <?php echo $row['email'] ?>

    </div>
</div>

</html>