<?php
  session_start();
  require "logged.php";
  $a = login("192.168.1.66","80","admin@1234");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title></title>
</head>
<body>
    <form action="auth.php" method="POST">
        <input type="text" name = "session_id" placeholder="session_id">
        <input type="password" name = "password" placeholder="password">
        <input type="submit" value="Login">
    </form>
</body>
</html>
