
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


  $cardImage = get_field('card_image');
  $cardHeading = get_field('card_heading');
  $cardDesc = get_field('card_desc');
  $cardButton = get_field('card_button');

  $cardImage2 = get_field('card_image2');
  $cardHeading2 = get_field('card_heading2');
  $cardDesc2 = get_field('card_desc2');
  $cardButton2 = get_field('card_button2');

  $cardImage3 = get_field('card_image3');
  $cardHeading3 = get_field('card_heading3');
  $cardDesc3 = get_field('card_desc3');
  $cardButton3 = get_field('card_button3');

  $cardImage4 = get_field('card_image4');
  $cardHeading4 = get_field('card_heading4');
  $cardDesc4 = get_field('card_desc4');
  $cardButton4 = get_field('card_button4');                

  $cardImage5 = get_field('card_image5');
  $cardHeading5 = get_field('card_heading5');
  $cardDesc5 = get_field('card_desc5');
  $cardButton5 = get_field('card_button5');

  $cardImage6 = get_field('card_image6');
  $cardHeading6 = get_field('card_heading6');
  $cardDesc6 = get_field('card_desc6');
  $cardButton6 = get_field('card_button6');


  
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
  <section id="myservices">
    <div class="conatiner"style="margin-top:60px;">
        <div class="container">
            <div class="row ">
              <!-- Card 1 -->
              <div class="col-md-4">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                  <img src="<?=$cardImage;?>" class="card-img-top" alt="Card Image">
                  <div class="card-body text-center">
                    <h5 class="card-title"><?=$cardHeading;?></h5>
                    <p class="card-text"><?=$cardDesc;?></p>
                    <a href="https://google.com" class="btn btn-outline-danger"><?=$cardButton;?></a>
                    </div>
                </div>
              </div>

              
              <!-- Card 2 -->
              <div class="col-md-4">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                <img src="<?=$cardImage2;?>" class="card-img-top" alt="Card Image">
                <div class="card-body text-center">
                <h5 class="card-title"><?=$cardHeading2;?></h5>
                <p class="card-text"><?=$cardDesc2;?></p>
                <a href="https://google.com" class="btn btn-outline-danger"><?=$cardButton2;?></a>
                </div>
                </div>
              </div>
              <!-- Card 3 -->
              <div class="col-md-4">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                <img src="<?=$cardImage3;?>" class="card-img-top" alt="Card Image">
                  <div class="card-body text-center">
                  <h5 class="card-title"><?=$cardHeading3;?></h5>
                  <p class="card-text"><?=$cardDesc3;?></p>
                  <a href="https://google.com" class="btn btn-outline-danger"><?=$cardButton3;?></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="container ">
            <div class="row ">
              <!-- Card 1 -->
              <div class="col-md-4">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                <img src="<?=$cardImage4;?>" class="card-img-top" alt="Card Image">
                  <div class="card-body text-center">
                  <h5 class="card-title"><?=$cardHeading4;?></h5>
                  <p class="card-text"><?=$cardDesc4;?></p>
                  <a href="https://google.com" class="btn btn-outline-danger"><?=$cardButton4;?></a>
                  </div>
                </div>
              </div>
              <!-- Card 2 -->
              <div class="col-md-4">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                <img src="<?=$cardImage5;?>" class="card-img-top" alt="Card Image">
                  <div class="card-body text-center">
                  <h5 class="card-title"><?=$cardHeading5;?></h5>
                  <p class="card-text"><?=$cardDesc5;?></p>
                  <a href="https://google.com" class="btn btn-outline-danger"><?=$cardButton5;?></a>
                  </div>
                </div>
              </div>
              <!-- Card 3 -->
              <div class="col-md-4">
                <div class="card shadow-lg p-3 mb-5 bg-body rounded">
                <img src="<?=$cardImage6;?>" class="card-img-top" alt="Card Image">
                  <div class="card-body text-center">
                  <h5 class="card-title"><?=$cardHeading6;?></h5>
                  <p class="card-text"><?=$cardDesc6;?></p>
                    <a href="https://google.com" class="btn btn-outline-danger"><?=$cardButton6;?></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
