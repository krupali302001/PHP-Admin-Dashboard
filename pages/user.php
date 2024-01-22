<?php
include('../includes/header.php');
include ('../includes/dbcon.php');
$sql = "SELECT * FROM userData";
$query = sqlsrv_query($Con, $sql);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <h2>User Data</h2>
        </div>
        <div class="col-auto">
            <a href="../pages/user_registration.php" class="btn btn-primary">Add New</a>
        </div>
    </div>
    <div>
        <table class="table" id="usertable">
            <thead>
                <th>Employee ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Education</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Departmanet</th>
                <th>Designation</th>
                <th>Salary</th>
                <th>DOB</th>
                <th>Martial Status</th>
                <th>Gender</th>
                <th>Joined Date</th>
            </thead>
            <tbody>
            <?php
                while ($row = SQLSRV_FETCH_ARRAY($query, SQLSRV_FETCH_ASSOC)) {
                    $studentID = $row['ID'];
                ?>
                <tr>
                    <td class="empid"><?php echo $row['empid'] ?></td>
                    <td class="firstName"><?php echo $row['firstName'] ?></td>
                    <td class="lastName"><?php echo $row['lastName'] ?></td>
                    <td class="education"><?php echo $row['education'] ?></td>
                    <td class="contact_number"><?php echo $row['contact_number'] ?></td>
                    <td class="email"><?php echo $row['email'] ?></td>
                    <td class="department"><?php echo $row['department'] ?></td>
                    <td class="designation"><?php echo $row['designation'] ?></td>
                    <td class="salary"><?php echo $row['salary'] ?></td>
                    <td class="DOB"><?php echo $row['DOB'] ?></td>
                    <td class="marital_status"><?php echo $row['marital_status'] ?></td>
                    <td class="gender"><?php echo $row['gender'] ?></td>
                    <td class="join_date"><?php echo $row['join_date'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<script>
    $('#userPage').addClass('active');

    $(document).ready(function() {
        $('#usertable').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                'pageLength',
                'copyHtml5',
                'excelHtml5',
                'pdfHtml5'
            ]
        });
    });
</script>
<?php
include('../includes/header.php');
?>