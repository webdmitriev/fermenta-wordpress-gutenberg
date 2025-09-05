<?php
/**
 * Conference - Block
 */

$block_path = 'block-16';
$gutenberg_title = 'Block - 16';

$url = get_template_directory_uri();
$image_base64 = 'data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==';

$allowed_tags = array(
  // 'br'   => array()
);

$text = wp_kses(get_field('text'), $allowed_tags);
$link = esc_url(get_field('link'));

$args = array(
  'post_type' 			=> 'post',
  'posts_per_page' 	=> 99,
  'order' 					=> 'DESC',
);

?>

<!-- <?= $block_path; ?> (start) -->
<section class="news-filters">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenber-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <div class="news-search-bar">
        <input type="text" name="search" placeholder="Поиск по названию..." class="news-search-input" />
        <button class="news-search-clear" style="display: none;">×</button>
      </div>

      <div class="news-selectors df-fs-ce w-100p">
        <div class="news-selector news-filter-js">
          <div class="selector-label">Тип</div>
          <div class="selector-items">
            <?php
            $categories = get_categories();
            if (!empty($categories)) :
              foreach ($categories as $cat) : ?>
                <div class="selector-item"><?php echo esc_html($cat->name); ?></div>
              <?php endforeach;
            endif;
            ?>
          </div>
        </div>

        <div class="news-selector news-filter-js">
          <div class="selector-label">Категория</div>
          <div class="selector-items">
            <div class="selector-item">Новости</div>
            <div class="selector-item">Мероприятия</div>
            <div class="selector-item">Писос</div>
          </div>
        </div>

        <div class="news-calendar">
          <div id="open-calendar">Выбрать даты</div>
          <div id="calendar-container">
            <div id="calendar"></div>
          </div>
        </div>

        <div id="calendar-container" style="display: none;">
          <div id="calendar"></div>
          <button id="reset-date-filter" class="reset-date-btn">Сбросить даты</button>
        </div>
      </div>

      <!-- Добавьте этот блок между фильтрами и постами -->
      <div id="selected-filters-display" class="selected-filters" style="display: none;">
        <div class="selected-filters__header">
          <h3>Выбранные фильтры:</h3>
          <button class="selected-filters__clear-all">Очистить все</button>
        </div>
        <div class="selected-filters__list">
          <!-- Сюда будут добавляться выбранные фильтры -->
        </div>
      </div>

      <div class="news-articles">
        <?php
          query_posts( $args );

          if (have_posts()) : while (have_posts()) : the_post();
          $thumbnail = get_the_post_thumbnail_url();

          // Получаем ACF категории
          $acf_categories = get_field('category', get_the_ID());
          $acf_clean = is_array($acf_categories) ? $acf_categories : array($acf_categories);

          // Получаем WordPress категории
          $wp_categories = wp_list_pluck(get_the_category(), 'name');

          // Объединяем и очищаем
          $all_categories = array_unique(array_filter(
            array_merge(
              is_array($acf_clean) ? $acf_clean : array($acf_clean),
              $wp_categories
            )
          ));

        ?>
          <a href="<?php the_permalink(); ?>" class="news-article" style="background-image: url(<?= $thumbnail; ?>)" data-filter="<?php echo implode(', ', $all_categories); ?>" data-date="<?php echo get_field("date", get_the_ID()) ?>" aria-label="Читать статью: <?php the_title_attribute(); ?> title="<?php the_title_attribute(); ?>">
            <div class="news-article__content">
              <span class="news-article-ff news-article__date"><?php echo get_field("date", get_the_ID()) ?></span>
              <h3 class="news-article-ff news-article__title"><?php the_title(); ?></h3>
              <p class="news-article-ff news-article__descr" itemprop="description"><?php echo wp_kses(get_field('descr', get_the_ID()), $allowed_tags) ?></p>
              <p class="news-article-ff news-article__link" aria-hidden="true">Читать дальше</p>
            </div>
          </a>
        <?php endwhile; endif; ?>
        <?php wp_reset_query(); ?>

      </div>

    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
