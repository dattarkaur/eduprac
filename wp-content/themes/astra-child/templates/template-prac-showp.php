<?php
/* Template name: show practice post list  */
get_header();
?>
<?php
$args = [
    'post_type' => 'products',
    'posts_per_page' => -1,
    'post_status'    => 'publish',

];

$products = new WP_Query($args);
?>
<!-- Search Form -->
<form id="searchFormListPrac" class="search-bar mt-5 mb-5 text-center w-75 gap-3 d-flex">
    <input type="text" id="searchInput" placeholder="Search Categories..." autocomplete="off" style="margin-left: 30%;">
    <button class="btn btn-danger" type="submit">Search</button>
</form>

<div class="container w-75 border mt-5 mb-5">
    <?php if ($products->have_posts()) : ?>
        <div class="service-list">
            <?php while ($products->have_posts()) : $products->the_post(); ?>
                <a href="<?php the_permalink(); ?>" style="text-decoration: none; color: inherit;">
                    <div class="service-item d-flex shadow p-3 mb-4 bg-white rounded" style="justify-content: space-between; box-shadow: 0 2px 6px rgba(0,0,0,0.1);">
                        
                        <!-- Featured Image -->
                        <div class="featured-image mt-4 mb-4">
                            <?php the_post_thumbnail('medium', array('style' => 'height: 50px; width: 50px; border-radius: 100%;')); ?>
                        </div>

                        <!-- Display Categories -->
                        <h4 class="mt-4 mx-5">
                            <?php
                            $categories = get_the_terms(get_the_ID(), 'products_category');
                            if (!empty($categories) && !is_wp_error($categories)) {
                                foreach ($categories as $category) {
                                    echo esc_html($category->name) . ' ';
                                }
                            } else {
                                echo 'No category assigned';
                            }
                            ?>
                        </h4>

                  
                       <!-- technology -->
                        <p class="mt-4 mx-5" style="font-weight: bolder;">
                            <?php
                            $technology = get_the_terms(get_the_ID(), 'technology');
                            if (!empty($technology) && !is_wp_error($technology)) {
                                foreach ($technology as $technology) {
                                    echo esc_html($technology->name) . ' ';
                                }
                            } else {
                                echo 'No technology assigned';
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
            <?php endwhile; ?>
        </div>
        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p>No services found.</p>
    <?php endif; ?>
</div>

<?php get_footer(); ?>