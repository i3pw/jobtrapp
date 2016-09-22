<div id="adminWrapper" class="active">
    <!-- Sidebar -->
    <?php
        include "_adminSidebarAndHeader.php";
    ?>

    <div class="col-sm-12">
        <div class="container-fluid well-lg well">
            <div class="pull-left">
                <h2 class="text-danger"> İş Takip Sistemi - Tüm İşler</h2>
            </div>

            <div class="pull-right">
                <a class="btn btn-lg btn-success" href="<?=$sitePath?>addWork.php"><i class="glyphicon glyphicon-plus"></i> <br/>Yeni İş Ekle</a>
                <a class="btn btn-lg btn-danger" href="workList.php"><i class="glyphicon glyphicon-list"></i> <br/>Hızlı İş Listesi</a>
                <a class="btn btn-lg btn-default" href=""><i class="glyphicon glyphicon-refresh"></i> <br/>Yenile</a>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="input-group"> <span class="input-group-addon bgFix"><i class="glyphicon glyphicon-search"></i> Filtrele: </span>

                    <input id="filter" type="text" class="form-control" placeholder="Firma veya iş listele...">
                </div>
            </div>
            <div class="panel-body" style="height: 450px!important; overflow-y: auto">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>İş Adı</th>
                        <th>İş Ayrıntısı</th>
                        <th>Başlangıç Tarihi</th>
                        <th>Planlanan Tarih</th>
                    </tr>
                    </thead>
                    <?php
                    foreach ($works as $work):
                        ?>
                        <tbody class="searchOrder">
                        <tr>
                            <td>
                                <?=$work['work_name']?>
                            </td>
                            <td>
                                <?=$work['work_detail']?>
                            </td>
                            <td>
                                <?=$work['created_at']?>
                            </td>
                            <td>
                                <?=$work['estimated_at']?>
                            </td>
                        </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>


            </div>
        </div>

    </div>
</div>