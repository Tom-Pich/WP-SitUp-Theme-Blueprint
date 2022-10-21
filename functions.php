<?php 

function su_register_assets() {
	wp_enqueue_style("SitUp", get_stylesheet_uri(), array(), "1.0");
	wp_enqueue_script( 'load-fa', 'https://kit.fontawesome.com/34ed29389d.js' );
	wp_enqueue_script('register', get_template_directory_uri().'/scripts/main.js', array(), '1.0', true);
}

function su_remove_admin_menus() {remove_menu_page( 'edit-comments.php' );}

function cc_mime_types($mimes) {
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}

add_theme_support("post-thumbnails");
add_theme_support("title-tag"); // Ajoute le titre du document dans head title
add_theme_support('editor-styles');
add_editor_style( 'editor-styles.css' );
add_action("wp_enqueue_scripts", "su_register_assets");
add_action( 'admin_menu', 'su_remove_admin_menus' ); // supprimer page menu "commentaires"
add_filter( 'show_admin_bar', '__return_false' ); // supprime la barre d’édition en front-end
remove_action( 'wp_head', 'print_emoji_detection_script', 7 ); // désactive le remplacement auto des émojis

register_nav_menus(['main' => 'Menu Principal', 'footer' => 'Bas de page',]);
/* register_sidebar(['id' => 'sidebar', 'name' => 'Sidebar', 'before_widget'  => '<div class="sidebar-widget %2$s">', 'after_widget'  => '</div>',]); */