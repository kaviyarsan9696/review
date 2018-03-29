<?php

 $conn = mysqli_connect('localhost','root','welcome@123','review');
  if (!$conn) {
    echo "database not connected"; 
  }
	$uname =$_POST['name'];
 	$psw = $_POST['password'];
 	$role=$_POST['role'];
 	$email = $_POST['email'];
 	$phone = $_POST['phone'];


 	$mysqli= "INSERT INTO `user` (`uname`,`password`,`phone`,`email`) VALUES ('$uname','$psw','$phone','$email')";
 	$result=mysqli_query($conn,$mysqli);
 	if($result){
 		$mysql="INSERT INTO `authority` (`uname`,`role`) VALUES ('$uname','$role')";
 		$results=mysqli_query($conn,$mysql);
 		echo "inserted successfully";
 		header("location:admin.php");
 	}else{
 		echo "data is not inserted";
 	}
?>