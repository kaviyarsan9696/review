<?php
session_start();

	if(isset($_REQUEST)){
		


   $conn = mysqli_connect('localhost','root','welcome@123','review');
  if (!$conn) {
    echo "database not connected"; 
  }
 	$uname =$_POST['uname'];
 	$psw = $_POST['password'];
 
 	
  $mysql="SELECT user.uname , user.password, authority.role
FROM user AS user
INNER JOIN authority AS authority ON user.uname = authority.uname
WHERE user.uname =  '$uname'";
 $result = mysqli_query($conn,$mysql);
 $row=mysqli_fetch_row($result);
// echo $row[0];

// print_r ($result->num_rows);exit("here");

 if($result->num_rows==1){

 	// echo "successufully logedin";
 	 if($row[0]==$uname){
     	if($row[1]==$psw){
          $_SESSION['role']=$row[2];
          $_SESSION['uname']=$row[1];
          echo $_SESSION['role'];
     		if($row[2]=='admin'){
     			echo("successufully logedin");
     		}elseif($row[2]=='manager'){
          echo("successufully logedin");
        }else {
     			echo ("role is invalid");
     		}
     	}else{
     		echo("invalid password");
     	}

  }else{
  	echo ("username is invalid");
  }
 	//$_SESSION['role']=$role;
 	//header("location:admin.php")
 	
 	
 }else
 {
 	echo"unscccessful login";

 };

  
}
?>