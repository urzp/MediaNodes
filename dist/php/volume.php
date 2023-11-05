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

include 'checkAccess.php';


if($user['level']=='admin'){$sql = "UPDATE `players` SET `volume` = '$volume' WHERE `id`='$id_player'";}
if($user['level']=='user'){$sql = "UPDATE `players` SET `volume` = '$volume' WHERE `id`='$id_player' AND `id_user`='$user[id]'";}
$mysql -> query($sql);
$result = (object) [
    'success' => true,
];
echo json_encode($result);




?>