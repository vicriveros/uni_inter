<?php

get_header();

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1; // Get current page number
$args = array(
    'post_type' => 'carrera',
    'posts_per_page' => 10, // Number of posts per page
    'paged' => $paged,
    'orderby' => 'date',
    'order' => 'DESC',
);
$query = new WP_Query($args);
?>

<section class="bg-white dark:bg-gray-900 mb-2 pt-20 md:pt-5">
    <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-24 lg:px-6">
        <div class="max-w-screen-md mx-auto mb-8 text-center lg:mb-12">
            <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Nuestras Carreras</h2>
        </div>
        <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">

        <?php 
            if ($query->have_posts()) : 
                while ($query->have_posts()) : $query->the_post(); 
                    if ( has_post_thumbnail() ) { // check if the post has a featured image
                        $featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
                    }else{
                        $featured_img_url ='';
                    }
                ?>

                <div class="flex flex-col max-w-lg mx-auto text-gray-900 bg-white border border-gray-100 rounded-lg shadow  ">
                    <img class="rounded-t-lg" src="<?php echo $featured_img_url; ?>" alt="">
                    <h3 class="mb-4 text-2xl font-semibold px-4"> <?php the_title(); ?> </h3>
                    <div class="font-normal text-gray-700 mb-3 mx-4 sm:text-lg"> <?php the_excerpt(); ?> </div>
                    <a href="<?php the_permalink(); ?>" class="text-white bg-inter_red hover:shadow-lg hover:shadow-red-300 focus:ring-3 focus:ring-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-4 mb-4">Ver Carrera</a>
                </div>
                        
            <?php endwhile; ?>
            <?php else : ?>
                <p>No hay carreras para mostrar...</p>
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