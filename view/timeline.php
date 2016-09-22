<?php
$userId = $_SESSION['user_session'];
$userInfo = $usrObj->getOneUser($userId);
if($userInfo["user_position"] != 1) {
    include "_userSidebarAndHeader.php";
}else {
    include "_adminSidebarAndHeader.php";
}
?>
<div class="container-fluid well-lg well">
    <div class="pull-left">
        <h2 class="text-danger"> İş Takip Sistemi - Aktif İş Listesi</h2>
    </div>

    <div class="pull-right">
        <a class="btn btn-lg btn-default" href=""><i class="glyphicon glyphicon-refresh"></i> <br/>Yenile</a>
    </div>
</div>
<div class="container">
    <div class="row">
    <?php
    foreach ($showCompany as $company):
        if($userInfo["user_position"] != 1):
        $shoWorks = $cObj->getShowCompanyWorks($company['id'], $userInfo["user_position"]);
            if(count($shoWorks) > 0):
        ?>
            <div class="col-xs-6 col-sm-4">
                <div class="panel panel-info">
                    <div class="panel-heading"> <h3 class="panel-title"><?=$company['company_name']?></h3> <div class="label label-default pull-right">
                            Proje Durumu
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <?php
                    foreach($shoWorks as $work):
                        ?>
                        <div class="pull-left">
                            <?=$work['work_name']?>
                        </div>
                        <div class="pull-right">
                            <a href="<?=$sitePath?>is-ayrinti.php?id=<?= $work['id'] ?>&cId=<?= $company['id'] ?>"  class="btn btn-danger"> <i class="glyphicon glyphicon-tasks" title="İş Ayrıntıları"></i> </a>
                            <?php
                            $date=strtotime($work['estimated_at']);
                            $diff=$date-time();//time returns current time in seconds
                            $days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
                            $hours=round(($diff-$days*60*60*24)/(60*60));

                            //Report
                            // echo "$days days $hours hours remain<br />";
                            $lblId = $work['label_id'];
                            if($days <= 1):
                                $lbl = "danger";
                            elseif($days <= 2):
                                $lbl = "warning";
                            elseif($days <= 3):
                                $lbl = "info";
                            elseif($days <= 4):
                                $lbl = "primary";
                            elseif($days <= 5):
                                $lbl = "success";
                            else:
                                $lbl = "default";
                                ?>

                            <?php endif; ?>
                            <span class="label label-<?=$lbl?>">
                                        <?php if($days >= 6):?>
                                            6+ gün
                                        <?php elseif($days < 1): ?>
                                            <i class="glyphicon glyphicon-alert"></i> Acil
                                        <?php else: ?>
                                            <?=$days?> gün
                                        <?php endif; ?>
                                    </span><br />
                        </div>
                        <div class="clearfix"></div>
                        <hr style="width: 100%; height: 1px;  margin-bottom: 5px!important; margin-top: 5px!important;" />
                    <?php endforeach; ?>
                </div>
                <div class="panel-footer">
                </div>
          </div>
            <?php endif; ?>


    <?php else:
            $shoWorks = $cObj->getShowCompanyWorksForAdmin($company['id']);
            $countWorks = $cObj->getCountCompaniesWorks($company['id']);
            ?>
            <div class="col-sm-6 col-lg-4" >
                <div class="panel panel-info" style="border: 1px solid #bce8f1">
                    <div class="panel-heading"> <h3 class="panel-title"><?=$company['company_name']?> </h3>

                        <div class="label label-default pull-right">

                            Proje Durumu
                        </div>
                    </div>
                <div class="panel-body">
                    <?php
                    foreach($shoWorks as $work):
                        ?>
                            <div class="pull-left">
                              <?=$work['work_name']?>
                            </div>
                            <div class="pull-right">
                                <a href="<?=$sitePath?>workDetail.php?id=<?= $work['id'] ?>&cId=<?= $company['id'] ?>"  class="btn btn-danger"> <i class="glyphicon glyphicon-tasks" title="İş Ayrıntıları"></i> </a>
                                <?php
                                $date=strtotime($work['estimated_at']);
                                $diff=$date-time();//time returns current time in seconds
                                $days=floor($diff/(60*60*24));//seconds/minute*minutes/hour*hours/day)
                                $hours=round(($diff-$days*60*60*24)/(60*60));

                                //Report
                               // echo "$days days $hours hours remain<br />";
                                  $lblId = $work['label_id'];
                                    if($days <= 1):
                                            $lbl = "danger";
                                        elseif($days <= 2):
                                            $lbl = "warning";
                                        elseif($days <= 3):
                                            $lbl = "info";
                                        elseif($days <= 4):
                                            $lbl = "primary";
                                        elseif($days <= 5):
                                            $lbl = "success";
                                        else:
                                            $lbl = "default";
                                    ?>

                                        <?php endif; ?>
                                    <span class="label label-<?=$lbl?>">
                                        <?php if($days >= 6):?>
                                                 6+ gün
                                            <?php elseif($days < 1): ?>
                                                 <i class="glyphicon glyphicon-alert"></i> Acil
                                            <?php else: ?>
                                                <?=$days?> gün
                                            <?php endif; ?>
                                    </span><br />
                            </div>
                        <div class="clearfix"></div>
                                <hr style="width: 100%; height: 1px;  margin-bottom: 5px!important; margin-top: 5px!important;" />
                    <?php endforeach; ?>
                </div>
                <div class="panel-footer">
                        <?php
                        if($countWorks['compWorks'] == 0):

                            ?>
                            <div class="hideButton text-right">
                                <a href="<?=$sitePath;?>actCompany.php?cId=<?=$company['id'];?>" class="text-danger btn-xs confirmation" title="Gizle"><i class="glyphicon glyphicon-remove"></i> Gizle</a>
                            </div>

                        <?php
                        endif;
                        ?>
                </div>
             </div>
            </div>


    <?php endif; ?>
    <?php endforeach; ?>
    </div>

</div>