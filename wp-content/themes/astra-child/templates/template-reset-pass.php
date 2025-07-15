
<?php
/* Template Name: Reset Password */
?>

<?php get_sidebar('client'); ?>
<?php $current_user = wp_get_current_user(); ?>
<main class="content">
<div id="message"></div> <!-- Response Message -->
    <h2 class="text-center">Change Password</h2>
    <div class="container mt-5">
        <form class="row g-3" method="post" id="reset-password-form">
            <!-- Current Password -->
            <div class="col-md-12">
                <label for="current_password" class="form-label">Current Password</label>
                <input type="password" name="current_password" id="current_password" class="form-control">
            </div>
            <!-- New Password -->
            <div class="col-md-12">
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" name="new_password" id="new_password" class="form-control">
            </div>
            <!-- Confirm New Password -->
            <div class="col-md-12">
                <label for="confirm_password" class="form-label">Confirm New Password</label>
                <input type="password" name="confirm_password" id="confirm_password" class="form-control" >
            </div>
            <!-- Submit Button -->
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary mt-3">Update Password</button>
            </div>
        </form>
    </div>
</main>