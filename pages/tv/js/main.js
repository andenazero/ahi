/* The first slider*/

$('.slider-one').slick({
    dots: true,
    infinite: true,
    speed: 3000,
    fade: true,
    cssEase: 'linear',
    autoplay:true,
        autoplaySpeed:30000,
        dots:true,
        prevArrow:".site-slider .slider-btn .prev",
        nextArrow:".site-slider .slider-btn .next"
  })


$('.slider-two')
.not(".slick-initialized")
    .slick({
        autoplay:true,
        autoplaySpeed:5000,
        dots:true,
        prevArrow:".site-slider .slider-btn .prev",
        nextArrow:".site-slider .slider-btn .next"
    });