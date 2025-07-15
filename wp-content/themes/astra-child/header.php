<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body>
  <!-- navbar -->
   <header>
  <div class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
      <div class="container-fluid">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.avif" alt="" width="60px" class="rounded-circle">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
              aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse " id="navbarSupportedContent">

            <?php wp_nav_menu( [
                    'theme_location'  => '',
                    'menu'            => 'main menu ', 
                    'container'       => 'nav', 
                    'container_class' => '', 
                    'menu_class'      => 'custom-menu-class', 
                ] );
            ?>
            <form class="d-flex" role="search">
              <input class="form-control me-4" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-danger me-2" type="submit"><a href="" class="navbar-brand text-light fs-6">Search</a></button>
              <?php if ( is_user_logged_in() ) : ?>
                <button class="btn btn-danger" type="submit">  <a href="<?php echo home_url('/?page_id=438'); ?>" class="navbar-brand text-light fs-6">My Account</a></button>
              <?php else : ?>
             
              <button class="me-3 btn btn-danger" type="submit">  <a href="<?php echo home_url('/?page_id=430'); ?>" class="navbar-brand text-light fs-6">Create Account</a></button>
              <?php endif; ?>
            </form>
          </div>
      </div>
          </div> 
