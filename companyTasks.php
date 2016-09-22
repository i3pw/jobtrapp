<?php
    require_once "inc/global.php";
    $cObj = new Company();

    if(isset($_POST['submitNew'])){

        $cName = htmlspecialchars(trim($_POST['cName']));
        $cAdress = htmlspecialchars(trim($_POST['cAdress']));
        $cTel = htmlspecialchars(trim($_POST['cTel']));
        $eMail = htmlspecialchars(trim($_POST['eMail']));
        $cNote = htmlspecialchars(trim($_POST['cNote']));
        if(!empty($cName)) {
            $cObj->addCompany($cName, $cAdress, $cTel, $eMail, $cNote);
        }else {
            redirect('addCompany.php'); // add error message
        }
    }elseif($_REQUEST['task'] == "cEdit" && isset($_POST['submitEdit']) && !empty($_POST['cName'])) {
        $cName = htmlspecialchars(trim($_POST['cName']));
        $cAdress = htmlspecialchars(trim($_POST['cAdress']));
        $cTel = htmlspecialchars(trim($_POST['cTel']));
        $eMail = htmlspecialchars(trim($_POST['eMail']));
        $cNote = htmlspecialchars(trim($_POST['cNote']));

        $cObj->editCompany($cName, $cAdress, $cTel, $eMail, $cNote, $_GET['cId']);
        redirect('companies.php');
    }else {
        redirect('addCompany.php');
    }

