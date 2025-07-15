<?php
/* Template name: Account template */
// if( is_user_logged_in() ) {
//   wp_redirect( home_url( '/?msg=' . urlencode( __( 'Already Logged in', 'teamed' ) ) ) ); // send to homepage
// }

get_header();

$field_messages = array();
if( isset($_POST['first_name'])){
    $error = false;
    $required_fields = ['user_account_type', 'first_name', 'last_name', 'email', 'password', 'confirm_password'];
    foreach( $required_fields as $field):
        if( !isset($_POST[$field]) || empty($_POST[$field])){
            $error = true;
            $field_messages[$field] = __('This field is required');
        }
    endforeach;

    if( !$error ) {
        if( strlen( $_POST['password'] ) < 5 ) {
            $field_messages['password'] = __('Passwords must be at least 5 characters long');
            $error = true;
        }
        if( $_POST['password'] != $_POST['confirm_password'] ) {
            $field_messages['password'] = $field_messages['confirm_password'] = __('Passwords must match');
            $error = true;
        }
        if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
            $error = true;
            $field_messages['email'] = __('Invalid Email Address');
        } elseif( email_exists($_POST['email']) ) {
            $field_messages['email'] = __('Email already registered');
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
          if( $_POST['user_account_type'] == 'user' ){
              update_field( 'user_type', 'user', 'user_' . $user_id );
          }else {
              update_field( 'user_type', 'client', 'user_' . $user_id );
          }
          wp_redirect( home_url( '/' ) );
       }
    
    }
}
     
?>
<section>
  <div class="container text-center">
    <h1 class="mt-5">Create an Account</h1>
    <a class="link-offset-2 link-underline link-underline-opacity-0 link-success" href="/">Or sign in if you already
      have an account
    </a>
  </div>
</section>

<section>
  <div class="container mt-5 w-75">
    <form class="row" method="post">
      <div class="col-md-6">
        <div
          class="form-check <?php echo ( array_key_exists('user_account_type', $field_messages) ? 'has-error' : '' ); ?>">
          <label class="form-check-label user-type">
            <input type="radio" class="form-check-input" value="client" name="user_account_type" type="radio">
            Hiring Account
          </label>
        </div>
      </div>

      <div class="col-md-6">
        <div
          class="form-check <?php echo (array_key_exists('user_account_type', $field_messages) ? 'has-error' : '' ); ?>">
          <label class="form-check-label user-type" for="radioDisabled">
            <input type="radio" class="form-check-input" value="user" name="user_account_type" type="radio">
            Job Seeker Account
          </label>
        </div>
      </div>

      <div class="col-md-6 mt-3 <?php echo ( array_key_exists('first_name', $field_messages) ? 'has-error' : '' ); ?>">
        <input type="text" class="form-control" name="first_name" placeholder="First Name">
        <?php echo ( array_key_exists('first_name', $field_messages) ? '<div class="t-field-error">'.$field_messages['first_name'] . '</div>' : '' ); ?>
      </div>


      <div class="col-md-6 mt-3 <?php echo ( array_key_exists('last_name', $field_messages) ? 'has-error' : '' ); ?>">
        <input type="text" class="form-control" name="last_name" placeholder="Last Name">
        <?php echo ( array_key_exists('last_name', $field_messages) ? '<div class="t-field-error">'.$field_messages['last_name'] . '</div>' : '' ); ?>
      </div>


      <div class="col-md-12 mt-5 <?php echo ( array_key_exists('email', $field_messages) ? 'has-error' : '' ); ?>">
        <input type="email" class="form-control" name="email" placeholder="Email Address">
        <?php echo ( array_key_exists('email', $field_messages) ? '<div class="t-field-error">'.$field_messages['email'] . '</div>' : '' ); ?>
      </div>


      <div class="col-md-6 mt-5 mb-5 <?php echo ( array_key_exists('password', $field_messages) ? 'has-error' : '' );
        ?>">
        <input type="password" class="form-control" name="password" placeholder="Password, at least 5 characters">
        <?php echo ( array_key_exists('password', $field_messages) ? '<div class="t-field-error">'.$field_messages['password'] . '</div>' : '' ); ?>
      </div>


      <div
        class="col-md-6 mt-5 mb-5 <?php echo ( array_key_exists('confirm_password', $field_messages) ? 'has-error' : '' ); ?>">
        <input type="password" class="form-control" name="confirm_password" placeholder="confirm Password">
        <?php echo ( array_key_exists('confirm_password', $field_messages) ? '<div class="t-field-error">'.$field_messages['confirm_password'] . '</div>' : '' ); ?>
      </div>


      <button class="btn btn-success w-25 d-block mx-auto mb-5" name="teamed__signup">Create Account</button>

    </form>
  </div>

</section>
<?php
  get_footer();
?>