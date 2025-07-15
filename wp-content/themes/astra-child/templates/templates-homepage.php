
<?php /* Template Name: New Home Page */
    get_header();
  $bannerheading = get_field('banner_heading');
  $bannerdesc = get_field('banner_desc');
  $bannerImage = get_field('banner_image');
  $bannerLogo = get_field('banner_logo');
  $bannerLogo2 = get_field('banner_logo2');
  $bannerLogo3 = get_field('banner_logo3');
  $bannerLogo4 = get_field('banner_logo4');

  $aboutImage = get_field('about_image');
  $aboutLine = get_field('about_line');
  $aboutHeading = get_field('about_heading');
  $aboutDesc = get_field('about_desc');

  $skillLine = get_field('skills_line');
  $skillHeading = get_field('skills_heading');
  $skillImage = get_field('skills_image');
  $skillImage2 = get_field('skills_image2');
  $skillImage3 = get_field('skills_image3');
  $skillImage4 = get_field('skills_image4');
  $skillImage5 = get_field('skills_image5');

  $blogLine = get_field('blog_line');
  $blogHeading = get_field('blog_heading');
  $blogDesc = get_field('blog_desc');
  $blogImage = get_field('blog_image');

  $serviceLine = get_field('service_line');
  $serviceHeading = get_field('service_heading');
  $serviceDesc = get_field('service_desc');


?>
  <!-- header start -->
    <div class="position-relative">
    <img src="<?=$bannerImage;?>" class="img-fluid" alt="Background Image" >
      <div class="position-absolute top-50 start-50 translate-middle text-center text-white">
        <h1 class="fw-bold header-text"><?=$bannerheading;?></h1>
        <p class="line-text"><?=$bannerdesc;?></p>
         <!-- <button type="button" class="btn btn-danger px-4 p-3">Let us Talk</button>  -->
        <div class="marquee mt-2 marque-img">
          <img src="<?=$bannerLogo;?>" class="mx-2">
          <img src="<?=$bannerLogo2;?>" class="mx-2 laravel" >
          <img src="<?=$bannerLogo3;?>" class="mx-2">
          <img src="<?=$bannerLogo4;?>" class="mx-2">
        </div>
      </div>
    </div>
  </header>
  <!-- content container -->
  <section id="myabout">
    <div class=" container d-flex flex-column flex-lg-row  gap-5" style="margin-top: 120px;">
      <div class="img-conatiner">
        <img src="<?= $aboutImage; ?>" alt="" height="500px" class="sec-img">
      </div>
      <div class="container  d-flex flex-column justify-content-center">
        <p class="text-secondary"><?=$aboutLine; ?></p>
        <h4 class="fw-bold"><?=$aboutHeading;?></h4>
        <p><?=$aboutDesc ?></p>
      </div>
    </div>
  </section>

  <section id="myproducts">
    <div class="container shadow-lg p-3 mb-5 bg-body rounded p-5" style="margin-top:120px;" >
      <div class="heading p-3">
        <p class="text-secondary"><?=$skillLine?></p>
        <h2 class="fw-bold"><?=$skillHeading?></h2>
      </div>
      <div class="row  mt-3 d-flex justify-content-around">
        <div class="col-4 col-lg-2"><img src="<?=$skillImage;?>" class=""></div>
        <div class="col-4 col-lg-2"><img src="<?=$skillImage2;?>" class=""></div>
        <div class="col-4 col-lg-2"><img src="<?=$skillImage3;?>" class=></div>
        <div class="col-4 col-lg-2"><img src="<?=$skillImage4;?>" class=""></div>
        <div class="col-4 col-lg-2"><img src="<?=$skillImage5;?>" class=""></div>
      </div>
    </div>
  </section>

