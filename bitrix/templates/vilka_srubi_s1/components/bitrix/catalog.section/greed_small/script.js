$(function(){

    $.fn.equivalentH = function (){
        var $blocks = $(this);
        $('.projects').waitForImages(function(){
            var maxH    = $blocks.eq(0).height(), //примем за максимальную высоту - высоту первого блока в выборке и запишем ее в переменную maxH
                parent_w= $('.projects').width(),
                block_w = $blocks.eq(0).width(),
                count_blocks = Math.floor(parent_w / block_w),
                last_index = 0,
                tmp_schet = 0;

            //alert( parent_w + ' / ' +block_w + ' = '+count_blocks);
            //делаем сравнение высоты каждого блока с максимальной
            $blocks.each(function(ind){
                maxH = ( $(this).height() > maxH ) ? $(this).height() : maxH;
                tmp_schet += 1;


                if((ind+1) % count_blocks == 0 || ($blocks.length == (ind+1))) {

                    while (tmp_schet > 0) {
                        tmp_schet --;
                        $blocks.eq(ind-tmp_schet).height(maxH);
                        //$blocks.eq(ind-tmp_schet).children('.height').html(maxH +" | "+tmp_schet+' | '+(ind-tmp_schet));
                    }
                    //$blocks.eq(ind).css('background', '#000');
                    maxH = 1;
                }
            });
        });


        //$blocks.height(maxH);
    };
    $('.projects .item').equivalentH();

});