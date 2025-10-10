<?php
/**
 * Conference - Block
 */

$block_path = 'block-17';
$gutenberg_title = 'Block - 17';

$url = get_template_directory_uri();
$image_base64 = 'data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==';

$allowed_tags = array(
  'br'   => array()
);

$title    = wp_kses(get_the_title(), $allowed_tags);
$date     = get_field('date', get_the_ID());
$descr    = wp_kses(get_field('descr'), $allowed_tags);
$gallery  = get_field('gallery');

?>

<!-- <?= $block_path; ?> (start) -->
<section class="news-post">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenber-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container pos-r z5">
      <?php if($title): ?><h2 class="h2 post-title"><?= $title; ?></h2><?php endif; ?>
      <?php if($date): ?><span class="post-date"><?= $date; ?></span><?php endif; ?>
      <?php if($descr): ?><div class="post-descr"><?= $descr; ?></div><?php endif; ?>


      <?php if( $gallery ): ?>
        <div class="post-top-slider">
          <?php foreach( $gallery as $image ): ?>
            <div class="post-slide"><img src="<?= $image; ?>" alt="" /></div>
          <?php endforeach; ?>
        </div>

        <div class="post-bottom-slider">
          <?php foreach( $gallery as $image ): ?>
            <div class="post-slide"><img src="<?= $image; ?>" alt="" /></div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>

    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
