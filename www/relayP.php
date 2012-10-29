<?php

//header('Content-type: application/json');
header('Content-Type: text/javascript; charset=utf8');

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $_GET['url']); 
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$output = curl_exec($ch);
curl_close($ch);

echo $_GET['callback'] . '(' . $output . ');';

?>
