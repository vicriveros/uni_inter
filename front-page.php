<?php get_header();?>

	<?php
        // Query the latest post
        $latest_post = new WP_Query(array('posts_per_page' => 1));

        // Check if there are posts
        if ($latest_post->have_posts()) {
            while ($latest_post->have_posts()) {
                $latest_post->the_post();
				$image_url = wp_get_attachment_image_src( get_post_thumbnail_id( the_ID() ), 'single-post-thumbnail' );

	?>
                
    <!-- Start block -->
    <section class="bg-white dark:bg-gray-900 mb-2 pt-5">
        <div class="grid max-w-screen-xl px-4 pt-20 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:pt-28">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl dark:text-white"> <?php the_title(); ?> </h1>
                <div class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
					<?php the_excerpt(); ?>
				</div> 
                
                <div class="sm:flex mt-5">
                   
                    <a href="<?php echo esc_url(get_permalink()); ?>" class="inline-flex items-center justify-center text-inter_red border-2 border-inter_red hover:bg-inter_red hover:text-white focus:ring-3 focus:ring-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 focus:outline-none ">Ver mas...</a>

                </div>
            </div>
            <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">
                <img src="<?php echo $image_url[0]; ?>" class="rounded-md" alt="hero image">
            </div>                
        </div>
    </section>
    <!-- End block -->
	<?php
            }
        }

        // Restore original post data
        wp_reset_postdata();
    ?>

    <!-- Start block -->
    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="items-center max-w-screen-xl px-4 py-8 mx-auto lg:grid lg:grid-cols-4 lg:gap-16 xl:gap-24 lg:py-24 lg:px-6">
            <div class="col-span-2 mb-8">
                <h2 class="mt-3 mb-4 text-3xl font-extrabold tracking-tight text-gray-900 md:text-3xl dark:text-white">¿Por qué elegir la Universidad Internacional?</h2>
                <div class="font-light text-gray-500 sm:text-xl dark:text-gray-400"> 
					<?php echo get_field('texto_porque_inter'); ?> 
				</div>
                <div class="pt-6 mt-6 space-y-4 border-t border-gray-200 dark:border-gray-700">
                    <div>
                        <a href="/carrera" class="inline-flex items-center text-base font-medium text-inter_red hover:text-red-700 "> Explora nuestras Carreras
                        <i class="ml-2 fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                    <div>
                        <a href="/novedades" class="inline-flex items-center text-base font-medium text-inter_red hover:text-red-700 "> Novedades en la Universidad
                            <i class="ml-2 fa-solid fa-arrow-right"></i>
                        </a>  
                    </div>
                </div>
            </div>
            <div class="col-span-2 space-y-8 md:grid md:grid-cols-2 md:gap-12 md:space-y-0">
                <div>
                    <i class="text-5xl mb-2 text-inter_red fa-solid fa-building-columns"></i>
                    <h3 class="mb-2 text-2xl font-bold dark:text-white"><?php echo get_field('dato_1'); ?></h3>
                    <p class="font-light text-gray-500 dark:text-gray-400"><?php echo get_field('texto_dato_1'); ?></p>
                </div>
                <div>
                    <i class="text-5xl mb-2 text-inter_red fa-solid fa-graduation-cap"></i>
                    <h3 class="mb-2 text-2xl font-bold dark:text-white"><?php echo get_field('dato_2'); ?></h3>
                    <p class="font-light text-gray-500 dark:text-gray-400"><?php echo get_field('texto_dato_2'); ?></p>
                </div>
                <div>
                    <i class="text-5xl mb-2 text-inter_red fa-solid fa-scroll"></i>
                    <h3 class="mb-2 text-2xl font-bold dark:text-white"><?php echo get_field('dato_3'); ?></h3>
                    <p class="font-light text-gray-500 dark:text-gray-400"><?php echo get_field('texto_dato_3'); ?></p>
                </div>
                <div>
                    <i class="text-5xl mb-2 text-inter_red fa-solid fa-chalkboard-user"></i>
                    <h3 class="mb-2 text-2xl font-bold dark:text-white"><?php echo get_field('dato_4'); ?></h3>
                    <p class="font-light text-gray-500 dark:text-gray-400"><?php echo get_field('texto_dato_4'); ?></p>
                </div>
            </div>
        </div>
      </section>
    <!-- End block -->

    <!-- Start block -->
    <section class="bg-white dark:bg-gray-900">
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-24 lg:px-6">
            <div class="max-w-screen-md mx-auto mb-8 text-center lg:mb-12">
                <h2 class="mb-4 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white">Perfiles de los egresados de nuestras carreras</h2>
                <div class="mb-5 font-light text-gray-500 sm:text-xl dark:text-gray-400">
					<?php echo get_field('texto_perfiles'); ?>
				</div>
            </div>
            <div class="space-y-8 lg:grid lg:grid-cols-3 sm:gap-6 xl:gap-10 lg:space-y-0">
            <?php
                $args = array(
                    'post_type' => 'perfiles',
                    'posts_per_page' => 3, 
                    'orderby' => 'rand',
                );
                $latest_post = new WP_Query($args);

                // Check if there are posts
                if ($latest_post->have_posts()) {
                    while ($latest_post->have_posts()) {
                        $latest_post->the_post();
            ?>
                <!-- Card -->
                <div class="flex flex-col max-w-lg p-6 mx-auto text-center text-gray-900 bg-white border border-gray-100 rounded-lg shadow dark:border-gray-600 xl:p-8 ">
                    <h3 class="mb-4 text-2xl font-semibold"><?php the_title(); ?></h3>

                    <div class="flex items-baseline justify-center mb-4">
                        <span class="text-inter_red fa-stack fa-2x">
                            <i class="fa-solid fa-circle fa-stack-2x"></i>
                            <i class="fa-solid fa-user-graduate fa-stack-1x fa-inverse"></i>
                        </span>
                    </div>
                    <div class="font-light text-gray-500 sm:text-lg mb-8"><?php the_excerpt(); ?></div>
                    <div id="perfiles" class="[&_ul]:mb-8 [&_ul]:space-y-4 [&_ul]:text-left [&_li]:flex [&_li]:items-center [&_li]:space-x-3">
                        <?php echo get_field('perfiles'); ?>
                    </div>
                    
                    
                    <a href="<?php the_permalink(get_field('carrera')); ?>" class="text-white bg-inter_red hover:shadow-lg hover:shadow-red-300 focus:ring-3 focus:ring-gray-400 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:text-white  dark:focus:ring-purple-900">Ver Carrera</a>
                </div>

                <?php
                        }
                    }

                    // Restore original post data
                    wp_reset_postdata();
                ?>
                <script>
                    document.addEventListener('DOMContentLoaded', function(){ 
                        for (const li of document.querySelectorAll('#perfiles>ul>li')) {
                            let content = li.textContent; 
                            let newContent = `<i class="flex-shrink-0 text-green-500 fa-solid fa-check"></i>
                            <span> ${content}</span>`;
                            li.innerHTML = newContent;
                        }
                    }, false);
                </script>
                
            </div>
        </div>
      </section>
    <!-- End block -->

    <!-- Start block -->
    <section class="bg-gray-50 dark:bg-gray-800">
        <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-24 lg:px-6">
            <figure class="max-w-screen-md mx-auto">
                <i class="text-7xl text-gray-400 fa-solid fa-quote-left"></i>
                <blockquote>
                    <div class="text-xl font-medium text-gray-900 md:text-2xl dark:text-white">
						<?php echo get_field('frase'); ?>
					</div>
                </blockquote>
                <figcaption class="flex items-center justify-center mt-6 space-x-3">
                    <div class="flex items-center divide-x-2 divide-gray-500 dark:divide-gray-700">
                        <div class="pr-3 font-medium text-gray-900 dark:text-white">
							<?php echo get_field('autor_frase'); ?>
						</div>
                        <div class="pl-3 text-sm font-light text-gray-500 dark:text-gray-400">
							<?php echo get_field('autor_cargo'); ?>
						</div>
                    </div>
                </figcaption>
            </figure>
        </div>
      </section>
    <!-- End block -->

<?php get_footer();?>