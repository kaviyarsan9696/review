<?php 
	session_start();
	error_reporting(E_ALL);
ini_set('display_errors', 'on');
	 $conn = mysqli_connect('localhost','root','welcome@123','review');
  if (!$conn) {
    echo "database not connected"; 
           
  }

  	
		$id=$_POST['data'];
		// echo $_POST;
		// 	//echo $_SESSION['cse_id'];
  	$mysqli = "SELECT `message`,`understanding`,`closure`,`language`,`total`,`command` ,`id` FROM data WHERE `id`=$id";
		$query = mysqli_query($conn,$mysqli);
		 $dd = array();
       $result = mysqli_fetch_row($query);  
      	$_SESSION['id']=$result['6'];
       	array_push($dd, $result);
       	 echo json_encode($dd);

 ?>