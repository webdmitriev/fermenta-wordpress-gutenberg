<?php
/**
 * Conference - Block
 */

$block_path = 'block-16';
$gutenberg_title = 'Block - 16';

$url = get_template_directory_uri();
$image_base64 = 'data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==';

$allowed_tags = array(
  'br'   => array()
);

$text = wp_kses(get_field('text'), $allowed_tags);
$link = esc_url(get_field('link'));
$bg_1920  = get_field('bg_1920') ? "background-image: url(" . esc_url(get_field('bg_1920')) . ")"  : false;

?>

<!-- <?= $block_path; ?> (start) -->
<section class="news-filters" style="<?php echo $bg_1920; ?>">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenber-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <div class="news-search-bar">
        <input type="text" name="search" placeholder="Поиск" />
      </div>

      <div class="news-selectors df-fs-ce w-100p">
        <div class="news-selector">
          <div class="selector-label">Тип</div>
          <div class="selector-items">
            <div class="selector-item">item 01</div>
            <div class="selector-item">item 02</div>
          </div>
        </div>
        <div class="news-selector">
          <div class="selector-label">Категория</div>
          <div class="selector-items">
            <div class="selector-item">item 01</div>
            <div class="selector-item">item 02</div>
          </div>
        </div>
        <!-- <div class="news-selector">
          item
        </div> -->
      </div>

    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
