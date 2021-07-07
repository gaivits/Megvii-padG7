<?php
require_once "connec.php";
$curl = curl_init();
$ck = $_COOKIE['cc'];
$idx = $_POST['idx'];
$ids = $_POST['ids'];
$name = $_POST['new-name'];
$postfi = ["recognition_type"=>"face","is_admin"=>false,"person_name"=>$name];
$pf = json_encode($postfi);
curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://192.168.1.66/api/persons/item/'.$ids,
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'PUT',
  CURLOPT_POSTFIELDS =>$pf,
  CURLOPT_HTTPHEADER => ["Cookie: sessionID=$ck","Content-Type:application/json"],
  ));
$response = curl_exec($curl);
    $db = $con->Megvii_Pad_G7;
 $col = $db->members;

 $bson = MongoDB\BSON\fromJSON($response);
 $value = MongoDB\BSON\toPHP($bson);
$col->updateOne(['_id' => new \MongoDB\BSON\ObjectID($idx)], 
          ['$set' => ['person_name' => $_POST['new-name']]]);     
curl_close($curl);
header ("location:member.php");
