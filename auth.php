<?php
  
  $curl = curl_init();
  $session_id = $_POST["session_id"];
  $password = $_POST["password"];
  $postfi = ["session_id"=>$session_id,"username"=>"admin","password"=>$password];
  $pf = json_encode($postfi);
	curl_setopt_array($curl, array(
  	CURLOPT_URL => 'http://192.168.1.66/api/auth/login',
  	CURLOPT_RETURNTRANSFER => true,
  	CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS => $pf,
));
$response = curl_exec($curl);
curl_close($curl);
header("location:admin.php");
?>
