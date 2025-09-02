<?php
/**
 * Conference - Block
 */

$block_path = 'block-10';
$gutenberg_title = 'Block - 10';

$url = get_template_directory_uri();
$image_base64 = 'data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==';

$allowed_tags = array(
  'br'   => array(),
  'li'   => array()
);

$title  = wp_kses(get_field('title'), $allowed_tags);
$slider = get_field("slider");

?>

<!-- <?= $block_path; ?> (start) -->
<section class="tasks">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenber-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <?php if($title): ?><h3 class="h3"><?php echo $title; ?></h3><?php endif; ?>
      <div class="tasks-wrap-slider">
        <button class="tasks-slider__arrow tasks-slider__prev"></button>
        <div class="tasks-slider">
          <?php if( have_rows('slider') ) : while ( have_rows('slider') ) : the_row();
            $thumbnail = get_sub_field('image');
          ?>
            <div class="tasks-slide">
              <div class="tasks-slide__content df-fs-ce w-100p">
                <span class="slide-title"><?php echo wp_kses(get_sub_field('title'), $allowed_tags); ?></span>
                <ul><?php echo wp_kses(get_sub_field('descr'), $allowed_tags); ?></ul>
              </div>
              <img src="<?php echo $thumbnail ? esc_url($thumbnail) : $image_base64; ?>" alt="" />
            </div>
          <?php endwhile; endif; ?>
        </div>
        <button class="tasks-slider__arrow tasks-slider__next"></button>
        <div class="tasks-slider__dots"></div>
      </div>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
