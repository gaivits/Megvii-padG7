<?php


$curl = curl_init();
  $ck = $_COOKIE['cc'];
  $name = $_POST["person_name"];
  $img = $_POST["base64s"];
  $admin = is_numeric($_POST['is_admin']);
  $postfi = ["person_name"=>$name,
            "is_admin"=>$admin,
            "recognition_type"=>"face",
            "face_list"=>[ ["idx"=>0,"data"=>$img]] ];
  echo $ck;



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
  CURLOPT_HTTPHEADER => ["Cookie: sessionID=$ck"],
));

$response = curl_exec($curl);
echo $response;
curl_close($curl);