
<form action="<?=$sitePath?>workListTasks.php" method="POST">
    <input type="hidden" value="<?=$workTask?>" name="task"/>
    <h2>Listeye Yeni Hızlı İş Ekle</h2>
    <?php
    if(isset($_GET['msg'])){
        if(($_GET['msg']) == "success"){
            ?>
            <div class="alert alert-success">
                <i class="glyphicon glyphicon-ok"></i>
                Kayıt İşlemi Başarılı olmuştur!
            </div>

        <?php
        }else {
            ?>
            <div class="alert alert-danger">
               <i class="glyphicon glyphicon-alert"></i> Tüh, Bi hata oluştu! (Lütfen boş yer bırakmadan tekrar deneyiniz!)
            </div>

        <?php
        }
    }
    ?>

    <div class="form-group">
        <label for="sel1">Birimi :</label>
        <label>
            <select class="form-control" name="pId">
                <?php
                foreach ($positions as $position):
                    ?>
                    <option value="<?=$position["id"] ?>"><?= $position["position_name"] ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </label>
    </div>
    <div class="input-group">
            <span class="input-group-addon" id="basic-addon1">İş Tanımı</span>
            <input type="text" class="form-control" aria-describedby="basic-addon1" name="workName" maxlength="180" placeholder="Kısaca İş Tanımı giriniz. Örn: Logo Tasarım...">
    </div>

    <div class="input-group col-xs-12">
        <br />
        <input type="submit" class="btn btn-primary pull-right" value="İş Listesine Ekle"/>
    </div>
</form>