<?php 
	session_start();
	error_reporting(E_ALL);
ini_set('display_errors', 'on');
	 $conn = mysqli_connect('localhost','root','welcome@123','review');
  if (!$conn) {
    echo "database not connected"; 
           
  }

  	$cse_id =$_SESSION['user_id'];
		
			//echo $_SESSION['cse_id'];
  	$mysqli = "SELECT `id`,`message`,`date`,`understanding`,`closure`,`language`,`total`,`command` FROM data WHERE `cse_id`=$cse_id";
		$query = mysqli_query($conn,$mysqli);

		$no_of_rows = mysqli_num_rows($query); 

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
	#table{
		position: absolute;
		top: 100px;
		left: 110px;
		width: 80%;
		padding: 20px;
	}
	#welcome{
		    font-style: oblique;
		        font-weight: bolder;
		        position: absolute;
		top: 3%;
		left: 70%;
	}
 	</style>
 </head>
 <header>
	<img src="logo-1.png">	
	<hr>
	<label id="welcome"> Welcome : <?php echo  $_SESSION['uname'];?></label>
</header>
 <body>
 <form action="logout.php" method="POST" id="logout">
		<input type="submit" name="" class="submit" value="LOGOUT">
	</form>
	<table id="table" width="80%"     cellpadding="10" cellspacing="0" border="1">
		<tr style="background-color: gray; color: white; font-weight: bolder; border: solid thin green;">
			<td>
				MESSAGE	
			</td>
			<td>
				DATE
			</td>
			<td>
				UNDERSATNDING
			</td>
			<td>
				CLOSUER
			</td>
			<td>
				LANGUAGE
			</td>
			<td>
				TOTAL
			</td>
			<td>
				COMMANDS
			</td>
		</tr>

			<?php
	 

		while($row = mysqli_fetch_array($query))
		{
			
	
		  ?>
		    <tr>
		    	
	
		    	<td><?php echo $row['1'];?></td>
		    	<td><?php echo $row['2'];?></td>
		    	<td><?php echo $row['3'];?></td>
		    	<td><?php echo $row['4'];?></td>
		    	<td><?php echo $row['5'];?></td>
		    	<td><?php echo $row['6'];?></td>
		        <td><?php echo $row['7'];?></td>
		   
		    </tr>
		  <?php	
		}
	?>
	</table>
 </body>
 </html>
 