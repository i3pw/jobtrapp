<?php
$userId = $_SESSION['user_session'];
$userInfo = $usrObj->getOneUser($userId);
if($userInfo["user_position"] != 1) {
    include "_userSidebarAndHeader.php";
}else {
    include "_adminSidebarAndHeader.php";
}
?>
<div class="container">
    <h1 class="page-header"><?=$cOne['company_name']?> <small>(Güncel Durum Tablosu)</small></h1>

    <div class="col-sm-6">
        <table class="table table-bordered table-striped">
            <?php foreach($work as $workInfo):
               // dd($workInfo);
                if($workInfo['work_status'] == 0) {
                    $wStatus = "Bekliyor";
                }elseif($workInfo['work_status'] == 1){
                    $wStatus = "İşleniyor";
                }elseif($workInfo['work_status'] == 2) {
                    $wStatus = "Tamamlandı";
                }

                $date = date_create($workInfo['estimated_at']);

                $cIdforM = $workInfo['company_id'];
                $wIdforM = $workInfo['id'];
                ?>
            <thead>
                <tr class="success">
                    <th>İş Durumu <span class="badge"><?=
                            /** @var $wStatus */
                            $wStatus?></span></th>
                    <th class="text-center"><i class="glyphicon glyphicon-hourglass"></i> Son Tarih</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <form action="<?=$sitePath?>/workTasks.php" method="post">
                            <input type="hidden" value="<?=$workInfo['work_name'] ?>" name="wName"> <input type="hidden" value="<?=$workInfo['work_detail'] ?>" name="wDetail"><input type="hidden" value="<?=$workInfo['company_id'] ?>" name="cId"><input type="hidden" value="<?=$cName['company_name'];?>" name="cName"> <input type="hidden" value="<?=$workInfo['created_at'] ?>" name="creAt"><input type="hidden" value="<?=$workInfo['estimated_at'] ?>" name="estAt"><input type="hidden" value="<?=$workInfo['id'] ?>" name="wrkId">
                            <label>
                                <select class="form-control" name="sOpt" id="sOpt">
                                    <option disabled selected>Durum Seçiniz</option>
                                    <option value="0" <?php if($workInfo['work_status'] == 0) echo " disabled";?>>Beklemede</option>
                                    <option value="1" <?php if($workInfo['work_status'] == 1) echo " disabled";?>>İşleniyor</option>
                                    <option value="2" <?php if($workInfo['work_status'] == 2) echo " disabled";?>>Tamamlandı</option>
                                </select>
                            </label>
                            <button type="submit" class="btn btn-default" name="sOptSubmit" id="sOptSubmit"><i class="glyphicon glyphicon-refresh"></i> Güncelle</button>
                        </form>
                    </td>
                    <td class="text-center"><?=date_format($date, 'd / m / y');?></td>
                </tr>
                <tr>
                    <td colspan="2" class="bg-warning"><i class="glyphicon glyphicon-info-sign"></i><b> İş Notu:</b> <?=$workInfo['work_detail'] ?></td>
                </tr>
            </tbody>
            <?php endforeach; ?>
        </table>
        <hr />

        <div class="panel panel-success">
            <!-- Default panel contents -->
            <div class="panel-heading">Son Yapılan İşlemler</div>

            <!-- Table -->
            <table class="table table-striped">

                <thead>
                <tr class="text-success">
                    <th>Yapılan İşlem</th>
                    <th class="text-center"><i class="glyphicon glyphicon-user"></i></th>
                    <th class="text-center"><i class="glyphicon glyphicon-time"></i></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach($activities as $activity): ?>
                    <tr>
                        <td><?=$activity['update_name']?> olarak güncellendi.</td>
                        <td><?=$activity['user_name']?></td>
                        <td><?=$activity['update_at']?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>

    <div class="col-sm-6">
        <div class="panel panel-info">
            <!-- Default panel contents -->
            <div class="panel-heading">
                <i class="glyphicon glyphicon-pushpin"></i>  Firma Ayrıntıları
            </div>

            <!-- Table -->
            <table class="table table-striped tblTh">
                <tbody>
                    <tr>
                        <td><i class="glyphicon glyphicon-map-marker"></i></td>
                        <td><?=$cOne['adress']?></td>
                    </tr>

                    <tr>
                        <td><i class="glyphicon glyphicon-phone-alt"></i></td>
                        <td><?=$cOne['telephone']?></td>
                    </tr>

                    <tr>
                        <td><i class="glyphicon glyphicon-envelope"></i></td>
                        <td><?=$cOne['email']?></td>
                    </tr>

                    <tr>
                        <td><i class="glyphicon glyphicon-edit"></i></td>
                        <td><?=$cOne['note']?></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="panel panel-info">
            <div class="panel-heading">
                <span class="glyphicon glyphicon-comment"></span> Hızlı Mesajlaşma
                <div class="pull-right">
                        <a href=""><span class="glyphicon glyphicon-refresh">
                            </span> Yenile</a>
                </div>
            </div>
            <div class="panel-body chatScroll">
                <div class="text-center">
                    <a href="javascript:" class="badge loadbtn" title=""> Daha Fazla Yükle <i class="glyphicon glyphicon-chevron-down"></i> </a>
                </div>

                <ul class="chat chatadd">

                    <?php

                        $mesajlar = json_decode(file_get_contents( $sitePath."messages.php?id=".$GLOBALS['wIdforM']."&cId=".$GLOBALS['cIdforM'] ),true);
                        $mesajlarD = array_reverse($mesajlar['items']);
                        foreach($mesajlarD as $mesaj):
                            $user = $usrObj->getOneUser($mesaj['user_id']);


                    ?>
                        <input type="hidden" class="uMId" value="<?=$mesaj['user_id']?>" />

                            <?php
                                if($userId != $mesaj['user_id']):
                            ?>

                                <li class="left clearfix"><span class="chat-img pull-left">
                               <i class="glyphicon glyphicon-knight" style="font-size: 50px;"></i>
                            </span>
                                    <div class="chat-body clearfix">
                                        <div class="header">
                                            <strong class="primary-font"><?=$user['fullname']?></strong>
                                            <small class="pull-right text-muted">
                                            <span class="glyphicon glyphicon-time"></span><?=$mesaj['message_date']?></small>
                                        </div>
                                        <p>
                                            <?=$mesaj['message']?>
                                        </p>
                                    </div>
                                </li>
                                    <?php
                                    else:
                                    ?>

                            <li class="right clearfix"><span class="chat-img pull-right">
                            <i class="glyphicon glyphicon-user" style="font-size: 50px;"></i>
                            </span>
                                <div class="chat-body clearfix">
                                    <div class="header">
                                        <small class=" text-muted"><span class="glyphicon glyphicon-time"></span><?=$mesaj['message_date']?></small>
                                        <strong class="pull-right primary-font"><?=$user['fullname']?></strong>
                                    </div>
                                    <p>
                                        <?=$mesaj['message']?>
                                    </p>
                                </div>
                            </li>

                    <?php
                        endif;
                        endforeach;
                    ?>
                </ul>
            </div>
            <div class="panel-footer">
                <form action="<?=$sitePath?>messageTasks.php" method="POST">
                    <input type="hidden" value="<?=$GLOBALS['cIdforM']; ?>" name="cId">
                    <input type="hidden" value="<?=$GLOBALS['wIdforM']; ?>" name="wrkId">
                    <div class="input-group">
                        <input id="btn-input" name="btn-input" type="text" class="form-control input-sm" placeholder="Mesajınız...">
                            <span class="input-group-btn">
                                <button class="btn btn-warning btn-sm" id="btn-chat" name="btn-chat" type="submit">
                                    Gönder</button>
                            </span>
                    </div>
                </form>
            </div>
        </div>

