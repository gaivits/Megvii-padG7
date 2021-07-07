<?php
	require 'connec.php';
	require_once "member.php";
	$db = $con->Megvii_Pad_G7;
	$id = $_GET['id'];
    $col = $db->members;
	$col->deleteOne(['_id' => new MongoDB\BSON\ObjectID($id)]);
	
?>