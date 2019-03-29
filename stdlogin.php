<html>
<head>
<style>
#stream{
color:grey;
}
p{
color:green;
font-size:150%
}
#form
{
font-family:arial;
font-weight:bold;
}
#form > input,select{
width:100%;
height:40px;
}

</style>
</head>
<title>  </title>
<body>
<div style="width:25%;;margin-top:100px">
<form id="form" action="" method="post">
<p>Student Login</p><br>
<input type="text" name="username" placeholder="username" required>
<br><br>
<input type="password" name="password" size="30" placeholder="password" required><br><br>

<div>
<input type="submit" value="LOGIN" style="width:100px;height:35px;background-color:green" name="submit">
<a href="stdreg.html" target="_self"><input type="button" value="REGISTER" style="width:100px;height:35px;background-color:green"></a>
</div>
</form>
</div>
</body>
</html>
<?php
session_start();
if(isset($_POST['submit']))
{
  $userid=$_POST['username'];
  $passwd=$_POST['password'];
  $con=new mysqli("localhost","root","","students");
  $sql="select * from register where userid='$userid' and passwd='$passwd'";
  $result=$con->query($sql);
  if($result->num_rows==1)
  { 
      $row=$result->fetch_assoc();
      $_SESSION["name"]=$row['fname'];
      $_SESSION["uname"]=$userid;
    header('Location: std.php');
  }
  else
  {
	echo "<span style='color:red'>Invalid Login</span>";
  }
  $con->close();
}
?>