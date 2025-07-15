<?php
/* Template Name: Signup */
if( is_user_logged_in() ) {
    wp_redirect( home_url( '/?msg=' . urlencode( __( 'Already Logged in', 'teamed' ) ) ) ); // send to homepage
}
$field_messages = array();
if( isset($_POST['first_name']) && ( !isset($_POST['phone']) || empty($_POST['phone']) ) ) {
    $error = false;
    $required_fields = ['user_account_type', 'first_name', 'last_name', 'email', 'password', 'confirm_password', 'terms'];
    foreach( $required_fields as $field):
        if( !isset($_POST[$field]) || empty($_POST[$field])){
            $error = true;
            $field_messages[$field] = __('This field is required', 'teamed');
        }
    endforeach;
    if( !$error ) {
        if( strlen( $_POST['password'] ) < 5 ) {
            $field_messages['password'] = __('Passwords must be at least 5 characters long', 'teamed');
            $error = true;
        }
        if( $_POST['password'] != $_POST['confirm_password'] ) {
            $field_messages['password'] = $field_messages['confirm_password'] = __('Passwords must match', 'teamed');
            $error = true;
        }
        if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
            $error = true;
            $field_messages['email'] = __('Invalid Email Address', 'teamed');
        } elseif( email_exists($_POST['email']) ) {
            $field_messages['email'] = __('Email already registered', 'teamed');
            $error = true;
        }
    }
    if( !$error ){
        $username = $orig_username = sanitize_user( $_POST['email'] );
        $counter = 1;
        while( username_exists($username) ) {
            $username = $orig_username . $counter++;
        }
        $user_id = wp_insert_user([
            'user_pass' => $_POST['password'],
            'user_login' => $username,
            'user_email' => $_POST['email'],
            'first_name' => $_POST['first_name'],
            'last_name' => $_POST['last_name'],
            'display_name' => $_POST['first_name'] . ' ' . $_POST['last_name'],
            'role' => 'subscriber'
        ]);
        if( !is_wp_error($user_id)){
            update_field( 'user_type', 'client', 'user_' . $user_id );
            if( isset( $_POST['teamed__signup'] ) ) {
                if( $_POST['user_account_type'] == 'teammate' ){
                    update_field( 'user_type', 'teammate', 'user_' . $user_id );
                }
            }
            wp_redirect( home_url( '/verify-your-email/' ) );
        }
    }
}
get_header();
?>
<main class="new-site-wrap signup-page-wrapper">
    <div class="container">
        <div class="single-job-back"><a href="<?php echo get_permalink( 37552 ); ?>"><i class="fa fa-angle-left"></i><span><?php _e( 'Back to Job Board', 'teamed' ); ?></span></a></div>
        <h1><?php the_title(); ?></h1>
        <div class="signup-subtitle"><?php the_field('signup_sub_title'); ?></div>
        <div class="signup-form-wrapper">
            <form class="signup-form" method="POST">
                <div class="t-form-row">
                    <div class="t-form-field t-half-field <?php echo ( array_key_exists('user_account_type', $field_messages) ? 'has-error' : '' ); ?>">
                        <label class="t-checkbox"><input type="radio" name="user_account_type" value="client" <?php echo (isset($_GET['tp']) && $_GET['tp'] === 'client') ? 'checked' : ''; ?> /><span><?php _e( 'Hiring Account ', 'teamed' ); ?></span></label>
                    </div>
                    <div class="t-form-field t-half-field <?php echo ( array_key_exists('user_account_type', $field_messages) ? 'has-error' : '' ); ?>">
                        <label class="t-checkbox"><input type="radio" name="user_account_type" value="teammate" <?php echo (isset($_GET['tp']) && $_GET['tp'] === 'teammate') ? 'checked' : ''; ?> /><span><?php _e( 'Job Seeker Account  ', 'teamed' ); ?></span></label>
                    </div>
                </div>
                <div class="t-form-row">
                    <div class="t-form-field t-half-field <?php echo ( array_key_exists('first_name', $field_messages) ? 'has-error' : '' ); ?>">
                        <input type="text" name="first_name" placeholder="<?php _e( 'First Name', 'teamed' ); ?>" value="<?php echo ( isset( $_POST[
                        'first_name'] ) ? esc_attr($_POST['first_name']) : '' ); ?>" />
                        <?php echo ( array_key_exists('first_name', $field_messages) ? '<div class="t-field-error">'.$field_messages['first_name'] . '</div>' : '' ); ?>
                    </div>
                    <div class="t-form-field t-half-field <?php echo ( array_key_exists('last_name', $field_messages) ? 'has-error' : '' ); ?>">
                        <input type="text" name="last_name" placeholder="<?php _e('Last Name', 'teamed'); ?>" value="<?php echo ( isset( $_POST[
                        'last_name'] ) ? esc_attr($_POST['last_name']) : '' ); ?>" />
                        <?php echo ( array_key_exists('last_name', $field_messages) ? '<div class="t-field-error">'.$field_messages['last_name'] . '</div>' : '' ); ?>
                    </div>
                </div>
                <div class="t-form-row">
                    <div class="t-form-field <?php echo ( array_key_exists('email', $field_messages) ? 'has-error' : '' ); ?>">
                        <input type="email" name="email" placeholder="<?php _e( 'Email Address', 'teamed' ); ?>" value="<?php echo ( isset( $_POST[
                        'email'] ) ? esc_attr($_POST['email']) : '' ); ?>" />
                        <?php echo ( array_key_exists('email', $field_messages) ? '<div class="t-field-error">'.$field_messages['email'] . '</div>' : '' ); ?>
                    </div>
                </div>
                <div class="t-form-row">
                    <div class="t-form-field t-half-field <?php echo ( array_key_exists('password', $field_messages) ? 'has-error' : '' ); ?>">
                        <input type="password" name="password" placeholder="<?php _e('Password, at least 5 characters', 'teamed'); ?>" />
                        <?php echo ( array_key_exists('password', $field_messages) ? '<div class="t-field-error">'.$field_messages['password'] . '</div>' : '' ); ?>
                    </div>
                    <div class="t-form-field t-half-field <?php echo ( array_key_exists('confirm_password', $field_messages) ? 'has-error' : '' ); ?>">
                        <input type="password" name="confirm_password" placeholder="<?php _e('Confirm Password', 'teamed'); ?>" />
                        <?php echo ( array_key_exists('confirm_password', $field_messages) ? '<div class="t-field-error">'.$field_messages['confirm_password'] . '</div>' : '' ); ?>
                    </div>
                </div>
                <div class="t-form-row">
                    <div class="t-form-field t-half-field <?php echo ( array_key_exists('terms', $field_messages) ? 'has-error' : '' ); ?>">
                        <label class="t-checkbox"><input type="checkbox" name="terms" value="accept_terms" /><span><?php _e( 'I accept the ', 'teamed' ); ?> <a target="_blank" href="/terms-and-conditions/"><?php _e('Terms of Use', 'teamed'); ?></a> and <a target="_blank" href="/privacy-policy/"><?php _e('Privacy Policy', 'teamed'); ?></a></span></label>
                    </div>
                    <div class="t-half-field">
                        <label class="t-checkbox"><input type="checkbox" name="newsletter" value="teamed_newsletter" /><span><?php _e( 'Receive Teamed newsletter and tailored content ', 'teamed' ); ?></span></label>
                    </div>
                </div>
                <div class="t-form-row t-form-submit-cols">
                    <input type="hidden" name="selected_package" id="selected_package" value="" />
                    <input type="hidden" name="subscription" id="subscription" value="" />
                    <input type="hidden" name="phone" /> <?php // honeybot spam check ?>
                    <?php //if ( isset( $_GET['tp'] ) && 'client' == $_GET['tp'] ): ?>
                        <div class="t-form-submit">
                            <button type="submit" name="teamed__signup" value="hiring" class="button green"><?php _e("Create Account", 'teamed'); ?></button>
                        </div>
                    <!-- <?php //elseif( isset( $_GET['tp'] ) && 'teammate' == $_GET['tp'] ): ?>
                        <div class="t-form-submit">
                            <button type="submit" name="teamed__signup" value="candidate" class="button green"><?php// _e("Create Account", 'teamed'); ?></button>
                        </div>
                    <?php ///else: ?>
                        <div class="t-form-submit">
                            <button type="submit" name="teamed__signup" value="hiring" class="button green"><?php //_e("I'm Hiring", 'teamed'); ?></button>
                        </div>
                        <div class="t-form-submit">
                            <button type="submit" name="teamed__signup" value="candidate" class="button green"><?php //_e("I'm a Candidate", 'teamed'); ?></button>
                        </div>
                    <?php //endif ?> -->
                </div>
            </form>
        </div>
    </div>
</main>
<?php
get_footer();