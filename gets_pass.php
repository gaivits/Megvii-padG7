<?php
    session_start();
    $page = $_SERVER['PHP_SELF'];
    $sec = "10";
?>

<!DOCTYPE html>

<html>

<head>

   <title>PASS CAMERA</title>
   <meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">

</head>

<body>


<div class="container">
<img src="https://i2.wp.com/cyn.co.th/wp-content/uploads/2020/07/cropped-CYNLogo-01-1-e1543208818881-1-1.png">
<center><h1>inspired by MegviiPad-G7</h1></center>
        <br>
<table class="table table-striped" width="80%">

   <tr>
      
      <th>Person_id</th>
      <th>Pass_Mode</th>
      <th>verification_mode</th>
      <th>liveness</th>
      <th>liveness_score</th>
      <th>person_name</th>
      <th>card_number</th>
      <th>timestamp</th>
      <th>Action</th>
    </tr>
   <?php
    //get_value_from_mongo
      require 'connec.php';
      $db = $con->Megvii;
      $col = $db->users;
      $rows = $col->find([]);
      foreach ($rows as $ro) 
      {
        echo "<tr>";
        
        foreach ($ro['data'] as $r) 
        {
            echo "<tr>";
              
                echo "<td>".$r['person_id']."</td>";
                echo "<td>".$r['pass_mode']."</td>";
                echo "<td>".$r['verification_mode']."</td>";
                echo "<td>".$r['liveness']."</td>";
                echo "<td>".$r['liveness_score']."</td>";
                echo "<td>".$r['person_name']."</td>";
                echo "<td>".$r['card_number']."</td>";
                echo "<td>".$r['timestamp']."</td>";
                break;
          }
          echo "<td>"."<a href='deletes.php?id=".$ro->_id."' class='btn btn-danger'>Del</a>"."</td>";
          echo "<td>"."<a href='edits.php?id".$ro->_id."' class='btn btn-primary'>Edit</a>"."</td>";
          echo "</td>";
        echo "</tr>";

        }

    echo "</tr>";
    ?>
   
</table>

</div>


</body>

</html>
