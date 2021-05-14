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
    "session_id":"7f41f46ebadd8dafdde7303e45b19aef",
    "username":"admin",
    "password":"208b3b6c88ba6b80d50ff22ca12017e71063a43d40c2589522bc9463bdbf1aed"
}',
));

$response = curl_exec($curl);

curl_close($curl);
print_r($response);
echo "<a href=gets_pass.php>"."Passes"."</a>";

?>