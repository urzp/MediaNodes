<?php

//https://ermakpass.ru/media_node/php/islogged.php

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

$post = file_get_contents("php://input");
$post = json_decode($post);


$user_id = $post-> user_id;
$session = $post -> session;

$mysql = new mysqli('localhost','ermak8nk_users','5&lxD2Xt','ermak8nk_users');

$sql = "SELECT `id`, `name`, `email` FROM `users` WHERE `id` = '$user_id' && `session`='$session'";
$checkUser = $mysql -> query($sql);
$checkUser = $checkUser -> fetch_assoc();

$result = false;
if(isset($checkUser)){$result = true;}

$mysql->close();
echo json_encode($result);

?>
