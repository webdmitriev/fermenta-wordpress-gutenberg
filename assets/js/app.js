document.addEventListener('DOMContentLoaded', function () {

  $('body').on('click', '.popup-close, .overlay', function () {
    $('.popup, .overlay').removeClass('active');
    $('.popup-video video').attr('src', '');
  })

  // плавный скролл
  $("a.ancLinks, li.ancLinks a").click(function () {
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
    $("[name='your-theme']").val($(this).text())
  })

  $(".wpcf7-list-item").on("click", "label", function () {

    let isCompleteAll = checkInputs($(this).parents(".contacts-form"))

    if ($("input[type='checkbox']").prop('checked') && isCompleteAll) {
      $(this).parents(".contacts-form").find("button").attr("disabled", false)
    } else {
      $("input[type='checkbox']").prop('checked', false)
      $(this).parents(".contacts-form").find("button").attr("disabled", true)
    }
  })

  function checkInputs(parent) {
    let isValid = true;

    $(parent)
      .find("input.wpcf7-validates-as-required")
      .each(function () {
        if ($(this).val().trim() === "") {
          isValid = false;
          return false;
        }
      });

    return isValid;
  }

  checkInputsChange()
  function checkInputsChange() {
    $(".contacts-form input.wpcf7-validates-as-required").on("change", function () {
      $("input[type='checkbox']").prop('checked', false)
      $(this).parents(".contacts-form").find("button").attr("disabled", true)
    })
  }


  // news
  $(".news-selectors").on("click", ".selector-label", function () {
    const $thisSelector = $(this).parents(".news-selector");
    const isAlreadyOpen = $thisSelector.hasClass("_open");

    $(".news-selectors .news-selector").removeClass("_open");

    $("#calendar-container").hide();
    $("#open-calendar").removeClass("_open")

    if (!isAlreadyOpen) {
      $thisSelector.addClass("_open");
    }
  });

  $(".news-selectors").on("click", ".selector-item", function () {
    $(this).toggleClass("active")
  })

  $(function () {
    let startDate = null;
    let endDate = null;

    // Локализация
    $.datepicker.setDefaults({
      closeText: 'Закрыть',
      prevText: '‹',
      nextText: '›',
      currentText: 'Сегодня',
      monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь',
        'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
      monthNamesShort: ['Янв', 'Фев', 'Мар', 'Апр', 'Май', 'Июн',
        'Июл', 'Авг', 'Сен', 'Окт', 'Ноя', 'Дек'],
      dayNames: ['воскресенье', 'понедельник', 'вторник', 'среда', 'четверг', 'пятница', 'суббота'],
      dayNamesShort: ['вск', 'пнд', 'втр', 'срд', 'чтв', 'птн', 'сбт'],
      dayNamesMin: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт', 'Сб'],
      weekHeader: 'Нед',
      dateFormat: 'dd.mm.yy',
      firstDay: 1
    });

    $("#calendar").datepicker({
      onSelect: function (dateText, inst) {
        let selected = $(this).datepicker("getDate");

        if (!startDate || endDate) {
          // если нет startDate или уже есть диапазон → начинаем заново
          startDate = selected;
          endDate = null;
        } else if (selected >= startDate) {
          // выбрали дату после startDate → ставим endDate
          endDate = selected;
        } else {
          // если дата раньше startDate → меняем местами
          endDate = startDate;
          startDate = selected;
        }

        console.log("Диапазон:", formatDate(startDate), "-", endDate ? formatDate(endDate) : "...");
        $(this).datepicker("refresh");
      },
      beforeShowDay: function (date) {
        if (startDate && endDate) {
          if (date >= startDate && date <= endDate) {
            return [true, "range-date", "В диапазоне"];
          }
        } else if (startDate && +date === +startDate) {
          return [true, "range-date", "Начало"];
        }
        return [true, "", ""];
      }
    });

    // открыть календарь по кнопке
    $("#open-calendar").on("click", function () {
      $("#calendar-container").toggle();

      $(this).toggleClass("_open")

      $(".news-selectors .news-selector").removeClass("_open")
    });

    function formatDate(date) {
      let d = String(date.getDate()).padStart(2, "0");
      let m = String(date.getMonth() + 1).padStart(2, "0");
      let y = date.getFullYear();
      return d + "." + m + "." + y;
    }
  });

});