<?php

//https://ermakpass.ru/media_node/php/login.php

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

$post = file_get_contents("php://input");
$post = json_decode($post);


$email = $post-> email;
$password = $post -> password;

$password = md5($password."wqrtvfd");
$session = md5($email.rand(0,1000));


include 'db_mysql.php';

$sql = "SELECT `id`, `name`, `email`, `tel`, `img`, `level` FROM `users` WHERE `email` = '$email' && `password`='$password'";
$checkUser = $mysql -> query($sql);
$checkUser = $checkUser -> fetch_assoc();


if(isset($checkUser)){
	$userId = $checkUser['id'];
    $sql = "UPDATE `users` SET `session` = '$session' WHERE `id` = '$userId'";
	$result = (object) [
		'success' => true,
		'session' => $session,
		'user' => $checkUser,
	];
	
	$mysql -> query($sql);
}else{
	$result = (object) [
		'success' => false,
		'error' => 'user',
	];
}

$mysql->close();
echo json_encode($result);

?>
