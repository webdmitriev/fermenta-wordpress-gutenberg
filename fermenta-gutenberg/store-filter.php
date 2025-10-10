<?php

// === AJAX фильтр категорий и постов ===
add_action('wp_ajax_filter_store_content', 'filter_store_content_callback');
add_action('wp_ajax_nopriv_filter_store_content', 'filter_store_content_callback');

function filter_store_content_callback() {
  $parent_id = isset($_POST['parent_category']) ? intval($_POST['parent_category']) : 0;
  $search    = isset($_POST['search_parent']) ? sanitize_text_field($_POST['search_parent']) : '';

  // Получаем родительские категории с учетом поиска
  $args = array(
    'taxonomy'   => 'store_categories',
    'parent'     => 0,
    'hide_empty' => false,
  );

  if ($search) {
    $args['name__like'] = $search;
  }

  $parent_terms = get_terms($args);

  if (empty($parent_terms)) {
    echo '<p>Категории не найдены.</p>';
    wp_die();
  }

  // Если выбрали родителя — фильтруем по нему
  if ($parent_id) {
    $parent_terms = array_filter($parent_terms, function($term) use ($parent_id) {
      return $term->term_id == $parent_id;
    });
  }

  foreach ($parent_terms as $parent_term) :
    // Дочерние категории
    $child_terms = get_terms(array(
      'taxonomy'   => 'store_categories',
      'parent'     => $parent_term->term_id,
      'hide_empty' => false,
    ));
    ?>
    <div class="block-categories">
      <div class="categories-title"><?php echo esc_html($parent_term->name); ?></div>

      <?php if (!empty($child_terms)) : ?>
        <?php foreach ($child_terms as $child_term) : ?>
          <div class="block-category">
            <div class="category-title"><?php echo esc_html($child_term->name); ?></div>

            <div class="category-posts" style="display: none;">
              <?php
              $child_posts = new WP_Query(array(
                'post_type'      => 'store',
                'posts_per_page' => -1,
                'tax_query'      => array(
                  array(
                    'taxonomy' => 'store_categories',
                    'field'    => 'term_id',
                    'terms'    => $child_term->term_id,
                  ),
                ),
              ));

              if ($child_posts->have_posts()) :
                while ($child_posts->have_posts()) : $child_posts->the_post(); ?>
                  <a href="<?php the_permalink(); ?>" class="category-post"><?php the_title(); ?></a>
              <?php
                endwhile;
                wp_reset_postdata();
              else :
                echo '<div class="category-post">Нет товаров</div>';
              endif;
              ?>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
    <?php
  endforeach;

  wp_die();
}
