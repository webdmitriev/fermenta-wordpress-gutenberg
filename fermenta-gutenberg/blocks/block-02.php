<?php
/**
 * Conference - Block
 */

$block_path       = 'block-02';
$gutenberg_title  = 'Block - 02';

$block_style = get_template_directory_uri() . '/fermenta-gutenberg/images/block-02-styles.jpg';

$allowed_tags = array(
  'br'   => array()
);

$id_scroll      = get_field('id_scroll');
$bg_gradient    = get_field('bg_gradient') ? "background: linear-gradient(270deg, #cdaf9d 0%, #cacaca 100%);" : false;
$style_display  = get_field('style_display');

$title_width  = "max-width: 100%;margin-bottom: 40px;";
$descr_width  = "max-width: 100%;";
$reverse      = "left";

if($style_display == "style-01") {
  $title_width    = "max-width: 180px;";
  $descr_width    = "max-width: calc(100% - 240px);";
  $reverse        = "left";
} else if($style_display == "style-02") {
  $title_width    = "max-width: 620px;";
  $descr_width    = "max-width: calc(100% - 680px);";
  $reverse        = "left";
} else if($style_display == "style-03") {
  $title_width    = "max-width: 540px";
  $descr_width    = "max-width: calc(100% - 600px);";
  $reverse = "right";
} else if($style_display == "style-04") {
  $title_width    = "max-width: 100%;";
  $descr_width    = "max-width: 100%;";
  $reverse        = "left";
}

$title          = wp_kses(get_field('title'), $allowed_tags);
$descr          =  wp_kses(get_field('descr'), $allowed_tags);
?>

<!-- <?= $block_path; ?> (start) -->
<section class="description" id="<?php echo $id_scroll; ?>" style="<?= $bg_gradient; ?>">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenber-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><img style="width:100%;height:inherit;object-fit:contain;" src="<?php echo esc_url($block_style); ?>" alt="" /></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <div class="line-wrap df-sp-ce w-100p <?= 'description-'.$reverse; ?>" style="max-width: 1010px; margin: 0 auto">
        <?php if($title): ?><h2 class="h2" style="<?= $title_width; ?>"><?php echo $title; ?></h2><?php endif; ?>
        <?php if($descr): ?><p class="descr" style="<?= $descr_width; ?>"><?php echo $descr; ?></p><?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
