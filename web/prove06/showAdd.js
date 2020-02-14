$(function(){
    $('.accordion > p').click(function(){
        $(this).children("form").slideToggle(300); 
    })
})