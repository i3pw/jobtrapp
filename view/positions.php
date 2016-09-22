<div id="adminWrapper" class="active">
    <!-- Sidebar -->
    <?php
    include "_adminSidebarAndHeader.php";
    ?>
    <div class="container-fluid well-lg well">
        <div class="pull-left">
            <h2 class="text-danger"> İş Takip Sistemi - Birimler</h2>
        </div>

        <div class="pull-right">
            <a class="btn btn-lg btn-default" href=""><i class="glyphicon glyphicon-refresh"></i> <br/>Yenile</a>
        </div>
    </div>
    <div class="col-sm-6">
        <h2>Birimler</h2>
        <div class="panel-heading">
            <div class="input-group"> <span class="input-group-addon bgFix"><i class="glyphicon glyphicon-search"></i> Filtrele: </span>

                <input id="filter" type="text" class="form-control" placeholder="Birim Ara...">
            </div>
        </div>
        <table class="table table-bordered table-striped searchOrder">
            <?php
            foreach ($positions as $position):
                ?>
                <tr>
                    <td><?= $position["position_name"] ?>
                        <span class="pull-right">
                     <!-- Bir sonraki güncellemede eklenecek
                        <a href="?task=catEdit&catId=<?= $position["id"] ?>" class="btn btn-warning  btn-xs">
                            <span class="glyphicon glyphicon-pencil"></span>
                        </a>
                      -->
                        <a href="?task=pEdit&id=<?= $position["id"] ?>" class="btn btn-warning btn-xs"><span
                                class="glyphicon glyphicon-edit"></span></a>
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <div class="col-sm-6">
        <?php
            if(!isset($_GET['task'])):
        ?>
        <form action="<?=$sitePath?>positionTasks.php" method="post">
            <input type="hidden" value="pAdd" name="task">
            <h2>Yeni Birim Ekle</h2>

            <div class="input-group">
                <input type="hidden" name="task" value="pAdd">
                <input type="text" class="form-control" placeholder="Birim ismini giriniz..." name="pName" />
                <span class="input-group-btn">
                    <input type="submit" class="btn btn-primary" name="submit" value="Ekle">
                 </span>
            </div>
        </form>
        <?php else: ?>

                <form action="<?=$sitePath?>positionTasks.php" method="post">
                    <h2>Birim Düzenle  </h2>
                   <?php $pName = $pObj->getOnePositionName($_GET['id']); ?>

                    <div class="input-group">
                        <input type="hidden" name="task" value="pEdit">
                            <input type="hidden" name="pId" value="<?=$_GET['id']?>">
                            <input type="text" class="form-control" value="<?=$pName['position_name']?>" name="pName" />
                            <span class="input-group-btn">
                                <input type="submit" class="btn btn-primary" name="submit" value="Gönder">
                           </span>
                    </div>

                </form>
<hr />
               <a href="<?=$sitePath?>position.php" class="btn btn-success pull-right"> <span class="glyphicon glyphicon-plus"></span> Yeni Birim Ekle </a>


        <?php endif; ?>
    </div>

</div>
