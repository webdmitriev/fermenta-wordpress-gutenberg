document.addEventListener('DOMContentLoaded', function () {

  $('.tasks-slider').each(function () {
    const slider = $(this);
    slider.slick({
      autoplay: true,
      autoplaySpeed: 700000,
      dots: true,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      prevArrow: $('.tasks .tasks-slider__prev'),
      nextArrow: $('.tasks .tasks-slider__next'),
      appendDots: $('.tasks-slider__dots'),
      rows: 0,
      responsive: [
        {
          breakpoint: 1199,
          settings: {
            centerMode: true,
          }
        }
      ]
    });
  })

})
