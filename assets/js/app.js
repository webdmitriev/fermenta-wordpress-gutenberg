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

  // $(".news-selectors").on("click", ".selector-item", function () {
  //   $(this).toggleClass("active")

  //   newsFilter()
  // })

  // calendar
  $(function () {
    window.selectedStartDate = null;
    window.selectedEndDate = null;

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

        if (!window.selectedStartDate || window.selectedEndDate) {
          window.selectedStartDate = selected;
          window.selectedEndDate = null;
        } else if (selected >= window.selectedStartDate) {
          window.selectedEndDate = selected;
          newsFilter(); // После выбора диапазона запускаем фильтрацию
          updateSelectedFiltersDisplay(); // Обновляем отображение
        } else {
          window.selectedEndDate = window.selectedStartDate;
          window.selectedStartDate = selected;
          newsFilter();
          updateSelectedFiltersDisplay();
        }

        console.log("Диапазон:", formatDate(window.selectedStartDate), "-",
          window.selectedEndDate ? formatDate(window.selectedEndDate) : "...");
        $(this).datepicker("refresh");
      },
      beforeShowDay: function (date) {
        if (window.selectedStartDate && window.selectedEndDate) {
          if (date >= window.selectedStartDate && date <= window.selectedEndDate) {
            return [true, "range-date", "В диапазоне"];
          }
        } else if (window.selectedStartDate && +date === +window.selectedStartDate) {
          return [true, "range-date", "Начало"];
        }
        return [true, "", ""];
      }
    });

    // открыть календарь по кнопке
    $("#open-calendar").on("click", function () {
      $("#calendar-container").toggle();
      $(this).toggleClass("_open");
      $(".news-selectors .news-selector").removeClass("_open");
    });

    function formatDate(date) {
      let d = String(date.getDate()).padStart(2, "0");
      let m = String(date.getMonth() + 1).padStart(2, "0");
      let y = date.getFullYear();
      return d + "." + m + "." + y;
    }
  });

  // news - filter
  $(".handler-filter").on("click", newsFilter)

  function newsFilter() {
    console.log('Фильтрация запущена');

    const searchText = $('.news-search-input').val().trim();

    // Если есть поисковый запрос - очищаем его при использовании фильтров
    if (searchText !== '') {
      clearSearch();
    }

    // Получаем выбранные категории
    const selectedFilters = Array.from(
      document.querySelectorAll('.news-filter-js .selector-item.active')
    ).map(el => el.textContent.trim());

    // Получаем выбранный диапазон дат
    const startDate = window.selectedStartDate ? new Date(window.selectedStartDate) : null;
    const endDate = window.selectedEndDate ? new Date(window.selectedEndDate) : null;
    const hasDateFilter = startDate && endDate;

    // Обновляем отображение выбранных фильтров
    updateSelectedFiltersDisplay();

    // Если нет активных фильтров - показываем все
    if (selectedFilters.length === 0 && !hasDateFilter) {
      $('.news-article').show();
      $('#no-posts-message').hide();
      $('#no-search-results').remove();
      return;
    }

    let foundPosts = 0; // Счетчик найденных постов

    $('.news-article').each((i, el) => {
      const $el = $(el);
      const articleFilters = $el.attr("data-filter");
      const articleDateStr = $el.attr("data-date");

      let matchesCategories = true;
      let matchesDate = true;

      // Проверяем категории (если есть выбранные)
      if (selectedFilters.length > 0) {
        if (!articleFilters) {
          matchesCategories = false;
        } else {
          const articleFilterArray = articleFilters.split(',').map(f => f.trim());
          matchesCategories = selectedFilters.some(filter =>
            articleFilterArray.includes(filter)
          );
        }
      }

      // Проверяем дату (если выбран диапазон)
      if (hasDateFilter && articleDateStr) {
        const articleDate = parseDateString(articleDateStr);
        if (articleDate) {
          matchesDate = articleDate >= startDate && articleDate <= endDate;
        } else {
          matchesDate = false; // Если дата невалидна
        }
      }

      // Показываем если совпадают все активные фильтры
      if (matchesCategories && matchesDate) {
        $el.show();
        foundPosts++;
      } else {
        $el.hide();
      }
    });

    // Показываем сообщение если нет результатов
    if (foundPosts === 0) {
      showNoPostsMessage(selectedFilters, startDate, endDate);
    } else {
      $('#no-posts-message').hide();
    }

    // Удаляем сообщение о поиске если оно есть
    $('#no-search-results').remove();
  }

  // Функция для парсинга даты из формата "dd.mm.yyyy"
  function parseDateString(dateStr) {
    if (!dateStr) return null;

    const parts = dateStr.split('.');
    if (parts.length !== 3) return null;

    const day = parseInt(parts[0], 10);
    const month = parseInt(parts[1], 10) - 1; // Месяцы в JS: 0-11
    const year = parseInt(parts[2], 10);

    if (isNaN(day) || isNaN(month) || isNaN(year)) return null;

    return new Date(year, month, day);
  }

  // Обновленная функция для показа сообщения
  function showNoPostsMessage(selectedFilters, startDate, endDate) {
    let $message = $('#no-posts-message');

    if ($message.length === 0) {
      $message = $('<div id="no-posts-message" class="no-posts-message"></div>');
      $('.news-articles').after($message);
    }

    // Формируем текст сообщения
    let messageText = '';

    if (selectedFilters.length > 0) {
      messageText += `По категориям: <strong>${selectedFilters.join(', ')}</strong>`;
    }

    if (startDate && endDate) {
      if (messageText) messageText += '<br>';
      messageText += `За период: <strong>${formatDateDisplay(startDate)} - ${formatDateDisplay(endDate)}</strong>`;
    }

    $message.html(`
        <div class="no-posts-content">
            <h3>Постов не найдено</h3>
            <p>${messageText}</p>
            <p>Попробуйте изменить параметры фильтрации</p>
            <button class="reset-filters-btn">Сбросить все фильтры</button>
        </div>
    `);

    // Обработчик для кнопки сброса
    $message.find('.reset-filters-btn').on('click', function () {
      $('.news-filter-js .selector-item').removeClass('active');
      resetDateFilter();
      newsFilter();
    });

    $message.show();
  }

  // Функция для форматирования даты в читаемый вид
  function formatDateDisplay(date) {
    return date.toLocaleDateString('ru-RU', {
      day: '2-digit',
      month: '2-digit',
      year: 'numeric'
    });
  }

  // Функция сброса фильтра дат
  function resetDateFilter() {
    window.selectedStartDate = null;
    window.selectedEndDate = null;
    $('#calendar').datepicker('setDate', null);
    // Можно также сбросить визуальное отображение диапазона
  }

  // Функция для обновления отображения выбранных фильтров
  function updateSelectedFiltersDisplay() {
    const $display = $('#selected-filters-display');
    const $list = $display.find('.selected-filters__list');

    // Очищаем список
    $list.empty();

    // Получаем выбранные категории
    const selectedCategories = Array.from(
      document.querySelectorAll('.news-filter-js .selector-item.active')
    ).map(el => ({
      text: el.textContent.trim(),
      type: 'category'
    }));

    // Получаем выбранный диапазон дат
    const startDate = window.selectedStartDate;
    const endDate = window.selectedEndDate;

    let hasFilters = false;

    // Добавляем категории
    selectedCategories.forEach(category => {
      $list.append(createFilterItem(category.text, 'category'));
      hasFilters = true;
    });

    // Добавляем диапазон дат (если есть)
    if (startDate && endDate) {
      const dateRangeText = `${formatDateDisplay(startDate)} - ${formatDateDisplay(endDate)}`;
      $list.append(createFilterItem(dateRangeText, 'date'));
      hasFilters = true;
    }

    // Показываем или скрываем блок в зависимости от наличия фильтров
    if (hasFilters) {
      $display.slideDown(300);
    } else {
      $display.slideUp(300);
    }
  }

  // Функция создания элемента фильтра
  function createFilterItem(text, type) {
    const isDate = type === 'date';
    const cssClass = isDate ? 'selected-date-range' : 'selected-filter-item';

    return `
        <div class="${cssClass}">
            <span>${text}</span>
            <button class="selected-filter-item__remove" 
                    data-type="${type}" 
                    data-value="${isDate ? 'date-range' : encodeURIComponent(text)}">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path d="M7 7L17 17M7 17L17 7" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </button>
        </div>
    `;
  }

  // Обработчик удаления отдельного фильтра
  $(document).on('click', '.selected-filter-item__remove', function () {
    const $button = $(this);
    const filterType = $button.data('type');
    const filterValue = decodeURIComponent($button.data('value'));

    if (filterType === 'category') {
      // Находим и деактивируем соответствующий фильтр категории
      $(`.news-filter-js .selector-item:contains("${filterValue}")`).removeClass('active');
    } else if (filterType === 'date') {
      // Сбрасываем фильтр дат
      resetDateFilter();
    }

    // Запускаем фильтрацию и обновляем отображение
    newsFilter();
    updateSelectedFiltersDisplay();
  });

  // Обработчик кнопки "Очистить все"
  $('.selected-filters__clear-all').on('click', function () {
    // Сбрасываем категории
    $('.news-filter-js .selector-item.active').removeClass('active');

    // Сбрасываем даты
    resetDateFilter();

    // Запускаем фильтрацию и обновляем отображение
    newsFilter();
    updateSelectedFiltersDisplay();
  });

  // Функция очистки всех фильтров (кроме поиска)
  function clearAllFilters() {
    // Очищаем категории
    $('.news-filter-js .selector-item.active').removeClass('active');

    // Очищаем даты
    resetDateFilter();

    // Обновляем отображение выбранных фильтров
    updateSelectedFiltersDisplay();
  }

  // Функция очистки поиска
  function clearSearch() {
    $('.news-search-input').val('');
    $('.news-search-clear').hide();
    // Убираем подсветку
    $('.news-article').each(function () {
      removeHighlights($(this));
    });
  }

  // MARK: Поиск по названию
  // Функция поиска по названию
  // Функция поиска по названию
  function newsSearch() {
    const searchText = $('.news-search-input').val().trim().toLowerCase();

    // Показываем/скрываем кнопку очистки
    $('.news-search-clear').toggle(searchText.length > 0);

    // Если поиск пустой - показываем все посты
    if (searchText === '') {
      $('.news-article').show();
      $('#no-search-results').remove();
      return;
    }

    // Очищаем фильтры при начале поиска
    clearAllFilters();

    let foundPosts = 0;

    $('.news-article').each(function () {
      const $article = $(this);
      const title = $article.find('.news-article__title').text().toLowerCase();
      const description = $article.find('.news-article__descr').text().toLowerCase();

      // Ищем в заголовке и описании
      const matchesTitle = title.includes(searchText);
      const matchesDescription = description.includes(searchText);

      if (matchesTitle || matchesDescription) {
        $article.show();
        foundPosts++;

        // Подсвечиваем найденный текст
        highlightSearchText($article, searchText);
      } else {
        $article.hide();
        removeHighlights($article);
      }
    });

    // Показываем сообщение если ничего не найдено
    if (foundPosts === 0) {
      showNoSearchResults(searchText);
    } else {
      $('#no-search-results').remove();
    }
  }

  // Функция подсветки найденного текста
  function highlightSearchText($element, searchText) {
    // Удаляем предыдущие подсветки
    removeHighlights($element);

    // Подсвечиваем в заголовке
    const $title = $element.find('.news-article__title');
    const titleHtml = $title.html();
    const highlightedTitle = titleHtml.replace(
      new RegExp(searchText, 'gi'),
      match => `<span class="search-highlight">${match}</span>`
    );
    $title.html(highlightedTitle);

    // Подсвечиваем в описании (опционально)
    const $description = $element.find('.news-article__descr');
    const descrHtml = $description.html();
    const highlightedDescr = descrHtml.replace(
      new RegExp(searchText, 'gi'),
      match => `<span class="search-highlight">${match}</span>`
    );
    $description.html(highlightedDescr);
  }

  // Функция удаления подсветки
  function removeHighlights($element) {
    $element.find('.search-highlight').each(function () {
      $(this).replaceWith($(this).text());
    });
  }

  // Функция показа сообщения "нет результатов поиска"
  function showNoSearchResults(searchText) {
    if ($('#no-search-results').length === 0) {
      $('.news-articles').after(`
            <div id="no-search-results" class="no-results-message">
                <div class="no-results-content">
                    <h3>Ничего не найдено</h3>
                    <p>По запросу: <strong>"${searchText}"</strong></p>
                    <p>Попробуйте изменить поисковый запрос</p>
                </div>
            </div>
        `);
    } else {
      $('#no-search-results').find('strong').text(`"${searchText}"`);
    }
  }

  // Обработчики событий
  $(document).ready(function () {
    // Поиск при вводе текста (с задержкой)
    let searchTimeout;
    $('.news-search-input').on('input', function () {
      clearTimeout(searchTimeout);
      searchTimeout = setTimeout(function () {
        newsSearch();
      }, 300);
    });

    // Очистка поиска
    $('.news-search-clear').on('click', function () {
      clearSearch();
      $('.news-article').show(); // Показываем все посты
      $('#no-search-results').remove();
    });

    // Поиск при нажатии Enter
    $('.news-search-input').on('keypress', function (e) {
      if (e.which === 13) {
        newsSearch();
      }
    });

    // Обработчики фильтров
    $('.news-filter-js .selector-item').on('click', function () {
      $(this).toggleClass('active');
      newsFilter(); // Используем обновленную функцию
    });

    // Обработчик для календаря
    $("#calendar").datepicker({
      onSelect: function (dateText, inst) {
        let selected = $(this).datepicker("getDate");

        if (!window.selectedStartDate || window.selectedEndDate) {
          window.selectedStartDate = selected;
          window.selectedEndDate = null;
        } else if (selected >= window.selectedStartDate) {
          window.selectedEndDate = selected;
          newsFilter(); // Запускаем фильтрацию
        } else {
          window.selectedEndDate = window.selectedStartDate;
          window.selectedStartDate = selected;
          newsFilter();
        }

        $(this).datepicker("refresh");
      }
    });

    // Обработчик сброса всех фильтров
    $('.selected-filters__clear-all').on('click', function () {
      clearAllFilters();
      newsFilter();
    });
  });

});