<?php
   session_start();
   if (!isset($_SESSION["uname"])){
    header('Location: main.html');
  }
?>
<html>
<frameset name="admin" rows="15%,*" frameborder="0">
<frame name="adminup" src="adminnav.php">
<frame name="admindown" src="addclg.php">
</frameset>
</html>