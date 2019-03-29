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
<center><p>View Colleges</p>
<br><br><br><br>
<table  width=80% border=1px cellspacing=0 cellpadding="10px">
<tr bgcolor="grey" style="color:white">
<td>College Name</td><td>City</td><td>Contact No</td><td>Stream</td><td>Cutoff</td>
</tr>
<?php
	$uname=$_SESSION['uname'];
	$con=new mysqli("localhost","root","","students");
	$sql="select * from register where userid='$uname' ";
	$result=$con->query($sql);
	$row=$result->fetch_assoc();
	$sql2="select * from addclg where ".$row['dept']."=1";
	$result2=$con->query($sql2);	
	$i=0;
	while($row2=$result2->fetch_assoc())
	{
		$sql3="select * from addcut where name='".$row2['name']."' and stream='".$row['dept']."'";
		$result3=$con->query($sql3);
		$row3=$result3->fetch_assoc();
		$i=$i+1;
		if($row['rank']<=$row3['cutoff'])
		{	
			$i=$i+1;
	
			echo "<tr><td>".$row2['name']."</td><td>".$row2['city']."</td><td>".$row2['mobile']."</td><td>".$row['dept']."</td><td>".$row3['cutoff']."</td>";
			echo "</tr>";
		}
	}
	if($i==0)
	{
		echo "No Records to display";
	}
	
?>
</table>
</body>
</html>