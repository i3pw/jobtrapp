<div id="adminWrapper" class="active">
    <!-- Sidebar -->
    <?php
    include "_adminSidebarAndHeader.php";
    ?>
    <div class="container-fluid well-lg well">
        <div class="pull-left">
            <h2 class="text-danger"> İş Takip Sistemi - Personel Listesi</h2>
        </div>

        <div class="pull-right">
            <a class="btn btn-lg btn-default" href=""><i class="glyphicon glyphicon-refresh"></i> <br/>Yenile</a>
        </div>
    </div>
    <div class="col-sm-6">
        <h2>Üye listesi</h2>
        <table class="table table-bordered table-striped">
            <?php
            foreach ($users as $usr):
                ?>
                <tr>
                    <td>
                <?php
                if ($usr['id'] == 1){

                }else{
                ?>
                        <b><?= $usr["username"] ?></b> (<?= $usr["fullname"] ?>)
                        <span class="pull-right">

                        <a href="?pwd=userPwdEdit&userId=<?= $usr["id"] ?>" class="btn btn-danger btn-xs" title="Şifre Güncelle">
                            <span class="glyphicon glyphicon-asterisk"></span> Şifre Yenile
                        </a>

                        <a href="?task=userEdit&userId=<?= $usr["id"] ?>" class="btn btn-warning btn-xs" title="Kullanıcı Güncelle">
                            <span class="glyphicon glyphicon-pencil"></span> Kullanıcı Düzenle
                        </a>

                        <!--<a href="<?=$sitePath?>userTasks.php?task=userDelete&id=<?= $usr["id"] ?>" class="confirmation btn btn-danger btn-xs" data-confmes="Kategoriyi silmeyi onaylıyor musunuz?"><span
                                class="glyphicon glyphicon-trash"></span></a> -->
                <?php
                }
                ?>
                        </span>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>

    <?php
    if(isset($_GET['task']) == "userEdit"){
        include "editUser.php";
      }else if(isset($_GET['pwd']) == "userPwdEdit") {
        include "password-change.php";
    }else{
        include "register.php";
    }
    ?>

</div>
