<?php
    
	require_once "get_member.php";
	$res = array();
	$res[] = json_decode($response,true);
	$data  = "<table style='border:1px solid #066ee6;";
    $data .= "border-collapse:collapse' border='1px' align=center width=80%>";
    $data .= "<thead>";
    $data .= "<tr>";
    $data .= "<th>Person_id</th>";
    $data .= "<th>Recognition_type</th>";
    $data .= "<th>Type</th>";
    $data .= "<th>Person_name</th>";
    $data .= "<th>Delete</th>";
    $data .= "<th>Edit</th>";
    $data .= "</tr>";
    $data .= "</thead>";
    $data .= "<tbody>";
    
        $c = 0;
        foreach($res as $ro)
			{
				foreach($ro['data'] as $r)
				{
            		$data .= "<tr align=center>";
            		$data .= "<td>" . $r['id']."</td>";
            		$data .= "<td>" . $r['recognition_type']."</td>";
            		$data .= "<td>" . $r['type']."</td>";
            		$data .= "<td>" . $r['person_name']."</td>";
                    $data .= "<td>" ."<a href=deletes.php?id=$r[id] >"."DEL"."</a>"."</td>";
                    $data .= "<td>" ."<a href=edits.php?id=$r[id]>"."EDIT"."</td>";

                    $c++;
                }
            }
        
        $data .= "</tbody>";
        $data .= "<td>" ."<b>".$c." ROW-AFFECTED "."</b>"."</td>";
        $data .= "</table>";
        echo $data;
       
?>