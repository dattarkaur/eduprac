<?php
/*  Template name: Show post list  */
get_header();
?>

<div class="container w-75 border mt-5 mb-5">
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
        echo '<div class="service-item">';
        echo '<h4 class="post-title">'. get_the_title(). '</h4>';
        //  Display Categories 
            
            $categories = get_the_terms(get_the_ID(), 'service_category'); // Replace with your taxonomy
            if (!empty($categories) && !is_wp_error($categories)) {
                foreach ($categories as $category) {
                    echo esc_html($category->name) . ' ';
                }
            } else {
                echo 'No category assigned';
            }

            $job_types = get_the_terms(get_the_ID(), 'job-type'); 

    if (!empty($job_types) && !is_wp_error($job_types)) {
        foreach ($job_types as $job_type) {
            echo esc_html($job_type->name) . ' ';
        }
    } else {
        echo 'No job type assigned';
    }
        
    $industries = get_the_terms(get_the_ID(), 'industries');

    if (!empty($industries) && !is_wp_error($industries)) {
        foreach ($industries as $industry) {
            echo esc_html($industry->name) . ' ';
        }
    } else {
        echo 'No industry assigned';
    }


    $country = get_field('post_country'); // Fetch ACF field value

if ($country) {
    echo '<p><strong>Country:</strong> ' . esc_html($country) . '</p>';
} else {
    echo '<p><strong>Country:</strong> Not selected</p>';
}

        echo '<div class="featured-image mt-4 mb-4 ">'. get_the_post_thumbnail(get_the_ID(), 'medium'). '</div>';
         echo '<div class="service-content">' . get_field('post_content') . '</div>';
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









