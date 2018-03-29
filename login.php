<?php 
session_start();

?>
<!DOCTYPE html>
<html>
<head>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <title>LogIn</title>
</head>
<body>
  <script type="text/javascript">


   $(document).ready(function(){
     $("#form").submit(function(){
      var name = $('#uname').val();
      var pass = $('#pswd').val();

      var login={'uname':name,'password':pass};
      if(name=="" || pass=="" ){
        alert("input field is empty");
      }

    
  });
   });    
 </script>
 <img src="logo-1.png" >
 <hr>
 <div id="id01" class="modal">

  <form class="modal-content animate"   id="form" method="post">
    <div class="container">
    <div class="name">
      <label><b>Username</b></label>
      <input type="text"  name="uname" id="uname" autocomplete="off" >
    </div>
      
      <br/>
 <div class="name">
      <label><b>Password</b></label>
      <input type="password"  name="password" id="pswd" >
</div>
    <input type="submit"  name="submit" id="button" value="LOGIN">
         </div>
  </form>
</div>
</body>
<style type="text/css">
input[type=text], input[type=password] {
      border: medium none;
    box-shadow: 0 0 5px 3px rgba(1, 1, 1, 0.2) inset;
    float: right;
    height: 32px;
    width: 210px;
}
.name {
    float: left;
    margin: 15px 0;
}
label{
      color: #BBBBBB;
    float: left;
    font-size: 24px;
    line-height: 32px;
    margin: 0;
    width: 120px;
}
#button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 25px 218px;
  border: none;
  cursor: pointer;
  width: 35%;
  border-radius: 25px;
}

#button:hover {
  opacity: 0.8;
}
.container {

  padding: 16px;
}
.modal {

     border: 1px solid #808080;
    border-radius: 5px;
    box-shadow: 0 0 5px 3px rgba(1, 1, 1, 0.2);
    float: left;
    height: 225px;
    margin: 120px 520px;
    width: 410px;
}

body{
  background:white;
}

</style>
</html>

<?php 


$conn = mysqli_connect('localhost','root','welcome@123','review');
if (!$conn) {
  echo "database not connected"; 
}

if (isset($_POST['submit'])) {


$uname = $_POST['uname'];
$password = $_POST['password'];

  $mysql="SELECT  user.uname , user.password, authority.role, user.id
  FROM user AS user
  INNER JOIN authority AS authority ON user.uname = authority.uname
  WHERE user.uname =  '$uname'";
  $result = mysqli_query($conn,$mysql);
  $row=mysqli_fetch_row($result);
  if($result->num_rows==1){
   if($row[0]==$uname){
    if($row[1]==$password){
      $_SESSION['role']=$row[2];
      $_SESSION['uname']=$row[1];
      $_SESSION['user_id']=$row[3];
      echo $_SESSION['user_id'];  
      if($row[2]=='admin'){
        echo("successufully logedin");
        header("location:admin.php");
      }else 

      if($row[2]=='manager'){
        echo("successufully logedin");
         
        header("location:manager.php");

      }else 
     
      if($row[2]=='cse'){
        echo("successufully logedin");
        header("location:cse.php");
      }else

      if($row[2]=='reviewer'){
        echo("successufully logedin");
        header("location:reviewer.php");
      }else


      if($row[2]=='hr'){
        echo("successufully logedin");
        header("location:hr.php");
      }else
      
      {
        echo ("role is invalid");
      }
    }else{
      echo("invalid password");
    }
  }else{
    echo ("username is invalid");
  }
  }
}



?>
