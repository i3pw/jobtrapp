
        <form action="<?=$sitePath?>workListTasks.php?task=edit" method="POST">
            <h2>İş (Ekle / Güncelle)</h2>
            <?php
            $wId = $_GET['wId'];
            $pId = $_GET['pId'];
            $getWrk = $workObj->getWorkListOne($wId);
            foreach ($getWrk as $wrk):
               // dd($wrk)
            ?>
                <input type="hidden" name="wId" value="<?= $wrk['id'] ?>">

                <div class="form-group">
                    <label for="sel1">İlgili Birimi: </label>
                    <label>
                        <select class="form-control" name="pId">
                            <?php
                            foreach($positions as $pos):
                                ?>
                                <option value="<?=$pos['id'] ?>" <?php if ($pos['id'] == $wrk["position_id"]) echo " selected";?>><?= $pos["position_name"] ?></option>
                             <?php
                            endforeach;
                            ?>
                        </select>
                    </label>
                </div>
                <div class="input-group">
                    <span class="input-group-addon" id="basic-addon1">İş Tanımı</span>
                    <input type="text" class="form-control" value="<?=$wrk['work_name'] ?>" aria-describedby="basic-addon1" name="workName" maxlength="180">
                </div>
                <br/>
            <?php
            endforeach;
            ?>
            <div class="input-group col-xs-12">
                <a href="<?=$sitePath; ?>addWork.php" class="btn btn-primary pull-left">Yeni İş Ekle</a>
                <input type="submit" class="btn btn-success pull-right" value="Değişikliği Gönder"/>
            </div>
        </form>