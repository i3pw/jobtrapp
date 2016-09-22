<div id="adminWrapper" class="active">
    <!-- Sidebar -->
    <?php
         include "_adminSidebarAndHeader.php";

     ?>
        <div class="row">
            <div class="container-fluid well-lg well">
                    <div class="pull-left">
                        <h2 class="text-danger"> İş Takip Sistemi - Sistem Özeti</h2>
                    </div>

                    <div class="pull-right">
                        <a class="btn btn-lg btn-success" href="<?=$sitePath?>addWork.php"><i class="glyphicon glyphicon-plus"></i> <br/>Yeni İş Ekle</a>
                        <a class="btn btn-lg btn-default" href=""><i class="glyphicon glyphicon-refresh"></i> <br/>Yenile</a>
                    </div>
            </div>


            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-list-alt" style="font-size: 35px"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 17px">Toplam İş Sayısı </div>
                                <div style="font-size: 20px"><?=$workCount['COUNT(id)'];?></div>
                            </div>
                        </div>
                    </div>
                    <a href="all-works.php">
                        <div class="panel-footer">
                            <span class="pull-left">Ayrıntılar için tıklayınız</span>
                            <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-check" style="font-size: 35px"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 17px">Toplam İş Listesi </div>
                                <div style="font-size: 20px"><?=$workListCount['COUNT(id)'];?></div>

                            </div>
                        </div>
                    </div>
                    <a href="<?=$sitePath?>all-works.php">
                        <div class="panel-footer">
                            <span class="pull-left">Ayrıntılar için tıklayınız</span>
                            <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-warning">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-import" style="font-size: 35px"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 17px">Toplam Firma Sayısı </div>
                                <div style="font-size: 20px"><?=$companyCount["COUNT(id)"];?></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?=$sitePath?>companies.php">
                        <div class="panel-footer">
                            <span class="pull-left">Ayrıntılar için tıklayınız</span>
                            <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="glyphicon glyphicon-user" style="font-size: 35px"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div style="font-size: 17px">Toplam Kullanıcı Sayısı</div>
                                <div style="font-size: 20px"><?=$userCount["COUNT(id)"]-1;?></div>
                            </div>
                        </div>
                    </div>
                    <a href="userList.php">
                        <div class="panel-footer">
                            <span class="pull-left">Ayrıntılar için tıklayınız</span>
                            <span class="pull-right"><i class="glyphicon glyphicon-arrow-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <!-- /.row -->
    </div>