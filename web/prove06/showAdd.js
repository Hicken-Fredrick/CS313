$(function(){
    $('.accordion').click(function(){
        $(this).siblings("div").slideToggle(300);
    })
})