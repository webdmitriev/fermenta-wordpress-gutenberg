<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package webdmitriev
 */

  $url = get_template_directory_uri();

?>

  <footer class="footer">
    <div class="container">
      <span>© 2025 Ферментра</span>
      <a href="#" class="social-item" target="_blank" rel="noopener noreferrer"><img src="<?= $url; ?>/assets/img/icons/icon-telegram.svg" alt="icon" /></a>
      <a href="#" class="social-item" target="_blank" rel="noopener noreferrer"><img src="<?= $url; ?>/assets/img/icons/icon-whatsapp.svg" alt="icon" /></a>
      <a href="#" class="social-item" target="_blank" rel="noopener noreferrer"><img src="<?= $url; ?>/assets/img/icons/icon-email.svg" alt="icon" /></a>
    </div>
  </footer>
</div>
<?php wp_footer(); ?>

</body>
</html>
