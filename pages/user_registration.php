<?php
include('../includes/header.php');
include('../includes/dbcon.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $profile_image=$_FILES['profile_image']['name'];
        move_uploaded_file($_FILES['profile_image']['tmp_name'],'../pages/profile/'.$profile_image);
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
        



        $sql = "INSERT into userData (empid, firstName, lastName, education, contact_number, email, department, designation, salary, DOB,    marital_status, gender, join_date,profile_image, isValid) 
                values ('$empid', '$firstName', '$lastName', '$education', '$contact_number', '$email', '$department', '$designation',  '$salary',  '$DOB', '$martial_status', '$gender', '$join_date','$profile_image', 1)";

        $run = sqlsrv_query($Con, $sql);

        if ($run) {
            
            header('Location: ../pages/user.php');
        } else {
            echo "Error: " . print_r(sqlsrv_errors(), true);
        }
    }
?>
<div class="user_form">
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="registration_form" enctype="multipart/form-data">
     <div class="mb-3 ms-2 d-flex ">
        <label for="" class="form-label ms-3 mt-3 w-25">EMP ID
        <input
            type="text"
            class="form-control"
            name="empid"
            id=""
            placeholder="Your ID"
        /> </label>
     <label for="" class="form-label ms-3 mt-3 w-25">First Name
        <input
            type="text"
            class="form-control"
            name="firstName"
            id=""
            placeholder="Your Name"
        /></label>
        <label for="" class="form-label ms-3 mt-3 w-25">Last Name
        <input
            type="text"
            class="form-control"
            name="lastName"
            id=""
            placeholder="Last Name"
        /> </label>
    </div>    
    <div class="mb-3 ms-2 d-flex"> 
        <label for="" class="form-label ms-3 mt-3 w-25">Education
        <input
            type="text"
            class="form-control"
            name="education"
            id=""
            placeholder="Education"
        /></label>        
        <label for="" class="form-label ms-3 mt-3 w-25">Contact Number
        <input
            type="text"
            class="form-control"
            name="contact_number"
            id=""
            placeholder="+91 __________"
        /></label>
        <label for="" class="form-label ms-3 mt-3 w-25">Email
        <input
            type="text"
            class="form-control"
            name="email"
            id=""
            placeholder="example@gmail.com"
        /></label>
    </div>  
    <div class="mb-3 d-flex">
        <label for="" class="form-label ms-3 mt-3 w-25">Department
        <input
            type="text"
            class="form-control"
            name="department"
            id=""
            placeholder="Depaetment"
        /> </label>    
        <label for="" class="form-label ms-3 mt-3 w-25">Designation
        <input
            type="text"
            class="form-control"
            name="designation"
            id=""
            placeholder="Position"
        /></label> 
        <label for="" class="form-label ms-3 mt-3 w-25">Salary
        <input
            type="text"
            class="form-control"
            name="salary"
            id=""
            placeholder="Your Salary"
        /></label>
        </div>     
    <div class="mb-3 d-flex">
        <label for="" class="form-label ms-3 mt-3 w-25">DOB
        <input
            type="date"
            class="form-control"
            name="DOB"
            id=""
            placeholder="Date of Birth"
        /></label> 
    
        <label for="" class="form-label ms-3 mt-3 w-25">Martial Status
        <input
            type="text"
            class="form-control"
            name="martial_status"
            id=""
            placeholder="Married, Unmarried, Divorsed"
        /></label>
  
    
        <label for="" class="form-label ms-3 mt-3 w-25">Gender
            <select class="form-select" id="gender" name="gender">
                <option></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
        </label>
    </div> 
    <div class="mb-3 d-flex">
        <label for="" class="form-label ms-3 mt-3 w-25">Joined Date
        <input
            type="date"
            class="form-control"
            name="join_date"
            id=""
            placeholder="Joining Date"
        /></label>
        <label for="" class="form-label ms-3 mt-3 w-25">Profile
        <input
            type="file"
            class="form-control"
            name="profile_image"
            id=""
            placeholder="Image"
        /></label>
     </div>
     <div class="mb-3 d-flex">
        <button type="submit" class="btn btn-primary">Submit</button>
        <button class="btn btn-primary ms-4"><a href="../pages/user.php"></a>Back</button>
    </div>
    </form>

</div> 
<?php
include('../includes/footer.php');
?>