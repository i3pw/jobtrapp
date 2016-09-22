<?php
require_once "inc/global.php";

$workListObj = new Work();

if(isset($_POST['submit']) || isset($_REQUEST['task']))
{
    switch($_REQUEST['task']){
        case "workAdd":
            $pId = $_POST['pId'];
            $workName = htmlspecialchars(trim($_POST['workName']));
            // add for work list
            if(!empty($workName)) {
                $workListObj->workAddList($workName,$pId);
                redirect('workList.php?msg=success');
            }else {
                redirect('workList.php?msg=error');
            }

            break;
        case "del":
            $wId = $_GET['wId'];
            $workListObj->workListDelete($wId);
           redirect('workList.php');
            break;
        case "edit":
            $pId = $_POST['pId'];
            $workName = htmlspecialchars(trim($_POST['workName']));
            $wId = $_POST['wId'];
            if(!empty($workName)) {
                $workListObj->editWorkList($workName,$pId,$wId);
                redirect('workList.php?msg=success');
            }else {
                redirect('workList.php?msg=error');
            }
            break;
    }
}

else {
    redirect('workList.php');
}
