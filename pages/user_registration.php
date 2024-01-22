<?php
include('../includes/header.php');
include('../includes/dbcon.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $empid = $_POST['empid'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $education=$_POST['education'];
        $contact_number=$_POST['contact_number'];
        $email=$_POST['email'];
        $department=$_POST['department'];
        $designation=$_POST['designation'];
        $salary = $_POST['salary'];
        $DOB = $_POST['DOB'];
        $martial_status = $_POST['martial_status'];
        $gender = $_POST['gender'];
        $join_date = $_POST['join_date'];


        $sql = "INSERT into userData (empid, firstName, lastName, education, contact_number, email, department, designation, salary, DOB,    marital_status, gender, join_date) 
                values ('$empid', '$firstName', '$lastName', '$education', '$contact_number', '$email', '$department', '$designation',  '$salary',  '$DOB', '$martial_status', '$gender', '$join_date')";

        $run = sqlsrv_query($Con, $sql);

        if ($run) {
            
            header('Location: ../pages/user.php');
        } else {
            echo "Error: " . print_r(sqlsrv_errors(), true);
        }
    }
?>
<div class="user_form">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="registration_form">
     <div class="mb-3">
        <label for="" class="form-label">EMP ID</label>
        <input
            type="text"
            class="form-control"
            name="empid"
            id=""
            placeholder="Your ID"
        />
     </div>
     <div class="mb-3"> 
     <label for="" class="form-label mt-3">First Name</label>
        <input
            type="text"
            class="form-control"
            name="firstName"
            id=""
            placeholder="Your Name"
        />
    </div>
    <div class="mb-3">
        <label for="" class="form-label mt-3">Last Name</label>
        <input
            type="text"
            class="form-control"
            name="lastName"
            id=""
            placeholder="Your Name"
        /> 
    </div>    
    <div class="mb-3"> 
        <label for="" class="form-label mt-3">Education</label>
        <input
            type="text"
            class="form-control"
            name="education"
            id=""
            placeholder="Your Name"
        /> 
    </div>       
    <div class="mb-3">
        <label for="" class="form-label mt-3">Contact Number</label>
        <input
            type="text"
            class="form-control"
            name="contact_number"
            id=""
            placeholder="Your Name"
        />
    </div>  
    <div class="mb-3">
        <label for="" class="form-label mt-3">Email</label>
        <input
            type="text"
            class="form-control"
            name="email"
            id=""
            placeholder="Your Name"
        />
    </div>  
    <div class="mb-3">
        <label for="" class="form-label mt-3">Department</label>
        <input
            type="text"
            class="form-control"
            name="department"
            id=""
            placeholder="Your Name"
        />  
     </div>   
     <div class="mb-3">    
        <label for="" class="form-label mt-3">Designation</label>
        <input
            type="text"
            class="form-control"
            name="designation"
            id=""
            placeholder="Your Name"
        /> 
        </div>
    <div class="mb-3">
        <label for="" class="form-label mt-3">Salary</label>
        <input
            type="text"
            class="form-control"
            name="salary"
            id=""
            placeholder="Your Name"
        />
        </div>     
    <div class="mb-3">
        <label for="" class="form-label mt-3">DOB</label>
        <input
            type="text"
            class="form-control"
            name="DOB"
            id=""
            placeholder="Your Name"
        /> 
    </div>    
    <div class="mb-3">
        <label for="" class="form-label mt-3">Martial Status</label>
        <input
            type="text"
            class="form-control"
            name="martial_status"
            id=""
            placeholder="Your Name"
        />
     </div>
     <div class="mb-3">
        <label for="" class="form-label mt-3">Gender</label>
        <input
            type="text"
            class="form-control"
            name="gender"
            id=""
            placeholder="Your Name"
        />
     </div>
     <div class="mb-3">
        <label for="" class="form-label mt-3">Joined Date</label>
        <input
            type="text"
            class="form-control"
            name="join_date"
            id=""
            placeholder="Your Name"
        />
     </div>
                    

    
    <button type="submit" class="btn btn-primary">Submit</button>
                
            </form>
</div> 
<?php
include('../includes/footer.php');
?>