<?php
header('Access-Control-Allow-Origin: *');
//header("Content-Type: application/json");

include 'db_mysql.php';

$post = file_get_contents("php://input");
$post = json_decode($post);

$user_id = $post-> user_id;
$session = $post -> session;

$id_list = $post -> rq_data -> id_list;
$dislike = $post -> rq_data  ->  dislike;


if($dislike=='true'){$dislike = '1';}else{$dislike = 0;}

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
    
    $sql = "UPDATE `players_lists` SET `disLike` = '$dislike' WHERE `id`='$id_list'";
    $mysql -> query($sql);
    $result = (object) [
        'success' => true,
    ];
    echo json_encode($result);
}



?>