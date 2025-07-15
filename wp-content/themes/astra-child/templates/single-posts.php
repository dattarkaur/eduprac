

<?php
get_header(); 

if (have_posts()) :
    while (have_posts()) : the_post(); ?>

    <div class="container mt-5">
        <div class="card p-4 border">
            <h1><?php the_title(); ?></h1>

            <!-- Featured Image -->
            <?php if (has_post_thumbnail()) : ?>
                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>" class="img-fluid rounded mb-3" alt="<?php the_title(); ?>">
            <?php endif; ?>

            <div class="post-content">
                <?php the_content(); ?>
            </div>
        </div>
    </div>

    <?php endwhile;
endif;

get_footer();
?>


