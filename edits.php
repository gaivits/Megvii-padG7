<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
</head>
<body>
    <?php echo "Person Id = ".$_GET['ids'];?>
    <form action="edit_put.php" method="POST">
        <input type="hidden" name="idx" value="<?php echo $_GET['id'];?>">
        <input type="hidden" name="ids" value="<?php echo $_GET['ids'];?>">
        <input type="text" name="new-name" placeholder="new-name">
        
        <input type="submit" value="save">
</body>
</html>