<?php 
$serverName = "KRUPA\SQLEXPRESS";
$connectionInfo = array("Database"=>"Project1","UID"=>"sa","PWD"=>"12345","CharacterSet" => "UTF-8");
$Con = sqlsrv_connect($serverName,$connectionInfo);

if($Con) {
	/*echo "connection established.<br />";*/
	
}else{
	echo "connection could not be established.<br />";
	die(print_r(sqlsrv_errors(), true));
}
?>