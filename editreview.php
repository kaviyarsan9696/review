<?php 
	session_start();
	error_reporting(E_ALL);
ini_set('display_errors', 'on');
	 $conn = mysqli_connect('localhost','root','welcome@123','review');
  if (!$conn) {
    echo "database not connected"; 
           
  }

  	$cse_id =$_GET['id'];
			$_SESSION['cse_id']= $cse_id;
		
			//echo $_SESSION['cse_id'];
  	$mysqli = "SELECT `id`,`message`,`date`,`understanding`,`closure`,`language`,`total`,`command`,`status` FROM data WHERE `cse_id`=$cse_id";
		$query = mysqli_query($conn,$mysqli);

		$no_of_rows = mysqli_num_rows($query); 
 		
		

 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style type="text/css">
	.input1{
		width: 60px;
		height: 30px;
		margin-right: 50px;
		border-radius: 5px;
	}
	.input2{
		width:40%;
		height:30px;
			border-radius: 8px;
	}
	.input3{
		width:80%;
		height:100px;
		border-radius: 8px;
	}
	.input4{
		width: 60px;
		height: 25px;
		margin-left: 10px;
		margin-right: 10px;
		border-radius: 8px;
	}
	.submit1{
		margin:10px;
		background: #4CAF50;
		border-radius: 8px;
	}
	.submit{
		margin:10px;
		background: #4CAF50;
		border-radius: 8px;
	}
	.submit2{
		margin:10px;
		background: #4CAF50;
		border-radius: 8px;
	}
	.div1{
		height: 300px;
		
	}
	.div2{
		 position: absolute;
		width: 80%;
		left: 110px;
		 padding: 20px;
	}
	form{
		position: absolute;
    	top: 65px;
   	    left: 110px;
   	    width: 80%;
   	    padding: 20px;

	}
	#submit{
		position: absolute;
    	top: 65px;
   	    left: 90%;
   	    width: 80%;
   	    padding: 20px;
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
</style>
</head>
<header>
	<img src="logo-1.png">	
	<hr>
</header>
<body>
<form action="logout.php" method="POST" id="logout">
		<input type="submit" name="" class="submit2" value="LOGOUT">
	</form>
<form action="back.php" method="POST" id="back">
		<input type="submit" name="" class="back" value="BACK">
	</form>
<div class="container">
<div class="div2" >
	<table width="100%"  cellpadding="10" cellspacing="0" border="1">
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
			<td>
				STATUS
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
		        <td><textarea name="command" id="command"><?php echo $row['7'];?></textarea></td>
		        
		           <?php $rows = $row['0'];
		          
		           	if($row['8']==0){ ?>
		           		<td>
		           			<input type="submit" name="edit" class="submit hide approved" data-val = "<?= $rows ?>" value="Approved">  
		        			<input style="background: red; border-radius: 5px;" type="submit" data-rej= "<?= $rows ?>" name="edit" class="submit1 hide reject" data-val = "<?= $rows ?>" value="Reject">
		           		</td>
		           	<?php }	elseif ($row['8']==1) { ?>
		           		<td style="color: green;">Approved
		           		<input style="background: red; border-radius: 5px;" type="submit" data-rej= "<?= $rows ?>" name="edit" class="submit1 hide reject" data-val = "<?= $rows ?>" value="Reject">
		           		</td>
		           		
		           <?php } elseif($row['8']==2) { ?>

		           		<td style="color: red;">
		           			<input type="submit" name="edit" class="submit hide approved" data-val = "<?= $rows ?>" value="Approved"> 
		           		Rejected</td>
		          <?php }

		           ?>
	
		    </tr>
		  <?php
		 
		}
	?>
	</table>
	<script type="text/javascript">
			$(document).ready(function(){
			$(".submit").on('click', function(){
			var input = $(this);
			var command = $('#command').val();
			var php_var = this.getAttribute('data-val');
			var status = 1;
			var datastr = {'php_var':php_var,'status':status,'command':command};
			console.log(php_var);
					$.ajax({
    			  type:'POST',
     			 url:'approved.php',
    			  data: datastr,
     			 success: function(data,status,xhr)
        		    {
               		window.location.href=window.location.href;	
                     var result = data;
                     $(input).css('background','orange');
                    
                  }
     		 
		});
					return false;
					
		});
	
});

$(document).ready(function(){
			$(".submit1").on('click', function(){
			var input = $(this);
			var command = $('#command').val();
			var php_var = this.getAttribute('data-rej');
			var status = 2;
			var datastr = {'php_var':php_var,'status':status,'command':command};
			console.log(php_var);
					$.ajax({
    			  type:'POST',
     			 url:'approved.php',
    			  data: datastr,
     			 success: function(data,status,xhr)
        		    {
               		window.location.href=window.location.href;	
                     var result = data;
                     $(input).css('background','orange');
                    
                  }
     		 
		});
					return false;
					
		});
	
});
// $(document).ready(function(){
// 	$(".approved").on('click',function){
// 		$('.reject').attr('disable');
// 	});

// });



// 		$(document).ready(function(){	
// 		$("#form").submit(function(){
// 			var message=$("#message").val();
			

// 			var understanding= $("#understanding").val();
// 			var closure=$("#closure").val();
// 			var language=$("#language").val();
// 			if((understanding=="0" || understanding=="2") && (closure=="0" || closure=="2") && (language=="0" || language=="2")){
// 				var total = (+understanding) + (+closure) + (+language);
// 				var datastr={'message': message,'understanding':understanding,'closure':closure,'language':language,'total':total};
// 			 $.ajax({
//     			  type:'POST',
//      			 url:'update.php',
//     			  data: datastr,
//      			 success: function(data,status,xhr){ 
//         		  window.location.href= window.location.href;
//      		 }
// 		});
// 			}else{
// 				alert("value shoud be 0 or 2");
			
// 			}


//  return false;
// 	});
// });
	</script>

</div>
		
</div>	


</body>

</html>