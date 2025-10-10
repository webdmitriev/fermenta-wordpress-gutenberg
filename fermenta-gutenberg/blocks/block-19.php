<?php
/**
 * Conference - Block
 */

$block_path = 'block-19';
$gutenberg_title = 'Block - 19';

$url = get_template_directory_uri();
$image_base64 = 'data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==';

$allowed_tags = array(
  'br'   => array()
);

$image = get_field('image') ? esc_url(get_field('image')) : $image_base64;
$params = get_field('params'); // param, value
$descr = wp_kses(get_field('descr'), $allowed_tags);
$schedule = get_field('schedule'); // (image)
$btns = get_field('btns'); // btn_name, btn_file

?>

<!-- <?= $block_path; ?> (start) -->
<section class="store-product">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenber-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <img src="<?= $image; ?>" alt="www" class="product-thumbnail" />
      <div class="product-params">
        <span class="params-title">Спецификация</span>

        <?php if( have_rows('params') ): while ( have_rows('params') ): the_row(); ?>
          <div class="params-items">
            <div class="params-item"><?= get_sub_field('param'); ?></div>
            <div class="params-item"><?= get_sub_field('value'); ?></div>
          </div>
        <?php endwhile; endif; ?>

        <button class="store-btn">Оставить заявку</button>
      </div>
      <div class="product-content">
        <?php if($descr): ?><p class="descr"><?= $descr; ?></p><?php endif; ?>
        <?php if($schedule): ?><img src="<?= $schedule; ?>" alt="www" /><?php endif; ?>

        <?php if( have_rows('btns') ): while ( have_rows('btns') ): the_row(); ?>
          <a href="<?= get_sub_field('btn_file'); ?>" class="store-btn" download><?= get_sub_field('btn_name'); ?></a>
        <?php endwhile; endif; ?>

      </div>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
