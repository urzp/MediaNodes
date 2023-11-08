<?php
header('Access-Control-Allow-Origin: *');

include 'db_mysql.php';


$user_id = $_POST['user_id'];
$session = $_POST['session'];
$name = $_POST['name'];
$city = $_POST['city'];
$address = $_POST['address'];
$ip = $_POST['ip'];

include 'checkAccess.php';

$sql = "INSERT INTO `players` ( `id_user`, `name`, `city`, `address`, `ip`  ) VALUES( '$user[id]', '$name', '$city', '$address', '$ip')";
$mysql -> query($sql);
$mysql->close();
$result = (object) [
	'success' => true,
];

echo json_encode($result);


?>