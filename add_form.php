<?php

$curl = curl_init();
$name = $_POST["person_name"];
$img = $_POST["base64s"];
$postfi = ["person_name"=>$name,
            "is_admin"=>false,
            "recognition_type"=>"face",
            "face_list"=>[ ["idx"=>0,"data"=>$img]] ];

$pf = json_encode($postfi);

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://192.168.1.10/api/persons/item',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>$pf,
  CURLOPT_HTTPHEADER => array(
    'Cookie :sessionID=04f024dfe572404c52bc25e2a5e34666',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
echo "<pre>";
echo $response;
echo "</pre>";
curl_close($curl);

