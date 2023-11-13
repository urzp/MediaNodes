<?php

// header('Access-Control-Allow-Origin: *');
// header("Content-Type: application/json");

// $post = file_get_contents("php://input");
// $post = json_decode($post);

function GetIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
  }



$url = 'https://www.google.com/recaptcha/api/siteverify'; 
$data['secret'] = '6LfXHQ0pAAAAAD89zxRBWT302uFhCpbPDiSEELK-';
$data['response'] = $post -> recaptchaToken;
$data['remoteip'] = GetIP();

$requestParams = http_build_query($data);
    
$context = stream_context_create(array(
  'http' => array(
        'method' => 'POST',
  'header' => 'Content-Type: application/x-www-form-urlencoded' . PHP_EOL,
        'content' => $requestParams,
  ),
));
    
$result = file_get_contents($url, false, $context);	
$result = json_decode($result);

if(!$result-> success){
	$result = (object) [
		'success' => false,
		'error' => 'recaptcha',
	];
	echo json_encode($result);
	exit();
}


?>