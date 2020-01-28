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
});