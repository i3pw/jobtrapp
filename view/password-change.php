<div class="col-sm-6">
    <h1>Şifre Güncelle</h1>
    <form action="<?=$sitePath?>userTasks.php?task=userPwdEdit" method="POST">
        <input type="hidden" value="<?=$_GET['userId']?>" name="userId">
        <table class="table table-bordered table-striped">
            <?php
            if(isset($_GET['msg'])){
                if(($_GET['msg']) == "success"){
            ?>

            <thead>
                <tr class="bg-info">
                    <th colspan="2">Şifre Güncelleme Başarılı Olmuştur!</th>
                </tr>
            </thead>
            <?php
                }
                else {
            ?>
              <thead>
                <tr class="bg-danger">
                    <th colspan="2">Tüh, Bi hata oluştu! Ama öyle eklemeyecektiniz!<br /> (Lütfen boş yer bırakmadan tekrar deneyiniz!)</th>
                </tr>
             </thead>

            <?php
                }
            }
            ?>
            <thead>
            <tr class="bg-success">
                <th colspan="2">Şifre Güncelleme</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>
                    Şifre:
                </td>
                <td class="text-center ">
                    <label>
                        <input type="password" name="password" class="form-control" required>
                    </label>
                </td>
            </tr>
            <tr>
                <td>

                </td>
                <td class="text-center">
                    <label>
                        <input class="btn btn-warning" type="submit" name="register" value="Şifre Güncelle"/>
                    </label>
                </td>
            </tr>
            </tbody>
        </table>
    </form>
</div>
