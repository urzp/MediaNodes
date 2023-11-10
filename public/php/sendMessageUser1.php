<?php
// картинки
 
$from = "test@test.com";
$to = "ermak80_pass@mail.ru";
$subject = "Тема письма";
 
// Заголовки письма === >>>
$headers = "From: $from\r\n";
//$headers .= "To: $to\r\n";
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
$message .= "message" . "\r\n\r\n";
// <<< ==============
 
// прикрепляем файлы ===>>>
$filename = 'https://media-nodes.ru/php/img/user_11/unnamed.png';
$mimeType='image/png';
$fileContent = file_get_contents($filename,true);
$filename=basename($filename);
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
$result = mail($to, $subject, $message , $headers);

$result = (object) [
	'success' => true,
];
echo json_encode($result);
?>