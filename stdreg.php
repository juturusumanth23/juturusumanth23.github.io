<?php
if(isset($_POST['submit']))
{
	$fname=$_POST['s1'];
	$userid=$_POST['s2'];
	$passwd=$_POST['s3'];
	$dept=$_POST['s4'];
	$rank=$_POST['s5'];
	$con=new mysqli("localhost","root","","students");
	$sql="select * from register where userid='$userid'";
	$result=$con->query($sql);
	if($result->num_rows>=1)
	{
		echo "<body style='background:#ccc;'><h3 style='display:flex;justify-content:center;margin-top:200px;'><b style='color:green'>
		You have already registered.<a href='stdlogin.php' target='_self'>Login Here</a></b></h3></body>";
	}
	else{
	$sql="insert into register (fname,userid,passwd,dept,rank) values ('$fname','$userid','$passwd','$dept','$rank')";
	if($con->query($sql)===true)
	{
		echo "<body style='background:#ccc;'><h3 style='display:flex;justify-content:center;margin-top:200px;'><b style='color:green'>
		You have successfully registered<a href='stdlogin.php' target='_self'>Login Here</a></b></h3></body>";
	}
	else
	{
		echo "Error: ".$sql."<br>".$con->error;
	}
	$con->close();
        }
}
?>