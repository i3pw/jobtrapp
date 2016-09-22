<div id="adminWrapper" class="active">
    <!-- Sidebar -->
    <?php
     include "_adminSidebarAndHeader.php";
    ?>
    <div class="container-fluid well-lg well">
        <div class="pull-left">
            <h2 class="text-danger"> İş Takip Sistemi - Hızlı İş Listesi</h2>
        </div>



        <div class="pull-right">
            <a class="btn btn-lg btn-success" href="<?=$sitePath;?>addWork.php"><i class="glyphicon glyphicon-plus"></i> <br/>Yeni İş Ekle</a>
            <a class="btn btn-lg btn-default" href=""><i class="glyphicon glyphicon-refresh"></i> <br/>Yenile</a>
        </div>
    </div>

    <div class="col-sm-6">
        <h1>Hızlı İş Listesi</h1>

        <div class="input-group"> <span class="input-group-addon bgFix"><i class="glyphicon glyphicon-search"></i> Filtrele: </span>

            <input id="filter" type="text" class="form-control" placeholder="İş veya birim listele...">
        </div>
        <div style="height: 228px; overflow-x: auto; overflow-y: scroll; ">
        <table class="table table-bordered table-striped">

                    <thead>
                    <tr class="bg-success">
                        <th>İş Adı</th>
                        <th>İlgili Birim</th>
                        <th style="width:26%;">İşlemler</th>
                    </tr>
                    </thead>
            <?php
            //dd($workInfo);
            foreach($workInfo as $work):
                ?>
                    <?php
                       $pId = $work['position_id'];
                       $position = $getPos->getPosition($pId);
                    ?>

                    <tbody class="searchOrder">
                    <tr>
                        <td>
                            <?= $work['work_name'] ?>
                        </td>
                        <td>
                            <?= $position['position_name']; ?>
                        </td>
                        <td class="text-center">

                            <a href="?task=edit&wId=<?=$work['id']?>&pId=<?=$pId?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i></i></a>
                            <a href="<?=$sitePath; ?>workListTasks.php?task=del&wId=<?=$work['id']?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i></a>

                        </td>
                    </tr>
                    </tbody>

            <?php endforeach; ?>
        </table>
        </div>
    </div>


    <div class="col-sm-6">
        <?php
        if(isset($_GET['task']) == "edit"){
            include "workEdit.php";
        }else {
            include "workAdd.php";
        }
        ?>
    </div>

</div>
