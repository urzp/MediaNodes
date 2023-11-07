<?php
header('Access-Control-Allow-Origin: *');
//header("Content-Type: application/json");

include 'db_mysql.php';

$post = file_get_contents("php://input");
$post = json_decode($post);

$user_id = $post-> user_id;
$session = $post -> session;
$req_user_id = $post -> rq_data -> user_id;

include 'checkAccess.php';

if($user['level']!='admin'){
    $result = (object) [
        'success' => false,
        'error' => 'admin',
    ];
    echo json_encode($result);
    exit();
}

$sql = "SELECT `id`, `name`, `email`, `tel`, `img`, `level` FROM `users` WHERE `id` = '$req_user_id' ";
$result_sql = $mysql -> query($sql);
$user = $result_sql -> fetch_assoc();

$result = (object) [
	'success' => true,
	'user' => $user,
];

echo json_encode($result);

?>