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

  $('.news-post .post-top-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false,
    fade: true,
    asNavFor: '.post-bottom-slider'
  });
  $('.news-post .post-bottom-slider').slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    asNavFor: '.post-top-slider',
    dots: false,
    centerMode: true,
    focusOnSelect: true,
    prevArrow: $('.news-post .post-arrows .post-arrow-prev'),
    nextArrow: $('.news-post .post-arrows .post-arrow-next'),
    responsive: [
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1,
        }
      }
    ]
  });

})
