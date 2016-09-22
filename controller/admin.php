<?php
$usrObj = new User();
$userCount = $usrObj->getAllUserCount();

$workObj = new Work();
$getPos = new Position();
$cObj = new Company();
$pObj = new Position();

if ($usrObj->isLoggedIn() == "" ) {
    $usrObj->redirect('login.php');
}else {
    $users = $usrObj->getAllUsers();
    $userId = $_SESSION['user_session'];
    $userInfo = $usrObj->getOneUser($userId);
    if ($userInfo["user_position"] != 1){
        $usrObj->redirect('login.php');
    }
}
$wList = $workObj->getWorkList();
$companies = $cObj->getAllCompany();
$positions = $getPos->getAllPositions();
//$workList = $workObj->getWorkList();
$workInfo = $workObj->getAllWorksList();
$works = $workObj->getAllWorks();
$positions = $pObj->getAllPositions();
$workCount = $workObj->getAllWorkCount();
$workListCount = $workObj->getAllWorksListCount();
$companyCount = $cObj->getAllCompanyCount();


$catValue = "";
$catPostIdInput = "";
$workTask = "workAdd";
$positionId = 0;