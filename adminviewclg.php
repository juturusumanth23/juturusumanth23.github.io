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
<center><p>View Colleges</p>
<br><br><br><br>
<table  width=80% border=1px cellspacing=0 cellpadding="10px">
<tr bgcolor="grey" style="color:white">
<td>College Name</td><td>City</td><td>Contact No</td><td>IT</td><td>ME</td><td>CE</td><td>EE</td><td>Action</td>
</tr>
<?php
	$con=new mysqli("localhost","root","","students");
	$sql="select * from addclg ";
	$result=$con->query($sql);
	$i=0;
	while($row=$result->fetch_assoc())
	{
		$i=$i+1;
		echo "<form action='' method='post'><tr><td>".$row['name']."</td><td>".$row['city']."</td><td>".$row['mobile']."</td><td>";
		if($row['it']==1)
		{
			$sql2="select * from addcut where name='".$row['name']."' and stream='it'";
			$result2=$con->query($sql2);
			$row2=$result2->fetch_assoc();
			echo $row2['cutoff']."</td><td>";
		}
		else
			echo "NO</td><td>";
		if($row['me']==1)
		{
			$sql2="select * from addcut where name='".$row['name']."' and stream='me'";
			$result2=$con->query($sql2);
			$row2=$result2->fetch_assoc();
			echo $row2['cutoff']."</td><td>";
		}
		else
			echo "NO</td><td>";
		if($row['ce']==1)
		{
			$sql2="select * from addcut where name='".$row['name']."' and stream='ce'";
			$result2=$con->query($sql2);
			$row2=$result2->fetch_assoc();
			echo $row2['cutoff']."</td><td>";
		}
		else
			echo "NO</td><td>";
		if($row['ee']==1)
		{
			$sql2="select * from addcut where name='".$row['name']."' and stream='ee'";
			$result2=$con->query($sql2);
			$row2=$result2->fetch_assoc();
			echo $row2['cutoff']."</td><td>";
		}
		else
			echo "NO</td><td>";
		echo "<input type='submit' value='delete' name=submit$i></td>";
		echo "</tr></form>";
		if(isset($_POST["submit$i"]))
	    {
			$name=$row['name'];
			$sql="delete from addclg where name='$name'";
			$sql2="delete from addcut where name='$name'";
			$con->query($sql);
			$con->query($sql2);
			header('Location: adminviewclg.php');
		}
	}
	if($i==0)
	{
		echo "No Records to display";
	}
	
?>
</body>
</html>