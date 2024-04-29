<?php get_header();?>

    <section class="bg-white dark:bg-gray-900 mb-2 pt-20 md:pt-5">
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-24 lg:px-6">
			<div class="mx-8">
				<?php if(have_posts()){
					while(have_posts()){ the_post();
				?>
						<h1 class="mt-3 mb-5 text-4xl font-extrabold tracking-tight text-gray-900 md:text-4xl dark:text-white"><?php the_title(); ?></h1>
				<?php
						the_content();
					}
				}?>  
			</div>                 
        </div>
    </section>

<?php get_footer();?>