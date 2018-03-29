<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 'on');

$conn = mysqli_connect('localhost','root','welcome@123','review') or die("Error".mysqli_error($conn));
if(isset($_REQUEST)){
	 $conn = mysqli_connect('localhost','root','welcome@123','review');
  if (!$conn) {
    echo "database not connected"; 
  }


       $cse_id=$_SESSION['cse_id'];
 		echo $cse_id;
	$message=$_POST['message'];
	$understanding=$_POST['understanding'];
	$closure=$_POST['closure'];
	$language=$_POST['language'];
	$total=$_POST['total'];

	$mysqli = "INSERT INTO `data` ( `message`,`understanding`,`closure`,`language`,`total`,`cse_id` ) VALUES ('$message','$understanding','$closure','$language','$total',' $cse_id')";
	 mysqli_query($conn,$mysqli);
}
 ?>