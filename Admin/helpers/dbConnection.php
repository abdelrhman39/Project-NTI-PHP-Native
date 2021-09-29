<?php 
session_start();
$server = "localhost";
$dbName = "real_estate";
$dbUser = "root";
$dbPassword = "";

$con = mysqli_connect($server,$dbUser,$dbPassword,$dbName);

 if(!$con){
    
     die("Error : ".mysqli_connect_error());
 }


?>