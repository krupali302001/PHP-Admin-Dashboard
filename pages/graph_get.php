<?php
include '../includes/dbcon.php';
if(isset($_POST['data'])){
    $data=array();
    $sql= "SELECT gender,count(gender) as count FROM userData group by gender";
    $run=sqlsrv_query($Con, $sql);
    while($row= SQLSRV_FETCH_ARRAY($run, SQLSRV_FETCH_ASSOC)){
        $data[]=array('y'=> $row['count'], 'label' => $row['gender']);
    }
    echo json_encode($data);
}
if(isset($_POST['status'])){
    $data=array();

    $sql="SELECT marital_status,count(marital_status) as count FROM userData group by marital_status";
    $run=sqlsrv_query($Con, $sql);
    while($row= SQLSRV_FETCH_ARRAY($run, SQLSRV_FETCH_ASSOC)){
        $data[]=array('y'=> $row['count'], 'label' => $row['marital_status']);
    }
    echo json_encode($data);
}
?>