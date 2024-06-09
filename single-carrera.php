<?php get_header();?>

    <section class="bg-white dark:bg-gray-900 mb-2 pt-20 md:pt-5">
        <div class="max-w-screen-xl px-4 py-8 mx-auto lg:py-24 lg:px-6">
			<div class="mx-8">
				<?php if(have_posts()){
					while(have_posts()){ the_post();
						if ( has_post_thumbnail() ) { // check if the post has a featured image
							$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
						}else{
							$featured_img_url ='';
						}
				?>
					<div class=" col-span-5 flex max-h-60 mb-8">
						<img src="<?php echo $featured_img_url; ?>" class="rounded-md object-none object-center " alt="hero image">
					</div>  
					<h1 class="text-center"><?php the_title(); ?></h1>
					<div class="font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl ">
						<?php the_content(); ?>
					</div>
					<?php
						$carrera_id=get_the_ID();
						$latest_post = new WP_Query(array('post_type' => 'perfiles'));

						// Check if there are posts
						if ($latest_post->have_posts()) {
							while ($latest_post->have_posts()) {
								$latest_post->the_post();
								$perfil_carrera = get_field('carrera');
								if($carrera_id == $perfil_carrera){
					?>
						<h2>Perfiles de los egresados</h2>
						<div class="font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl ">
							<?php the_excerpt(); ?>
						</div>
						<div id="perfiles" class="[&_ul]:mb-8 [&_ul]:space-y-4 [&_ul]:text-left [&_li]:flex [&_li]:items-center [&_li]:space-x-3">
							<?php echo get_field('perfiles'); ?>
						</div>
					<?php
								}//if
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

				<?php
					}
				}?>  
			</div>                 
        </div>
    </section>

<?php get_footer();?>