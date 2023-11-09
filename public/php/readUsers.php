<?php
header('Access-Control-Allow-Origin: *');
//header("Content-Type: application/json");

include 'db_mysql.php';

$post = file_get_contents("php://input");
$post = json_decode($post);

$user_id = $post-> user_id;
$session = $post -> session;

include 'checkAccess.php';

if($user['level']!='admin'){ 
    $result = (object) [
        'success' => false,
        'error' => 'admin',
    ];
    echo json_encode($result);
    exit();
 }

$sql = "SELECT `id`, `name`, `email`, `tel`, `level`, `img` FROM `users`";
$result_sql = $mysql -> query($sql);
while ($user = $result_sql->fetch_assoc()) {  
    $users[] = $user;
}


$result = (object) [
    'success' => true,
    'users' => $users,
];
echo json_encode($result);

?>