<?php get_header();?>

    <section class="bg-white dark:bg-gray-900 mb-2 pt-20 md:pt-5">
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-24 lg:px-6">
			<div class="mx-8">
				<?php if(have_posts()){
					while(have_posts()){ the_post();
						?>
						<h1><?php the_title(); ?></h1>
						<div class="font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
							<?php the_content(); ?>
						</div>                 
				<?php
					}
				}?>  
			</div>                 
        </div>
    </section>

<?php get_footer();?>