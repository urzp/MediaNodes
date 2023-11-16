<?php 

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

$post = file_get_contents("php://input");
$post = json_decode($post);

$email = $post-> email;



include 'db_mysql.php';

$sql = "SELECT `id` FROM `users` WHERE `email`='$email'";
$check = $mysql -> query($sql);
$check = $check-> fetch_assoc();
$check = isset($check);

if(!$check){
    $result = (object) [
        'success' => true,//save cover process
    ];
    echo json_encode($result);   
    exit();
}

$reset_password = rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);

$sql = "UPDATE`users` SET `resetpassword`='$reset_password ' WHERE `email`='$email'";
$checkSession = $mysql -> query($sql);

$to  = "$email" ; 

$subject = "Сброс пароля"; 
$message = " <p>Код для сброса пароля</p> </br> <b>$reset_password</b>";
$headers  = "Content-type: text/html; charset=windows-1251 \r\n"; 
$headers .= "From:<support@media-nodes.ru>\r\n"; 
$headers .= "Reply-To: reply-to@example.com\r\n"; 
mail($to, $subject, $message, $headers); 

$result = (object) [
	'success' => true,
];
echo json_encode($result);

?>