<?php
header('Access-Control-Allow-Origin: *');
$post = file_get_contents("php://input");
$post = json_decode($post);

include 'db_mysql.php';

$user_id = $post -> id;
$session = $post -> session;

$user_id_edit = $post -> user_id_edit;
$user_level = $post -> user_level;

include 'checkAccess.php';

if($user['level'] != 'admin'){
	$result = (object) [
		'success' => false,
		'error' => 'admin',
	];
	echo json_encode($result);
	exit(); 
}

$sql = "UPDATE`users` SET `level`='$user_level' WHERE `id` = '$user_id_edit'";
$mysql -> query($sql);

$result = (object) [
    'success' => true,
];
echo json_encode($result);

?>