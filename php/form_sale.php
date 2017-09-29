<?php
// Читаем настройки config
require '../lib/phpmailer/PHPMailerAutoload.php';
$usermail = $_POST["email"];
$username = $_POST["name"];
$adminmail = 'gudvin_zive@tut.by';

$mailer = new PHPMailer();
$mailer->setFrom('info@arenagel.atservers.net', 'Arena');
$mailer->addReplyTo('info@arenagel.atservers.net', 'Arena');
$mailer->AddAddress($adminmail);
// Устанавливаем тему письма
$mailer->Subject = 'Предложение месяца';
// Задаем тело письма
$mailer->Body = "Имя $username, электронный адрес $usermail, запрашивал предложение месяца";
$mailer->Send();
$mailer->ClearAddresses();
$mailer->ClearAttachments();

$mailer->setFrom('info@arenagel.atservers.net', 'Arena');
$mailer->addReplyTo('info@arenagel.atservers.net', 'Arena');
$mailer->AddAddress($usermail);
// Устанавливаем тему письма
$mailer->Subject = 'Предложение месяца';

// Задаем тело письма
$mailer->Body = 'Только до конца февраля, при единоразовой покупке девяти гелей, десятый вы получаете совершенно бесплатно!';

if(!$mailer->Send())
{
  echo 'Не могу отослать письмо!';
}
else
{
  echo "$username, спасибо за ваш запрос. Мы отправили Вам предложение месяца на адрес $usermail.";
}
$mailer->ClearAddresses();
$mailer->ClearAttachments();
