<?php
session_start();

	 $_SESSION['role'];
 	if( $_SESSION['role']=='admin'){
       
        header("location:admin.php");
      }
      if($_SESSION['role']=='manager'){
       
         
        header("location:manager.php");

      }
       if($_SESSION['role']=='cse'){
        
        header("location:cse.php");
      }
      if($_SESSION['role']=='reviewer'){
        
        header("location:reviewer.php");
      }
      if($_SESSION['role']=='hr'){
        
        header("location:hr.php");
      }
?>