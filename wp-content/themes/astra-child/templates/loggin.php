<?php
/* Template Name: Login */
if( is_user_logged_in() ) {
	wp_redirect( home_url() );
	die(); // already logged in, don't proceed
}
get_header();

?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
	<div class="login-page-wrapper">
		<div class="container ">
			<?php if ( isset( $_GET['from-alert-creation'] ) ): ?>
				<div class="login-page-alert-creation"><?php _e( 'You must be logged in to receive job alerts.', 'teamed' ); ?></div>
			<?php endif; ?>
			<div class="login-page-cols">
				<div class="login-page-col">
					<div class="login-page">	
						<h4><?php _e( 'Login', 'teamed' ); ?></h4>
						<?php wp_login_form(); ?>
					</div>
				</div>
				<div class="login-page-col">
					<div class="login-page-forgot">
						<h4><?php _e( 'Forgot Password?', 'teamed' ); ?></h4>
						<a href="/reset-password/"><?php _e( 'Recover My Password', 'teamed' ); ?></a>

						<?php// if( false ): ?>
						<h4><?php _e( "Don't have an account yet?", 'teamed' ); ?></h4>
						<a href="<?php echo home_url( '/create-an-account/' ) ; ?>"><?php _e( 'Create an Account', 'teamed' ); ?></a><br><br>
						<?php /*<a href="<?php echo get_permalink( 38886 ); ?>"><?php _e( 'I\'m Hiring', 'teamed' ); ?></a><br><br>
						<a href="<?php echo get_permalink( 34549 ); ?>"><?php _e( 'Become a Candidate', 'teamed' ); ?></a>*/ ?>
						<?php //endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endwhile; ?>
<?php endif; ?>
<script>
    jQuery(document).ready(function() {
        var localSelectedPackage = localStorage.getItem('selectedPackage');
        var localSubscriptionType = localStorage.getItem('subscriptionType');
        if (localSelectedPackage && localSubscriptionType) {
            var redirect_url = "/select-a-package";
            sessionStorage.setItem('redirect_url', redirect_url);
        }
    });

</script>
<?php
get_footer();