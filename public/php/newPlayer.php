<?php
header('Access-Control-Allow-Origin: *');

include 'db_mysql.php';


$user_id = $_POST['user_id'];
$session = $_POST['session'];
$name = $_POST['name'];
$city = $_POST['city'];
$address = $_POST['address'];
$ip = $_POST['ip'];



$sql = "SELECT `level` FROM `users` WHERE `id` = '$user_id' && `session`='$session'";
$userLevel = $mysql -> query($sql);
$userLevel = $userLevel -> fetch_assoc()['level'];

if($userLevel != 'admin') { 
	$result = (object) [
		'success' => false,
		'error' => 'access',
	];
	echo json_encode($result);
	exit(); 
}

$sql = "INSERT INTO `players` ( `name`, `city`, `address`, `ip`  ) VALUES( '$name', '$city', '$address', '$ip')";
$mysql -> query($sql);
$mysql->close();
$result = (object) [
	'success' => true,
];

echo json_encode($result);


?>