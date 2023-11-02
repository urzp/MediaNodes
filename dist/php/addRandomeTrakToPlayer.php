<?php

// для теста

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");
include 'db_mysql.php';



$sql = "SELECT `id` FROM `players`";
$result_sql = $mysql -> query($sql);
while ($row = $result_sql->fetch_assoc()) {
    $players[] = $row;
}

$sql = "SELECT `id` FROM `tracks`"; 
$result_sql = $mysql -> query($sql);
while ($row = $result_sql->fetch_assoc()) {
    $tracks[] = $row;
}

foreach ($players as $palyer) {
    for ($i = 1; $i <= 20; $i++) {
        $id_palyer = $palyer['id'];
        $countTraks = count($tracks) - 1;
        $id_track = $tracks[rand(0, $countTraks)]['id'];
        $sql = "INSERT INTO `players_lists` ( `id_player`, `id_track`, `id_in_list` ) VALUES ( '$id_palyer', '$id_track', '$i')";
        $mysql -> query($sql);
    }
}

echo json_encode('ok');


?>