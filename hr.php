<?php
session_start();
if(!isset($_SESSION['role'])){
	header("location:login.php");
}else{
	if ($_SESSION['role']!="hr") {
		session_destroy();
		header("location:login.php");
	}
}

     

error_reporting(E_ALL);
ini_set('display_errors', 'on');

$conn = mysqli_connect('localhost','root','welcome@123','review') or die("Error".mysqli_error($conn));
  // if (!$conn) {
  //   echo "database not connected"; 
  // }

?>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<style type="text/css">
	#form{
		display:none;
	}
	form{
		position: absolute;
		top: 65px;
		left: 110px;
		width: 80%;
		padding: 20px;

	}
	#showall{
		position: absolute;
		top: 5%;
		left: 50%;
				padding: 10px;
		margin-right: 60px;
		width: 80px;
		/*padding: 10px;*/
	}
	#show_only_manager{
		position: absolute;
		top: 5%;
		left: 30%;
		
		padding: 10px;
		margin-right: 60px;
		width: 80px;
	}

		#show_only_cse{
		position: absolute;
		top: 5%;
		left: 20%;
		
		padding: 10px;
		margin-right: 60px;
		width: 80px;
	}

			#show_only_hr{
		position: absolute;
		top: 5%;
		left: 10%;
		
		padding: 10px;
		margin-right: 60px;
		width: 80px;
	}
	#show_only_reviewer{
			position: absolute;
		top: 5%;
		left: 40%;
		
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
	#welcome{
		    font-style: oblique;
		        font-weight: bolder;
		        position: absolute;
		top: 3%;
		left: 70%;
	}
	.show_only_manager{
		background-color: chocolate;
		color: white;
		border-radius: 8px;
	}
	.show_only_cse{
		background-color: chocolate;
		color: white;
		border-radius: 8px;
	}
	.show_only_hr{
		background-color: chocolate;
		color: white;
		border-radius: 8px;
	}
	.show_only_reviewer{
		background-color: chocolate;
		color: white;
		border-radius: 8px;
	}
	.showall{
		background-color: chocolate;
		color: white;
		border-radius: 8px;
	}
</style>

</head>
<header>
	<img src="logo-1.png">	
	<hr>
	<label id="welcome"> Welcome : <?php echo  $_SESSION['uname'];?></label>
</header>
<body>
	<?php
	if(!isset($_POST['submit'])&&!isset($_POST['show_only_manager']) && !isset($_POST['show_only_cse']) && !isset($_POST['show_only_reviewer'])){?>
	<script type="text/javascript">
	$(document).ready(function(){
			
		$("#table").hide();
		});
	</script>
	<?php
}?>
	
	<script type="text/javascript">
		
		
		function showTable(){
			$("#table").show();
		}
		
	</script>

	
	<form action="hr.php" method="POST" id="showall">
		<input type="submit" class="showall" name="submit" onclick="showTable()" value="Show all"/>
	</form>
	<form action="hr.php" method="POST" id="show_only_manager">
		<input type="submit" class="show_only_manager" onclick="showTable()"  name="show_only_manager" value="Show_only_manager"/>
	</form>
	<form action="hr.php" method="POST" id="show_only_cse">
		<input type="submit" class="show_only_cse" onclick="showTable()"  name="show_only_cse" value="Show_only_cse"/>
	</form>
	
	<form action="hr.php" method="POST" id="show_only_reviewer">
		<input type="submit" class="show_only_reviewer" onclick="showTable()"  name="show_only_reviewer" value="show_only_reviewer"/>
	</form>
	<form action="logout.php" method="POST" id="logout">
		<input type="submit" name="" class="submit" value="LOGOUT">
	</form>


	<table id="table" width="80%"  cellpadding="8" cellspacing="0" border="1">
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
			
		</tr>

		<?php
		$mysqli = "";
		
		if(isset($_POST['submit'])){
			$mysqli .="SELECT uname,phone,email FROM user";
			// echo "proove";
		}
		 if(isset($_POST['show_only_manager'])){
			$mysqli.="SELECT user.uname , user.phone,user.email, user.id
			FROM user AS user
			INNER JOIN authority AS authority ON user.uname = authority.uname
			WHERE authority.role =  'manager'";
		}

		 if(isset($_POST['show_only_cse'])){
			$mysqli.="SELECT user.uname , user.phone,user.email,user.id
			FROM user AS user
			INNER JOIN authority AS authority ON user.uname = authority.uname
			WHERE authority.role = 'cse'";
		}
			

			 if(isset($_POST['show_only_reviewer'])){
			$mysqli.="SELECT user.uname , user.phone,user.email,user.id
			FROM user AS user
			INNER JOIN authority AS authority ON user.uname = authority.uname
			WHERE authority.role = 'reviewer'";
		}


		if(strlen($mysqli)>1){
			// echo $mysqli;
			$query = mysqli_query($conn,$mysqli) or die("ererearae");
			while($row = mysqli_fetch_array($query))
			{
				?>
				<tr >	
					<td><?php echo $row['0'];?></td>
					<td><?php echo  $row['1'];?></td>
					<td><?php echo  $row['2'];?></td>
					<td><a href="/review/details.php?id=<?php  echo $row['3']; ?>"><input type="button" name="" value="Details"></td></a>
				</tr>
				<?php	
			}
		}
		?>
	</table>

</body>
</html>