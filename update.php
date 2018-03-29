<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'on');



	 $conn = mysqli_connect('localhost','root','welcome@123','review');
  if (!$conn) {
    echo "database not connected"; 
  }



  	$id = $_SESSION['id'];
  	echo $id;
	$message=$_POST['message'];
	$understanding=$_POST['understanding'];
	$closure=$_POST['closure'];
	$language=$_POST['language'];
	$total=$_POST['total'];

	$mysqli = "UPDATE `data` SET 
       `message` = '$message', 
       `understanding` = '$understanding', 
       `closure` = '$closure', 
       `language` = '$language', 
       `total` = '$total' 
  where `id`= '$id'";
	

	 mysqli_query($conn,$mysqli);

 ?>