<?php
/* Template Name: Login Template */
// if( is_user_logged_in() ) {
// 	wp_redirect( home_url() );
// 	die(); // already logged in, don't proceed
// }
		if( is_user_logged_in() ) {
			wp_redirect( home_url( '/' )  ); // send to homepage
		}

get_header();
?>

	<div class="container w-25 mt-5 shadow p-3 mb-5 bg-body-tertiary rounded">
	   <h3 class="text-center">Login US</h3>
	      <?php wp_login_form(); ?>
	         <div class="login-page-col">
		 				<div class="login-page-forgot text-center">
							<h6 class="mt-4"><?php _e( 'Forgot Password?', 'teamed' ); ?></h6>
							<a class="" href="/reset-password/"><?php _e( 'Recover My Password', 'teamed' ); ?></a>

							<?php// if( false ): ?>
							<h6 class="mt-3"><?php _e( "Don't have an account yet?", 'teamed' ); ?></h6>
							<a href="<?php echo home_url( '/create-an-account/' ) ; ?>"><?php _e( 'Create an Account', 'teamed' ); ?></a><br><br>
							<?php /*<a href="<?php echo get_permalink( 38886 ); ?>"><?php _e( 'I\'m Hiring', 'teamed' ); ?></a><br><br>
							<a href="<?php echo get_permalink( 34549 ); ?>"><?php _e( 'Become a Candidate', 'teamed' ); ?></a>*/ ?>
							<?php //endif; ?>
						</div>
			 </div>
	</div>

<?php
get_footer();
?>