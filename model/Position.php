<?php

class Position extends Connection
{

    public function getAllPositions()
    {
        return $this->con->query("SELECT * FROM positions")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getPosition($pId){
        $get = $this->con->query("SELECT * FROM positions WHERE id=".$pId)->fetch(PDO::FETCH_ASSOC);
        return $get;
    }

    public function getOnePositionName($pId){
        $get = $this->con->query("SELECT position_name FROM positions WHERE id=".$pId)->fetch(PDO::FETCH_ASSOC);
        return $get;
    }

    public function editPosition($pId, $posName){
        $edit = $this->con->prepare("UPDATE positions SET position_name=? WHERE id=?");
        $cntrl = $edit->execute(array($posName,$pId));

        if($cntrl)
            return true;
        return false;
    }

    public function positionAdd($posName)
    {
        $add = $this->con->prepare("INSERT INTO positions (position_name) VALUES (?)");
        $cntrl = $add->execute(array($posName));

        if ($cntrl)
            return true;
        return false;
    }

    public function positionDelete($pId)
    {
        $del = $this->con->exec("DELETE FROM positions WHERE id=" . $pId);

        if ($del)
            return true;
        return false;
    }

   public function getAllPositionsCount(){
       $getAllCatCount = $this->con->query('SELECT COUNT(id) FROM positions')->fetch(PDO::FETCH_ASSOC);
        return $getAllCatCount;
   }
}
