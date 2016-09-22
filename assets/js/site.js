/**
 * Created by omer on 22.08.2015.
 */

$(document).ready(function () {
    $(".confirmation").click(function () {
        var message = "İşlemi onaylıyor musunuz?";
        if($(this).attr("data-confmes")) message = $(this).data("confmes");
        return confirm(message);
    });

    (function ($jQ) {

        $jQ('#filter').keyup(function () {

            var rex = new RegExp($jQ(this).val(), 'i');
            $jQ('.searchOrder tr').hide();
            $jQ('.searchOrder tr').filter(function () {
                return rex.test($jQ(this).text());
            }).show();

        })

    }(jQuery));

    (function ($jQ) {

        $jQ('#filterS').keyup(function () {

            var rex = new RegExp($jQ(this).val(), 'i');
            $jQ('.searchOrderS tr').hide();
            $jQ('.searchOrderS tr').filter(function () {
                return rex.test($jQ(this).text());
            }).show();

        })

    }(jQuery));
});