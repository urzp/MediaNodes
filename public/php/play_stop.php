<?php
header('Access-Control-Allow-Origin: *');
//header("Content-Type: application/json");

include 'db_mysql.php';

$post = file_get_contents("php://input");
$post = json_decode($post);

$user_id = $post-> user_id;
$session = $post -> session;

$id_player = $post['rq_data']['id_player'];

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

if($user['level']=='admin'){

    $sql = "UPDATE `players` SET `name` = '$name', `city` = '$city', `address` = '$address', `ip` = '$ip'  WHERE `id` = '$player_id'";
    $mysql -> query($sql);
    $mysql->close();
    $result = (object) [
        'success' => true,
    ];

}



?>