<?php


$server   = 'localhost';
$user     = 'root';
$password = '';
$db_Name  = 'real_estate';


$con = mysqli_connect($server,$user,$password,$db_Name) or die('Erorr Connection'.mysqli_connect_error());
session_start();

?>