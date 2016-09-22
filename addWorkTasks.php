<?php
    require_once "inc/global.php";
    $workAdd = new Work();
    $getPos = new Position();
    $cObj = new Company();

    $hata = false;
    $json = array();

    ///////////////////////
    $compId = $_POST['comId'];
    $wNote = $_POST['wNote']; // work detail
    $wId = $_POST['wId'];
    $pId = $_POST['pId'];
    $lId = $_POST['lId'];
    $wTime = $lId+1;
    $wName = $_POST['wName'];
    $status = 0;
    $userId = 0;
   // $now = time();
    //$finisedAt = date('Y-m-d H:i:s', strtotime('+1 days', $now));
    $estimatedAt = date('Y-m-d H:i:s', strtotime("+".$wTime." days"));
    //strtotime("+".$days." days", strtotime($date));
    if(isset($wNote) && !empty($wNote) && !empty($compId)){
        $workAdd->workAdd($compId, $wName, $wNote, $status, $lId, $pId, $userId, $estimatedAt);

        $cStatus = 1;
        $cObj->changeStatus($cStatus, $compId);

    }else{
        $hata = true;
    }
    ////////////////////

    //Kontroller bitince
    if($hata){
        $json['mesaj'] = 'Lütfen Firma Seçiniz ve İş Ayrıntısını Boş Bırakmayınız!';
    }else{
        $json['mesaj'] = 'success';
    }

    echo json_encode($json);



