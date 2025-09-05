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

  <div class="social-media">
    <div class="social-media-image">
      <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M12 7C11.4696 7 10.9609 6.78929 10.5858 6.41421C10.2107 6.03914 10 5.53043 10 5C10 4.46957 10.2107 3.96086 10.5858 3.58579C10.9609 3.21071 11.4696 3 12 3C12.5304 3 13.0391 3.21071 13.4142 3.58579C13.7893 3.96086 14 4.46957 14 5C14 5.53043 13.7893 6.03914 13.4142 6.41421C13.0391 6.78929 12.5304 7 12 7ZM12 7V11M12 11C12.7956 11 13.5587 11.3161 14.1213 11.8787C14.6839 12.4413 15 13.2044 15 14C15 14.7956 14.6839 15.5587 14.1213 16.1213C13.5587 16.6839 12.7956 17 12 17C11.2044 17 10.4413 16.6839 9.87868 16.1213C9.31607 15.5587 9 14.7956 9 14C9 13.2044 9.31607 12.4413 9.87868 11.8787C10.4413 11.3161 11.2044 11 12 11ZM6.7 17.8L9.5 15.8M17.3 17.8L14.5 15.8M3 19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21C5.53043 21 6.03914 20.7893 6.41421 20.4142C6.78929 20.0391 7 19.5304 7 19C7 18.4696 6.78929 17.9609 6.41421 17.5858C6.03914 17.2107 5.53043 17 5 17C4.46957 17 3.96086 17.2107 3.58579 17.5858C3.21071 17.9609 3 18.4696 3 19ZM17 19C17 19.5304 17.2107 20.0391 17.5858 20.4142C17.9609 20.7893 18.4696 21 19 21C19.5304 21 20.0391 20.7893 20.4142 20.4142C20.7893 20.0391 21 19.5304 21 19C21 18.4696 20.7893 17.9609 20.4142 17.5858C20.0391 17.2107 19.5304 17 19 17C18.4696 17 17.9609 17.2107 17.5858 17.5858C17.2107 17.9609 17 18.4696 17 19Z" stroke="black" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
    </div>
    <a href="#" target="_blank" rel="noopener noreferrer" class="social-item social-telegram"><img src="<?= $url; ?>/assets/img/icons/social-telegram.svg" alt="Telegram" /></a>
    <a href="#" target="_blank" rel="noopener noreferrer" class="social-item social-whatsapp"><img src="<?= $url; ?>/assets/img/icons/social-whatsapp.svg" alt="Whatsapp" /></a>
  </div>
</div>
<?php wp_footer(); ?>

</body>
</html>
