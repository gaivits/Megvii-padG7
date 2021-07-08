<?php

require_once "connec.php";

$curl = curl_init();
  $ck = $_COOKIE['cc'];
  $name = $_POST["person_name"];
  $img = $_POST["base64s"];
  $admin = false;
  
  $postfi = [
            "id" => uniqid(),
            "type"=>"staff",
            "person_name"=>$name,
            "is_admin"=>$admin,
            "recognition_type"=>"face",
            "face_list"=>[ ["data"=>$img]]];
  
  $pf = json_encode($postfi);
  curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://192.168.1.66/api/persons/item',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$pf,
  CURLOPT_HTTPHEADER => ["Cookie: sessionID=$ck","Content-Type:application/json"],
));
$response = curl_exec($curl);
$db = $con->Megvii_Pad_G7;
        $col = $db->members;
        // $bson = MongoDB\BSON\fromJSON($postfi);
        // $value = MongoDB\BSON\toPHP($bson);
        $col->insertOne($postfi);
echo "<script language='JavaScript'>alert(' . $response . ');</script>";
echo "<script language='JavaScript'>window.location.href='add_user.php';</script>";
curl_close($curl);
