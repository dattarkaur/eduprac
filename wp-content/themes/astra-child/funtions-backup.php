<?php
/**
 * Recommended way to include parent theme styles.
 * (Please see http://codex.wordpress.org/Child_Themes#How_to_Create_a_Child_Theme)
 *
 */  
add_action( 'wp_enqueue_scripts', 'astra_child_style' );
function astra_child_style() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css',array('parent-style') );
	wp_enqueue_style( 'style', get_stylesheet_directory_uri(). '/css/style.css?' . strtotime('now') );
	wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri() . '/css/bootstrap.css',array('child-style') );
	wp_enqueue_style( 'font-awesome', get_stylesheet_directory_uri() . '/css/font-awesome.css',array('child-style') );
	wp_enqueue_script( 'bootstrap-js', get_stylesheet_directory_uri() . '/js/bootstrap-js.js',array('child-style') );

    // ajax and jquery included
    wp_enqueue_script('jquery');
    wp_enqueue_script('globel', get_stylesheet_directory_uri() . '/js/globel.js?' . strtotime('now'));
    wp_localize_script('globel', 'ajaxurl', admin_url('admin-ajax.php'));
}

add_action('wp_ajax_update_user_profile', 'update_user_profile');
add_action('wp_ajax_nopriv_update_user_profile', 'update_user_profile'); 

function update_user_profile() {
    $user_id = get_current_user_id();
   
      // Validation example (check if name fields are empty)
      if (empty($_POST['first_name']) || empty($_POST['last_name']) || empty($_POST['display_name'])) {
        wp_send_json_error(array(
            'message' => 'All fields are required.'
        ));
        wp_die();
    }
    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';

    if(!empty($_FILES['image'])) {
        $uploaded = media_handle_upload('image', 0);

        if (!is_wp_error($uploaded)){
            update_user_meta($user_id, 'profile_picture', $uploaded);
        }
         else {
            wp_send_json_error(array('message' => 'Error uploading image: ' . $uploaded->get_error_message() . ''));
        }
    }
    wp_update_user([ 
        'ID'           => $user_id,
        'first_name'   => sanitize_text_field($_POST['first_name']),
        'last_name'    => sanitize_text_field($_POST['last_name']),
        'display_name' => sanitize_text_field($_POST['display_name']),
    ]);
  
   
    wp_send_json_success(array('message' => 'Profile updated successfully!'));
    wp_die(); // End AJAX request properly
}

//reset password

add_action('wp_ajax_reset_user_password', 'reset_user_password');
add_action('wp_ajax_nopriv_reset_user_password', 'reset_user_password'); // Allow guests
function reset_user_password() {
        $user_id = get_current_user_id();
        // Retrieve passwords from AJAX request
        $current_password = sanitize_text_field($_POST['current_password']);
        $new_password = sanitize_text_field($_POST['new_password']);
        $confirm_password = sanitize_text_field($_POST['confirm_password']);
        // Validate passwords
    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        wp_send_json_error(['message' => 'All fields are required.']);
        wp_die();
    }
    if ($new_password !== $confirm_password) {
        wp_send_json_error(['message' => 'New password and confirmation do not match.']);
        wp_die();
    }
     // Verify current password
    $user = get_user_by('ID', $user_id);
    if (!wp_check_password($current_password, $user->user_pass, $user_id)) {
        wp_send_json_error(['message' => 'Current password is incorrect.']);
        wp_die();
    }
        // Update password
        wp_set_password($new_password, $user_id);
        wp_send_json_success(['message' => 'Password updated successfully.']);
        wp_die();
}


