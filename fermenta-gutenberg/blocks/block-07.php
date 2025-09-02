<?php
/**
 * Conference - Block
 */

$block_path = 'block-07';
$gutenberg_title = 'Block - 07';

$allowed_tags = array(
  'br'   => array()
);

$id_scroll    = get_field('id_scroll');

$title_block  = wp_kses(get_field('title_block'), $allowed_tags);
$descr_block  = wp_kses(get_field('descr_block'), $allowed_tags);

$emails       = get_field("emails"); // title, email

$title_form   = wp_kses(get_field('title_form'), $allowed_tags);
$descr_form   = wp_kses(get_field('descr_form'), $allowed_tags);

$form         = get_field('form');

?>

<!-- <?= $block_path; ?> (start) -->
<section class="contacts" id="<?php echo $id_scroll; ?>">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenber-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <div class="line-wrap">
        <?php if($title_block): ?><h3 class="h3"><?php echo $title_block; ?></h3><?php endif; ?>
        <?php if($descr_block): ?><p class="descr"><?php echo $descr_block; ?></p><?php endif; ?>
        <div class="contacts-items df-fs-fe w-100p">
          <?php if( have_rows('emails') ) : while ( have_rows('emails') ) : the_row(); ?>
            <div class="contacts-item">
              <div class="contacts-item__data"><?php echo esc_html(get_sub_field('title')); ?></div>
              <a href="mailto:<?php echo esc_html(get_sub_field('email')); ?>" class="contacts-item__data"><?php echo esc_html(get_sub_field('email')); ?></a>
            </div>
          <?php endwhile; endif; ?>
        </div>
      </div>

      <div class="line-wrap">
        <?php if($title_form): ?><h3 class="h3"><?php echo $title_form; ?></h3><?php endif; ?>
        <?php if($descr_form): ?><p class="descr"><?php echo $descr_form; ?></p><?php endif; ?>
      </div>

      <?php if($form): ?>
        <div class="line-wrap">
          <?= do_shortcode($form); ?>
        </div>
      <?php endif; ?>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