<!-- blog -->
  <section id="myblog">
    <div class=" container d-flex flex-column flex-lg-row gap-5 bg-light p-5" style="margin-top: 120px;">
      <div class="container  d-flex flex-column justify-content-center">
        <p class="text-secondary"><?=$blogLine; ?></p>
        <h3 class="fw-bold"><?=$blogHeading;?></h3>
        <p><?=$blogDesc;?></p>
      </div>
      <div class="img-conatiner">
        <img src="<?= $blogImage; ?>" alt="" height="500px" class="sec-img">
      </div>
    </div>

    <div class="container bg-light p-2" style="margin-top: 60px;">
      <div class="row mb-2">
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-primary">World</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#">Featured product</a>
              </h3>
              <div class="mb-1 text-muted">Nov 12</div>
              <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
              <a href="#">Continue reading</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb"  src="<?php echo get_stylesheet_directory_uri();?>/images/blog.jpeg"/>

          </div>
        </div>
        <div class="col-md-6">
          <div class="card flex-md-row mb-4 box-shadow h-md-250">
            <div class="card-body d-flex flex-column align-items-start">
              <strong class="d-inline-block mb-2 text-success">Design</strong>
              <h3 class="mb-0">
                <a class="text-dark" href="#">product title</a>
              </h3>
              <div class="mb-1 text-muted">Nov 11</div>
              <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
              <a href="#">Continue reading</a>
            </div>
            <img class="card-img-right flex-auto d-none d-md-block" data-src="holder.js/200x250?theme=thumb" style="height: 230px;" src="<?php echo get_stylesheet_directory_uri();?>/images/blog2.jpeg"/>
          </div>
        </div>
      </div>
    </div>

    
            <section>
              <div class="container d-flex d-flex justify-content-evenly" style="margin-top:120px;">
                <div class="first">
                <p class="text-secondary"><?=$serviceLine;?></p>
                <h3 class="fw-bold"><?=$serviceHeading;?></h3></div>
              <div class="second d-flex flex-column justify-content-center ">
               <p><?=$serviceDesc;?></p>
              </div>
              </div>
            </section>

    <!-- cards -->
                  <?php
                   $args = array(
                  'post_type'      => 'services', 
                  'posts_per_page' => 6,
                  'post_status'    => 'publish',  
                   );
                  $service_query = new WP_Query($args);  
                  ?>
  <section id="myservices">
    <div class="container" style="margin-top:60px;">
        <div class="container">
            <div class="row">
                <?php
                if ($service_query->have_posts()) :
                    while ($service_query->have_posts()) : $service_query->the_post();
                ?>
                <!-- Card Structure -->
                <div class="col-md-4">
                    <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>" class="card-img-top" alt="<?php  
                        echo  '<a href="' . get_permalink() . '" data-id="<?php echo get_the_ID(); ?>" style="text-decoration: none; color: inherit;">';
                        $categories = get_the_terms(get_the_ID(), 'service_category'); 
                        if (!empty($categories) && !is_wp_error($categories)) {
                            foreach ($categories as $category) {
                            
                                echo  '<h3 class="mt-4 text-center fw-bold">' . esc_html($category->name)  . '</h3>';

                              }
                            } else {
                            echo '<h4>No category assigned</h4>';
                        }
                        echo '</a>';
                        ?>
                        <div class="card-body text-center">
                            <p class="card-text"><?php
                            
                            $post_content = get_field('post_content');
                            if ($post_content) {
                            echo   wp_kses_post($post_content);
                            } else {
                            echo  'Not specified';
                            }
                            ?>
                            </p>
                            <a href="<?php the_permalink(); ?>" class="btn btn-outline-danger">Read More</a>
                        </div>
                    </div>
                </div>
                <?php 
                    endwhile;
                    wp_reset_postdata(); 
                else :
                    echo '<p>No services found.</p>';
                endif;
                ?>
            </div>
        </div>
    </div>
    <div class="container text-center">
    <a href="<?php echo home_url('/?page_id=2230'); ?>" class="btn btn-danger mt-4">View All</a>
    </div>
  </section>


  <section id="mycontact" style="background-color: rgb(233, 233, 227);">
    <h2 class="text-center mt-5 fw-bold">Contact Us</h2>

    <div class="container d-flex justify-content-around gap-5" style="margin-top:40px"; >
      <div class="pic">
        <div class="contents">
          <h2 class="mt-3">Contact Us To Get More Information </h2>

          <img style="height: 500px; width: 500px;margin-top: 40px; object-fit: cover;" src="<?php echo get_stylesheet_directory_uri();?>/images/contact.jpg"/>
        </div>
      </div>
      <div class="form p-4 mb-4" >
      <?php 
  echo do_shortcode('[contact-form-7 id="5a53adc" title="Contact form 1"]');
  ?>




      </div>

  </div>
  </section>


<?php
get_footer();
?>
