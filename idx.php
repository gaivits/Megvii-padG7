<?php
    
	require_once __DIR__ . "/vendor/autoload.php";
	$con = new MongoDB\Client("mongodb://localhost:27017");
	$manager = new MongoDB\Driver\Manager();
	
	
	$data  = "<table style='border:1px solid red;";
    $data .= "border-collapse:collapse' border='1px' align=center width=80%>";
    $data .= "<thead>";
    $data .= "<tr>";
    $data .= "<th>person_id</th>";
    $data .= "<th>pass_mode</th>";
    $data .= "<th>recognition_score</th>";
    $data .= "<th>person_name</th>";
    $data .= "<th>card_number</th>";
    $data .= "<th>timestamp</th>";
    $data .= "<th>del</th>";
    $data .= "<th>Edit</th>";
    $data .= "</tr>";
    $data .= "</thead>";
    $data .= "<tbody>";
 
    
        $db = $con->megviis;
        $collection = $db->users;
        $cursor = $collection->find();
        foreach($cursor as $document){
            $data .= "<tr align=center>";
            $data .= "<td>" . $document['data'][0]['person_id']."</td>";
            $data .= "<td>" . $document['data'][0]['pass_mode']."</td>";
            $data .= "<td>" . $document['data'][0]['recognition_score']."</td>";
            $data .= "<td>" . $document['data'][0]['person_name']."</td>";
            $data .= "<td>" . $document['data'][0]['card_number']."</td>";
            $data .= "<td>" . $document['data'][0]['timestamp']."</td>";
            $data .= "<td>" ."<button>".'Del'."</button>"."</a>"."</td>";
            $data .= "<td>"."<a href=edits.php>"."Edit"."</td>";
            $data .= "</tr>";
         }
        $data .= "</tbody>";
        $data .= "</table>";
        echo $data;
?>