<?php
	require_once "simple_html_dom";
	$webUrl = "https://127.0.0.1/xampp/Megvii/get_member.php";
	$html = file_get_html($webUrl);
	foreach($html->find('$response') as $res)
	{
		echo "<pre>";
		echo $res;
		echo "</pre>";
	}
?>