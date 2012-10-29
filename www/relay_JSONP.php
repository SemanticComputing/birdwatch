<?php

//header('Content-type: application/json');

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $_GET['url'] );
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$output = curl_exec($ch);
curl_close($ch);

header('Content-Type: text/javascript; charset=utf8');
   
$arr = new SimpleXMLElement( $output );
$json= json_encode($arr);

echo $_GET['callback'] . '(' . $json . ');';

//echo $json;

?>
