<?php
session_start();
if(!isset($_SESSION['role'])){
	header("location:login.php");
}else{
	if ($_SESSION['role']!="admin") {
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
		top: 100px;
		left: 110px;
		width: 80%;
		padding: 20px;

	}
	#set_manager{
		position: absolute;
		top: 5%;
		left: 60%;
		padding: 10px;
		margin-right: 60px;
		width: 80px;
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
	.showall{
		background-color: chocolate;
		color: white;
		border-radius: 8px;
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
	#btn{
		background-color: chocolate;
		color: white;
		border-radius: 8px;
	}
	.set_manager{
		background-color: chocolate;
		color: white;
		border-radius: 8px;
	}
</style>

</head>

<header>
	<img src="logo-1.png">	
	<hr>
</header>
<body>
	<?php
	if(!isset($_POST['submit'])&&!isset($_POST['show_only_manager']) && !isset($_POST['show_only_cse']) && !isset($_POST['show_only_hr']) && !isset($_POST['show_only_reviewer']) && !isset($_POST['set_manager'])){?>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#form").hide();
			$("#table").hide();
			$("#setmanager").hide();
		});
	</script>
	<?php
}?>
<?php
if(isset($_POST['submit'])){?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#form").hide();
		$("#setmanager").hide();
	});
</script>
<?php
}?>
<?php
if(isset($_POST['set_manager'])){?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#form").hide();
		$("#table").hide();
	});
