<?php
class Message extends Connection
{
    public function getAllMessage(){
        $messages = $this->con->query("SELECT * FROM messages");
        return $messages;
    }

    public function getMessageOnWork($wId, $cId){
        $messages = [];
        $start = (isset($_GET['start']) && !empty($_GET['start'])) ? (int)$_GET['start'] - 1 : 0;
        $count = (isset($_GET['count']) && !empty($_GET['count'])) ? (int)$_GET['count'] : 3;

        $message = $this->con->query("SELECT SQL_CALC_FOUND_ROWS * FROM messages WHERE work_id='".$wId."' AND company_id='".$cId."' ORDER BY id DESC LIMIT {$start}, {$count}");
        $messagesTotal = $this->con->query("SELECT FOUND_ROWS() AS count")->fetch(PDO::FETCH_ASSOC)['count'];
        if($messagesCount = $message->rowCount()){
            $messages = $message->fetchAll(PDO::FETCH_OBJ);
        }

        return json_encode(array(
            'items' => $messages,
            'last' => ($start + $count) >= $messagesTotal ? true : false,
            'start' => $start,
            'count' => $count
        ));

    }

    public function addMessage($uId, $pId, $cId, $wrkId, $message)
    {
        $add = $this->con->prepare("INSERT INTO messages (user_id, position_id, company_id, work_id, message) VALUES (?, ?, ?, ?, ?)");
        $cntrl = $add->execute(array($uId, $pId, $cId, $wrkId, $message));

        if ($cntrl)
            return true;
        return false;
    }

}