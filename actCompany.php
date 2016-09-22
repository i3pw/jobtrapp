<?php
    require_once "inc/global.php";
$cObj = new Company();
if(isset($_GET['cId'])){
    $id = htmlspecialchars(trim($_GET['cId']));
    $countWorks = $cObj->getCountCompaniesWorks($id);
    if($countWorks['compWorks'] == 0) {
        $passive = $cObj->deactive($id);
        if($passive){
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }

}else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

