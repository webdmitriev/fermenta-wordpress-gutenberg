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

$text = wp_kses(get_field('text'), $allowed_tags);
$link = esc_url(get_field('link'));

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
      <h2 class="h2 post-title">Выставка Винорус Краснодар 2025</h2>
      <span class="post-date">23-25.04.25</span>
      <div class="post-descr">Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis odio cumque corporis non qui itaque, rerum sequi assumenda odit ratione, nostrum, ut vitae! Vero iste recusandae, blanditiis aliquam quidem architecto quibusdam a minus optio repellendus dolor pariatur. Facere, aliquam. Minus doloribus optio harum, id corporis repellat eaque consectetur aliquid itaque suscipit eius maxime maiores voluptatum rerum unde. Velit labore, ipsum eaque dolor dolorum culpa dignissimos, voluptates similique, sequi consequuntur accusamus doloremque nesciunt sint magni aut quam itaque repellendus enim quia provident a? Veritatis molestiae officia nemo iure voluptatibus, at nobis dolorum minima cum deleniti laudantium magnam omnis qui facere dicta ipsa laboriosam, rem, maxime reprehenderit autem? Cum eligendi odit accusantium recusandae aperiam impedit suscipit libero? Provident ratione dolore, perspiciatis nihil ex necessitatibus! Unde possimus tenetur voluptate pariatur reprehenderit cupiditate corrupti amet sunt repellendus, enim quo, similique distinctio aliquid? Excepturi odio similique, unde consequatur earum sit, corrupti enim odit omnis ducimus architecto assumenda error id cum magnam totam quos. Laborum perspiciatis possimus nobis harum modi suscipit accusantium asperiores facilis eveniet iusto vitae, tempore fugiat est eius nesciunt consectetur quasi. Voluptate, molestias. Autem incidunt excepturi accusantium ab, sed dolorum quae ullam quos dolor praesentium maxime, earum quod repudiandae ducimus. Laboriosam, fugiat porro!</div>

      <div class="post-top-slider">
        <div class="post-slide"><img src="<?= $url; ?>/assets/img/news-post/image-01.jpg" alt="" /></div>
        <div class="post-slide"><img src="<?= $url; ?>/assets/img/news-post/image-02.jpg" alt="" /></div>
        <div class="post-slide"><img src="<?= $url; ?>/assets/img/news-post/image-03.jpg" alt="" /></div>
        <div class="post-slide"><img src="<?= $url; ?>/assets/img/news-post/image-04.jpg" alt="" /></div>
      </div>

      <div class="post-bottom-slider">
        <div class="post-slide"><img src="<?= $url; ?>/assets/img/news-post/image-01.jpg" alt="" /></div>
        <div class="post-slide"><img src="<?= $url; ?>/assets/img/news-post/image-02.jpg" alt="" /></div>
        <div class="post-slide"><img src="<?= $url; ?>/assets/img/news-post/image-03.jpg" alt="" /></div>
        <div class="post-slide"><img src="<?= $url; ?>/assets/img/news-post/image-04.jpg" alt="" /></div>
      </div>

      <div class="post-arrows">
        <button class="post-arrow post-arrow-prev"></button>
        <button class="post-arrow post-arrow-next"></button>
      </div>

    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
