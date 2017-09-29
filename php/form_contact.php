<?php
// Читаем настройки config
require '../lib/phpmailer/PHPMailerAutoload.php';
$usermail = $_POST["email"];
$username = $_POST["name"];
$message = $_POST["message"];
$adminmail = 'info@arena-energy.by';

$mailer = new PHPMailer();
$mailer->CharSet = 'utf-8';
$mailer->setFrom('info@arena-energy.by', '«Арена» Нон-Стоп');
$mailer->addReplyTo($usermail, $username);
$mailer->AddAddress($adminmail);
// Устанавливаем тему письма
$mailer->Subject = 'Письмо с сайта Arena';
// Задаем тело письма
$mailer->Body = "Имя $username, электронный адрес $usermail.\nOставил комментарий на сайте:\n$message";
$mailer->Send();
$mailer->ClearAddresses();
$mailer->ClearAttachments();

$mailer->setFrom('info@arena-energy.by', '«Арена» Нон-Стоп');
$mailer->addReplyTo('info@arena-energy.by', '«Арена» Нон-Стоп');
$mailer->AddAddress($usermail);
// Устанавливаем тему письма
$mailer->Subject = 'Вы оставили комментарий на сайте Арена';

// Задаем тело письма
$mailer->Body = 'Спасибо за оставленный комментарий на сайте arena-energy.by. В скором времени с вами свяжется наш менеджер.';

if(!$mailer->Send())
{
  echo 'Не могу отослать письмо!';
}
else
{
  echo "$username, спасибо за ваш запрос, в скором времени с Вами свяжется наш менеджер";
}
$mailer->ClearAddresses();
$mailer->ClearAttachments();
