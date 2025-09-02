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

  // 01
  acf_register_block_type(array(
    'name'            => 'fermenta-block-01',
    'title'           => __('Block - 01'),
    'description'     => __('Конференция блок 01'),
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

});

add_filter('allowed_block_types_all', function($allowed_blocks, $editor_context) {
  return array(
    'acf/fermenta-block-01',
    'core/image'
  );
}, 10, 2);

?>