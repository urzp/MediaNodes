<?php 

header('Access-Control-Allow-Origin: *');
header("Content-Type: application/json");

$post = file_get_contents("php://input");
$post = json_decode($post);

$email = $post-> email;
$message = $post-> message;

$to  = "support@media-nodes.ru" ; 

$subject = "Гость"; 
$message = " <p>$message</b>";
$headers  = "Content-type: text/html; charset=UTF-8 \r\n"; 
$headers .= "From:$email\r\n"; 
$headers .= "Reply-To: $email\r\n"; 
mail($to, $subject, $message, $headers); 

$result = (object) [
	'success' => true,
];
echo json_encode($result);

?>