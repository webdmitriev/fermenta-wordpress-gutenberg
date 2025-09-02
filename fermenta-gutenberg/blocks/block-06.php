<?php
/**
 * Conference - Block
 */

$block_path = 'block-06';
$gutenberg_title = 'Block - 06';

$url = get_template_directory_uri();
$image_base64 = 'data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==';

$allowed_tags = array(
  'br'   => array()
);

$title    = wp_kses(get_field('title'), $allowed_tags);
$address  = wp_kses(get_field('address'), $allowed_tags);
$image    = esc_url(get_field('image'));

?>

<!-- <?= $block_path; ?> (start) -->
<section class="location">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenber-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <div class="line-wrap df-ce-ce w-100p">
        <?php if($image): ?><img src="<?php echo esc_url($image); ?>" alt="" /><?php endif; ?>
        <div class="location-descr">
          <?php if($title): ?><h3 class="h3"><?php echo $title; ?></h3><?php endif; ?>
          <?php if($address): ?><p class="descr"><?php echo $address; ?></p><?php endif; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
