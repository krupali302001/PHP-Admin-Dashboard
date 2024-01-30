<?php
include('../includes/header.php');
include('../includes/dbcon.php');
?>
<h1>
    Index
</h1>
<?php echo $_SESSION['empname']?>
<script>
    $('#dashboard').addClass('active');
</script>
<?php
include('../includes/footer.php');
?>

