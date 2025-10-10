<?php

/*
 * Remove admin bar (front page)
 */
add_filter ( 'show_admin_bar', '__return_false');

/*
 * wpcf7 remove defaults <br/>
 */
add_filter('wpcf7_autop_or_not', '__return_false');

/**
 * Options page
 */
if( function_exists('acf_add_options_page') ) {
  acf_add_options_page(array(
    'page_title' => 'Options page',
    'menu_title' => 'Options page',
    'menu_slug' => 'theme-general-settings',
    'capability' => 'edit_posts',
    'update_button' => __('Update', 'acf'),
    'redirect' => false
  ));
}


// === Регистрируем Custom Post Type "Товары" ===
function register_store_post_type() {

  $labels = array(
    'name'               => 'Товары',
    'singular_name'      => 'Товары',
    'menu_name'          => 'Товары',
    'name_admin_bar'     => 'Товары',
    'add_new'            => 'Добавить товар',
    'add_new_item'       => 'Добавить ноывй товар',
    'new_item'           => 'Новый товар',
    'edit_item'          => 'Редактировать товар',
    'view_item'          => 'Просмотр товара',
    'all_items'          => 'Все товары',
    'search_items'       => 'Поиск товароы',
    'parent_item_colon'  => 'Родитель товара:',
    'not_found'          => 'Товары не найдены.',
    'not_found_in_trash' => 'В корзине товаров нет.',
  );

  $args = array(
    'labels'             => $labels,
    'public'             => true,
    'show_in_rest'       => true, // Включаем поддержку Gutenberg / API
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'query_var'          => true,
    'rewrite'            => array('slug' => 'store'),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 5,
    'menu_icon'          => 'dashicons-id', // Иконка меню в админке
    'supports'           => array('title', 'editor', 'thumbnail', 'excerpt'),
  );

  register_post_type('store', $args);
}
add_action('init', 'register_store_post_type');


// === Регистрируем таксономии ===

// Категории
function register_store_categories_taxonomy() {
  $labels = array(
    'name'              => 'Категории',
    'singular_name'     => 'Категория',
    'search_items'      => 'Найти категорию',
    'all_items'         => 'Все категории',
    'edit_item'         => 'Редактировать категорию',
    'update_item'       => 'Обновить категорию',
    'add_new_item'      => 'Добавить новую категорию',
    'new_item_name'     => 'Название новой категории',
    'menu_name'         => 'Категории',
  );

  register_taxonomy('store_categories', array('store'), array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array('slug' => 'store-categories'),
    'show_in_rest'      => true,
  ));
}
add_action('init', 'register_store_categories_taxonomy');