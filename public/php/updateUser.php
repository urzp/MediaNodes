<?php
header('Access-Control-Allow-Origin: *');
//header("Content-Type: application/json");

$mysql = new mysqli('localhost','ermak8nk_users','5&lxD2Xt','ermak8nk_users');

//print_r($_POST);
$user_id = $_POST[id];
$session = $_POST[session];
$name = $_POST[name];
$email = $_POST[email];
$tel = $_POST[tel];
$img = basename( $_FILES['img']['name'] );

$editPassword = $_POST[editPassword];

$oldPassword = $_POST[oldPassword];
$newPassword = $_POST[newPassword];

$oldPassword = md5($oldPassword."wqrtvfd");
$newPassword = md5($newPassword."wqrtvfd");


$sql = "SELECT `id`, `name`, `email` FROM `users` WHERE `id` = '$user_id' && `session`='$session'";
$checkSession = $mysql -> query($sql);
$checkSession = $checkSession -> fetch_assoc();
$checkSession = isset($checkSession);

if(!$checkSession){ 
	$result = (object) [
		'success' => false,
		'error' => 'session',
	];
	echo json_encode($result);
	exit(); 
}

$sql = "UPDATE`users` SET `email`='$email', `name`='$name', `tel`='$tel' WHERE `id` = '$user_id'";
$mysql -> query($sql);



if( $img!='' ){
	$sql = "UPDATE`users` SET `img`='$img' WHERE `id` = '$user_id'";
	$mysql -> query($sql);
	$target_dir_ = 'img/user_'.$user_id;
	if (!file_exists($target_dir_)) {
        mkdir($target_dir_, 0777, true);
    }
	
	$target_dir = $target_dir_.'/'. basename( $_FILES['img']['name']);
	move_uploaded_file($_FILES['img']['tmp_name'], $target_dir);
}

if($editPassword){
	$sql = "SELECT `id`, `name`, `email`, `tel`, `img` FROM `users` WHERE `email` = '$email' && `password`='$oldPassword'";
	$checkUser = $mysql -> query($sql);
	$checkUser = $checkUser -> fetch_assoc();
	if(isset($checkUser)){
		$sql = "UPDATE`users` SET `password`='$newPassword' WHERE `id` = '$user_id'";
		$mysql -> query($sql);
	}else{
		$result = (object) [
			'success' => false,
			'error' => 'oldPassword',
			
		];
		echo json_encode($result);
		exit(); 		
	}
}

$result = (object) [
	'success' => true,
	'img' => $_FILES['img']
];
echo json_encode($target_dir_);

?>