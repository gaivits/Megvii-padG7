<?php
    
	require "get_member.php";
    
	$res = array();
	$res[] = json_decode($response,true);
    echo   "<a href=admin.php>"."Home"."</a>";
	$data  = "<table style='border:1px solid #066ee6;";
    $data .= "border-collapse:collapse' border='1px' align=center width=80%>";
    $data .= "<thead>";
    $data .= "<tr>";
    $data .= "<th>Obj_id</th>";
    $data .= "<th>recognition_type</th>";
    $data .= "<th>Pid</th>";
    $data .= "<th>type</th>";
    $data .= "<th>person_name</th>";
    $data .= "<th>Delete</th>";
    $data .= "<th>Edit</th>";
    $data .= "</tr>";
    $data .= "</thead>";
    $data .= "<tbody>";
    
        $c = 0;
        require_once "connec.php";
        $db = $con->Megvii_Pad_G7;
        $collection = $db->members;
        $cursor = $collection->find();
        foreach($cursor as $document){
            $data .= "<tr align=center>";
            $data .= "<td>" . $document['_id']."</td>";
            $data .= "<td>" . $document['recognition_type']."</td>";
            $data .= "<td>" . $document['id']."</td>";
            $data .= "<td>" . $document['type']."</td>";
            $data .= "<td>" . $document['person_name']."</td>";
            $data .= "<td>"."<a href=deletes.php?id=$document[id]>"."Del"."</td>";
            $data .= "<td>"."<a href=edits.php?id=$document[_id]&ids=$document[id]>"."Edit"."</td>";
            $c++;
            $data .= "</tr>";
         }
        $data .= "</tbody>";
        $data .= "<td>" ."<b>".$c." ROW-AFFECTED "."</b>"."</td>";
        $data .= "</table>";
        echo $data;

        
?>