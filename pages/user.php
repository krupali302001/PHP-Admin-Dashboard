<?php
include('../includes/header.php');
include ('../includes/dbcon.php');
$sql = "SELECT * FROM userData";
$query = sqlsrv_query($Con, $sql);
?>
<div class="container-fluid mt-5">
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

                <th>Profile</th>
                <th>Employee ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Contact Number</th>
                <th>Email</th>
                <th>Address</th>
                <th>Departmanet</th>
                <th>Designation</th>
                <th>Joined Date</th>
                <th>Edit</th>
                <th>Delete</th>
                <th>PDF</th>
                
            </thead>
            <tbody>
            <?php
                while ($row = SQLSRV_FETCH_ARRAY($query, SQLSRV_FETCH_ASSOC)) {
                    $ID = $row['ID'];
                    $img_path="http://localhost/Project1/pages/profile/";
                    $raw_date_date_of_joining = $row['join_date'];
                    $date_of_joining = date('Y-m-d', strtotime($raw_date_date_of_joining->format('Y-m-d')));
                    $raw_date_birtdate = $row['DOB'];
                    $birthdate = date('Y-m-d', strtotime($raw_date_birtdate->format('Y-m-d')));
                ?>
                <tr>
                    <td><img src="<?php echo $img_path.$row['profile_image'] ?>" alt="profile_image" width="40px" height="40px"></td>
                    <td class="empid"><?php echo $row['empid'] ?></td>
                    <td class="firstName"><?php echo $row['firstName'] ?></td>
                    <td class="lastName"><?php echo $row['lastName'] ?></td>    
                    <td class="contact_number"><?php echo $row['contact_number'] ?></td>
                    <td class="email"><?php echo $row['email'] ?></td>
                    <td>Address</td>
                    <td class="department"><?php echo $row['department'] ?></td>
                    <td class="designation"><?php echo $row['designation'] ?></td>
                    <td class="join_date"><?php echo $date_of_joining?></td>
                    <td ><a href="user_data_update.php?id=<?php echo $row['ID']?>" class="btn btn-primary edit"><i class='bx bxs-edit'></i>&nbsp;&nbsp;Edit</a></td>
                    <td><button  type="button" class="btn btn-danger delete" id="<?php echo $row['ID'];?>">Delete</button></td>
                    <td><a href="user_pdf.php?id=<?php echo $row['ID']?>" class="btn btn-warning"><i class='bx bxs-file-pdf'></i></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="modal" id="registrationModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Add New Student</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" id="update_form" enctype="multipart/form-data">
     <div class="mb-3"> 
     <label for="" class="form-label mt-3">First Name</label>
        <input
            type="text"
            class="form-control inputFN  "
            name="firstName"
            id="firstName"
            placeholder="Your Name"
        />
    </div>
    <div class="mb-3">
        <label for="" class="form-label mt-3">Last Name</label>
        <input
            type="text"
            class="form-control inputLN"
            name="lastName"
            id=""
            placeholder="Last Name"
        /> 
    </div>    
    <div class="mb-3"> 
        <label for="" class="form-label mt-3">Education</label>
        <input
            type="text"
            class="form-control inputE"
            name="education"
            id=""
            placeholder="Education"
        /> 
    </div>       
    <div class="mb-3">
        <label for="" class="form-label mt-3">Contact Number</label>
        <input
            type="text"
            class="form-control inputCN"
            name="contact_number"
            id=""
            placeholder="+91 __________"
        />
    </div>  
    <div class="mb-3">
        <label for="" class="form-label mt-3">Email</label>
        <input
            type="text"
            class="form-control inputEmail"
            name="email"
            id=""
            placeholder="example@gmail.com"
        />
    </div>  
    <div class="mb-3">
        <label for="" class="form-label mt-3">Department</label>
        <input
            type="text"
            class="form-control inputDep"
            name="department"
            id=""
            placeholder="Depaetment"
        />  
     </div>   
     <div class="mb-3">    
        <label for="" class="form-label mt-3">Designation</label>
        <input
            type="text"
            class="form-control inputDes"
            name="designation"
            id=""
            placeholder="Position"
        /> 
        </div>
    <div class="mb-3">
        <label for="" class="form-label mt-3">Salary</label>
        <input
            type="text"
            class="form-control inputS"
            name="salary"
            id=""
            placeholder="Your Salary"
        />
        </div>     
    <div class="mb-3">
        <label for="" class="form-label mt-3">DOB</label>
        <input
            type="date"
            class="form-control inputDOB"
            name="DOB"
            id=""
            placeholder="Date of Birth"
        /> 
    </div>    
    <div class="mb-3">
        <label for="" class="form-label mt-3">Marital Status</label>
        <input
            type="text"
            class="form-control"
            name="marital_status inputMS"
            id=""
            placeholder="Married, Unmarried, Divorsed"
        />
     </div>
     <div class="mb-3">
        <label for="" class="form-label mt-3">Gender</label>
        <input
            type="text"
            class="form-control inputG"
            name="gender"
            id=""
            placeholder="Male / Female / Others"
        />
     </div>
     <div class="mb-3">
        <label for="" class="form-label mt-3">Joined Date</label>
        <input
            type="date"
            class="form-control inputJD"
            name="join_date"
            id=""
            placeholder="Joining Date"
        />
     </div> 
      <div class="mb-3">
        <label for="" class="form-label mt-3">Profile</label>
        <input
            type="file"
            class="form-control inputP"
            name="profile_image"
            id=""
            placeholder="Image"
        />
     </div>
     <input type="hidden" name="ID" value="<?php echo $ID?>">
     <button type="submit" class="btn btn-danger" data-bs-dismiss="modal" id="edit">Submit</button>
            </form>
        </div>
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

    $(document).on("click", ".editmain", function() {
    var ID = $(this).attr('ID');
    $('#data_id').val(ID);
    $('#myModal').modal('show');

    var infirstName = $(this).closest('tr').find('.firstName').text();
    $('.inputFN').val(infirstName);
    
    var inusername = $(this).closest('tr').find('.lastName').text();
    $('.inputLN').val(inusername);
    
    var ineducation = $(this).closest('tr').find('.education').text();
    $('.inputE').val(infirstName);
    
    var incontact_number = $(this).closest('tr').find('.contact_number').text();
    $('.inputCN').val(incontact_number);
 
    var inemail = $(this).closest('tr').find('.email').text();
    $('.inputEmail').val(inemail);

    var indepartment = $(this).closest('tr').find('.department').text();
    $('.inputDep').val(indepartment);

    var indesignation = $(this).closest('tr').find('.designation').text();
    $('.inputDes').val(indesignation);

    var insalary = $(this).closest('tr').find('.salary').text();
    $('.inputS').val(insalary);
    
    var inDOB = $(this).closest('tr').find('.DOB').text();
    $('.inputDOB').val(inDOB);
    console.log(inDOB);

    
    var inmartial = $(this).closest('tr').find('.marital_status').text();
    $('.inputMS').val(inmartial);

    var ingender = $(this).closest('tr').find('.gender').text();
    $('.inputG').val(ingender);


  });

  $(document).on("click",".editmain",function(){
  $.ajax({
  url:'user_edit.php',
  method:'POST',
  data:$(",editmain").serialize(),
  success: function(data){
   // console.log(data);
    location.reload();
  },
  error:function(error){
    console.log(error);
  }
});
});


    


  $(document).on("click", ".delete", function() {
    var recordId = $(this).attr('id');
    if(confirm('Are You sure!')){
        $.ajax({
            url: 'user_db.php',
            type: 'post',
            data: {recordId:recordId},
            success:function(data){
                alert(data);
                location.reload();
            } 
        });
    }else{
        return false;
    }
});

</script>
<?php
include('../includes/header.php');
?>