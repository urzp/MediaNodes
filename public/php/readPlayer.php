<?php
header('Access-Control-Allow-Origin: *');
//header("Content-Type: application/json");

include 'db_mysql.php';

$post = file_get_contents("php://input");
$post = json_decode($post);

$user_id = $post-> user_id;
$session = $post -> session;
$player_id = $post -> rq_data -> player_id;
$full_load = $post -> rq_data ->  full_load;

include 'checkAccess.php';

if($user['level']=='admin'){ $sql = "SELECT * FROM `players` WHERE `id`= '$player_id'"; }
if($user['level']=='user'){ $sql = "SELECT * FROM `players` WHERE `id`= '$player_id' AND `id_user`='$user[id]'"; }
$result_sql = $mysql -> query($sql);
$player = $result_sql->fetch_assoc();

if(!isset($player)){
	$result = (object) [
		'success' => false,
		'error' => 'null',
	];
	echo json_encode($result);
	exit(); 		
}



$sql = "SELECT * FROM `players_lists` WHERE `id_player`= '$player_id'";
$result_sql = $mysql -> query($sql);

while ($row = $result_sql->fetch_assoc()) {
	$playListRef[] = $row;
}


// добавление к плееру название активного трека
foreach ($playListRef as $ref) {
	$id_trak = $ref['id_track'];

	$sql = "SELECT * FROM `tracks` WHERE `id`= '$id_trak'";
	$result_sql = $mysql -> query($sql);
	$trak =  $result_sql->fetch_assoc();
	$trak['disLike'] = $ref['disLike'];
	$trak['idInList'] = $ref['id_in_list'];
	$trak['id_players_lists'] = $ref['id'];
	if( $player['current_track'] == $ref['id_in_list'] ) { $trak['active'] = true; }//добовляем метку активного трека
	$playList[] = $trak;
}

$player['current_trak_title'] = $playList[ (int)$player['current_track'] - 1 ]['title'];


if(!$full_load){$playList='';}

$result = (object) [
    'success' => true,
    'player' => $player,
	'playListRef' => $playListRef,
	'playList' => $playList,
];
echo json_encode($result);

?>