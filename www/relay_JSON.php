<?php

//header('Content-type: application/json');

$ch = curl_init(); 
curl_setopt($ch, CURLOPT_URL, $_GET['url'] );
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_TIMEOUT, 10);
$output = curl_exec($ch);
curl_close($ch);

/*header('Content-Type: text/javascript; charset=utf8');
header('Access-Control-Allow-Origin: http://www.example.com/');
header('Access-Control-Max-Age: 3628800');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');*/
   
$arr = new SimpleXMLElement( $output );
$json= json_encode($arr);
//print_r($_GET['callback'].$json); //callback is prepended for json-p
echo $json;

?>