</div>
    <input type="hidden" class="userID" value="<?=$userId?>" />
</div>

<script type="text/javascript">
    $(document).ready(function(){
        $("#sOptSubmit").click(function(){
            var statusId = $("#sOpt").val();
            if(statusId == null){
                alert("Lütfen Seçim Yapınız!");
            }else{
                if(statusId >= 2) {
                    var message = "İşlemi onaylıyor musunuz?";
                    if($(this).attr("data-confmes")) message = $(this).data("confmes");
                    return confirm(message);
                }
            }
        });

        var startID = 4;
        $('.loadbtn').click(function(){
            $.getJSON('messages.php?id=<?=$GLOBALS['wIdforM']?>&cId=<?=$GLOBALS['cIdforM']?>&start='+startID,function(e,i){

                if(e.last===true){
                    $('.loadbtn').remove();
                }

                $.each(e.items,function(e,item){
                    var userID = $('.userID').val();
                    var userc = item.user_id==userID?'right':'left';
                    var useri = item.user_id==userID?'pull-right':'pull-left';
                    var usericon = item.user_id==userID?'glyphicon-user':'glyphicon-knight';

                    var li = '<li class="'+userc+' clearfix"><span class="chat-img '+useri+'">'+
                        '<i class="glyphicon '+usericon+'" style="font-size: 50px;"></i>'+
                        '</span>'+
                        '<div class="chat-body clearfix">'+
                        ' <div class="header">'+
                        ' <small class=" text-muted"><span class="glyphicon glyphicon-time"></span>'+item.message_date+'</small>'+
                        '<strong class="pull-right primary-font">'+item.user_id+'</strong>'+
                        '</div>'+
                        '<p>'+
                        item.message+
                        '</p>'+
                        '</div>'+
                        '</li>';

                    $('.chatadd').prepend(li);
                });
            });
            startID +=3;
        });

    });
</script>