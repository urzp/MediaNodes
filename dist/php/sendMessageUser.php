<?php
header('Access-Control-Allow-Origin: *');
//header("Content-Type: application/json");

include 'db_mysql.php';

//print_r($_POST);
$user_id = $_POST['id'];
$session = $_POST['session'];
$post_message = $_POST['message'];

include 'checkAccess.php';

$sql = "SELECT `id`, `name`, `email`, `messages`, `level` FROM `users` WHERE `id` = '$user_id'";
$user = $mysql -> query($sql);
$user = $user -> fetch_assoc();

$user['messages'] = (int)$user['messages'] + 1;

$sql = "UPDATE `users` SET `messages`='$user[messages]' WHERE `id` = '$user_id'";
$mysql -> query($sql);

$from = "$user[email]";
$to = "support@media-nodes.ru";
$subject = "$user[name]";
 
// Заголовк письма === >>>
$headers = "From: $from\r\n";
$headers .= "Subject: $subject\r\n";
$headers .= "Date: " . date("r") . "\r\n";
$headers .= "X-Mailer: zm php script\r\n";
$headers .= "MIME-Version: 1.0\r\n";
$headers .= "Content-Type: multipart/alternative;\r\n";
$baseboundary = "------------" . strtoupper(md5(uniqid(rand(), true)));
$headers .= "  boundary=\"$baseboundary\"\r\n";
// <<< ====================
 
// Тело письма === >>>
$message  =  "--$baseboundary\r\n";
$message .= "Content-Type: text/plain;\r\n";
$message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$message .= "--$baseboundary\r\n";
$newboundary = "------------" . strtoupper(md5(uniqid(rand(), true)));
$message .= "Content-Type: multipart/related;\r\n";
$message .= "  boundary=\"$newboundary\"\r\n\r\n\r\n";
$message .= "--$newboundary\r\n";
$message .= "Content-Type: text/html; charset=utf-8\r\n";
$message .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$message .= $post_message. "\r\n\r\n";
// <<< ==============
 
// прикрепляем файл ===>>>
$mimeType='image/png';
$fileContent = file_get_contents($_FILES['img']['tmp_name'],true);
$filename=basename($_FILES['img']['name']);
$message.="--$newboundary\r\n";
$message.="Content-Type: $mimeType;\r\n";
$message.=" name=\"$filename\"\r\n";
$message.="Content-Transfer-Encoding: base64\r\n";
$message.="Content-ID: <$filename>\r\n";
$message.="Content-Disposition: inline;\r\n";
$message.=" filename=\"$filename\"\r\n\r\n";
$message.=chunk_split(base64_encode($fileContent));

// <<< ====================
 
// заканчиваем тело письма, дописываем разделители
$message.="--$newboundary--\r\n\r\n";
$message.="--$baseboundary--\r\n";
 
// отправка письма
mail($to, $subject, $message , $headers);

$result = (object) [
	'success' => true,
];
echo json_encode($result);


?>