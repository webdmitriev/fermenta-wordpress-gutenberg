<?php
/**
 * Conference - Block
 */

$block_path = 'block-15';
$gutenberg_title = 'Block - 15';

$url = get_template_directory_uri();
$image_base64 = 'data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==';

$allowed_tags = array(
  'br'   => array()
);

$title      = wp_kses(get_field('title'), $allowed_tags);
$is_bigger  = get_field('is_bigger');
$reverse    = get_field('reverse') ? 'style="margin: 0 0 0 auto;"' : '';
$btn_text   = wp_kses(get_field('btn_text'), $allowed_tags);
$btn_link   = esc_url(get_field('btn_link')) ?? '';
$bg_1920    = get_field('bg_1920') ? "background-image: url(" . esc_url(get_field('bg_1920')) . ")"  : false;

?>

<!-- <?= $block_path; ?> (start) -->
<section class="contrast" style="<?php echo $bg_1920; ?>">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenber-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <div class="contrast-block" <?php echo $reverse; ?>>
        <?php if($title): ?><p class="descr <?= $is_bigger ? 'descr-bigger' : ''; ?>"><?php echo $title; ?></p><?php endif; ?>
        <?php if($btn_text): ?><a href="<?php echo $btn_link; ?>" class="contrast-link"><?php echo $btn_text; ?></a><?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
