$(function(){
    $('.accordion > li').click(function(){
        $(this).children("figure").slideToggle(300); 
    })
})