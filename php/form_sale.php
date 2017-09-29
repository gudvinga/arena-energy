<?php
// Читаем настройки config
require '../lib/phpmailer/PHPMailerAutoload.php';
$usermail = $_POST["email"];
$username = $_POST["name"];
$adminmail = 'info@arena-energy.by';

$mailer = new PHPMailer();
$mailer->CharSet = 'utf-8';
$mailer->setFrom('info@arena-energy.by', '«Арена» Нон-Стоп');
$mailer->addReplyTo($usermail, $username);
$mailer->AddAddress($adminmail);
// Устанавливаем тему письма
$mailer->Subject = 'Предложение месяца';
// Задаем тело письма
$mailer->Body = "Имя $username, электронный адрес $usermail, запрашивал предложение месяца";
$mailer->Send();
$mailer->ClearAddresses();
$mailer->ClearAttachments();

$mailer->setFrom('info@arena-energy.by', '«Арена» Нон-Стоп');
$mailer->addReplyTo('info@arena-energy.by', '«Арена» Нон-Стоп');
$mailer->AddAddress($usermail);
// Устанавливаем тему письма
$mailer->Subject = 'Предложение месяца';

// Задаем тело письма
$mailer->Body = "Акция! \r\nТолько до конца февраля, при единоразовой покупке девяти гелей «Арена» Нон-Стоп, десятый, Вы получаете совершенно бесплатно! \r\n______________________________________ \r\nПодробности акции уточняйте по телефонам:\r\n+375 29 7568394 (МТС)\r\n+375 44 5343831 (Velcom)\r\nhttp://arena-energy.by";

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
