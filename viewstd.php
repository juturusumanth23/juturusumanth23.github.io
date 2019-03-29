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
echo "<h2><span style='color:red;font-size:100%;text-align:right'>Admin Logged in </span></h2>";
?>
<center><p>View Students</p>
<br><br><br><br>
<table  width=80% border=1px cellspacing=0 cellpadding="10px">
<tr bgcolor="grey" style="color:white">
<td>Student Name</td><td>User Name</td><td>Department</td><td>Rank</td>
</tr>
<?php
	$con=new mysqli("localhost","root","","students");
	$sql="select * from register ";
	$result=$con->query($sql);
	while($row=$result->fetch_assoc())
	{
		echo "<tr><td>".$row['fname']."</td><td>".$row['userid']."</td><td>".$row['dept']."</td><td>".$row['rank']."</td></tr>";
	}
?>
</table>

</body>
</html>