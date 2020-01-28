$(function(){
    $('.slider .row').waitForImages(function() {
        $('.slider .row').fadeIn(500);
        $('.loader').hide();
        $('.main_slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: '.vert_slider'
        });
        $('.vert_slider').slick({
            vertical: true,
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: '.main_slider',
            /*dots: true,*/
            centerMode: true,
            centerPadding: '0px',
            focusOnSelect: true,
            responsive: [
                /*{
                    breakpoint: 994,
                    settings: {
                        vertical: false
                    }
                },*/
                {
                    breakpoint: 768,
                    settings: {
                        vertical: false
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        vertical: false
                    }
                }
            ]
            
        });
    });


    $('.slide_menu a').on('click', function(){
        var id = $(this).attr('data-id');
        $('.main_slider').slick('slickGoTo', id);
        $('.slide_menu a').removeClass('selected');
        $(this).addClass('selected');
        return false;
    });


    $('.order').on('click', function(){
        $.fancybox({
            padding: 0,
            content: $('.order_proj')
        });
        var $parent = $(this).parent('div'),
            item_name = $('.cont_top_bg h1').text();
        $('.order_proj #FORM_WHAT_FID_order').val(item_name + ' (' +$('.name',$parent).text()+')');
        return false;
    });

    $('.calculator .zz_btn').on('click', function(){
        $('.order_calculator .popformzag').text($(this).attr("data-message"));
        var project = $('h1').text();
        $('.order_calculator #FORM_PROJECT_FID_calc_form_feedback').val(project);
        $.fancybox({
            padding: 0,
            content: $('.order_calculator')
        });
        var type = $('.calculator .type input:checked').parent().find('.name').text();
        $('.order_calculator #FORM_TYPE_FID_calc_form_feedback').val(type);
        var complect = '';
        $('.calculator .complect input:checked').each(function() {
            complect += $(this).parent().find(".name").text() + '; ';
        });
        $('.order_calculator #FORM_COMPLECT_FID_calc_form_feedback').val(complect);
        return false;
    });

});

// Calculator
window.onload = function () {
    let input = document.querySelectorAll('.calculator input');
    for (let i = 0; i < input.length; i++) {
        input[i].addEventListener('change', calcSum);
    }
    function calcSum() {
        let amount = 0;
        for (let i = 0; i < input.length; i++) {
            if (input[i].checked) {
                amount += parseInt(input[i].getAttribute('data'));
            }
        }
        if (amount >= 0) {
            let sum = document.querySelector('.sum');
            let span = document.querySelector('.sum span');
            span.textContent = priceSet(parseInt(sum.getAttribute('data')) + amount);
        }
    }
    calcSum();
    function priceSet(data) {
        var price = Number.prototype.toFixed.call(parseFloat(data) || 0, 0);
        return price.replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1 ");
    };
}