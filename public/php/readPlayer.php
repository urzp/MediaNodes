<?php
header('Access-Control-Allow-Origin: *');
//header("Content-Type: application/json");

include 'db_mysql.php';

$post = file_get_contents("php://input");
$post = json_decode($post);

$user_id = $post-> user_id;
$session = $post -> session;
$player_id = $post -> rq_data -> player_id;

$sql = "SELECT `id`, `name`, `level` FROM `users` WHERE `id` = '$user_id' && `session`='$session'";
$user = $mysql -> query($sql);
$user= $user -> fetch_assoc();
$checkSession = isset($user);

if(!$checkSession){ 
	$result = (object) [
		'success' => false,
		'error' => 'session',
	];
	echo json_encode($result);
	exit(); 
}

if($user['level']=='admin'){
    $sql = "SELECT * FROM `players` WHERE `id`= '$player_id'";
    $result_sql = $mysql -> query($sql);
    $player = $result_sql->fetch_assoc();
}

$result = (object) [
    'success' => true,
    'player' => $player,
];
echo json_encode($result);

?>