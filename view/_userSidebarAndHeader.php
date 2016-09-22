<?php
// Oturum açan kişinin bilgilerini alıyoruz
$userId = $_SESSION['user_session'];
$userInfo = $usrObj->getOneUser($userId);
?>
<div id="sidebar-wrapper">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand visible-xs" href="<?=$sitePath?>index.php"><i class="glyphicon glyphicon-home"></i></a>
                <a class="navbar-brand hidden-xs" href="<?=$sitePath?>index.php">İş Takip Sistemi</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="<?=$sitePath?>index.php">Anasayfa</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sistem <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><span class="sub_icon glyphicon glyphicon-compressed"></span> Ayarlar</a></li>
                            <li><a href="#"><span class="sub_icon glyphicon glyphicon-alert"></span> Hata Bildir</a></li>
                            <li><a href="#"><span class="sub_icon glyphicon glyphicon-question-sign"></span> Yardım</a></li>
                        </ul>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?= $userInfo["fullname"] ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Profil </a></li>
                        </ul>
                    </li>
                    <li><a href="<?=$sitePath?>logout.php?logOut=true"><span class="glyphicon glyphicon-log-in"></span> Çıkış Yap</a></li>
                </ul>
            </div>
        </div>
    </nav>
</div>