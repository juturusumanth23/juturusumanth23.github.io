<?php
if(isset($_POST['submit']))
{
	$name=$_POST['clgname'];
	$stream=$_POST['stream'];
	$cutoff=$_POST['cutoff'];
	$con=new mysqli("localhost","root","","students");
    $sql="insert into addcut (name,stream,cutoff) values ('$name','$stream','$cutoff')";	
	if($con->query($sql)===true)
	{
        echo "<body style='background:#ccc;'><h3 style='display:flex;justify-content:center;margin-top:200px;'><b style='color:green'>
		Cutoff Marks are added sucessfully.<a href='addclg.php'>Exit from this page</a></b></h3></body>";	}
	else
	{
		echo "Error: ".$sql."<br>".$con->error;
	}
	$con->close();
}
?>