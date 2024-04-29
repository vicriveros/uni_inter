<?php 

function init_template(){
    add_theme_support( 'post-thumbnails');
    add_theme_support( 'title-tag' );

    register_nav_menus(
        array(
          'top_menu' => 'Principal'
        )
    );
}
add_action('after_setup_theme','init_template');

function template_styles(){
    //css
    wp_enqueue_style( 'estilos', get_template_directory_uri()."/assets/css/output.css",  array(),'20200422' );
    
    //js
    wp_enqueue_script( 'FA', "https://kit.fontawesome.com/4c657afdc9.js", false,"1.1", true );
    wp_enqueue_script( 'flowbite', "https://unpkg.com/flowbite@1.4.1/dist/flowbite.js", false,"1.1", true );
    
}
add_action('wp_enqueue_scripts','template_styles');

class Custom_Walker_Nav_Menu_top extends Walker_Nav_Menu
{
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        if($item->current){
            $item_class = ' block py-2 pl-3 pr-4 text-white bg-inter_red rounded lg:bg-transparent lg:text-inter_red lg:p-0 dark:text-white ';
        }else{
            $item_class = ' block py-2 pl-3 pr-4 text-gray-700 border-b border-gray-100 hover:bg-gray-50 lg:hover:bg-transparent lg:border-0 lg:hover:text-inter_red lg:p-0 dark:text-gray-400 lg:dark:hover:text-white dark:hover:bg-gray-700 dark:hover:text-white lg:dark:hover:bg-transparent dark:border-gray-700 ';
        }
        echo '<li><a class="'.$item_class.'" href="'.$item->url.'">'.$item->title;
    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {
        echo '</a></li>';
    }
}
