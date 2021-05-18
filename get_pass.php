<?php
require "connec.php";
$db = $con->Megvii;
$col = $db->users;
$curl = curl_init();
echo $con."<br>";
curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://192.168.1.10/api/passes/query',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "limit":999999
}',
  CURLOPT_HTTPHEADER => array(
    'Cookie: sessionID=8399f5762fe931043c9602c0cdb9430a',
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
$bson = MongoDB\BSON\fromJSON($response);
$value = MongoDB\BSON\toPHP($bson);
$col->insertOne($value);
print_r($col);

curl_close($curl);

?>
