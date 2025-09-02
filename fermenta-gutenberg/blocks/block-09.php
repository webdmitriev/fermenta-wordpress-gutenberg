<?php
/**
 * Conference - Block
 */

$block_path = 'block-09';
$gutenberg_title = 'Block - 09';

$url = get_template_directory_uri();
$image_base64 = 'data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==';

$allowed_tags = array(
  'br'   => array()
);

$data = get_field('data');

?>

<!-- <?= $block_path; ?> (start) -->
<section class="tests-data">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenber-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <div class="tests-items df-fs-st w-100p">
        <?php if( have_rows('data') ) : while ( have_rows('data') ) : the_row();
          $thumbnail = get_sub_field('image');
        ?>
          <div class="tests-item">
            <img src="<?php echo $thumbnail ? esc_url($thumbnail) : $image_base64; ?>" alt="Image" />
            <?php if(get_sub_field('title')): ?><span class="tests-item__title"><?php echo wp_kses(get_sub_field('title'), $allowed_tags); ?></span><?php endif; ?>
            <?php if(get_sub_field('descr')): ?><span class="tests-item__descr"><?php echo wp_kses(get_sub_field('descr'), $allowed_tags); ?></span><?php endif; ?>
            <?php if(get_sub_field('excerpt')): ?><span class="tests-item__excerpt"><?php echo wp_kses(get_sub_field('excerpt'), $allowed_tags); ?></span><?php endif; ?>
          </div>
        <?php endwhile; endif; ?>
      </div>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
