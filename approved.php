<?php 
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$conn = mysqli_connect('localhost','root','welcome@123','review') or die("Error".mysqli_error($conn));

	 $conn = mysqli_connect('localhost','root','welcome@123','review');
  if (!$conn) {
    echo "database not connected"; 
  }
  	$status=$_POST['status'];
  	$php_var=$_POST['php_var'];
  	$command = $_POST['command'];


  	$mysqli = "UPDATE `data` SET 
       `command` = '$command',`status` = '$status' where `id`= '$php_var'";
   mysqli_query($conn,$mysqli);
  if(mysqli_query($conn,$mysqli)){
  	echo "approved";
  }
  ?>