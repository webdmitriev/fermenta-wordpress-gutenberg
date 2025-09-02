<?php
/**
 * Conference - Block
 */

$block_path = 'block-13';
$gutenberg_title = 'Block - 13';

$url = get_template_directory_uri();
$image_base64 = 'data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==';

$allowed_tags = array(
  'br'   => array()
);

$title    = wp_kses(get_field('title'), $allowed_tags);
$btn_text = wp_kses(get_field('btn_text'), $allowed_tags);
$btn_file = esc_url(get_field('btn_file')) ?? '';

?>

<!-- <?= $block_path; ?> (start) -->
<section class="catalog-block">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenber-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <?php if($title): ?><h3 class="h3" style="color: #d7e0d5;"><?php echo $title; ?></h3><?php endif; ?>
      <?php if($btn_text): ?><a href="<?php echo $btn_file; ?>" download class="catalog-link"><?php echo $btn_text; ?></a><?php endif; ?>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
