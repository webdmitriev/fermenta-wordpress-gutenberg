<?php
/**
 * Conference - Block
 */

$block_path = 'block-01';
$gutenberg_title = 'Block - 01 (main-banner)';

$url = get_template_directory_uri();

$allowed_tags = array(
  'br'   => array()
);

$colors = [
  'white'      => '#ffffff',
  'black'      => '#313131',
  'oatmeal'    => '#dacdc2',
  'taupe'      => '#6e6259',
  'eucalyptus' => '#8ca086',
  'maroon'     => '#7e4c4d',
  'pinkish'     => '#e9cccd',
];

$title        = get_field('title');
$title_color_params  = get_field('title_color') ?: '';
$title_color  = $colors[strtolower($title_color_params)] ?? '#dacdc2';

$is_icon      = get_field('is_icon');
$is_catalog   = get_field('is_catalog');
$is_map       = get_field('is_map');
$bg_1920      = get_field('bg_1920') ? "background-image: url(" . esc_url(get_field('bg_1920')) . ")"  : false;

?>

<!-- <?= $block_path; ?> (start) -->
<section class="main-banner df-ce-ce" style="<?php echo $bg_1920; ?>">
  <?php if( is_admin() ): ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenber-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ): ?>
    <div class="container">
      <?php if($title): ?><h1 class="h1" style="color: <?php echo esc_attr($title_color); ?>"><?php echo wp_kses($title, $allowed_tags); ?></h1><?php endif; ?>

      <?php if($is_icon): ?><img class="exclude-white" src="<?= $url; ?>/assets/img/icons/exclude-white.svg" alt="Icon" /><?php endif; ?>

      <?php if($is_catalog || $is_map): ?>
        <p class="descr">
          <?php if($is_catalog): ?><a href="www" style="color: <?php echo esc_attr($title_color); ?>">Каталог продуктов</a><?php endif; ?>
          <?php if($is_map): ?><a href="www" style="color: <?php echo esc_attr($title_color); ?>">Получить технологическую карту</a><?php endif; ?>
        </p>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
