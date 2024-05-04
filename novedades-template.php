<?php
/*
Template Name: Novedades
*/

get_header();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Get current page number
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 10, // Number of posts per page
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC',
);
$query = new WP_Query($args);
?>

<section class="bg-white dark:bg-gray-900 mb-2 pt-20 md:pt-5">
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-24 lg:px-6">
		<div class="mx-8">

        <?php 
            if ($query->have_posts()) : 
                while ($query->have_posts()) : $query->the_post(); ?>

            <div class="mb-8">
                <h2 class="mt-3 mb-4 text-3xl font-extrabold tracking-tight text-gray-900 md:text-3xl dark:text-white">
                    <?php the_title(); ?>
                </h2>
                <div class="font-light text-gray-500 sm:text-xl dark:text-gray-400"> 
                        <?php the_excerpt(); ?>
                </div>
                <div class="pb-4 my-6 space-y-4 border-b border-gray-200 dark:border-gray-700">
                    <div>
                        <a href="<?php the_permalink(); ?>" class="inline-flex items-center text-base font-medium text-inter_red hover:text-red-700 "> Ver publicación
                            <i class="ml-2 fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>                    
                        
            <?php endwhile; ?>
            <?php else : ?>
                <p>No hay posts para mostrar...</p>
            <?php endif; ?>
            <?php
            // Pagination links
            echo paginate_links(array(
                'total' => $query->max_num_pages,
                'current' => max(1, $paged),
                'prev_text' => __('&laquo; Previous'),
                'next_text' => __('Next &raquo;'),
            ));
            ?>
        </div>                 
    </div>
</section>



<?php wp_reset_postdata(); // Reset post data query ?>
<?php get_footer();?>