$(function(){
    $('.accordion > li').click(function(){
        $(this).children("form").slideToggle(300); 
    })
})