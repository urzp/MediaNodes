<?php
header('Access-Control-Allow-Origin: *');
//header("Content-Type: application/json");

include 'db_mysql.php';

$post = file_get_contents("php://input");
$post = json_decode($post);

$user_id = $post-> user_id;
$session = $post -> session;
$req_user_id = $post -> rq_data -> user_id;
$req_user_level = $post -> rq_data -> user_level;

include 'checkAccess.php';

if($user['level'] != 'admin'){ 
    $result = (object) [
        'success' => false,
        'error' => 'admin',
    ];
    echo json_encode($result);  
}

$sql = "SELECT * FROM `players` WHERE `id_user`='$req_user_id' ";
if($req_user_level == 'admin'){ $sql = "SELECT * FROM `players`"; }

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
         
        $id_user = $player['id_user'];
        $sql = "SELECT * FROM `users` WHERE `id` = '$id_user' ";
        $user = $mysql -> query($sql);
        $user = $user -> fetch_assoc();  
        $player['user_name'] = $user['name'];
    
        $players[] = $player;
}



$result = (object) [
    'success' => true,
    'players' => $players,
    'rest_players' => $rest_players,
];
echo json_encode($result);

?>