// post
add_action('wp_ajax_create_custom_post', 'create_custom_post');
add_action('wp_ajax_nopriv_create_custom_post', 'create_custom_post'); // Allow non-logged-in users

    function create_custom_post() {

        if (empty($_POST['post_title']) || empty($_POST['post_content'])) {
                    wp_send_json_error(array(
                        'message' => 'All fields are required.'
                    ));
                    wp_die();
                }

                $new_post = array(
                    'post_title'    => $_POST['post_title'],
                    'post_status'   => 'publish',
                    'post_author'   => get_current_user_id(), // ID of the author
                    'post_type'     => 'services',
                    // 'post_category
                );
                $post_id = wp_insert_post($new_post);
                
                //update acf post content field               
                if ($post_id && !is_wp_error($post_id)) {

                    //taxonomies

                    if( isset( $_POST['service_category'])){
                        wp_set_post_terms( $post_id, $_POST['service_category'], 'service_category' );
                    }

                    if( isset( $_POST['job-type'])){
                        wp_set_post_terms( $post_id, $_POST['job-type'], 'job-type' );
                    }
                    if( isset( $_POST['industry'])){
                        wp_set_post_terms( $post_id, $_POST['industry'], 'industry' );
                    }

                    require_once ABSPATH . 'wp-admin/includes/file.php';
                    require_once ABSPATH . 'wp-admin/includes/image.php';
                    require_once ABSPATH . 'wp-admin/includes/media.php';
                
                    if(!empty($_FILES['feature_image'])) {
                        $uploaded = media_handle_upload('feature_image',0);
                
                        if (!is_wp_error($uploaded)){
                           set_post_thumbnail($post_id, $uploaded);  //if want to select default post feature image
                          //  update_field('featured_image', $uploaded, $post_id); //if set image in ACF field

                        }
                        else {
                            wp_send_json_error(array('message' => 'Error uploading image: ' . $uploaded->get_error_message() . ''));
                        }
                    }
                    
                    $post_content = sanitize_text_field($_POST['post_content']);
                    $post_skills = sanitize_text_field($_POST['post_skills']);
                    $post_qualifications = sanitize_text_field($_POST['post_qualifications']);
                    $post_experience = sanitize_text_field($_POST['post_experience']);
                    $post_qualifications = sanitize_text_field($_POST['post_qualifications']);
                    $post_address = sanitize_text_field($_POST['post_address']);
                    $post_country = sanitize_text_field($_POST['post_country']);

                    update_field('post_content', $post_content, $post_id);
                    update_field('post_skills', $post_skills, $post_id);
                    update_field('post_qualifications', $post_qualifications, $post_id);
                    update_field('post_experience', $post_experience, $post_id);
                    update_field('post_qualifications', $post_qualifications, $post_id);
                    update_field('post_address', $post_address, $post_id);
                    update_field('post_country', $post_country, $post_id);

                 wp_send_json_success(['message' => 'Post created successfully!']);
                } else {
                    wp_send_json_error(['message' => 'Not inserted']);
                       }     
    
    }


// add category

add_action('init', 'create_services_post_type');                         
function create_services_post_type() {
    register_post_type('services', array(
        'label'        => 'Services',
        'public'       => true,
        'supports'     => array('title', 'thumbnail', 'custom-fields'),
        'has_archive'  => true,
        'rewrite'      => array('slug' => 'services'),
    ));

    register_taxonomy('service_category', 'services', array(
        'label'        => 'Service Categories',
        'hierarchical' => true, // Works like standard WordPress categories
        'rewrite'      => array('slug' => 'service-category'),
        'show_admin_column' => true, // Displays in WP Admin for easy filtering
    ));

    register_taxonomy('job-type', 'services', array(
        'label'        => 'Job Type',
        'hierarchical' => true, // Works like standard WordPress categories
        'rewrite'      => array('slug' => 'job_type'),
        'show_admin_column' => true, // Displays in WP Admin for easy filtering
    ));

    register_taxonomy('industries', 'services', array(
        'label'        => 'Industry',
        'hierarchical' => true, // Works like standard WordPress categories
        'rewrite'      => array('slug' => 'industry'),
        'show_admin_column' => true, // Displays in WP Admin for easy filtering
    ));


    
}   

