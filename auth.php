<?php
  
  $curl = curl_init();

	curl_setopt_array($curl, array(
  	CURLOPT_URL => 'http://192.168.1.10/api/auth/login',
  	CURLOPT_RETURNTRANSFER => true,
  	CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "session_id":"8399f5762fe931043c9602c0cdb9430a",
    "username":"admin",
    "password":"6d284eeedca5c0a3685862ca3708c7c186b378d8e1c012315165db976b1fddb7"
}',
));

$response = curl_exec($curl);

curl_close($curl);
print_r($response);
echo "<a href=gets_pass.php>"."Passes"."</a>";

?>