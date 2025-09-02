<?php
/**
 * Conference - Block
 */

$block_path = 'block-12';
$gutenberg_title = 'Block - 12';

$image_base64 = 'data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==';

$allowed_tags = array(
  'br'   => array()
);

$title    = wp_kses(get_field('title'), $allowed_tags);
$descr    = wp_kses(get_field('descr'), $allowed_tags);
// $products = get_field('products');

?>

<!-- <?= $block_path; ?> (start) -->
<section class="products">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenber-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <div class="line-wrap df-fs-fs w-100p">
        <div class="products-header">
          <?php if($title): ?><h3 class="h3"><?php echo $title; ?></h3><?php endif; ?>
          <?php if($descr): ?><p class="descr"><?php echo $descr; ?></p><?php endif; ?>
        </div>
        <div class="products-items df-fs-st w-100p">
          <?php if( have_rows('products') ) : while ( have_rows('products') ) : the_row();
            $thumbnail = get_sub_field('image');
          ?>
            <div class="products-item"><img src="<?php echo $thumbnail ? esc_url($thumbnail) : $image_base64; ?>" alt="Image" /></div>
          <?php endwhile; endif; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
