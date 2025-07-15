<?php
/*  Template name: Show post list  */
get_header();
?>

<div class="container w-75 border mt-5">
<?php
$args = array(
    'post_type'      => 'services', // your CPT slug
    'posts_per_page' => -1,
    'post_status'    => 'publish',  
);

    $service_query = new WP_Query($args);  

    if ($service_query->have_posts()) :
        echo '<div class="service-list ">';
      while ($service_query->have_posts()) : $service_query->the_post();
            // '<div class="box shadow p-3 mb-5 bg-white rounded">'; 
                echo '<div class="service-item d-flex" style="justify-content: space-between;">';
                echo '<div class="featured-image mt-4 mb-4">
                ' . get_the_post_thumbnail(get_the_ID(), 'medium', array('style' => 'height: 40px; width: auto; border-radius:100%')) . '
                    </div>';
            
            // echo '<h4 class="post-title">'. get_the_title(). '</h4>';
        
            //  Display Categories 
          echo  '<a href="' . get_permalink() . '" data-id="<?php echo get_the_ID(); ?>" style="text-decoration: none; color: inherit;">';
            $categories = get_the_terms(get_the_ID(), 'service_category'); // Replace with your taxonomy
            if (!empty($categories) && !is_wp_error($categories)) {
                echo '<h4 class="mt-4 mx-5">';
                foreach ($categories as $category) {
                    echo esc_html($category->name) . ' ';
                }
                echo '</h4>';
                } else {
                echo '<h4>No category assigned</h4>';
            }
            echo '</a>';
        
            
         //job type
         echo  '<a href="' . get_permalink() . '" data-id="<?php echo get_the_ID(); ?>" style="text-decoration: none; color: inherit;">';
            $job_types = get_the_terms(get_the_ID(), 'job-type'); 
            if (!empty($job_types) && !is_wp_error($job_types)) {
                echo '<p class="mt-4 py-2 mx-2 px-4" style= "font-weight: bolder; background-color: rgb(216, 231, 216); color: rgb(22, 94, 22);border-radius: 20%;" >';

                foreach ($job_types as $job_type) {
                echo esc_html($job_type->name) . ' ';
                }
                echo '<br>';
                } else {
                echo 'No job type assigned</p>';
            }
            echo '</a>';


          //industry
          echo  '<a href="' . get_permalink() . '" data-id="<?php echo get_the_ID(); ?>" style="text-decoration: none; color: inherit;">';
            $industries = get_the_terms(get_the_ID(), 'industries');
            if(!empty($industries) && !is_wp_error($industries)) {
                echo '<p class="mt-4 mx-5" style="font-weight: bolder;" >';
                foreach ($industries as $industry) {
                echo esc_html($industry->name) . ' ';
                }
            } 
            else {
            echo 'No industry assigned</p>';
            }
            echo '</a>';



          //country
          echo  '<a href="' . get_permalink() . '" data-id="<?php echo get_the_ID(); ?>" style="text-decoration: none; color: inherit;">';
            $country = get_field('post_country'); // Get the selected country key
                if ($country) {
                // Get the field object to access the choices
                $field_object = get_field_object('post_country');
            
                    // Check if the selected key exists in the choices array and retrieve the label
                        if (isset($field_object['choices'][$country])) {
                            $country_label = $field_object['choices'][$country]; // Get the label from the choices
                                echo '<p class="mt-4"><i class="fas fa-map-marker-alt"></i> ' . esc_html($country_label) . '</p>';
                            } else {
                                echo '<p>Country: Not found</p>';
                        }
                    } else {
                    echo '<p>Country: Not selected</p>';
                } 
                echo '</a>';

      
                echo '<a href="' . get_permalink() . '"  class="btn btn-success btn-block mt-4" style="height: 40px; margin-left: 80px; border-radius: 20%;">View Details</a>';
         // echo '</div>';

            echo '</div>';
    
      endwhile;
        echo '</div>';
     wp_reset_postdata();
     else :
     echo '<p>No services found.</p>';
    endif;
?>
</div>

<?php
get_footer();
?>








