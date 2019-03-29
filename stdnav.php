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
  <a href="viewprofile.php" target="stddown">VIEW PROFILE</a>
  <a href="editprofile.php" target="stddown">EDIT PROFILE</a>
  <a href="stdviewclg.php" target="stddown">VIEW COLLEGE</a>
  <a href="out.php" target="_parent">LOGOUT</a>
</div> 
</body>
<html>