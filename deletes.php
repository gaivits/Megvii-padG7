<?php

$curl = curl_init();
  $ck = $_COOKIE['cc'];
  $postfi = ["person_list"=>["id"=>"person_id"]];
  $pf = json_encode($postfi);
  curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://192.168.1.66/api/persons/item/{id}',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'DELETE',
  CURLOPT_POSTFIELDS => $pf,
  CURLOPT_HTTPHEADER => array(
    'Cookie: sessionID=$ck',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);
echo $response;