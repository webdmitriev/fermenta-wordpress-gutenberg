<?php

/**
 * Admin
 */
require get_template_directory() . '/fermenta-gutenberg/admin.php';

/**
 * Custom page admin
 */
require get_template_directory() . '/fermenta-gutenberg/pages/ui.php';

/**
 * Conference block categories
 */
add_filter('block_categories_all', function($categories, $post) {
  $categories[] = array(
    'slug'  => 'block_fermenta',
    'title' => __('Блоки для страниц', 'Fermenta'),
    'icon'  => 'wordpress',
  );

  return $categories;
}, 10, 2);

add_action('acf/init', function() {

  $icon = file_get_contents( get_template_directory() . '/fermenta-gutenberg/images/icon.svg' );
  $image = get_template_directory_uri() . '/fermenta-gutenberg/images/';

  // 01 - main-banner
  acf_register_block_type(array(
    'name'            => 'fermenta-block-01',
    'title'           => __('Block - 01'),
    'description'     => __('Главная баннер'),
    'render_template' => 'fermenta-gutenberg/blocks/block-01.php',
    'category'        => 'block_fermenta',
    'icon'            => $icon,
    'keywords'        => array('fermenta'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-01.jpg">'
        )
      )
    )
  ));

  // 02 - description
  acf_register_block_type(array(
    'name'            => 'fermenta-block-02',
    'title'           => __('Block - 02'),
    'description'     => __('Описание'),
    'render_template' => 'fermenta-gutenberg/blocks/block-02.php',
    'category'        => 'block_fermenta',
    'icon'            => $icon,
    'keywords'        => array('fermenta'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-02.jpg">'
        )
      )
    )
  ));

  // 03 - they-trust
  acf_register_block_type(array(
    'name'            => 'fermenta-block-03',
    'title'           => __('Block - 03'),
    'description'     => __('Почему нам доверяют'),
    'render_template' => 'fermenta-gutenberg/blocks/block-03.php',
    'category'        => 'block_fermenta',
    'icon'            => $icon,
    'keywords'        => array('fermenta'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-03.jpg">'
        )
      )
    )
  ));

  // 04 - directions
  acf_register_block_type(array(
    'name'            => 'fermenta-block-04',
    'title'           => __('Block - 04'),
    'description'     => __('Заголовок на фоне картинки'),
    'render_template' => 'fermenta-gutenberg/blocks/block-04.php',
    'category'        => 'block_fermenta',
    'icon'            => $icon,
    'keywords'        => array('fermenta'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-04.jpg">'
        )
      )
    )
  ));

  // 05 - services
  acf_register_block_type(array(
    'name'            => 'fermenta-block-05',
    'title'           => __('Block - 05'),
    'description'     => __('Программы'),
    'render_template' => 'fermenta-gutenberg/blocks/block-05.php',
    'category'        => 'block_fermenta',
    'icon'            => $icon,
    'keywords'        => array('fermenta'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-05.jpg">'
        )
      )
    )
  ));

  // 06 - location
  acf_register_block_type(array(
    'name'            => 'fermenta-block-06',
    'title'           => __('Block - 06'),
    'description'     => __('Адрес'),
    'render_template' => 'fermenta-gutenberg/blocks/block-06.php',
    'category'        => 'block_fermenta',
    'icon'            => $icon,
    'keywords'        => array('fermenta'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-06.jpg">'
        )
      )
    )
  ));

  // 07 - contacts
  acf_register_block_type(array(
    'name'            => 'fermenta-block-07',
    'title'           => __('Block - 07'),
    'description'     => __('Контакты'),
    'render_template' => 'fermenta-gutenberg/blocks/block-07.php',
    'category'        => 'block_fermenta',
    'icon'            => $icon,
    'keywords'        => array('fermenta'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-07.jpg">'
        )
      )
    )
  ));

  // 08 - tests
  acf_register_block_type(array(
    'name'            => 'fermenta-block-08',
    'title'           => __('Block - 08'),
    'description'     => __('Что мы делаем?'),
    'render_template' => 'fermenta-gutenberg/blocks/block-08.php',
    'category'        => 'block_fermenta',
    'icon'            => $icon,
    'keywords'        => array('fermenta'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-08.jpg">'
        )
      )
    )
  ));

  // 09 - tests-data
  acf_register_block_type(array(
    'name'            => 'fermenta-block-09',
    'title'           => __('Block - 09'),
    'description'     => __('Что мы делаем - данные?'),
    'render_template' => 'fermenta-gutenberg/blocks/block-09.php',
    'category'        => 'block_fermenta',
    'icon'            => $icon,
    'keywords'        => array('fermenta'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-09.jpg">'
        )
      )
    )
  ));

  // 10 - tasks
  acf_register_block_type(array(
    'name'            => 'fermenta-block-10',
    'title'           => __('Block - 10'),
    'description'     => __('Задачи'),
    'render_template' => 'fermenta-gutenberg/blocks/block-10.php',
    'category'        => 'block_fermenta',
    'icon'            => $icon,
    'keywords'        => array('fermenta'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-10.jpg">'
        )
      )
    )
  ));

  // 11 - prayer
  acf_register_block_type(array(
    'name'            => 'fermenta-block-11',
    'title'           => __('Block - 11'),
    'description'     => __('Каждый проект индивидуален.'),
    'render_template' => 'fermenta-gutenberg/blocks/block-11.php',
    'category'        => 'block_fermenta',
    'icon'            => $icon,
    'keywords'        => array('fermenta'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-11.jpg">'
        )
      )
    )
  ));

  // 12 - products
  acf_register_block_type(array(
    'name'            => 'fermenta-block-12',
    'title'           => __('Block - 12'),
    'description'     => __('Products'),
    'render_template' => 'fermenta-gutenberg/blocks/block-12.php',
    'category'        => 'block_fermenta',
    'icon'            => $icon,
    'keywords'        => array('fermenta'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-12.jpg">'
        )
      )
    )
  ));

  // 13 - catalog-block
  acf_register_block_type(array(
    'name'            => 'fermenta-block-13',
    'title'           => __('Block - 13'),
    'description'     => __('Блок для скачивания файла'),
    'render_template' => 'fermenta-gutenberg/blocks/block-13.php',
    'category'        => 'block_fermenta',
    'icon'            => $icon,
    'keywords'        => array('fermenta'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-13.jpg">'
        )
      )
    )
  ));

  // 14 - advantages
  acf_register_block_type(array(
    'name'            => 'fermenta-block-14',
    'title'           => __('Block - 14'),
    'description'     => __('Преимущества'),
    'render_template' => 'fermenta-gutenberg/blocks/block-14.php',
    'category'        => 'block_fermenta',
    'icon'            => $icon,
    'keywords'        => array('fermenta'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-14.jpg">'
        )
      )
    )
  ));

  // 15 - contrast
  acf_register_block_type(array(
    'name'            => 'fermenta-block-15',
    'title'           => __('Block - 15'),
    'description'     => __('Текст и кнопка на фоне картинки'),
    'render_template' => 'fermenta-gutenberg/blocks/block-15.php',
    'category'        => 'block_fermenta',
    'icon'            => $icon,
    'keywords'        => array('fermenta'),
    'mode'            => 'preview',
    'example' => array(
      'attributes' => array(
        'mode' => 'preview',
        'data' => array(
          'gutenberg_preview' => '<img src="' . $image . 'block-15.jpg">'
        )
      )
    )
  ));

});

add_filter('allowed_block_types_all', function($allowed_blocks, $editor_context) {
  return array(
    'acf/fermenta-block-01',
    'acf/fermenta-block-02',
    'acf/fermenta-block-03',
    'acf/fermenta-block-04',
    'acf/fermenta-block-05',
    'acf/fermenta-block-06',
    'acf/fermenta-block-07',
    'acf/fermenta-block-08',
    'acf/fermenta-block-09',
    'acf/fermenta-block-10',
    'acf/fermenta-block-11',
    'acf/fermenta-block-12',
    'acf/fermenta-block-13',
    'acf/fermenta-block-14',
    'acf/fermenta-block-15',
    'core/image'
  );
}, 10, 2);

?>