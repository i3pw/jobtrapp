<?php
require_once "inc/global.php";

$pst = new Position();

switch ($_REQUEST['task']) {
    case "pAdd":
        $pName = htmlspecialchars(trim($_POST["pName"]));
        if (!empty($pName)){
             $pst->positionAdd($pName);
        }
        break;
    case "pEdit":
        $pId = htmlspecialchars(trim($_POST["pId"]));
        $pName = htmlspecialchars(trim($_POST["pName"]));
        if (!empty($pName)){
            $pst->editPosition($pId, $pName);
        }
        break;
}

redirect("position.php");