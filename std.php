<?php
   session_start();
   if (!isset($_SESSION["uname"])){
    header('Location: main.html');
  }
?>
<html>
<frameset name="std" rows="15%,*" frameborder="0">
<frame name="stdup" src="stdnav.php">
<frame name="stddown" src="viewprofile.php">
</frameset>
</html>