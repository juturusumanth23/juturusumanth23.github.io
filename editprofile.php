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
$x=$_SESSION['uname'];
$y=$_SESSION['name'];
echo "<center><h2>Welcome <span style='color:red;font-size:150%';>$y</span></h2></center>";
?>
<div style="border:2px solid grey;width:70%;height:85%;margin:auto">
<div style="width:50%; height:100%;margin:auto">
<form id="form" action="" method="post">
<?php
	if(isset($_POST['submit']))
	{
		$con=new mysqli("localhost","root","","students");
		$sql="update register set fname='".$_POST['fname']."',dept='".$_POST['dept']."',rank=".$_POST['rank']." where userid='".$x."'";
		if($con->query($sql)===true)
		{
			echo "<h3 style='float:right'><b style='color:green'>
			Details Updated</b></h3>";
		}
		else
		{
			echo "Error: ".$sql."<br>".$con->error;
		}
	}
?>
<center><p>Edit Profile</p></center><br>
<?php
$con=new mysqli("localhost","root","","students");
  $sql="select * from register where userid='$x'";
  $result=$con->query($sql);
  $row=$result->fetch_assoc();
echo "Student Id<br>";
echo "<input type='text' name='userid' value='".$row['userid']."' disabled=yes>";
echo "<br><br>Student Name<br>";
echo "<input type='text' name='fname' size='30' value='".$row['fname']."' required><br><br>";
echo "Department<br>";
echo "<select type='text' name='dept' required>";
if($row['dept']==it)
echo "<option value='it' selected>Information Technology</option>";
else
echo "<option value='it'>Information Technology</option>";
if($row['dept']==me)
echo "<option value='me' selected>Mechanical Engineering</option>";
else
echo "<option value='me'>Mechanical Engineering</option>";
if($row['dept']==ce)
echo "<option value='ce' selected>Civil Engineering</option>";
else
echo "<option value='ce'>Civil Engineering</option>";
if($row['dept']==ee)
echo "<option value='ee' selected>Electrical Engineering</option>";
else
echo "<option value='ee'>Electrical Engineering</option>";
echo "</select>";
echo "<br><br>";
echo "Rank<br>";
echo "<input type=number name=rank size=30 maxlength=10 value='".$row['rank']."' required>";
echo "<br><br>";
echo "<center><input type='submit' name='submit' style='width:100px;height:35px' value='update'></center>";
?>
</form>
</div>
</div>
</body>
</html>
