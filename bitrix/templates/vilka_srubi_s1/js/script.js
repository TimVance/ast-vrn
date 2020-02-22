var $ = jQuery.noConflict();

$.fn.equivalentH = function (options){
    options = $.extend({
        mainblock:$(this).parent(),
        name: '.name'
    }, options);

    var $blocks = $(this);

    function resize (){
        var maxH = 1,
            parent_w = $(options.mainblock).width(),
            block_w = $blocks.eq(0).width(),
            count_blocks = Math.floor(parent_w / block_w),
            last_index = 0,
            tmp_schet = 0;

        //alert( parent_w + ' / ' +block_w + ' = '+count_blocks);
        //������ ��������� ������ ������� ����� � ������������
        $blocks.each(function(ind){
            maxH = ( $(options.name, this).outerHeight() > maxH ) ? $(options.name, this).outerHeight() : maxH;

            tmp_schet += 1;

            if((ind+1) % count_blocks == 0 || ($blocks.length == (ind+1))) {

                while (tmp_schet > 0) {
                    tmp_schet --;
                    $blocks.eq(ind-tmp_schet).find(options.name).height(maxH);
                    //$blocks.eq(ind-tmp_schet).children('.height').html(maxH +" | "+tmp_schet+' | '+(ind-tmp_schet));
                }
                //$blocks.eq(ind).css('background', '#000');
                maxH = 1;
            }
        });
    }


    $(options.mainblock).waitForImages(function(){


        setTimeout(resize, 200);
        //alert('asdasd2345');
    });
    var resid = 0;
    $(window).resize(function() {
        if(resid == 0){
            setTimeout(resize, 200);
            resid = 1;
        }
        else {
            resid = 0;
        }
    })
};

$(function(){
    $('.fb').fancybox({
        padding: 0
    });
    $('.fbt').fancybox({
        padding: 0,
        helpers : {
            thumbs : true
        },
        image: {
            // Wait for images to load before displaying
            //   true  - wait for image to load and then display;
            //   false - display thumbnail and load the full-sized image over top,
            //           requires predefined image dimensions (`data-width` and `data-height` attributes)
            preload: false
        },
    });

    $('.back_call_bt').on('click', function(){
        $.fancybox({
            padding: 0,
            content: $('.back_call')
        });

        return false;
    });


    $('.calc_pr').on('click', function(){
        $.fancybox({
            padding: 0,
            content: $('.calc_project')
        });

        return false;
    });


});
