<?php
    require_once 'connec.php';
      $db = $con->Megvii;
      $col = $db->users;
      $cnt = 0;
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
                $cnt++;
                break;
          }
          echo "</td>";
         echo "</tr>";
        
        }

    echo "<td>"."<b>".$cnt.' '.'row-affected'."</b>"."</td>";
    echo "</tr>";
    
?>