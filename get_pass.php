<?php
require "connec.php";

$curl = curl_init();
echo $con."<br>";
$ck = $_COOKIE['cc'];
curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://192.168.1.66/api/passes/query',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "limit":9999999
  }',
  CURLOPT_HTTPHEADER => ["Cookie: sessionID=$ck","Content-Type:application/json"],
));

$response = curl_exec($curl);



curl_close($curl);
?>
