$(function() {
    $(".tags-list .showmore").click(function () {
        $(this).parent().children().fadeIn();
        $(this).remove();
    });
});