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

//add to menu
function carreras_admin_menu() {
		add_menu_page(
			'Carreras',
			'Carreras',
			'read',
			'carreras_menu',
			'',
			'dashicons-welcome-learn-more',
			null
		);
}
add_action( 'admin_menu', 'carreras_admin_menu' );

//Register post type
add_action('init', 'carreras_register_post_types');
function carreras_register_post_types() {
	$carreras_labels = array(
		'name'               => 'Carreras',
		'singular_name'      => 'Carrera',
		'menu_name'          => 'Carreras'
	);
	$carreras_args = array(
		'labels'             => $carreras_labels,
		'public'             => true,
		'has_archive'        => true,
		'show_in_menu' => 'carreras_menu',
        'show_in_rest'       => true,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions' )
	);
	register_post_type('carrera', $carreras_args);
}

//Register post type
add_action('init', 'perfiles_register_post_types');
function perfiles_register_post_types() {
	$perfiles_labels = array(
		'name'               => 'Perfiles del Egresado',
		'singular_name'      => 'Perfil del Egresado',
		'menu_name'          => 'Perfiles del Egresado'
	);
	$perfiles_args = array(
		'labels'             => $perfiles_labels,
		'public'             => true,
		'has_archive'        => true,
		'show_in_menu' => 'carreras_menu',
        'show_in_rest'       => true,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'revisions' )
	);
	register_post_type('perfiles', $perfiles_args);
}

//Register template for single custom post type
add_filter('template_include', 'custom_carrera_template');
function custom_carrera_template($template) {
    if (is_singular('carrera')) {
        $new_template = locate_template(array('single-carrera.php'));
        if ('' != $new_template) {
            return $new_template;
        }
    }
    return $template;
}

//Register template for archive custom post type
add_filter('archive_template', 'custom_carrera_archive_template');
function custom_carrera_archive_template($template) {
    if (is_post_type_archive('carrera')) {
        $new_template = locate_template(array('archive-carrera.php'));
        if ('' != $new_template) {
            return $new_template;
        }
    }
    return $template;
}

//Include the /acf folder 
add_filter('acf/settings/load_json', function($paths) {
    $paths[] = get_template_directory() . 'acf-json';
    return $paths;
});
