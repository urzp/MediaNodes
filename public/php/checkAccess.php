<?php

$sql = "SELECT `id`, `level` FROM `users` WHERE `id` = '$user_id' && `session`='$session'";
$user = $mysql -> query($sql);
$user = $user -> fetch_assoc();

if($user['level'] != 'admin'&&$user['level'] != 'user') { 
	$result = (object) [
		'success' => false,
		'error' => 'access',
		'user' => $user
	];
	echo json_encode($result);
	exit(); 
}

?>