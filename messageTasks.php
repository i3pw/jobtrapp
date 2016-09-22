<?php ob_start();
require_once "inc/global.php";
$usrObj = new User();
$workObj = new Work();
$mObj = new Message();
$uId = $_SESSION['user_session'];
$userInfo = $usrObj->getOneUser($uId);

$uName = $userInfo['username'];
$pId = $userInfo['user_position'];
$pObj = new Position();
//addMessage($uId, $pId, $cId, $wrkId, $message)
$pInfo=$pObj->getOnePositionName($pId);
$pName  = $pInfo['position_name'];

if(isset($_POST['btn-chat']) && !empty($_POST['btn-input'])){
            $wrkId = htmlspecialchars(trim($_POST['wrkId']));
            $mPost = htmlspecialchars(trim($_POST['btn-input']));
            $cId = htmlspecialchars(trim($_POST['cId']));

    $add = $mObj->addMessage($uId, $pId, $cId, $wrkId, $mPost);

    if($add){
       header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    }else{
         header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

?>