<?php
/**
 * Conference - Block
 */

$block_path = 'block-05';
$gutenberg_title = 'Block - 05';

$allowed_tags = array(
  'br'   => array()
);

$isDark = get_field("is_dark_or_light");

?>

<!-- <?= $block_path; ?> (start) -->
<section class="services" style="background-color: <?= $isDark ? '#b0a195' : '#8ca086'; ?>">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenber-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <div class="line-wrap df-fs-st w-100p">
        <?php if( have_rows('programs') ) : while ( have_rows('programs') ) : the_row(); ?>
          <div class="services-item <?= get_sub_field('btn_text') ? '' : 'without-btn'; ?>" style="background-color: <?= $isDark ? '#dacdc2' : '#b2c4ad'; ?>">
            <?php if(get_sub_field('title')): ?><span class="services-item__title" style="color: <?= $isDark ? '#493a2f' : '#6f7e73'; ?>"><?php echo wp_kses(get_sub_field('title'), $allowed_tags); ?></span><?php endif; ?>
            <?php if(get_sub_field('descr')): ?><span class="services-item__descr" style="color: <?= $isDark ? '#493a2f' : '#6f7e73'; ?>"><?php echo wp_kses(get_sub_field('descr'), $allowed_tags); ?></span><?php endif; ?>
            <?php if(get_sub_field('btn_text')): ?><button class="btn btn-gray" style="color: <?= $isDark ? '#493a2f' : '#becdc2'; ?>;background-color: <?= $isDark ? '#b0a195' : '#6f7e73'; ?>"><?php echo wp_kses(get_sub_field('btn_text'), $allowed_tags); ?></button><?php endif; ?>
          </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
