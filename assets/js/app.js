document.addEventListener('DOMContentLoaded', function () {

  $('body').on('click', '.popup-close, .overlay', function () {
    $('.popup, .overlay').removeClass('active');
    $('.popup-video video').attr('src', '');
  })

  // плавный скролл
  $("a.ancLinks").click(function () {
    var elementClick = $(this).attr("href");

    if ($("body").find(`${elementClick}`).length) {
      var destination = $(elementClick).offset().top;
      $("html,body").animate({ scrollTop: destination }, 1100);
    } else {
      window.location.href = `index.html${elementClick}`;
    }

    return false;
  });


  // header
  setTimeout(() => {
    $(".menu-item-has-children").each((idx, el) => {
      const div = document.createElement('div');
      div.classList.add("menu-item-has-children-open")
      div.innerHTML = `<svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.63654 5.29279C1.82406 5.10532 2.07837 5 2.34354 5C2.6087 5 2.86301 5.10532 3.05054 5.29279L8.00054 10.2428L12.9505 5.29279C13.1391 5.11063 13.3917 5.00983 13.6539 5.01211C13.9161 5.01439 14.1669 5.11956 14.3524 5.30497C14.5378 5.49038 14.6429 5.74119 14.6452 6.00339C14.6475 6.26558 14.5467 6.51818 14.3645 6.70679L8.70754 12.3638C8.52001 12.5513 8.2657 12.6566 8.00054 12.6566C7.73537 12.6566 7.48106 12.5513 7.29354 12.3638L1.63654 6.70679C1.44907 6.51926 1.34375 6.26495 1.34375 5.99979C1.34375 5.73462 1.44907 5.48031 1.63654 5.29279Z" fill="black" /></svg>`
      el.append(div)
    })

    handlerOpenSubmenu()
  }, 800);

  function handlerOpenSubmenu() {
    $(".header").on("click", ".menu-item-has-children-open", function () {
      console.log($(this).parents(".menu-item-has-children"));
      $(this).parents(".menu-item-has-children").toggleClass("open")
    })
  }

  $(".header").on("click", ".header-burger", function () {
    $(".mainnav").toggleClass("_active")
  })


  // form
  $(".choice-data").on("click", ".choice-data__label", function () {
    $(this).parents(".choice-data").toggleClass("_open")
  })
  $(".choice-data").on("click", ".choice-data__item", function () {
    $(this).parents(".choice-data").find(".choice-data__label").text($(this).text())
    $(this).parents(".choice-data").removeClass("_open")
  })

});