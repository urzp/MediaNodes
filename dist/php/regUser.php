<?php

//https://ermakpass.ru/media_node/php/check.php

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

$post = file_get_contents("php://input");
$post = json_decode($post);


$email = $post-> email;
$name = $post -> name;
$password = $post -> password;
$password = md5($password."wqrtvfd");


$mysql = new mysqli('localhost','ermak8nk_users','5&lxD2Xt','ermak8nk_users');

$sql = "SELECT * FROM `users` WHERE `email` = '$email'";
$checkUser = $mysql -> query($sql);
$checkUser = $checkUser -> fetch_assoc();
if(isset($checkUser)){
	$result = (object) [
		'success' => false,
		'error' => 'email',
	];
	echo json_encode($result);
	exit();
}


$sql = "INSERT INTO `users` (`email`, `name`, `password` ) VALUES('$email', '$name', '$password')";
$mysql -> query($sql);
$mysql->close();
$result = (object) [
	'success' => true,
];
echo json_encode($result);

?>
