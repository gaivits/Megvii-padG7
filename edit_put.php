<?php

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
  CURLOPT_POSTFIELDS =>'',
  CURLOPT_HTTPHEADER => ["Cookie: sessionID=$ck","Content-Type:application/json"],
  ));
$response = curl_exec($curl);
curl_close($curl);
echo $response;
echo "<script language='JavaScript'>alert(' .$response. ');</script>";
echo "<script language='JavaScript'>window.location.href='edits.php';</script>";