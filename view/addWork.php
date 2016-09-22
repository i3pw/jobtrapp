<div id="adminWrapper" class="active">
    <!-- Sidebar -->
    <?php
     include "_adminSidebarAndHeader.php";
    ?>
    <div class="container-fluid well-lg well">
        <div class="pull-left">
            <h2 class="text-danger"> İş Takip Sistemi - Yeni İş Ekle</h2>
        </div>

        <div class="pull-right">
            <a class="btn btn-lg btn-success" href="addCompany.php"><i class="glyphicon glyphicon-plus"></i> <br/>Yeni Firma Ekle</a>
            <a class="btn btn-lg btn-danger" href="<?=$sitePath;?>workList.php"><i class="glyphicon glyphicon-list"></i> <br/>Hızlı İş Listesi</a>
            <a class="btn btn-lg btn-default" href=""><i class="glyphicon glyphicon-refresh"></i> <br/>Yenile</a>
        </div>
    </div>
    <div class="col-sm-12">
        <div class="col-sm-6 col-md-6">
            <div class="input-group"> <span class="input-group-addon bgFix"><i class="glyphicon glyphicon-search"></i> Filtere: </span>

                <input id="filter" type="text" class="form-control" placeholder="Firma listele...">
            </div>
            <div style="height: 228px; overflow-x: hidden; overflow-y: scroll; ">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr class="bg-success">
                        <th>Firma Adı</th>
                        <th style="width: 18%" class="text-center"><i class="glyphicon glyphicon-cog"></i> İşlemler </th>
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
                            <td class="text-center">
                                <a href="javascript:" id="<?=$company['id']?>" class="btn btn-primary camp" onClick="work(this.id)">+</a>
                                <!--  <a href="--><?//=$sitePath; ?><!--orderTasks.php?task=add&productId=--><?//=$works['id']?><!--&tableId=--><?//=$table['id']?><!--" class="btn btn-primary">+</a>-->
                            </td>
                        </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="pull-left container-fluid" style="margin: 15px 0;">
                <a href="" class="btn btn-danger" title="Seçimi Temizle!">Temizle!</a>
            </div>

        </div>
        <div class="col-sm-6 col-md-6">
            <div class="input-group"> <span class="input-group-addon bgFix"><i class="glyphicon glyphicon-search"></i> Filtere: </span>

                <input id="filterS" type="text" class="form-control" placeholder="İş listele...">
            </div>
            <div style="height: 228px; overflow-x: hidden; overflow-y: scroll; margin-bottom: 15px;">
                <table class="table table-bordered table-striped">
                    <?php
                    foreach($wList as $ps => $wrk):
                      //  ddd($wrk);
                        $position_info  = explode('--',$ps);
                        $position_name  = $position_info[0];
                        $position_id    = $position_info[1];
                    ?>
                        <thead>

                        <tr class="bg-success">
                            <th id="<?=$position_id?>"><?=$position_name?></th>
                            <th style="width:26%;"> İşlemler</span></th>
                        </tr>
                        </thead>
                        <?php
                        $say = 0;
                        foreach($wrk as $workid => $workname):
                            $say++;
                            ?>
                            <tbody class="searchOrderS">
                                <tr>
                                    <td>
                                        <?=$workname;?>
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:" onclick="workE(this.id,<?=$position_id?>,this);" class="btn btn-primary workBtn" data-toggle="modal" data-target="#myModal" id="<?=$workid;?>">+</a>
                                    </td>
                                </tr>
                                <?php
                                    if(count($wrk)==$say){
                                ?>
                                <tr>
                                    <td>
                                        DİĞER İŞLER
                                    </td>
                                    <td class="text-center">
                                        <a href="javascript:" onclick="workE(this.id,<?=$position_id?>,this);" class="btn btn-primary workBtn" data-toggle="modal" data-target="#myModal" id="0">+</a>
                                    </td>
                                </tr>
                                <?php
                                    }

                                ?>
                            </tbody>
                        <?php endforeach;?>
                    <?php endforeach;?>
                </table>
        </div>
            <div class="pull-right container-fluid">
                <a href="" class="btn btn-danger" title="İşlemi iptal et!">İptal!</a>
            </div>
        </div>
    </div>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">İş Ekleme Formu</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?=$sitePath?>addWorkTasks.php" method="post" onSubmit="return false;">

                            <input type="hidden" name="task" value="<?= $workTask ?>">
                            <input type="hidden" name="task" value="" id="cid">
                                <label id="isFirma">Firma Adı : </label> <span class="firmaadimsg"></span><br/>
                                <label id="isTanimi">İş Tanımı :</label><span class="istanimimsg"></span>
                            <label id="isTanimi">Birim :</label><span class="birimmsg"></span>
                                 <br/>
                            <span class="badge">Süre: <i class="glyphicon glyphicon-pushpin"></i> </span>
                            <div class="btn-group butuniler" data-toggle="buttons">
                                <label class="btn btn-danger tLfix">
                                    <input type="radio" autocomplete="off" name="labels" value="1" class="labels"><i class="glyphicon glyphicon-unchecked"></i> 1 Gün
                                </label>
                                <label class="btn btn-warning tLfix">
                                    <input type="radio" autocomplete="off" name="labels" value="2" class="labels"><i class="glyphicon glyphicon-unchecked"></i> 2 Gün
                                    </label>
                                <label class="btn btn-default tLfix active">
                                    <input type="radio" autocomplete="off" name="labels" value="3" class="labels" checked><i class="glyphicon glyphicon-check"></i> 3 Gün
                                </label>
                                <label class="btn btn-primary tLfix">
                                    <input type="radio" autocomplete="off" name="labels" value="4" class="labels"><i class="glyphicon glyphicon-unchecked"></i> 4 Gün
                                </label>
                                <label class="btn btn-success tLfix">
                                    <input type="radio" autocomplete="off" name="labels" value="5" class="labels"><i class="glyphicon glyphicon-unchecked"></i> 5 Gün
                                </label>
                                <label class="btn btn-default tLfix">
                                    <input type="radio" autocomplete="off" name="labels" value="30" class="labels"><i class="glyphicon glyphicon-unchecked"></i> 6+Gün
                                </label>
                            </div>

                            <div class="input-group">
                                <br/>

                                <label>
                                    <i class="glyphicon glyphicon-pencil"></i> İş Ayrıntı / Notlar:
                                    <textarea class="form-control isDetay" maxlength="300"  rows="3" cols="200" aria-label="" placeholder="İşler ile ilgili kısa bilgiler giriniz."></textarea>
                                </label>
                            </div>
                            <br/>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="iseklebtn btn btn-primary">İş Ekle</button>
                    </div>
                </div>
            </div>
        </div>

</div>

    <script src="<?=$sitePath?>assets/js/jquery.work.js"></script>
