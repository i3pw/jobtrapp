<?php

// Archive should be updated.

class Archive extends Connection
{
    public function getAllArchive(){
        $archives = $this->con->query("SELECT * FROM archives");
        return $archives;
    }

    public function getActivityOnArchive($wId, $cId){
        $archives = $this->con->query("SELECT id, update_name, user_name, update_at FROM archives WHERE work_id='".$wId."' AND company_id='".$cId."' ORDER BY id DESC LIMIT 9")->fetchAll(PDO::FETCH_ASSOC);
        return $archives;
    }

    public function addArchive($uId, $uName, $pId, $pName, $wrkId, $wName, $wDetail, $cId, $cName, $creAt, $upName, $estAt)
    {
        $add = $this->con->prepare("INSERT INTO archives (user_id, user_name, position_id, position_name, work_id, work_name, work_detail, company_id, company_name, created_at, update_name, estimated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $cntrl = $add->execute(array($uId, $uName, $pId, $pName, $wrkId, $wName, $wDetail, $cId, $cName, $creAt, $upName, $estAt));

        if ($cntrl)
            return true;
        return false;
    }

}