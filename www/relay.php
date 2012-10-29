<?php

//header('Content-type: application/json');

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $_GET['url']); 
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$output = curl_exec($ch);
curl_close($ch);

?>
