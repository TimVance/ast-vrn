$(function(){
    /*$('.s1feedback .btn').on('click', function(){
        var $this_bt = $(this),
            $form = $this_bt.parents('form'),
            data = $form.serialize();
        //alert(data);
        //consol.log(data);
        $.fancybox.showLoading();
        $.ajax({
            type: 'POST',
            url: $form.attr('action'),
            data: data+'&s1ajax=y&submit=y',
            //dataType: 'json',
            success: function(json){
                //alert(json);
                var obj = jQuery.parseJSON(json),
                    text = '',
                    err = '';
                //alert(obj.ERROR_MESSAGE[0]);
                //if(obj.ERROR_MESSAGE.size() > 0){

                    $.each( obj.ERROR_MESSAGE, function( i, item ) {
                        err += '<div>'+item+'</div>';
                        $('.s1feedback input[name="'+obj.ERROR_FIELD[i]+'"]').addClass('err');
                    });
                //}
                if(err != ''){
                    //$('.s1feedback input[name="'+obj.ERROR_FIELD[0]+'"]').focus();
                    text += '<div class="error">'+err+'</div>';
                }

                $.fancybox.open(text,{
                    //width:800,
                    //minHeight:400,
                    maxHeight: '80%',
                    autoSize: true
                });
                //alert(obj.ERROR_MESSAGE[0])
            }
        });
        return false;
    });*/
    $('.s1feedback input.intext').keyup(function(){
        $(this).removeClass('err');
    });
    $(document).mouseup(function (e) {
        var $cont = $(".s1fb_msg");
        if ($cont.has(e.target).length === 0){$cont.fadeOut(200);}
    });

    // Цели для яндекс метрики
    $(".vilka_feedback > form").on("submit", function() {
        let form = $(this);
        let id = form.attr("data-form-id");
        switch (id) {
            case "5621009edf431":
                yaCounter57283042.reachGoal('zvonok');
                break;
            case "1621009edf431":
                yaCounter57283042.reachGoal('raschet_proekt');
                break;
            case "561fc95e15374":
                yaCounter57283042.reachGoal('callback');
                break;
            case "calc_form_feedback":
                yaCounter57283042.reachGoal('order');
                break;
            case "ipoteka_form_feedback":
                yaCounter57283042.reachGoal('ipoteka');
                break;
        }
    });
});


// Инициализация recaptcha
var recaptcha_5621009edf431;
var recaptcha_1621009edf431;
var recaptcha_561fc95e15374;
var recaptcha_calc_form_feedback;
var recaptcha_ipoteka_form_feedback;

var sitekey = '6LenG90UAAAAAAa5KpFMYMTdW18fWEWO-e-h66kS';

function recaptchaCallback() {
    if ($("div").is("#recaptcha_5621009edf431"))
        recaptcha_5621009edf431 = grecaptcha.render('recaptcha_5621009edf431', {'sitekey': sitekey});
    if ($("div").is("#recaptcha_1621009edf431"))
        recaptcha_1621009edf431 = grecaptcha.render('recaptcha_1621009edf431', {'sitekey': sitekey});
    if ($("div").is("#recaptcha_561fc95e15374"))
        recaptcha_561fc95e15374 = grecaptcha.render('recaptcha_561fc95e15374', {'sitekey': sitekey});
    if ($("div").is("#recaptcha_calc_form_feedback"))
        recaptcha_calc_form_feedback = grecaptcha.render('recaptcha_calc_form_feedback', {'sitekey': sitekey});
    if ($("div").is("#recaptcha_ipoteka_form_feedback"))
        recaptcha_ipoteka_form_feedback = grecaptcha.render('recaptcha_ipoteka_form_feedback', {'sitekey': sitekey});
}