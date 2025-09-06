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