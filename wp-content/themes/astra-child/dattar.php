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

    wp_enqueue_script('jquery');

    wp_enqueue_script('globel', get_stylesheet_directory_uri() . '/js/globel.js?' . strtotime('now'));

    wp_localize_script('globel', 'ajaxurl', admin_url('admin-ajax.php'));
}

add_action('wp_ajax_update_user_profile', 'update_user_profile');
add_action('wp_ajax_nopriv_update_user_profile', 'update_user_profile'); 

function update_user_profile() {
    $user_id = get_current_user_id();

    require_once ABSPATH . 'wp-admin/includes/file.php';
    require_once ABSPATH . 'wp-admin/includes/image.php';
    require_once ABSPATH . 'wp-admin/includes/media.php';

    if(!empty($_FILES['image'])) {
        $uploaded = media_handle_upload('image', 0);
        if (!is_wp_error($uploaded)){
            update_user_meta($user_id, 'profile_picture', $uploaded);
            echo '<p>Profile picture updated!</p>';
        } else {
            echo '<p>Error uploading image: ' . $uploaded->get_error_message() . '</p>';
        }
    }
    wp_update_user([
        'ID'           => $user_id,
        'first_name'   => sanitize_text_field($_POST['first_name']),
        'last_name'    => sanitize_text_field($_POST['last_name']),
        'display_name' => sanitize_text_field($_POST['display_name']),
    ]);
    echo '<p>Profile updated successfully!</p>';
    wp_die(); // End AJAX request properly
}


/**							
 * Your code goes below.
 */

