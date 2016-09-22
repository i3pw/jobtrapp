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
                <div class="navbar-brand pull-right visible-xs">
                            <a href="<?=$sitePath?>notifications.php">
                                <i data-count="25" class="glyphicon glyphicon-bell notification-ico"></i>

                            </a>

                </div>

            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="<?=$sitePath?>index.php">Aktif İş Listesi <span class="sub_icon glyphicon glyphicon-list"></span></a></li>
                    <li><a href="<?=$sitePath?>admin.php">Özet</a></li>
                    <li><a href="<?=$sitePath?>companies.php">Firmalar</a></li>
                    <li><a href="<?=$sitePath?>all-works.php">Tüm İşler</a></li>
                    <li><a href="<?=$sitePath?>position.php">Birimler</a></li>
                    <li><a href="<?=$sitePath?>userList.php">Personeller</a></li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Sistem <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><span class="sub_icon glyphicon glyphicon-tree-deciduous"></span> Raporlar</a></li>
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

                <div class="navbar-right hidden-xs">
                    <ul class="nav navbar-nav pull-right right-navbar-nav">
                        <li class="nav-icon-btn nav-icon-btn-danger dropdown">
                            <a href="#notifications" class="dropdown-toggle" data-toggle="dropdown">
                                <i data-count="25" class="glyphicon glyphicon-bell notification-ico"></i>

                            </a>
                            <!-- NOTIFICATIONS -->

                            <!-- Javascript -->
                            <script>
                                init.push(function () {
                                    $('#main-navbar-notifications').slimScroll({ height: 250 });
                                });
                            </script>
                            <!-- / Javascript -->


                            <div class="dropdown-menu widget-notifications no-padding" style="width: 300px; left:auto!important; right: 0!important;">
                                <div style="position: relative; overflow: hidden; width: auto; height: 250px;" class="slimScrollDiv">
                                    <div style="overflow-y:auto; width: auto; height: 250px;" class="notifications-list" id="main-navbar-notifications">

                                        <?php include("notificationLists.php"); ?>

                                    </div>
                                </div> <!-- / .notifications-list -->
                                <a href="notifications.php" class="notifications-link">Tüm Bildirimler</a>
                            </div> <!-- / .dropdown-menu -->
                        </li>
                    </ul>
                </div>
        </div>
    </nav>


</div>