</script>
<?php
}?>
<script type="text/javascript">

	function showForm(){
		$("#form").show();
		$("#table").hide();
		$("#setmanager").hide();
	}
	function showTable(){
		$("#table").show();
		$("#setmanager").hide();
	}
	function managershow(){
		$("#table").hide();
		$("#setmanager").show();
	}

		// $(document).ready(function(){
		// 	$("#form").hide();
		// 	$("#table").hide();
		// 	$("#btn").click(function(){
		// 		$("#form").show();
		// 		$("#table").hide();
		// 	});

		// });
		// $(document).ready(function(){
		// 	$(".showall").click(function(){
		// 		$('#table').show();
		// 		$("#form").hide();
		// 		return false;
		// 	});
		// });

		$("#form").submit(function(){
			var name = $('#uname').val();
			var email =$('#email').val();
			var pass = $('#pswd').val();
			var phone = $('#phone').val();
			var role= $('#select').val();
			var admin={'uname':name,'password':pass, 'role':role , 'phone':phone,'email':email};
			if(name=="" || pass=="" || role=='' || email=='' || phone=='' ){
				alert("input field is empty");
			}else{
				$.ajax({
					type:'POST',
					url:'serveradmin.php',
					data: admin,
					success: function(data){ 

						if(data=="inserted successfully"){
							alert(data);
							window.location.href=window.location.href;
						}else{
							alert(data);
						}
					}

				});
				return false;
			}
		});

	</script>

	<button id="btn" onclick="showForm()" > Create employee </button>
	<form action="admin.php" method="POST" id="showall">
		<input type="submit" class="showall" name="submit" onclick="showTable()" value="Show all"/>
	</form>
	<form action="admin.php" method="POST" id="show_only_manager">
		<input type="submit" class="show_only_manager" onclick="showTable()"  name="show_only_manager" value="Show_only_manager"/>
	</form>
	<form action="admin.php" method="POST" id="show_only_cse">
		<input type="submit" class="show_only_cse" onclick="showTable()"  name="show_only_cse" value="Show_only_cse"/>
	</form>
	<form action="admin.php" method="POST" id="show_only_hr">
		<input type="submit" class="show_only_hr" onclick="showTable()"  name="show_only_hr" value="Show_only_hr"/>
	</form>
	<form action="admin.php" method="POST" id="show_only_reviewer">
		<input type="submit" class="show_only_reviewer" onclick="showTable()"  name="show_only_reviewer" value="show_only_reviewer"/>
	</form>
	<form action="admin.php" method="POST" id="set_manager">
		<input type="submit" name="set_manager" class="set_manager" onclick="managershow()" value="set_manager">
	</form>

	<form action="logout.php" method="POST" id="logout">
		<input type="submit" name="" class="submit" value="LOGOUT">
	</form>

	

	<form method="POST" action="serveradmin.php" id="form">
		<div>
			<label>NAME :  </label>
			<input type="text" name="name" id="uname" class="input1" value=""><br><br>
			<label>EMAIL  :  </label>
			<input type="text" name="email" id="email" class="input2"><br><br>

			<label> PASSWORd :</label><input type="text" name="password" class="input4" id="pswd"><br><br>
			<label>PHONE  :</label><input type="text" name="phone" class="input4" id="phone"><br><br>
			<label>ROLE</label>
			<select id="select" name="role">
				<option value="admin">admin</option>
				<option value="hr">HR</option>
				<option value="manager">manager</option>
				<option value="cse">cse</option>
				<option value="reviewer">reviewer</option>
			</select> <br><br>
			<input type="submit" name="" value="SUBMIT" class="submit">
		</div>
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
			WHERE authority.role = 'manager'";

		}

		if(isset($_POST['show_only_cse'])){
			$mysqli.="SELECT user.uname , user.phone,user.email,user.id
			FROM user AS user
			INNER JOIN authority AS authority ON user.uname = authority.uname
			WHERE authority.role = 'cse'";
		}
		if(isset($_POST['show_only_hr'])){
			$mysqli.="SELECT user.uname , user.phone,user.email,user.id
			FROM user AS user
			INNER JOIN authority AS authority ON user.uname = authority.uname
			WHERE authority.role = 'hr'";
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


	<?php 
	if( (isset($_POST['set_manager']))){ ?>
	<form id="setmanager" method="POST">
	<label>MANGERS NAME     :      </label>
		<select name="manager_select">
			<?php
			$mysqli ="SELECT user.uname , user.phone,user.email, user.id
			FROM user AS user
			INNER JOIN authority AS authority ON user.uname = authority.uname
			WHERE authority.role = 'manager'";
			if(strlen($mysqli)>1){
			// echo $mysqli;
				$query = mysqli_query($conn,$mysqli) or die("ererearae");
				while($row = mysqli_fetch_array($query)) {?>
				<option value="<?php echo $row['3'];?>"><?php echo $row['0']; ?></option>
				<?php }
			} ?>
		</select><br/><br/>
		<label>REMAINIG CSE'S  :  </label>
		<?php
			// $mysqli ="SELECT user.uname , user.phone,user.email, user.id
			// FROM user AS user
			// INNER JOIN authority AS authority ON user.uname = authority.uname
			// WHERE authority.role = 'cse'";
		     // $mysqli="SELECT user.uname, user.phone, user.email, user.id FROM `user`  LEFT JOIN `set_manager` ON user.id=set_manager.cse_id WHERE set_manager.cse_id IS NULL";

			$mysqli ="SELECT user.uname , user.phone,user.email, user.id
			FROM user AS user
			INNER JOIN authority AS authority ON user.uname = authority.uname AND authority.role='cse'
			WHERE user.id NOT IN (SELECT `cse_id` FROM set_manager)";
			
			if(strlen($mysqli)>1){
			// echo $mysqli;
				$query = mysqli_query($conn,$mysqli) or die("ererearae");
				while($row = mysqli_fetch_array($query)) {?>

				<label><?php echo $row['0']; ?></label>
				<input type="checkbox" name="cseid[]" value="<?php echo $row['3'];?>">
				
				<?php }
			} ?><br><br>
			<input type="submit" name="checkbox_submit" value="submit">
	</form>
	<?php } ?>
	<?php
		if(isset($_POST['checkbox_submit'])){
 		$id=$_POST['cseid'];
 		$m_id=$_POST['manager_select'];
        for($i=0;$i<count($id);$i++) {
	        $exp=explode(',',$id[$i]);//Explode id and name
	        // echo 'id='.$id[$i].'m_id'.$m_id;
	          $query="INSERT INTO set_manager (m_id,cse_id) values ('$m_id','$id[$i]')";
	          mysqli_query($conn,$query);
        	}
        }
	?>
</body>
</html>
<?php
   	// $mysqli= "SELECT cse_id FROM set_manager NOT IN (SELECT user.uname , user.phone,user.email, user.id
	// 		FROM user AS user
	// 		INNER JOIN authority AS authority ON user.uname = authority.uname
	// 		WHERE authority.role = 'cse')";

			 ?> 

			
		   