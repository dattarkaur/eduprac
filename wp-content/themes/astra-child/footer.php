<!-- footer -->
<footer class="bd-footer  bg-dark">
  <div class="container py-4 py-md-5 px-4 px-md-3 text-light">
    <div class="row">
      <div class="col-lg-3 mb-3">
        <a class="d-inline-flex align-items-center mb-2 text-body-emphasis text-decoration-none" href="/" aria-label="Bootstrap">
          <span class="fs-5"></span>
        </a>
        <ul class="list-unstyled small">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.avif" alt="" width="60px" class="rounded-circle">
          <li class="mb-2">AceWebX is a software development company yielding premium web solutions and guaranteed results. Our team of skilled and experienced professionals understand.</li>
        </ul>
      </div>
      <div class="col-6 col-lg-2 offset-lg-1 mb-3">
        <h4>Links</h4>
        <?php wp_nav_menu( [
                    'theme_location'  => '',
                    'menu'            => 'footer-links ', 
                    'container'       => '', 
                    'container_class' => '', 
                    'menu_class'     => 'footer-menu-class',
                ] );
            ?>
      </div>
      <div class="col-6 col-lg-2 mb-3">
        <h4>Our Services</h4>
        <?php wp_nav_menu( [
                    'theme_location'  => '',
                    'menu'            => 'footer-links2 ', 
                    'container'       => '', 
                    'container_class' => '', 
                    'menu_class'     => 'footer-menu-class',
                ] );
            ?>
      </div>
      <div class="col-6 col-lg-4 mb-3">
        <h4>Contact Info</h4>
        <ul class="list-unstyled fw-bold" style="margin-left: 0px; margin-top: 20px;">
          <li class="mb-2"><a class="text-decoration-none text-light" href=""><i class="fa-solid fa-phone"></i> Mob: +91-998-850-5034 </a></li>
          <li class="mb-2"><a class="text-decoration-none text-light" href=""><i class="fa-solid fa-envelope"></i> hr@acewebx.com</a></li>
          <li class="mb-2"><a class="text-decoration-none text-light" href=""><i class="fa-solid fa-location-dot"></i> D-185, Industrial Area Phase 8B, S.A.S Nagar (Mohali)-160071 Punjab, India</a></li>
        </ul>
      </div>
    </div>
  </div>
</footer>
<?php wp_footer();?>
</body>
</html>