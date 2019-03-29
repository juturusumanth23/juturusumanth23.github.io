<?php
   session_start();
   if (!isset($_SESSION["uname"])){
    header('Location: main.html');
  }
?>
<html>
<head>
<style>
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
<script>
	function getstreams() {
		var clg=document.getElementById("clgname").value;
    if (clg == "") {
        document.getElementById("stream").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("stream").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","getstreams.php?clg="+clg,true);
        xmlhttp.send();
    }
}
</script>
<body>
<?php
echo "<h2><span style='color:red;font-size:100%;text-align:right'>Admin Logged in </span></h2>";
?>
<div style="border:2px solid grey;width:70%;height:100%;margin:auto">
<div style="width:50%; height:100%;margin:auto">
<form id="form" action="cut.php" method="post">
<center><p>Add CutOff Rank</p></center><br>
Select College<br>
<?php
	$con=new mysqli("localhost","root","","students");
	$sql="select name from addclg";
	$result=$con->query($sql);
	echo "<select type='text' id='clgname' name='clgname' onchange='getstreams()' required>";
    echo "<option>--select--</option>";
	while($row=$result->fetch_assoc())
	{
		echo "<option value=".$row['name'].">".$row['name']."</option>";
	}
	echo "</select>";
?>
<br><br>Stream<br>
<span id="stream">
<select>
<option>--select--</option>
</select>
</span>
<br><br>
Cut Off<br>
<input type="number" name="cutoff" size="30" maxlength="10">
<br><br>
<center><input type="submit" value="submit" name="submit"></center>
</form>
</div>
</div>
</body>
</html>