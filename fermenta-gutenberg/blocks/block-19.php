<?php
/**
 * Conference - Block
 */

$block_path = 'block-19';
$gutenberg_title = 'Block - 19';

$url = get_template_directory_uri();
$image_base64 = 'data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==';

$allowed_tags = array(
  'br'   => array()
);

$text = wp_kses(get_field('text'), $allowed_tags);
$link = esc_url(get_field('link'));

?>

<!-- <?= $block_path; ?> (start) -->
<section class="store-product">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenber-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container">
      <img src="<?= $url; ?>/assets/img/store-product/image-02.jpg" alt="www" class="product-thumbnail" />
      <div class="product-params">
        <span class="params-title">Спецификация</span>

        <div class="params-items">
          <div class="params-item">Название</div>
          <div class="params-item">Clarity</div>
        </div>
        <div class="params-items">
          <div class="params-item">Тип</div>
          <div class="params-item">Ферментный препарат</div>
        </div>
        <div class="params-items">
          <div class="params-item">Назначение</div>
          <div class="params-item">...</div>
        </div>
        <div class="params-items">
          <div class="params-item">Активность</div>
          <div class="params-item">...</div>
        </div>
        <div class="params-items">
          <div class="params-item">Ремомендуемая температура и pH</div>
          <div class="params-item">16-28ºС</div>
        </div>
        <div class="params-items">
          <div class="params-item">Форма</div>
          <div class="params-item">Порошок/Лиофилизат</div>
        </div>
        <div class="params-items">
          <div class="params-item">Упаковка</div>
          <div class="params-item">500г/10кг</div>
        </div>
        <div class="params-items">
          <div class="params-item">Артикул</div>
          <div class="params-item">WFP-PC</div>
        </div>
        <div class="params-items">
          <div class="params-item">Условия хранения</div>
          <div class="params-item">Температура и влажность</div>
        </div>
        <button class="store-btn">Оставить заявку</button>
      </div>
      <div class="product-content">
        <p class="descr">Clarity – это ферментный препарат, расщепляющий сложные полисахариды и глюканы, основные виновники помутнения и нестабильности вина. Он осветляет вино, предотвращает образование осадка и облегчает фильтрацию. Clarity гарантирует стабильность и чистоту вашего вина. Потребители оценят его безупречный вид и вкус. Он обеспечивает стабильность, прозрачность и улучшает фильтруемость, делая ваш продукт привлекательным для самых требовательных ценителей. Ваши вина будут сиять чистотой, радуя взгляд и вкус.</p>
        <img src="<?= $url; ?>/assets/img/store-product/image-01.jpg" alt="www" />
        <a href="#" class="store-btn" download>Спецификация (скачать)</a>
        <a href="#" class="store-btn" download>Протокол испытаний (скачать)</a>
        <a href="#" class="store-btn" download>Декларация (скачать)</a>
        <a href="#" class="store-btn" download>сертификат качества (скачать)</a>
      </div>
    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->
