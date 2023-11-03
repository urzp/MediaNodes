<?php
header('Access-Control-Allow-Origin: *');
//header("Content-Type: application/json");

include 'db_mysql.php';

$post = file_get_contents("php://input");
$post = json_decode($post);

$user_id = $post-> user_id;
$session = $post -> session;

$id_player = $post -> rq_data -> id_player;
$volume = $post -> rq_data  ->  volume;


if($play_pause=='true'){$play_pause = '1';}else{$play_pause = 0;}

$sql = "SELECT `level` FROM `users` WHERE `id` = '$user_id' && `session`='$session'";
$user = $mysql -> query($sql);
$user = $user -> fetch_assoc();

if(!isset($user)){ 
	$result = (object) [
		'success' => false,
		'error' => 'session',
	];
	echo json_encode($result);
	exit(); 
}

if($user['level']=='admin'){
    
    $sql = "UPDATE `players` SET `volume` = '$volume' WHERE `id`='$id_player'";
    $mysql -> query($sql);
    $result = (object) [
        'success' => true,
    ];
    echo json_encode($result);
}



?>