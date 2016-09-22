<?php
$usrObj = new User();
$uId = $_SESSION['user_session'];

if($usrObj->isLoggedIn() == "")
{
    $usrObj->redirect('login.php');
}

$cObj = new Company();
$aObj = new Archive();
$mObj = new Message();

if(!isset($_GET['cId']) || !isset($_GET['id'])){
    redirect('index.php');
}else {
    $cOne = $cObj->getOne($_GET['cId']);
    if(!$cOne){
        redirect('index.php');
    }
}
$workObj = new Work();
$work = $workObj->getWork($_GET['id']);
$cName = $cObj->getCompanyNameOne($_GET['cId']);
$activities = $aObj->getActivityOnArchive($_GET['id'], $_GET['cId']);
