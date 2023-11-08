<?php
header('Access-Control-Allow-Origin: *');
//header("Content-Type: application/json");

include 'db_mysql.php';

$post = file_get_contents("php://input");
$post = json_decode($post);

$user_id = $post-> user_id;
$session = $post -> session;

$sql = "SELECT `id`, `name`, `email` FROM `users` WHERE `id` = '$user_id' && `session`='$session'";
$checkSession = $mysql -> query($sql);
$checkSession = $checkSession -> fetch_assoc();
$checkSession = isset($checkSession);

if(!$checkSession){ 
	$result = (object) [
		'success' => false,
		'error' => 'session',
	];
	echo json_encode($result);
	exit(); 
}

$sql = "SELECT `id`, `name`, `email`, `tel`, `img`, `level` FROM `users` WHERE `id` = '$user_id' ";
$checkUser = $mysql -> query($sql);
$checkUser = $checkUser -> fetch_assoc();

$result = (object) [
	'success' => true,
	'user' => $checkUser,
];

echo json_encode($result);

?>