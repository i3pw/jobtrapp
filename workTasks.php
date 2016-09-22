<?php
    require_once "inc/global.php";

$usrObj = new User();
$workObj = new Work();
$uId = $_SESSION['user_session'];
$userInfo = $usrObj->getOneUser($uId);

$uName = $userInfo['username'];
$pId = $userInfo['user_position'];
$pObj = new Position();
$aObj = new Archive();
$pInfo=$pObj->getOnePositionName($pId);
$pName  = $pInfo['position_name'];

if(isset($_POST['sOpt']) && isset($_POST['sOptSubmit'])){

            $wrkId = fixTags(trim($_POST['wrkId']));
            $wName = fixTags(trim($_POST['wName']));
            $cName = fixTags(trim($_POST['cName']));
            $wDetail = fixTags(trim($_POST['wDetail']));
            $cId = fixTags(trim($_POST['cId']));
            $creAt = fixTags(trim($_POST['creAt']));
            $estAt = fixTags(trim($_POST['estAt']));

            if(fixTags(trim($_POST['sOpt'])) == 0){
                $upName = "Beklemede";
            }elseif(fixTags(trim($_POST['sOpt'])) == 1) {
                $upName = "İşleniyor";
            }else{
                $upName = "Tamamlandı";
            }

            $uptSts = $workObj->changeStatus(fixTags(trim($_POST['sOpt'])), $wrkId);
            $aA = $aObj->addArchive($uId, $uName, $pId, $pName, $wrkId, $wName, $wDetail, $cId, $cName, $creAt, $upName, $estAt);

                if($uptSts && $_POST['sOpt'] < 2 ){
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                }else {
                    redirect('index.php');
                }

    }elseif(isset($_POST['btn-chat'])) {

         //addMessage($uId, $pId, $cId, $wrkId, $message)

}else{
         header('Location: ' . $_SERVER['HTTP_REFERER']);
    }



