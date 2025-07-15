<?php
/* Template Name: form updation */
get_sidebar('client');
?>
<!-- Fetch current user details -->
<?php
$current_user = wp_get_current_user();
if ($current_user->ID) {
    $first_name = $current_user->first_name;
    $last_name = $current_user->last_name;
    $display_name = $current_user->display_name;

} else {
    echo "User not logged in.";
}
?>
<main class="content">
<div id="message"></div>
        <h2 class="text-center">Update Profile</h2>
        <div class="container mt-5">
       <form  method="post" class="row g-3" enctype="multipart/form-data" id="uploadButton">
            <!-- First Name --> 
            <div class="col-md-6">
                <label for="firstName" class="form-label">First Name</label>
                <input type="text" class="form-control" name="first_name" value="<?php echo esc_attr($first_name); ?>" id="first_name" placeholder="Enter First Name">
            </div>
            <!-- Last Name -->
            <div class="col-md-6">
                <label for="lastName" class="form-label">Last Name</label>
                <input type="text" class="form-control" name="last_name"  value="<?php echo esc_attr($last_name); ?>"id="lastName" placeholder="Enter Last Name">
            </div>
            <!-- Display Name -->
            <div class="col-md-12">
                <label for="displayName" class="form-label">Display Name</label>
                <input type="text" class="form-control" name="display_name" value="<?php echo esc_attr($display_name); ?>" id="displayName" placeholder="Enter Display Name">
            </div>
            <!-- Image Upload -->
            <div class="col-md-12">
                <label for="profileImage" class="form-label">Upload Profile Image</label>
                <input type="file" class="form-control"  name="image">
            </div>
            <!-- Submit Button -->
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </div>
       </form>
</div>
