<?php
class User extends Connection
{
    // Get all users
    public function getAllUsers(){
        $users = $this->con->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    // Get only one users info
    public function getOneUser($userId){
        $user = $this->con->query("SELECT * FROM users WHERE id = ". $userId)->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    // Get users count
    public function getAllUserCount(){
        $getAllUsersCount = $this->con->query('SELECT COUNT(id) FROM users')->fetch(PDO::FETCH_ASSOC);
        return $getAllUsersCount;
   }

    public function registerUser($username,$password,$email,$fullname,$userPosition){
        // if there is same username or email on db, it'll return false
        $isThereUser = $this->con->prepare("SELECT * FROM users WHERE username=:username OR email=:email LIMIT 1");
        $isThereUser->execute(array(':username'=>$username, ':email'=>$email));
        if($isThereUser->rowCount() > 0) {
           // return false;
           return redirect('userList.php?msg=errorExist'); // Incorrect usage, it should be fixed.
        }else {
        $UserRegister = $this->con->prepare("INSERT INTO users(username,password,email,fullname,user_position) VALUES(:username, :password, :email, :fullname, :userPosition )");
        // PDOStatement->bindParam Binds a parameter to the specified variable name
        $UserRegister->bindParam(":username", $username);
        $UserRegister->bindParam(":password", $password);
        $UserRegister->bindParam(":email", $email);
        $UserRegister->bindParam(":fullname", $fullname);
        $UserRegister->bindParam(":userPosition", $userPosition);
        $UserRegister->execute();
        }

        return $UserRegister;

    }

    public function userUpdate($userId,$username,$email,$fullname,$userPosition){
        $edit = $this->con->prepare("UPDATE users SET username=?, email=?, fullname=?, user_position=? WHERE id=$userId");
        $cntrl = $edit->execute(array($username, $email, $fullname,$userPosition));

        if($cntrl)
            return true;
        return false;

    }

    public function userPasswordUpdate($password, $userId){
        $edit = $this->con->prepare("UPDATE users SET password=? WHERE id=$userId");
        $cntrl = $edit->execute(array($password));

        if($cntrl)
            return true;
        return false;

    }

    public function userDelete($userId)
    {
        $del = $this->con->exec("DELETE FROM users WHERE id=" . $userId);
        // UserId = 1 admin!
       if ($del and $userId != 1)
            return true;
        return false;
    }

   // public function login($username,$password){ // if you'll control only username and password
    public function login($username,$password,$email){
       $isThereUser = $this->con->prepare("SELECT * FROM users WHERE username=:username OR email=:email LIMIT 1");

        //$isThereUser = $this->con->prepare("SELECT * FROM users WHERE username=:username LIMIT 1"); // if you'll use only username

        $isThereUser->execute(array(':username'=>$username, ':email'=>$email));

       // $isThereUser->execute(array(':username'=>$username)); // if you'll use only username

        $userRow=$isThereUser->fetch(PDO::FETCH_ASSOC);
        if($isThereUser->rowCount() > 0)
        {
            //password_verify() // php version >= 5.5
          if($isThereUser->rowCount() == 1 and password_verify($password, $userRow['password']))
            {
                $_SESSION['user_session'] = $userRow['id'];
                return true;
            }
            else
            {
                return false;
            }
        }
        

    }

    public function isLoggedIn()
    {
        if(isset($_SESSION['user_session']))
        {
            return true;
        }
    }

    public function redirect($url)
    {
        header("Location: $url");
        exit;
    }

    public function logOut()
    {
        session_destroy();
        unset($_SESSION['user_session']);
        return true;
    }

}
