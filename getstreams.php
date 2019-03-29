<?php
   session_start();
   if (!isset($_SESSION["uname"])){
    header('Location: main.html');
  }
?>
<?php
$clg = $_GET['clg'];
$con=new mysqli("localhost","root","","students");
  $sql="select * from addclg where name='$clg' ";
  $result=$con->query($sql);
  echo "<select name='stream' id='stream'>";
  echo "<option></option>";
  $row= $result->fetch_assoc();
  	if($row['it']==1)
		echo "<option value=it>Information Technology</option>"; 
	if($row['me']==1)
		echo "<option value=me>Mechanical Engineering</option>";
	if($row['ce']==1)
		echo "<option value=ce>Civil Engineering</option>";
	if($row['ee']==1)
		echo "<option value=ee>Electrical Engineering</option>";
echo "</select>";
$con->close();
?>