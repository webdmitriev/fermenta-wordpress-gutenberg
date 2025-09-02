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

$title    = get_field('title');
$image    = get_field('image');
$bg_1920  = get_field('bg_1920') ? "background-image: url(" . esc_url(get_field('bg_1920')) . ")"  : false;

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
      <?php if($title): ?><h1 class="h1"><?php echo wp_kses($title, $allowed_tags); ?></h1><?php endif; ?>
      <?php if($image): ?><img class="exclude-white" src="<?php echo esc_url($image); ?>" alt="" /><?php endif; ?>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
