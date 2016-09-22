<?php
require_once "inc/global.php";

$usrObj = new User();

/* switch ($_REQUEST['task']) {
    case "userAdd":
        $usrObj->userAdd($_POST["submit"]);
        break;
}*/
// $username,$password,$email,$fullname,$userPosition
if(isset($_POST['submit']) || isset($_GET['task']))
{
        switch ($_REQUEST['task']) {
            case "login":
                $username = fixTags(trim($_POST['username'])); //for email and username both login
                $password = htmlspecialchars(trim($_POST['password']));
                $email = fixTags(trim($_POST['username'])); //for email and username both login

                if($usrObj->login($username, $password, $email))
                {
                    if($usrObj->isLoggedIn() != "")
                    {
                        $userId = $_SESSION['user_session'];
                        $userInfo = $usrObj->getOneUser($userId);
                        if($userInfo["user_position"] == 1) {
                            redirect('admin.php');
                        }else {
                            redirect('index.php');
                        }
                    }
                }else{
                    $usrObj->redirect('login.php?error=login');
                }

                break;
            case "register":
                //form values to variable
                $username = fixTags(trim($_POST['username']));
                $password = fixTags(trim($_POST['password']));
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                $mail = fixTags(trim($_POST['email'])); //yeni kayıtta email
                $fullname = fixTags(trim($_POST['name']));
                $userPosition = fixTags(trim($_POST['userPosition']));

                if(!$username || !preg_match("/^\S+@\S+$/", $mail) || !$fullname || !$userPosition ) {
                    redirect('userList.php?msg=error');
                }else {
                    $reg = $usrObj->registerUser($username,$hashed_password,$mail,$fullname,$userPosition);
                    if($reg) {
                        redirect('userList.php?msg=success');
                    }else {
                        redirect('userList.php?msg=error');
                    }
                }
                break;

            case "userEdit":
                $userName = fixTags(trim($_POST['username']));
                $mail = fixTags(trim($_POST['email']));
                $fullName = fixTags(trim($_POST['name']));
                $userPosition = fixTags(trim($_POST['userPosition']));
                if($_GET["userId"] == 1) {
                    redirect('userList.php');
                }else {
                    $usrObj->userUpdate($_GET["userId"],$userName,$mail,$fullName,$userPosition);
                    redirect('userList.php');
                }
                break;

            case "userPwdEdit":
                $userId = fixTags(trim($_POST["userId"]));
                $password = fixTags(trim($_POST['password']));
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                    $usrObj->userPasswordUpdate($hashed_password, $userId);
                redirect('userList.php');
                break;

            case "userDelete":
                if($_GET["userId"] == 1) {
                    redirect('userList.php');
                }else {
                    $usrObj->userDelete($_GET["id"]);
                    redirect('userList.php');
                }
                break;

         }
} else {
    $usrObj->redirect('login.php');
}
