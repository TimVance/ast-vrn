$(function(){

    $('.zayavka .btn').on('click', function(){

        $('.zz .s1feedback_cont textarea').val($('.serv_ord').html());

        $.fancybox.open( $('.zz'), {
            maxWidth	: 350,
            //maxHeight	: 450,
            fitToView	: true,
            //width		: '70%',
            //height		: '70%',
            autoSize	: true,
            closeClick	: false,
            openEffect	: 'none',
            closeEffect	: 'none'
        });
        return false;
    });
});