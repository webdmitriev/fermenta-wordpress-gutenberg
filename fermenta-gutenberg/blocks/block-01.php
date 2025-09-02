<?php
/**
 * Conference - Block
 */

$block_path = 'block-01';
$gutenberg_title = 'Block - 01';

$url = get_template_directory_uri();

$allowed_tags = array(
  'br'   => array(),
  'p'    => array(),
  'span' => array(),
);

$bg_1920    = get_field('bg_1920');
$sup_title  = get_field('sup_title');
$date       = get_field('date');
$title      = get_field('title');

?>

<!-- <?= $block_path; ?> (start) -->
<section class="conference-block-01">
  <?php if( is_admin() ): ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenber-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ): ?>
    <?php if($bg_1920): ?><img class="conference-img img" src="<?php echo esc_url($bg_1920); ?>" alt="www" /><?php endif; ?>
    <div class="container pos-r z5">
      <div class="pos-r df-fs-fs w-100p">
        <?php if($sup_title): ?><p class="conference-top"><?php echo wp_kses($sup_title, $allowed_tags); ?></p><?php endif; ?>
        <?php if($date): ?><h2 class="conference-date"><?php echo wp_kses($date, $allowed_tags); ?></h2><?php endif; ?>
        <?php if($title): ?><h1 class="conference-title"><?php echo wp_kses($title, $allowed_tags); ?></h1><?php endif; ?>
      </div>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
