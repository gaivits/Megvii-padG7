<?php
//return ค่า session_id ออกมา เอาไปใช้ใส่ cookie
function login($ip,$port,$password)
{
    $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://'.$ip.':'.$port.'/api/auth/login/challenge?username=admin',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
// echo $response;
$chal = json_decode($response,true);
$password = $password . $chal['salt'] . $chal['challenge'];
$password = hash('sha256',$password);

$pf = 
'{
  "session_id": "'. $chal['session_id'] .'",
  "username": "admin",
  "password": "'. $password .'"
}';
// echo $pf;

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://'.$ip.':'.$port.'/api/auth/login',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $pf,
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
// echo $response;

curl_close($curl);
$login = json_decode($response,true);
echo "pass"."->".$password."->"."Session"."->";
$ck = setcookie("cookies",$login['session_id'],time()+86400 * 7);
return $login['session_id'];


}