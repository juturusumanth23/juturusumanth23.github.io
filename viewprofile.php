<?php
   session_start();
   if (!isset($_SESSION["uname"])){
    header('Location: main.html');
  }
?>
<html>
<head>
<style>
#stream{
color:grey;
}
p{
text-decoration:underline;
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
<?php
$y=$_SESSION['name'];
echo "<center><h2>Welcome <span style='color:red;font-size:150%';>$y</span></h2></center>";
?>
<div style="border:2px solid grey;width:70%;height:85%;margin:auto">
<div style="width:50%; height:100%;margin:auto">
<form id="form">
<center><p>View Profile</p></center><br>
<?php
$con=new mysqli("localhost","root","","students");
$x=$_SESSION['uname'];
  $sql="select * from register where userid='$x'";
  $result=$con->query($sql);
  $row=$result->fetch_assoc();
  
echo "Student Id<br>";
echo "<input type='text' name='userid' value='".$row['userid']."' disabled=yes>";
echo "<br><br>Student Name<br>";
echo "<input type='text' name='fname' size='30' value='".$row['fname']."' disabled=yes><br><br>";
echo "Department<br>";
echo "<input type='text' name=dept value='".$row['dept']."' disabled=yes>";
echo "<br><br>";
echo "Rank<br>";
echo "<input type=number name=rank size=30 maxlength=10 value='".$row['rank']."' disabled=yes>";
?>
</form>
</div>
</div>
</body>
</html>