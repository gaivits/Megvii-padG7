<?php
require_once "member.php";

$curl = curl_init();
$ck = $_COOKIE['cc'];
$idx = $_GET['id'];

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
