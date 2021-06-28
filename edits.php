<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <form action="edit_put.php" action="POST">
        <input type="text" value="<?php echo $_GET['id'] ;?>" name="person_id" readonly>
        <input type="text" name="person_name" placeholder="new-name">
        <input type="submit" value="save">
    </form>
</body>
</html>