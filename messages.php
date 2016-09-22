<?php
header('Content-Type: application/json');
require_once "inc/global.php";
$usrObj = new User();
//$uId = $_SESSION['user_session'];
$mObj = new Message();

$messages = $mObj->getMessageOnWork($_GET['id'], $_GET['cId']);
echo $messages;
