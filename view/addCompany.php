<?php
    include "_adminSidebarAndHeader.php";
?>
<div class="container-fluid well-lg well">
    <div class="pull-left">
        <h2 class="text-danger"> İş Takip Sistemi - Yeni Firma Ekle</h2>
    </div>

    <div class="pull-right">
        <a class="btn btn-lg btn-success" href="<?=$sitePath;?>addWork.php"><i class="glyphicon glyphicon-plus"></i> <br/>Yeni İş Ekle</a>
        <a class="btn btn-lg btn-danger" href="<?=$sitePath;?>companies.php"><i class="glyphicon glyphicon-list"></i> <br/>Firma Listesi</a>
        <a class="btn btn-lg btn-default" href=""><i class="glyphicon glyphicon-refresh"></i> <br/>Yenile</a>
    </div>
</div>
<div class="container">

    <?php
        if(!isset($_GET['task'])):
    ?>
    <div class="col-sm-7">
        <form action="<?=$sitePath?>companyTasks.php" method="POST">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr class="bg-success">
                        <th colspan="2">Firma Ekle / Düzenle</th>
                    </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        Firma Adı: <b title="Zorunlu Alan">*</b>
                    </td>
                    <td class="text-center">
                            <input type="text" name="cName" class="form-control" required/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Firma Adresi:
                    </td>
                    <td class="text-center">
                            <input type="text" name="cAdress" class="form-control"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        Telefon:
                    </td>
                    <td class="text-center">
                            <input type="text" name="cTel" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>
                        E-mail:
                    </td>
                    <td class="text-center">
                        <input type="text" name="eMail" class="form-control">
                    </td>
                </tr>

                <tr>
                    <td>
                        Not:
                    </td>
                    <td class="text-center">
                        <textarea class="form-control isDetay" name="cNote" maxlength="300" rows="3" cols="50" aria-label="" placeholder="Firma ile ilgili kısa bilgiler giriniz."></textarea>
                    </td>
                </tr>


                <tr>
                    <td></td>
                    <td class="text-center">
                        <label>
                            <input class="btn btn-success" type="submit" name="submitNew" value="Yeni Firma Ekle"/>
                        </label>
                    </td>
                </tr>

                </tbody>
            </table>
        </form>
    </div>
          <?php else:
            $company = $cObj->getOne($_GET['cId']);
            ?>
    <div class="col-sm-7">
        <form action="<?=$sitePath?>companyTasks.php?task=cEdit&cId=<?=$_GET['cId']?>" method="POST">
            <table class="table table-bordered table-striped">
                <thead>
                <tr class="bg-success">
                    <th colspan="2">Firma Ekle / Düzenle</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        Firma Adı: <b title="Zorunlu Alan">*</b>
                    </td>
                    <td class="text-center">
                        <input type="text" name="cName" class="form-control" value="<?=$company['company_name']?>" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        Firma Adresi:
                    </td>
                    <td class="text-center">
                        <input type="text" name="cAdress" class="form-control" value="<?=$company['adress']?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        Telefon:
                    </td>
                    <td class="text-center">
                        <input type="text" name="cTel" class="form-control" value="<?=$company['telephone']?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        E-mail:
                    </td>
                    <td class="text-center">
                        <input type="text" name="eMail" class="form-control" value="<?=$company['email']?>">
                    </td>
                </tr>

                <tr>
                    <td>
                        Not:
                    </td>
                    <td class="text-center">
                        <textarea class="form-control isDetay" name="cNote" maxlength="300" rows="3" cols="50" aria-label=""><?=$company['note']?></textarea>
                    </td>
                </tr>


                <tr>
                    <td></td>
                    <td class="text-center">
                        <label>
                            <input class="btn btn-success" type="submit" name="submitEdit" value="Güncelle"/>
                        </label>
                    </td>
                </tr>

                </tbody>
            </table>
        </form>
    </div>

    <?php endif; ?>
    <div class="col-sm-4">
        Firma listesi için <a href="firmalar.php" title="Firma Listesi" class="btn bg-success"><i class="glyphicon glyphicon-link"></i> Tıklayınız. </a>
    </div>
</div>