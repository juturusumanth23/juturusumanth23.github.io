<?php
if(isset($_POST['submit']))
{
	$name=$_POST['clgname'];
	$city=$_POST['city'];
	$mobile=$_POST['mobile'];
	for($i=1;$i<=4;$i++)
	{
		if(!isset($_POST["stream$i"]))
			$_POST["stream$i"]=0;
	}
	$it=$_POST['stream1'];
	$me=$_POST['stream2'];
	$ce=$_POST['stream3'];
	$ee=$_POST['stream4'];
	$con=new mysqli("localhost","root","","students");
	$sql="select * from addclg where name='$name'";
	$result=$con->query($sql);
	if($result->num_rows>=1)
	{
		echo "<body style='background:#ccc;'><h3 style='display:flex;justify-content:center;margin-top:200px;'><b style='color:green'>
		This college is already added by the admin.<a href='addclg.php'>Exit from this page</a></b></h3></body>";
	}
	else{
	$sql="insert into addclg (name,city,mobile,it,me,ce,ee) values ('$name','$city','$mobile','$it','$me','$ce','$ee')";
	if($con->query($sql)===true)
	{
		echo "<body style='background:#ccc;'><h3 style='display:flex;justify-content:center;margin-top:200px;'><b style='color:green'>
		Collge is successfully added<a href='addclg.php'>Exit from this page</a></b></h3></body>";
	}
	else
	{
		echo "Error: ".$sql."<br>".$con->error;
	}
	$con->close();
        }
}
?>
