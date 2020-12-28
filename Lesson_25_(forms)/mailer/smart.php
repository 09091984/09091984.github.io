<?php 

$name = $_POST['user_name'];
$mail = $_POST['user_mail'];
$phone = $_POST['user_phone'];
$site = $_POST['user_site'];
$message = $_POST['user_message'];

require_once('phpmailer/PHPMailerAutoload.php');
$mail = new PHPMailer;
$mail->CharSet = 'utf-8';

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.mail.ru';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'volna-g84@mail.ru';                 // Наш логин
$mail->Password = '84vovchik';                           // Наш пароль от ящика
$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 465;                                    // TCP port to connect to
 
$mail->setFrom('volna-g84@mail.ru', 'Владимир');   // От кого письмо 
$mail->addAddress('volna-g84@yandex.ru');     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Обращение';
$mail->Body    = '
	Пользователь <br> 
	Имя: ' . $name . ' <br>
	Телефон: ' . $phone . '<br>
	Оставил вам сообщение: ' . $message . '<br>
	Можете посетить его сайт: ' . $site . ' ';
$mail->AltBody = 'Это альтернативный текст';

if(!$mail->send()) {
	return false;
} else {
    return true;;
}

?>