/**
 * Created by omer on 22.08.2015.
 */

    var firmaadi,birim,istanimi;
    function work(myId) {
        $('#' + myId).removeClass('btn-primary').addClass('disabled btn-success').html('Seçildi');
        $("#cid").val(myId);
        if($('a.disabled').length >= 1){
            $('.camp:not(.disabled)').addClass('disabled');
        }

        firmaadis = $('#' + myId).parent().parent();
        firmaadi = $(' td:first',firmaadis).text().trim();

    }

    var wId,pId;
    function workE(wIdd,pIdd,t) {

        $("#myModal").on("show.bs.modal", function(e) {

            wId = wIdd;
            pId = pIdd;

            birims = $(t).parent().parent().parent().parent();
            birim = $('#' + pId +':first',birims).text().trim();
            //alert(birim);

            istanimis = $(t).parent().parent();
            istanimi = $(' td:first',istanimis).text().trim();

            $('.firmaadimsg').text(firmaadi);
            $('.istanimimsg').text(istanimi);
            $('.birimmsg').text(birim);
        });

    }

    $('.tLfix').on('click', function(){
        var dis = $(this);
        if($(' input:checked + i',dis).hasClass('glyphicon-check')){
            // if it selected
            //$(' input + i',dis).addClass('glyphicon-unchecked');
            //$(' input + i',dis).removeClass('glyphicon-check').addClass('glyphicon-unchecked');

        }else{
            // if it unselected
            var butunIler = $('.butuniler i');

            butunIler.removeClass('glyphicon-check');
            butunIler.addClass('glyphicon-unchecked');
          ///  $(this).parent().find('i').addClass('glyphicon-unchecked');
            $(' i',dis).removeClass('glyphicon-unchecked');
            $(' i',dis).addClass('glyphicon-check');


            //$(' input:checked + i',dis).toggleClass('glyphicon-check', 'glyphicon-unchecked');
        }
    });

    $('.iseklebtn').on('click',function(){

        var firid = $("#cid").val();

        var isdaty = $('.isDetay').val();
        var inputA = $('label input:checked');
    //    var inputAC = inputA.parent();

      //  var inputAClass = $(inputAC).children('i');
        //alert(inputAClass);
        var labelId = inputA.val();
        //alert(labelId);

        $.ajax({
            //comId (firid) -> company ID
            //wNote -> work details
            //wId -> work ID
            //pId -> work Depart
            //pId -> Position
            type:'POST',
            data:"comId="+firid+"&wName="+istanimi+"&wNote="+isdaty+"&wId="+wId+"&pId="+pId+"&lId="+labelId,
            dataType:'json',
            url:'addWorkTasks.php',

            success:function(sonuc){
                //alert(sonuc.mesaj);
                if(sonuc.mesaj == "success") {
                    alert("İşleminiz başarı ile gerçekleşmiştir! İş ekleme ekranına yönlendirileceksiniz!");
                    location.reload();
                }else {
                    alert(sonuc.mesaj);
                }
            }
        });
    });


/*


function work(myId) {
    $('#' + myId).removeClass('btn-primary').addClass('disabled btn-success').html('Seçildi');
    $("#pId").val(myId);
    if($('a.disabled').length >= 1){
        $('.camp:not(.disabled)').addClass('disabled');
    }


    window.glbId += myId;

}


function workE(wId,pId) {
    //w -> work
    //c -> work cat
    //glb -> company
    //  alert(wId);
    // alert(pId);
    var mData = {glbId:glbId,wId:wId,pId:cId};
    $.ajax({
        type:'POST',
        data:mData,
        dataType:'json',
        url:'addWorkTasks.php',
        success:function(sonuc){
            $("#myModal").modal('show');
            $('.mesaj').html(sonuc.veri);
        }

    });


}


 */