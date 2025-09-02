<?php

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
          'gutenberg_preview' => '<img src="' . $image . 'block-01.jpg">'
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
          'gutenberg_preview' => '<img src="' . $image . 'block-01.jpg">'
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
          'gutenberg_preview' => '<img src="' . $image . 'block-01.jpg">'
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
          'gutenberg_preview' => '<img src="' . $image . 'block-01.jpg">'
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
          'gutenberg_preview' => '<img src="' . $image . 'block-01.jpg">'
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
          'gutenberg_preview' => '<img src="' . $image . 'block-01.jpg">'
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
    'core/image'
  );
}, 10, 2);

?>