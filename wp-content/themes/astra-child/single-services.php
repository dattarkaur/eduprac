
<?php get_header(); ?>
<div class="container gap-5 d-flex ">
<div class="container  mt-5 " style="background-color: rgb(244, 247, 246); padding: 60px; width: 1500px">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <div class="container mt-2 d-inline-flex align-items-center shadow-sm p-3 mb-5 bg-white rounded" 
       style="height: 130px; width: 600px; border: 2px solid rgb(240, 233, 233); padding: 10px;">

       <!-- Image -->
       <img src="./wp-content/themes/astra-child/images/lenovo.png" alt="" style="height: 90px;">

      <!-- Category Title -->
       <div class="ms-3">
        <h2 class="fw-bold">
            <?php  
            $categories = get_the_terms(get_the_ID(), 'service_category'); 
            echo !empty($categories) && !is_wp_error($categories) ? esc_html($categories[0]->name) : 'None'; 
            ?>
        </h2>

         <!-- Country  -->
            <div class="mt-2 fw-bold text-secondary">
              <i class="fas fa-map-marker-alt me-2"></i> 
               <?php 
               $country = get_field('post_country');
               $field_object = get_field_object('post_country');
               echo $country && isset($field_object['choices'][$country]) ? esc_html($field_object['choices'][$country]) : 'Not selected'; 
               ?>
            </div>
     </div>

       </div>
      
        <div class="post-content">
          <?php
          $post_content = get_field('post_content');
          if ($post_content) {
          echo '<p class="fs-4 "><strong>Job Description:</strong></p>' . wp_kses_post($post_content);
          } else {
          echo '<p><strong>Description:</strong> Not specified</p>';
          }
          ?>
        </div>

        <div class="meta-info">
            <?php
            $skills = get_field('post_skills');
            $qualifications = get_field('post_qualifications');
            ?>
        
          <?php
          if ($skills) {
          echo  '<p><strong class="fs-4">Skills:</strong> ' . esc_html($skills) . '</p>';
          } else {
          echo '<p><strong class="fs-4">Skills:</strong> Not specified</p>';
          }
          ?>

       
         <?php
         if ($qualifications) {
          echo  '<p><strong class="fs-4">Qualifications:</strong> ' . esc_html($qualifications) . '</p>';
         } else {
         echo '<p><strong >Qualifications:</strong> Not specified</p>';
         }
         ?>

        </div>
     <?php endwhile; endif; ?>
</div>

            <!-- sidebar -->
    <div class="container mt-5  shadow-sm p-3 mb-5 bg-white rounded"  style="width: 60%; border: 2px solid rgb(241, 237, 237);"> 

        <h4 class="fw-bold">Job Information</h4>
        <hr>

           <?php $job_types = get_the_terms(get_the_ID(), 'job-type'); ?>
            <p><i class="fas fa-map-marker-alt me-2"></i> 
            <strong class="fs-5">Job Type:</strong><br>
                <p class=" text-success fw-bold" style="margin-left: 23px;"> <?php echo $job_types ? esc_html($job_types[0]->name) : 'None'; ?></p>
            </p>


            <i class="fas fa-map-marker-alt me-2"></i>
             <strong class="fs-5">Location:</strong><br>
            <?php 
                $country = get_field('post_country');
                $field_object = get_field_object('post_country');
                echo '<p class="text-success fw-bold mt-3" style="margin-left: 23px;">' . 
                    (isset($country, $field_object["choices"][$country]) ? esc_html($field_object["choices"][$country]) : "Not selected") .  
                '</p>'; 
            ?>

            <i class="fas fa-desktop me-2"></i>
            <strong class="fs-5">Category:</strong><br>
            <?php  
            $categories = get_the_terms(get_the_ID(), 'service_category'); 
            echo '<p class="text-success fw-bold mt-3" style="margin-left: 23px;">' . (!empty($categories) && !is_wp_error($categories) ? esc_html($categories[0]->name) : 'None') . '</p>';
            ?>      



            <i class="fas fa-map-marker-alt me-2"></i>
        <?php $experience = get_field('post_experience');
         if ($experience) {

         echo  '<strong class="fs-5">Experience:</strong><br> <p class="text-success fw-bold mt-3" style="margin-left: 23px;">' . esc_html($experience) . '</p>';

        } else {
         echo '<p><strong >Experience:</strong> Not specified</p>';
         }
         ?>


            <?php
            $industries = get_the_terms(get_the_ID(), 'industries'); ?>
                       
            <p> <i class="fas fa-map-marker-alt me-2"></i><strong class="fs-4 ">Industry:</strong><br>
            <?php  echo '<p class="text-success fw-bold mt-3" style="margin-left: 23px; "  >' . ($industries ? esc_html($industries[0]->name) : 'None') . '</p>'; 
            ?>

        </p>
        <div class="featured-image mt-5">
         <?php  the_post_thumbnail('large'); ?>
        </div>




    </div>
</div>
<?php get_footer(); ?>
