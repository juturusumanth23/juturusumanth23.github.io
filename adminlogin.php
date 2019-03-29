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
<div height="100%" style="top:500px">
<div style="width:25%;;margin-top:100px">
<form id="form" action="adminlogin.php" method="post">
<p>Admin Login</p><br>
<input type="text" name="username" placeholder="username" required>
<br><br>
<input type="password" name="password" size="30" placeholder="password" required><br><br>

<div>
<input type="submit" name="submit" value="LOGIN" border=0 style="width:100px;height:35px;background-color:green">
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

  if($userid=="admin" and $passwd=="admin@123")
  { 
    $_SESSION['uname']=$userid;
    header('Location:admin.php');
  }
  else
  {
	echo "<span style='color:red'>Invalid Login</span>";
  }
}
?>
