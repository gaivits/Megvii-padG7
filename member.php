<?php
	require_once "get_member.php";
	$res = array();
	$res[] = json_decode($response,true);
	$data  = "<table style='border:1px solid #066ee6;";
    $data .= "border-collapse:collapse' border='1px' align=center width=80%>";
    $data .= "<thead>";
    $data .= "<tr>";
    $data .= "<th>person_id</th>";
    $data .= "<th>pass_mode</th>";
    $data .= "<th>recognition_score</th>";
    $data .= "<th>person_name</th>";
    $data .= "<th>card_number</th>";
    $data .= "<th>timestamp</th>";
    $data .= "<th>Delete</th>";
    $data .= "<th>Edit</th>";
    $data .= "</tr>";
    $data .= "</thead>";
    $data .= "<tbody>";
    
    
		foreach($res as $ro)
			{
				foreach($ro['data'] as $r)
				{
            		$data .= "<tr align=center>";
            		$data .= "<td>" . $r['person_id']."</td>";
            		$data .= "<td>" . $r['pass_mode']."</td>";
            		$data .= "<td>" . $r['recognition_score']."</td>";
            		$data .= "<td>" . $r['person_name']."</td>";
            		$data .= "<td>" . $r['card_number']."</td>";
            		$data .= "<td>" . $r['timestamp']."</td>";
                    $data .= "<td>" ."<a href=deletes.php?id=$r[person_id]>"."DEL"."</a>"."</td>";
                    $data .= "<td>" ."<a href=edits.php>"."EDIT"."</a>"."</td>";
                }
                
         	}
        $data .= "</tbody>";
        $data .= "</table>";
        echo $data;
?>