<?php

header('Access-Control-Allow-Origin: *');

include 'db_mysql.php';


for ($i = 1; $i <= 60; $i++) {
    $sql = "SELECT * FROM `players`";
    $result_sql = $mysql -> query($sql);
    while ($player = $result_sql->fetch_assoc()) {
        $sql = "SELECT COUNT(*) FROM `players_lists` WHERE `disLike`='1' AND `id_player`='$player[id]'";
        $playerDisliks = $mysql -> query($sql);
        $playerDisliks = $playerDisliks -> fetch_assoc();
        $playerDisliks = $playerDisliks['COUNT(*)'];
        $sql = "UPDATE `players` SET `dislike` = '$playerDisliks'  WHERE `id` = '$player[id]'";
        $mysql -> query($sql);
    }

    sleep(1);
}

?>