<?php

class Work extends Connection
{
    public function getWorkList()
    {
        $is = array();
        $positions = $this->con->query("SELECT * FROM positions")->fetchAll(PDO::FETCH_ASSOC);
        foreach($positions as $position){
            $works = $this->con->query("SELECT * FROM works_list WHERE position_id='".$position['id']."'")->fetchAll(PDO::FETCH_ASSOC);
            foreach($works as $work){
                $is[$position['position_name'].'--'.$position['id']][$work['id']] = $work['work_name'];
            }
        }
        return $is;

    }

    public function getAllWorks()
    {
        return $this->con->query("SELECT * FROM works")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllWorksList()
    {
        return $this->con->query("SELECT * FROM works_list")->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getCategory($catId){
        $get = $this->con->query("SELECT * FROM works_list WHERE id=".$catId)->fetch(PDO::FETCH_ASSOC);
        return $get;
    }

    public function editCategory($catId, $catName){
        $edit = $this->con->prepare("UPDATE works_list SET name=? WHERE id=?");
        $cntrl = $edit->execute(array($catName,$catId));

        if($cntrl)
            return true;
        return false;
    }

    public function getworksFromCategory($catId)
    {
        return $this->con->query("SELECT * FROM works WHERE category_id=" . $catId)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getWork($workId){
        return $this->con->query("SELECT * FROM works WHERE id=".$workId)->fetchAll(PDO::FETCH_ASSOC);
    }


    public function categoryAdd($catName)
    {
        $add = $this->con->prepare("INSERT INTO works_list (`name`) VALUES (?)");
        $cntrl = $add->execute(array($catName));

        if ($cntrl)
            return true;
        return false;
    }

    public function workAdd($compId, $name, $detail, $status, $labelId, $positionId, $userId, $estimatedAt)
    {
        $add = $this->con->prepare("INSERT INTO works (company_id, work_name, work_detail, work_status, label_id, position_id, user_id, estimated_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $cntrl = $add->execute(array($compId, $name, $detail, $status, $labelId, $positionId, $userId, $estimatedAt));

        if ($cntrl)
            return true;
        return false;
    }

    public function changeStatus($status, $wrkId)
    {
        $chst = $this->con->query("UPDATE works SET work_status=" . $status . " WHERE id=" . $wrkId);
        if ($chst) {
            return true;
        }
        return false;

    }

    ///////////// Work List

    public function workAddList($wName, $pId)
    {
        $add = $this->con->prepare("INSERT INTO works_list (work_name, position_id) VALUES (?, ?)");
        $cntrl = $add->execute(array($wName, $pId));

        if ($cntrl)
            return true;
        return false;
    }

    public function workListDelete($wId)
    {
        $del = $this->con->exec("DELETE FROM works_list WHERE id=" . $wId);
        if ($del)
            return true;
        return false;
    }

    public function editWorkList($wName, $pId, $wId){
        $edit = $this->con->prepare("UPDATE works_list SET work_name=?, position_id=? WHERE id=?");
        $cntrl = $edit->execute(array($wName, $pId, $wId));

        if($cntrl)
            return true;
        return false;

    }

    public function getWorkListOne($workId){
        return $this->con->query("SELECT * FROM works_list WHERE id=".$workId)->fetchAll(PDO::FETCH_ASSOC);
    }

    //////////////////////////////

    public function workDelete($workId)
    {
        $del = $this->con->exec("DELETE FROM works WHERE id=" . $workId);

        if ($del)
            return true;
        return false;
    }
    public function getAllWorkCount(){
        $getAllProductCount = $this->con->query('SELECT COUNT(id) FROM works')->fetch(PDO::FETCH_ASSOC);
        return $getAllProductCount;
    }
   public function getAllWorksListCount(){
       $getAllCatCount = $this->con->query('SELECT COUNT(id) FROM works_list')->fetch(PDO::FETCH_ASSOC);
        return $getAllCatCount;
   }

    // Kategori düzenleme
    // Kategori silme
    // Kategori listeleme
    // Ürün ekleme
    // ürün düzenleme
    // ürün silme
    // ürün bilgilerini alma
    // ürün fiyatını alma
    // ürün listeleme
    // menü listeleme
}