function ajax_search_pages() {
    $query = isset($_POST['query']) ? sanitize_text_field($_POST['query']) : '';

    if (!$query) {
        wp_send_json_error(['message' => 'No result found']);

        wp_die();
    }

    $args = array(
        'post_type'      => 'page',
        'posts_per_page' => -1,
        's'              => $query,
    );

    $query_results = new WP_Query($args);

    if ($query_results->have_posts()) {
        while ($query_results->have_posts()) : $query_results->the_post();
        $results[] = [
            'page_title' => get_the_title(),
            'page_link'  => get_permalink(),
        ];
        endwhile;
        wp_send_json_success(['results' => $results]);
    } else {
        wp_send_json_error(['message' => 'No pages found']);
    }
    wp_die();
}



add_action('wp_ajax_search_category', 'search_category');
add_action('wp_ajax_nopriv_search_category', 'search_category');

function search_category() {
    $query = sanitize_text_field($_POST['query']); 

    // Fetch posts matching the search query
    $args = array(
        'post_type'      => 'services',
        'post_status'    => 'publish',
        'tax_query'      => array(
            array(
                'taxonomy' => 'service_category',
                'field'    => 'name',
                'terms'    => $query,
                'operator' => 'LIKE',
            ),
        ),
    );

    $service_query = new WP_Query($args);

    if ($service_query->have_posts()) {
        while ($service_query->have_posts()) {
            $service_query->the_post();

            ?>

            <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit;">
                <div class="service-item d-flex shadow p-3 mb-4 bg-white rounded" style="justify-content: space-between; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                    
                    <!-- Featured Image -->
                    <div class="featured-image mt-4 mb-4">
                        <?php the_post_thumbnail('medium', array('style' => 'height: 50px; width: 50px; border-radius: 100%;')); ?>
                    </div>

                    <!-- Display Categories -->
                    <h4 class="mt-4 mx-5">
                        <?php
                        $categories = get_the_terms(get_the_ID(), 'service_category');
                        if (!empty($categories) && !is_wp_error($categories)) {
                            foreach ($categories as $category) {
                                echo esc_html($category->name) . ' ';
                            }
                        } else {
                            echo 'No category assigned';
                        }
                        ?>
                    </h4>

                    <!-- Job Type -->
                    <p class="mt-4 py-2 mx-2 px-4" style="font-weight: bolder; background-color: rgb(247, 230, 230); color: rgb(241, 21, 21); border-radius: 20%;">
                        <?php
                        $job_types = get_the_terms(get_the_ID(), 'job-type');
                        if (!empty($job_types) && !is_wp_error($job_types)) {
                            foreach ($job_types as $job_type) {
                                echo esc_html($job_type->name) . ' ';
                            }
                        } else {
                            echo 'No job type assigned';
                        }
                        ?>
                    </p>

                    <!-- Industry -->
                    <p class="mt-4 mx-5" style="font-weight: bolder;">
                        <?php
                        $industries = get_the_terms(get_the_ID(), 'industries');
                        if (!empty($industries) && !is_wp_error($industries)) {
                            foreach ($industries as $industry) {
                                echo esc_html($industry->name) . ' ';
                            }
                        } else {
                            echo 'No industry assigned';
                        }
                        ?>
                    </p>

                    <!-- Country -->
                    <p class="mt-4">
                        <?php
                        $country = get_field('post_country');
                        if ($country) {
                            $field_object = get_field_object('post_country');
                            if (isset($field_object['choices'][$country])) {
                                echo '<i class="fas fa-map-marker-alt"></i> ' . esc_html($field_object['choices'][$country]);
                            } else {
                                echo 'Country: Not found';
                            }
                        } else {
                            echo 'Country: Not selected';
                        }
                        ?>
                    </p>

                    <!-- View Details Button -->
                    <button class="btn btn-danger btn-block mt-4" style="height: 40px; margin-left: 80px; border-radius: 20%;">View Details</button>

                </div>
            </a>

        <?php
        }
    } else {
        echo '<p>No results found</p>';
    }

    wp_die();
}




