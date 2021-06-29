<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <form action="edit_put.php" method="POST">
        <input type="hidden" name="idx" value="<?php echo $_GET['id'];?>">
        <input type="text" name="new-name" placeholder="new-name">
        
        <input type="submit" value="save">
</body>
</html>