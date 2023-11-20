<?php
header('Access-Control-Allow-Origin: *');

include 'db_mysql.php';


$user_id = $_POST['user_id'];
$session = $_POST['session'];
$player_id = $_POST['player_id'];
$owner_id = $_POST['owner_id'];
$name = $_POST['name'];
$city = $_POST['city'];
$address = $_POST['address'];



include 'checkAccess.php';


if($user['level'] == 'admin'){ $sql = "UPDATE `players` SET `name` = '$name', `city` = '$city', `address` = '$address', `id_user`='$owner_id'  WHERE `id` = '$player_id'"; }
if($user['level'] == 'user'){ $sql = "UPDATE `players` SET `name` = '$name', `city` = '$city', `address` = '$address'  WHERE `id` = '$player_id'  AND `id_user`='$user[id]' "; }

$mysql -> query($sql);
$mysql->close();
$result = (object) [
	'success' => true,
];

echo json_encode($result);


?>