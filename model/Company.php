<?php
class Company extends Connection
{
    public function getAllCompany(){
        $companies = $this->con->query("SELECT * FROM companies");
        return $companies;
    }
    // If status 1, it's active and seems on table. Get active companies.
    public function getShowCompany(){
        $companies = $this->con->query("SELECT * FROM companies WHERE status='1'")->fetchAll(PDO::FETCH_ASSOC);
        return $companies;
    }
    // Work status 2 = completed 1 = processing 0 = waiting...
    // Position id used for departments
    public function getShowCompanyWorks($id, $pId){
        $companies = $this->con->query("SELECT * FROM works WHERE work_status<'2' AND company_id='".$id."' AND position_id='".$pId."' ORDER BY estimated_at ASC")->fetchAll(PDO::FETCH_ASSOC);
        return $companies;
    }
    // This function for admin to control completed works
    public function getShowCompanyWorksForAdmin($id){
        $companies = $this->con->query("SELECT * FROM works WHERE work_status<'2' AND company_id='".$id."' ORDER BY estimated_at ASC")->fetchAll(PDO::FETCH_ASSOC);
        return $companies;
    }
    // Count for statistic
    public function getCountCompaniesWorks($id){
        $companies = $this->con->query("SELECT COUNT(*) AS compWorks FROM works WHERE work_status<'2' AND company_id='".$id."'")->fetch(PDO::FETCH_ASSOC);
        return $companies;
    }
    // Get one company info.
    public function getOne($cId){
        $company = $this->con->query("SELECT * FROM companies WHERE id = ". $cId)->fetch(PDO::FETCH_ASSOC);
        return $company;
    }

    public function getCompanyNameOne($cId){
        $company = $this->con->query("SELECT company_name FROM companies WHERE id = ". $cId)->fetch(PDO::FETCH_ASSOC);
        return $company;
    }

    public function addCompany($cName, $cAdress, $cTel, $eMail, $cNote)
    {
        $add = $this->con->prepare("INSERT INTO companies (company_name, adress, telephone, email, note) VALUES (?, ?, ?, ?, ?)");
        $cntrl = $add->execute(array($cName, $cAdress, $cTel, $eMail, $cNote));

        if ($cntrl)
            return true;
        return false;
    }

    public function editCompany($cName, $cAdress, $cTel, $eMail, $cNote, $cId){
        $edit = $this->con->prepare("UPDATE companies SET company_name=?, adress=?, telephone=?, email=?, note=? WHERE id=?");
        $cntrl = $edit->execute(array($cName, $cAdress, $cTel, $eMail, $cNote, $cId));

        if($cntrl)
            return true;
        return false;

    }

    public function getAllCompanyCount(){
        $getAllProductCount = $this->con->query('SELECT COUNT(id) FROM companies')->fetch(PDO::FETCH_ASSOC);
        return $getAllProductCount;
    }

    public function changeStatus($status, $cId){
        $chst = $this->con->query("UPDATE companies SET status=".$status." WHERE id=".$cId);
        $cntrl = $chst->execute(array($status));
        if($cntrl){
            return true;
        }
        return false;
    }
    // This will merge with changeStatus function
    public function deactive($cId){
        return $this->changeStatus(0, $cId);
    }
    // This will merge with changeStatus function
    public function active($cId){
        return $this->changeStatus(1, $cId);
    }
    // masa ekeleme
    // masa düzenleme
    // masa silme
    // masa sayısı
    // masaların listesi
    // masanın adı
    // masanın durumu
    // masanın siparişi
    // sipariş durumu
}