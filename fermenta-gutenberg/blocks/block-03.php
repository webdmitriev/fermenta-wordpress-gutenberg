<?php
/**
 * Conference - Block
 */

$block_path = 'block-03';
$gutenberg_title = 'Block - 03';

$url = get_template_directory_uri();
$image_base64 = 'data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==';

$allowed_tags = array(
  'br'   => array()
);

$title    = wp_kses(get_field('title'), $allowed_tags);
$points   = get_field("points");
$bg_1920  = get_field('bg_1920') ? "background-image: url(" . esc_url(get_field('bg_1920')) . ")"  : false;

?>

<!-- <?= $block_path; ?> (start) -->
<section class="they-trust df-ce-ce" style="<?php echo $bg_1920; ?>">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenber-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <div class="line-wrap w-100p">
        <?php if($title): ?><h2 class="h2"><?php echo $title; ?></h2><?php endif; ?>

        <div class="trust-items">
          <?php if( have_rows('points') ) : while ( have_rows('points') ) : the_row(); ?>
            <div class="trust-item df-sp-ce w-100p">
              <img src="<?php echo esc_url(get_sub_field('icon')); ?>" alt="" />
              <p class="descr"><?php echo wp_kses(get_sub_field('descr'), $allowed_tags); ?></p>
            </div>
          <?php endwhile; endif; ?>
        </div>

      </div>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
