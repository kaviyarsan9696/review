<?php 
	session_start();
	error_reporting(E_ALL);
ini_set('display_errors', 'on');
	 $conn = mysqli_connect('localhost','root','welcome@123','review');
  if (!$conn) {
    echo "database not connected"; 
           
  }
$cse_id =$_GET['id'];
  	
		
			//echo $_SESSION['cse_id'];
  	$mysqli = "SELECT user.uname , user.phone,user.email,user.id
			FROM user AS user
			INNER JOIN set_manager AS set_manager ON user.id = set_manager.cse_id
			WHERE set_manager.m_id = $cse_id";
		$query = mysqli_query($conn,$mysqli);

		

 ?>	
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<style type="text/css">
 			.submit{
		margin:10px;
		background: #4CAF50;
		border-radius: 8px;
	}
	#logout{
		position: absolute;
		top: 0%;
		left: 80%;
		padding: 10px;
		margin-right: 60px;
		width: 80px;
	}
		.back{
		background:lightblue;
		border-radius: 5px;
	}
	#back
	{
		position: absolute;
		top: 8%;
		left: 1%;
		
      

		padding: 10px;
		margin-right: 60px;
		width: 80px;
	}
	#table{
		position: absolute;
		top: 100px;
		left: 110px;
		width: 80%;
		padding: 20px;
	}
 	</style>
 </head>
 <header>
	<img src="logo-1.png">	
	<hr>
</header>
 <body>
 	<form action="logout.php" method="POST" id="logout">
		<input type="submit" name="" class="submit" value="LOGOUT">
	</form>
	<form action="back.php" method="POST" id="back">
		<input type="submit" name="" class="back" value="BACK">
	</form>
	<table id="table" width="80%"  cellpadding="10" cellspacing="0" border="1">
		<tr style="background-color: gray; color: white; font-weight: bolder; border: solid thin green;">
			<td>
				UNAME	
			</td>
			<td>
				PHONE
			</td>
			<td>
				EMAIL
			</td>
			<td>
				DETAILS
			</td>
			<td>
				REVIEW
			</td>
			
		</tr>

			<?php
	 

		while($row = mysqli_fetch_array($query))
		{
			
	
		  ?>
		   	<tr >	
					<td><?php echo  $row['0'];?></td>
					<td><?php echo  $row['1'];?></td>
					<td><?php echo  $row['2'];?></td>
					<td><input type="button" name="" value="Details"></td>
					<td><a href="/review/editreview.php?id=<?php  echo $row['3']; ?>"><input type="submit" name="" value="SHOW_REVIEW" style="background-color: chocolate; color: white; border-radius: 8px; font-style: oblique; font-weight: bolder;"></td>
				</tr>
		  <?php	
		}
	?>
	</table>
 </body>
 </html>