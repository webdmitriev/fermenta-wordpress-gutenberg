<?php
/**
 * Conference - Block
 */

$block_path = 'block-18';
$gutenberg_title = 'Block - 18';

$url = get_template_directory_uri();
$image_base64 = 'data:image/gif;base64,R0lGODlhBwAFAIAAAP///wAAACH5BAEAAAEALAAAAAAHAAUAAAIFjI+puwUAOw==';

$allowed_tags = array(
  'br'   => array()
);

$text = wp_kses(get_field('text'), $allowed_tags);
$link = esc_url(get_field('link'));

?>

<!-- <?= $block_path; ?> (start) -->
<section class="catalog-page">
  <?php if( is_admin() ) : ?>
    <style>[data="gutenberg-preview-img"] img {width: 100%;object-fit: contain;}</style>
    <div class="gutenber-block" style="padding: 10px 20px;background-color: #F5F5F5;border: 1px solid #D1D1D1;"><?= $gutenberg_title; ?></div>
    <div data="gutenberg-preview-img" style="position: relative;z-index:10;"><?php the_field('gutenberg_preview'); ?></div>
  <?php endif; ?>

  <?php if( !is_admin() ) : ?>
    <div class="container" id="store-ajax-container">

      <!-- === Фильтр и поиск === -->
      <div class="categories-filter">
        <form id="store-filter-form">
          <select name="parent_category" id="parent_category">
            <option value="">Все направления</option>
            <?php
            $parent_terms = get_terms(array(
              'taxonomy'   => 'store_categories',
              'parent'     => 0,
              'hide_empty' => false,
            ));
            foreach ($parent_terms as $parent) : ?>
              <option value="<?php echo esc_attr($parent->term_id); ?>">
                <?php echo esc_html($parent->name); ?>
              </option>
            <?php endforeach; ?>
          </select>

          <input type="text" name="search_parent" id="search_parent" placeholder="Поиск по категории...">
        </form>
      </div>

      <!-- === Сюда будет подгружаться контент AJAX === -->
      <div id="store-content"></div>

    </div>
  <?php endif; ?>
</section>
<!-- <?= $block_path; ?> (end) -->

<?php if( !is_admin() ) : ?>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const form = document.getElementById('store-filter-form');
      const parentSelect = document.getElementById('parent_category');
      const searchInput = document.getElementById('search_parent');
      const content = document.getElementById('store-content');

      function fetchData() {
        const formData = new FormData(form);
        formData.append('action', 'filter_store_content'); // имя AJAX-действия

        fetch('<?php echo admin_url('admin-ajax.php'); ?>', {
          method: 'POST',
          body: formData
        })
        .then(res => res.text())
        .then(data => {
          content.innerHTML = data;
        });
      }

      // События
      parentSelect.addEventListener('change', fetchData);
      searchInput.addEventListener('input', () => {
        clearTimeout(searchInput._timeout);
        searchInput._timeout = setTimeout(fetchData, 400); // debounce
      });

      // Начальная загрузка
      fetchData();
    });
  </script>
<?php endif; ?>