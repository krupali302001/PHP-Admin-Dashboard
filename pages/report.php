<?php
include('../includes/header.php');
include('../includes/dbcon.php');
?>
<div class="container-fluid mt-5">
    <div class="row mb-2">
        <div class="col">
            <h3>User Report</h3>
        </div>
        <div class="col-auto">
            
        </div>
    </div>
    <form id="formData">
        <div class="d-flex">
            <label class="w-25">Name
                <input type="text" name="name" class="form-control">
            </label>
            <label class="w-25 ms-2">Designation
                <input type="text" name="designation" class="form-control">
            </label>
            <label for="gender" class="form-label w-25 ms-2">Gender
            <select class="form-select" id="gender" name="gender">
                <option></option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>
            </label>  
        </div>
        <div class="d-flex">
            <label class="w-25 ms-2">Department
                <input type="text" name="department" class="form-control">
            </label>            
            <label class="w-25 ms-2">Marital Status
                <input type="text" name="marital_status" class="form-control">
            </label>
            <label class="w-25 ms-2">Employee ID
                <input type="text" name="empid" class="form-control">
            </label>         
            <label class="w-25 ms-2">Email ID
                <input type="text" name="email" class="form-control">
            </label>
            <label class="w-25 ms-2"><br/>
                <button type="button" class="btn btn-primary" id="getdata">Get Data</button>
            </label>
        </div>  
    </form><br/>
    <div id="userReport">

    </div>
</div>
<script>
    $(document).on('click','#getdata', function(){
        $.ajax({
            url: 'report_get.php',
            method: 'POST',
            data: $('#formData').serialize(),
            success: function(data){
                $('#userReport').html(data);
            },
            error: function(data){
                console.log(error);
            }
        });
    });
</script>
<?php 
include('../includes/footer.php');
?>