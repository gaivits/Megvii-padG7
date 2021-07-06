<?php
require_once "connec.php";
print_r($con);
$curl = curl_init();
$ck = $_COOKIE['cc'];
$idx = $_POST['idx'];
$name = $_POST['new-name'];
$postfi = ["recognition_type"=>"face","is_admin"=>false,"person_name"=>$name];
$pf = json_encode($postfi);
curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://192.168.1.66/api/persons/item/'.$idx,
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
curl_close($curl);
$db = $con->Megvii_Pad_G7;
        $col = $db->members;
        $bson = MongoDB\BSON\fromJSON($response);
        $value = MongoDB\BSON\toPHP($bson);
        $col->updateOne(['_id' => new \MongoDB\BSON\ObjectID('60e43128745c00001200aece')], 
          ['$set' => ['person_name' => json_encode($_POST['new-name'])]]); 

echo "<script language='JavaScript'>alert(' .Edited OK. ');</script>";
echo "<script language='JavaScript'>window.location.href='member.php';</script>";
$response;