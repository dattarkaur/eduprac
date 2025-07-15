<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>
    <!-- Sidebar -->
    <aside class="sidebar">
        <div class="sidebar-header">
          <a href=""><img src="<?php echo get_stylesheet_directory_uri();?>/images/logo.avif" height="60" width="70" style="border-radius: 50%;"></a>
        </div>
        <ul class="sidebar-menu">
            <li><a href="#">Dashboard</a></li>
            <li><a href="<?php echo home_url('/?page_id=441'); ?>">My Profile</a></li>
            <li><a href="<?php echo home_url('/?page_id=652'); ?>">Reset Password</a></li>
            <li><a href="<?php echo wp_logout_url( home_url()); ?>">Logout</a></li>

        </ul>
    </aside>
</body>
</html>











