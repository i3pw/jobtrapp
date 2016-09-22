<div id="adminWrapper" class="active">
    <!-- Sidebar -->
    <?php
        include "_adminSidebarAndHeader.php";
    ?>
    <div class="container-fluid well-lg well">
        <div class="pull-left">
            <h2 class="text-danger"> İş Takip Sistemi - Firmalar</h2>
        </div>

        <div class="pull-right">

            <a class="btn btn-lg btn-success" href="<?=$sitePath;?>addWork.php"><i class="glyphicon glyphicon-plus"></i> <br/>Yeni İş Ekle</a>
            <a class="btn btn-lg btn-success" href="<?=$sitePath;?>addCompany.php"><i class="glyphicon glyphicon-plus"></i> <br/>Yeni Firma Ekle</a>
            <a class="btn btn-lg btn-default" href=""><i class="glyphicon glyphicon-refresh"></i> <br/>Yenile</a>
        </div>
    </div>

    <div class="col-sm-12">

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
                <th>Firma Adı</th>
                <th>Firma Bilgileri</th>
                <th style="width: 20%" class="text-center"><i class="glyphicon glyphicon-cog"></i> İşlemler </th>
            </tr>
            </thead>
            <?php
                  foreach ($companies as $company):
                  ?>
                    <tbody class="searchOrder">
                        <tr>
                            <td>
                                <?=$company['company_name']?>
                            </td>
                            <td>
                                <strong>Adres: </strong> <?=$company['adress']?> <br />
                                <strong>Telefon: </strong><?=$company['telephone']?> <br />
                                <strong>Email: </strong><?=$company['email']?> <br />
                                <strong>Not: </strong><?=$company['note']?> <br />
                            </td>
                            <td class="text-center">
                                <a href="<?=$sitePath?>addCompany.php?task=cEdit&cId=<?=$company['id']?>" class="btn btn-warning" title="Firma Düzenle"><i class="glyphicon glyphicon-edit"></i></a>
                                <!--   <a href="#" class="btn btn-danger" title="Firmayı Sil"><i class="glyphicon glyphicon-trash"></i></a>
                             <a href="--><?//=$sitePath; ?><!--orderTasks.php?task=add&productId=--><?//=$works['id']?><!--&tableId=--><?//=$table['id']?><!--" class="btn btn-primary">+</a>-->
                            </td>
                        </tr>
                    </tbody>
            <?php endforeach; ?>
        </table>


    </div>
    </div>

</div>
</div>