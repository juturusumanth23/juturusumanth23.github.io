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
#form > input{
width:100%;
height:40px;
}
</style>
</head>
<title>  </title>
<body>
<?php
echo "<h2><span style='color:red;font-size:100%;'>Admin Logged in </span></h2>";
?>
<div style="border:2px solid grey;width:70%;height:100%;margin:auto">
<div style="width:50%; height:100%;margin:auto">
<form id="form" action="clg.php" method="post" onsubmit="return valform()">
<center><p>Add College</p></center><br>
College Name<br>
<input type="text" name="clgname" required>
<br><br>City<br>
<input type="text" name="city" size="30" required><br><br>
Contact No<br>
<input type="number" name="mobile" size="30" maxlength="10" required>
<br><br>
Stream<br><br>
<span id="stream">
Information Technmology<input id="it" type="checkbox"  value="1" name="stream1" width="20px" height="20px"/><br><br>
Mechanical Engineering<input id="me" type="checkbox" value="1" name="stream2" width="20px" height="20px"/><br><br>
Civil Engineering<input id="ce" type="checkbox" value="1" name="stream3" width="20px" height="20px"/><br><br>
Electrical Engineering<input id="ee" type="checkbox" value="1" name="stream4" width="100px" height="100px"/><br><br>
</span>
<center><input type="submit" value="submit" name="submit" ></center>
<script>
function valform(){
	var it=document.getElementById("it");
	var me=document.getElementById("me");
	var ce=document.getElementById("ce");
	var ee=document.getElementById("ee");
	if(!(it.checked || me.checked || ce.checked || ee.checked))
	{
		alert("select atleast one stream");
		return false;
	}
	return true;
}
</script>
</form>
</div>
</div>
</body>
</html>