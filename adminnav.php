<?php
   session_start();
   if (!isset($_SESSION["uname"])){
    header('Location: main.html');
  }
?>
<html>
<head>
<style>
#navbar{
    background-color: green;
    overflow: hidden;
}

#navbar>a{
    float: left;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    font-size: 17px;
}
</style>
</head>
<div id="navbar">
  <a href="addclg.php" target="admindown">ADD COLLEGE</a>
  <a href="addcut.php" target="admindown">ADD CUTOFF</a>
  <a href="adminviewclg.php" target="admindown">VIEW COLLEGE</a>
  <a href="viewstd.php" target="admindown">VIEW STUDENT</a>
  <a href="out.php" target="_parent">LOGOUT</a>
</div> 
</body>
<html>