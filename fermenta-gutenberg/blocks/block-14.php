<?php
/**
 * Conference - Block
 */

$block_path = 'block-14';
$gutenberg_title = 'Block - 14';

$url = get_template_directory_uri();
$image_base64 = 'data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==';

$allowed_tags = array(
  'br'   => array()
);

$title  = wp_kses(get_field('title'), $allowed_tags);
$params = get_field('params');

?>

<!-- <?= $block_path; ?> (start) -->
<section class="advantages">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenber-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <?php if($title): ?><h3 class="h3"><?php echo $title; ?></h3><?php endif; ?>

      <?php if( have_rows('params') ) : ?>
        <div class="advantages-items df-ce-fs w-100p">
          <?php while ( have_rows('params') ) : the_row();
            $icon = get_sub_field('icon');
          ?>
            <div class="advantages-item">
              <img src="<?php echo $icon ? esc_url($icon) : $image_base64; ?>" alt="Icon" />
              <p class="descr"><?php echo wp_kses(get_sub_field('descr'), $allowed_tags); ?></p>
            </div>
          <?php endwhile; ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
