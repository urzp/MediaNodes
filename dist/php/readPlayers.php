<?php
header('Access-Control-Allow-Origin: *');
//header("Content-Type: application/json");

include 'db_mysql.php';

$post = file_get_contents("php://input");
$post = json_decode($post);

$user_id = $post-> user_id;
$session = $post -> session;

include 'checkAccess.php';

if($user['level']=='admin'){ $sql = "SELECT * FROM `players`"; }
if($user['level']=='user'){ $sql = "SELECT * FROM `players` WHERE `id_user`='$user[id]' "; }
$result_sql = $mysql -> query($sql);
while ($player = $result_sql->fetch_assoc()) {
    $current_trak = $player['current_track'];
    $id_player = $player['id'];
    $sql = "SELECT * FROM `players_lists` WHERE `id_in_list` = '$current_trak' AND `id_player` = '$id_player' ";
    $id_trak = $mysql -> query($sql);
    $id_trak = $id_trak -> fetch_assoc()['id_track'];
    $sql = "SELECT * FROM `tracks` WHERE `id` = '$id_trak'  ";
    $trak = $mysql -> query($sql);
    $trak = $trak -> fetch_assoc(); 
    $player['current_trak_title'] = $trak['title'];     
    $players[] = $player;
}


$result = (object) [
    'success' => true,
    'players' => $players,
];
echo json_encode($result);

?>