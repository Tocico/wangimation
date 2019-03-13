// slide show med hjälp av swiper.js
 var swiper = new Swiper('.swiper-container', {
   slidesPerView: 3,
   spaceBetween: 20,
   slidesPerGroup: 1,

  freeMode: true,
   loop: true,
   pagination: {
     el: '.swiper-pagination',
     clickable: true,
     type: 'bullets',
     renderBullet: function (index, className) {
         //visa nummer
         return '<span class="' + className + '">' + '0'+ (index + 1 ) + '</span>'; 
     }
   },
   autoplay: {
     delay: 5000,
     disableOnInteraction: false,
   },
   navigation: {
     nextEl: '.swiper-button-next',
     prevEl: '.swiper-button-prev',
   },
   breakpoints: {
 510: {
   slidesPerView: 2,
   spaceBetween: 10,
  
 },
 425: {
   slidesPerView: 1,
   centeredSlides : true,
   spaceBetween: 0,
   
 }
}
 });
 

// scroll effect animation
$(window).on('load scroll', function(){

let elem = $('.animated');

elem.each(function () {

let isAnimate = $(this).data('animate');
let elemOffset = $(this).offset().top;
let scrollPos = $(window).scrollTop();
let wh = $(window).height();

if(scrollPos > elemOffset - wh + (wh / 2)){
 $(this).addClass(isAnimate);
}else{
 $(this).removeClass(isAnimate);
}
});

});

// smooth scroll
$(function(){
$('a[href^="#"]').click(function(){
 var speed = 1100;
 var href= $(this).attr("href");
 var target = $(href == "#" || href == "" ? 'html' : href);
 var position = target.offset().top;
 $("html, body").animate({scrollTop:position}, speed, "swing");
 return false;
});
});